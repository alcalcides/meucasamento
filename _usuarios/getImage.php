<?php
	require '../_bancoDados/config.php';
	require '../_bancoDados/connection.php';
	$identificador=$_GET["identificador"];

	$conexao=conectarBD();
	$result=mysqli_query($conexao,"SELECT * FROM pessoas WHERE id_pessoa=$identificador") or die(mysqli_error()); 
	$row=mysqli_fetch_object($result); 
	header("Content-type: image/gif");
	echo $row->foto; 
	//Leia mais em: Upload de imagens em PHP e MySQL http://www.devmedia.com.br/upload-de-imagens-em-php-e-mysql/10041#ixzz3oc9JDoQ9
?>