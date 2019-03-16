<?php
	//Abre conexão com banco de dados
	function conectarBD(){
		$link=mysqli_connect(hostname,username,password,banco) or die(mysqli_connect_error());
		mysqli_set_charset($link, bancoCharset) or die(mysqli_error($link));
	return $link;
	}

	//Edita entradas com apóstrofo para o banco de dados
	function limpaApostrofoBD($dados){
		$link=conectarBD();
		if(!is_array($dados)){
			$dados=mysqli_real_escape_string($link, $dados);
		}
		else{
			foreach ($dados as $key => $value) {
				if(is_string($key)){
					$key=mysqli_real_escape_string($link,$key);
				}
				if(is_string($value)){
					$value=mysqli_real_escape_string($link,$value);
				}
			}
		}
		desconectarBD($link);
	return $dados;
	}

	//Fecha conexão com banco de dados
	function desconectarBD($link){
		mysqli_close($link) or die(mysqli_error($link));
	}
?>