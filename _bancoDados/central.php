<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Sistema central - Casamento de Isabela e Alcides</title>
		<link rel="stylesheet" type="text/css" href="">
		<script type="text/javascript" src="scriptsDiversos.js"></script>
	</head>
	<body>
		<?php
			require "config.php";
			require "connection.php";
			require "database.php";

			function atualizarVarSession(array $registro) {
				if($registro["nome"]){
					$_SESSION["nome"]=$registro["nome"];
				}
				if($registro["username"]){
					$_SESSION["username"]=$registro["username"];
				}
				if($registro["foto"]){
					$_SESSION["foto"]=$registro["foto"];
				}
			}

			//Lendo os dados do formulário
			date_default_timezone_set("America/Recife");
			$momento=date("d/m/Y H:i:s");
			$foto=isset($_FILES["nFoto"])?$_FILES["nFoto"]:null;
			//Para debugar
			//echo "<pre>";
			//echo "a foto<br>";
			//var_dump($foto);
			//echo "</pre>";

			if(isset($_POST["nNome"])){
				$nome=$_POST["nNome"];
				//$nome=limpaApostrofoBD($nome);
				$nome=acertarNome($nome);
			}
			else{
				$nome=null;
			}
			$username=isset($_POST["nUsername"])?trim(limpaApostrofoBD($_POST["nUsername"])):null;
			$id=isset($_POST["nId"])?$_POST["nId"]:null;
			
			//Tratando a imagem
			if (!$foto["name"]) {
				$mysqlImg=null;
				if ($_GET["op"]=="cadastrar") {
					echo '<script>alert("fotoVazia");</script>';
					exit();
				}
			}
			elseif ($foto["size"]>=64000) {
				$mysqlImg=null;
				//echo '<script>errofoto("fotoGrande")</script>';
				echo "<script>erroFoto()</script>";
				if ($_GET["op"]=="cadastrar") {
					echo '<script>alert("impossível cadastro de foto grande");</script>';
					exit();
				}
				if ($_GET["op"]=="atualizar") {
					echo '<script>alert("impossível atualizar para uma foto grande");</script>';
					exit();
				}
			}
			else{
				//echo "<script>alert('foto recebida');</script>";
				$nomeFinal = $nome.'.jpg';
				move_uploaded_file($foto['tmp_name'], $nomeFinal);
				$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), filesize($nomeFinal)));
				unlink($nomeFinal);	
			}
			


			/*Jeito primeiro de tratar fotos
			if($foto["size"]<=0 || $foto["size"]>=64000) { //não houve upload de foto ou foto maior que 64KB
				echo '<script>alert("problema na foto")</script>';
				if($foto["size"]<=0) {
					echo '<script>alert("sem foto");</script>';
					if ($_GET["op"]=="cadastrar") {
						echo '<script>alert("impossível cadastar sem foto");</script>';
					}
					//echo '<script>alert("Não pode cadastrar sem foto")</script>';
					//echo "<script>subirFoto()</script>";	
				} 
				else{
					echo '<script>alert("foto muito grande!");</script>';					
				}
				//Desnecessário
				//echo "<h1><a href='javascript:history.go(-1)'>Voltar</a></h1>";
				
				$mysqlImg=null;
			}
			else{ //houve correto envio de foto
				//Para debugar
				//echo "Foto carregada<br>";
				
				$nomeFinal = $nome.'.jpg';
				move_uploaded_file($foto['tmp_name'], $nomeFinal);
				$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), filesize($nomeFinal)));
				unlink($nomeFinal);
			}	
			*/
			
			$operacao=$_GET["op"];
			switch ($operacao) {
				case 'cadastrar':
					//Para debugar
					//echo "Voce escolheu <h1>$operacao</h1>";

					//Verificando duplicidade no banco de dados para nome
					$registroAntigo = array(
						'id_pessoa'	=> null,
						'momento'	=> null,
						'username'	=> null,
						'nome' 		=> $nome
					);
					$existeAntigo = pesquisarRegBD($registroAntigo,tabela);
					if($existeAntigo!="Dados incoerentes"){
						echo "<script>cadastroDuplicado()</script>";
						exit();
					}

					//Formando o registro
					$registro = array(
						'momento'	=> $momento,
						'nome' 		=> $nome,
						'username'	=> $username,
						'foto'		=> $mysqlImg						
					);
					//Inserir no banco de dados
					$id_pessoa=inserirRegBD(tabela, $registro,true);
					if($id_pessoa!=0){
						//inicializando variáveis da sessão
						$_SESSION["id_pessoa"] =$id_pessoa;
						$_SESSION["nome"]=$nome;
						$_SESSION["username"]=$username;
						echo "<script>cadastroFeito()</script>";
					}
					else{
						echo "<script>ErroDeCadastro()</script>";
					}
					break;
				case 'entrar':
					//Para debugar
					//echo "Voce escolheu <h1>$operacao</h1>";
					//Formando o registro
					$registro = array(
						'nome' 		=> $nome,
						'id_pessoa'	=> $id,
						'username'	=> $username
					);
					$retorno=pesquisarRegBD($registro,tabela);
					//Para debugar
					//var_dump($retorno);
					if(is_int($retorno)) {
						$_SESSION["id_pessoa"] =$retorno;
						echo "<script>loginCorreto()</script>";
					}
					elseif($retorno=="Dados incoerentes"||$retorno==null){
						//Para debugar
						//echo "loginErrado($retorno)<br>";

						echo "<script>loginErrado('$retorno')</script>";
					}				
					else{//Dados duplicados
						$_SESSION["emAmbiguidade"]=$retorno;
						header('Location:../_usuarios/getImage_s.php');
					}
					break;
				case 'atualizar':
					//Para debugar
					//echo "Voce escolheu <h1>$operacao</h1>";
					
					//Verificando duplicidade no banco de dados para nome
					$registroAntigo = array(
						'id_pessoa'	=> $_SESSION["id_pessoa"],
						'momento'	=> null,
						'username'	=> null,
						'nome' 		=> $nome
					);
					$existeAntigo = pesquisarRegBDAtualizar($registroAntigo,tabela);
					if($existeAntigo){
						echo "<script>cadastroDuplicado()</script>";
						exit();
					}

					//Formando o registro
					$registro = array(
						'momento'	=> $momento,
						'nome' 		=> $nome,
						'username'	=> $username,
						'foto'		=> $mysqlImg						
					);
					$retorno=atualizarCadastroBD(tabela,$registro,$_SESSION["id_pessoa"]);
					if($retorno){
						atualizarVarSession($registro);
						echo "<script>dadosAtualizados()</script>";
					}
					else{
						echo "<script>erroAtualizacao()</script>";
					}
					break;
				case 'descadastrar'://Não implementada
					//A desenvolver
					//echo "Voce escolheu <h1>$operacao</h1>";
					break;
				default:
					//Para debugar
					//echo "Voce escolheu <h1>$operacao</h1>";
					header("location: ../_acoes/sair.php");
					break;
			}
		?>
	</body>
</html>