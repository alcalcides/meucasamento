<?php
	session_start();
	if(!isset($_SESSION["emAmbiguidade"])) {//Esta página só funciona para quem está desambiguando
		session_unset();
		session_destroy();
		header("location: ../index.html");
		exit();
	}	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<script type="text/javascript" src="../_bancoDados/scriptsDiversos.js"></script>
	</head>
	<body>
		<?php
			$_SESSION["id_pessoa"] = $_GET["identificador"];
			echo "<script>loginCorreto()</script>";
		?>
	</body>
</html>