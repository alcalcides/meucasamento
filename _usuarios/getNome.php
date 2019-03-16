<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<style type="text/css">
			p {
				height: 15px;
				margin: 0px;
				padding: 0px;
				position: absolute;
				top: 0px;
				overflow-y: hidden;
			}
		</style>
	</head>
	<body>
		<?php
			require '../_bancoDados/config.php';
			require '../_bancoDados/connection.php';
			$identificador=$_GET["identificador"];

			$conexao=conectarBD();
			$result=mysqli_query($conexao,"SELECT * FROM pessoas WHERE id_pessoa=$identificador") or die(mysqli_error()); 
			$row=mysqli_fetch_array($result); 
			echo "<p>".$row['nome']."</p>"; 
			//Leia mais em: Upload de imagens em PHP e MySQL http://www.devmedia.com.br/upload-de-imagens-em-php-e-mysql/10041#ixzz3oc9JDoQ9
		?>
	</body>
</html>