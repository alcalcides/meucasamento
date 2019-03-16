<?php
	 //Executa query
	function executarQuery($query,$querID=false){
		$link=conectarBD();
		$partedatabela=mysqli_query($link,$query) or die(mysqli_error($link));
		if($querID){
			$partedatabela=mysqli_insert_id($link);//Só funciona se $query tiver sido UPDATE ou INSERT
		}
		desconectarBD($link);
	return $partedatabela;
	}

	//Conta quantos registros tem num campo de uma tabela
	function numRegsTabela($campo, $tabela) {
		$query="SELECT * FROM $tabela WHERE $campo";
		$link=conectarBD();
		$partedatabela=mysqli_query($link,$query) or die(mysqli_error($link));
		$numConvidados=mysqli_num_rows($partedatabela);
	return $numConvidados;
	}

	//Retorna o id do último registro de uma tabela
	function idUltimoReg($tabela) {
		$query = "SELECT id_pessoa FROM $tabela ORDER BY id_pessoa DESC LIMIT 1";
		$ultimoRegistro = executarQuery($query);
		$ultimoRegistro = mysqli_fetch_assoc($ultimoRegistro);
	return $ultimoRegistro;
	}

	//Inserir novo registro na tabela
	function inserirRegBD($tabela, array $registro, $querID=false){
		$registro=limpaApostrofoBD($registro);
		$campos=implode(", ", array_keys($registro));
		$valores="'".implode("', '", $registro)."'";
		$query="INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";
	return executarQuery($query,$querID);
	}

	//Ler registros
	function lerRegBD($campos, $tabela=tabela, $condicao=null){
		$row=null;
		$todaATabela=null;
		if(!$condicao){
			$condicao=null;
		}
		$query="SELECT {$campos} FROM {$tabela}{$condicao}";
		$select=executarQuery($query);
		if(!mysqli_num_rows($select)){
	return 0;
		}else{
			while ($row=mysqli_fetch_assoc($select)) {
				$todaATabela[]=$row; 
			}
		}
	return $todaATabela;	
	}

	//Atualiza registros
	function atualizarRegBD($tabela, array $campos,$condicao=null, $querID=false){
		if($condicao!=null){
			$condicao=" WHERE ".$condicao;
		}
		foreach ($campos as $key => $value) {
			$temp[]="$key='$value'";
		}
		$temp=implode(", ", $temp);
		$query="UPDATE {$tabela} SET {$temp}{$condicao}";
	return executarQuery($query, $querID);
	}

	//Excuir registros
	function excluirRegBD($tabela,$condicao=null){
		if($condicao!=null){
			$condicao=" WHERE ".$condicao;
		}
		$query="DELETE FROM {$tabela}{$condicao}";
	return executarQuery($query);
	}

	function getImage($tabela,$identificador){
		$query= "SELECT * FROM {$tabela} WHERE id_pessoa=$identificador"; 
		$row=mysqli_fetch_object($result); 
		header("Content-type: image/gif");
	return $row->foto;
	}

	function existeRegistro($id_pessoa, $tabela){
		$query = "SELECT * FROM $tabela WHERE id_pessoa = $id_pessoa";
		$result=executarQuery($query);
		$result = $result->num_rows; 
	return $result;
	}

	function pesquisarRegBD(array $registro,$tabela){
		if($registro["id_pessoa"]){
			$campos="id_pessoa = ".$registro["id_pessoa"];
		}
		elseif ($registro["username"]) {
			$campos="username = '{$registro["username"]}'";
		}
		elseif ($registro["nome"]){
			$campos="nome = '{$registro["nome"]}'";
		}
		else{
  			return null;//sempre que nenhum dado for inserido
		}
		$campos=" WHERE ".$campos;
		$query="SELECT * FROM {$tabela}{$campos}";
		$parteDaTabela=executarQuery($query);
		$qtdeRegistros=mysqli_num_rows($parteDaTabela);
		if($qtdeRegistros==1){
			$row=mysqli_fetch_object($parteDaTabela);
			mysqli_free_result($parteDaTabela); 
			return (int)$row->id_pessoa;//Há apenas 1 registro no banco de dados correspondente à pesquisa
		}elseif ($qtdeRegistros>1) {
			for ($i=0; $i<$qtdeRegistros; $i++) { 
				$rows=mysqli_fetch_array($parteDaTabela);
				$fotos[] = $rows['id_pessoa'];
			}
			mysqli_free_result($parteDaTabela); 
			return $fotos;//Duplicidade no banco de dados
		}
		else{
			return "Dados incoerentes";//Não há registro com esse perfil
		}
	}

	function pesquisarRegBDAtualizar(array $registro,$tabela){
		if(!isset($registro["nome"]) && !isset($registro["id_pessoa"])) {
  			return null;//sempre que nenhum dado for inserido
		}
		$campos="id_pessoa != ".$registro["id_pessoa"];
		$campos .= " && nome = '{$registro["nome"]}'";		
		$campos=" WHERE ".$campos;
		$query="SELECT * FROM {$tabela}{$campos}";
		$parteDaTabela=executarQuery($query);
		$qtdeRegistros=mysqli_num_rows($parteDaTabela);
		unset($parteDaTabela);
	return $qtdeRegistros;
	}

	//Busca registro como objeto
	function buscarRegBD($campos, $tabela=tabela, $condicao=null,$foto=false){
		$campos="`".$campos."`";
		$tabela="`".$tabela."`";
		if($condicao){
			$condicao=" WHERE ".$condicao;
		}
		//$row=null;
		$todaATabela=null;		
		$query="SELECT {$campos} FROM {$tabela}{$condicao}";
		$select=executarQuery($query);
		if(!mysqli_num_rows($select)){
	return 0;
		}else{
			while ($row=mysqli_fetch_array($select)) {
				$todaATabela[]=$row; 
			}
		}
	return $todaATabela;	
	} 

	function acertarNome($nome){
		$nome=trim($nome);
		$tamanho=strlen($nome);
		$temp=str_split($nome);
		for ($i=0; $i<$tamanho-1; $i++) { 
			if($temp[$i]==' ' && $temp[$i+1]==' '){
				unset($temp[$i]);
			}
		}
		//refazer a string $nome
		$nomeAjeitado=implode('', $temp);
		$nomeAjeitado=mb_strtoupper($nomeAjeitado,'UTF-8');
	return $nomeAjeitado;
	}

	function buscarFotoBD($id_pessoa){
		$conexao=conectarBD();
		$reg=mysqli_query($conexao,"SELECT * FROM pessoas WHERE id_pessoa = $id_pessoa");
		$obj=mysqli_fetch_object($reg);
	return "getImage.php?identificador=$obj->id_pessoa";
	}

	function atualizarCadastroBD($tabela, array $registro, $id_pessoa)	{
		foreach ($registro as $key => $value) {
			if ($value) {
				$campos="$key='"."$value"."', ";
			}
		}
		$campos=substr($campos, 0, strlen($campos) - 2);
		$condicao="id_pessoa='"."$id_pessoa"."'";
		$query="UPDATE $tabela SET $campos WHERE $condicao";
	return executarQuery($query);
	}
?>