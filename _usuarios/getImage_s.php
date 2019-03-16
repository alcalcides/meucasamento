<?php
	session_start();
	if(!isset($_SESSION["emAmbiguidade"])) {
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
		<title>Desambiguando - Casamento de Isabela e Alcides</title>
		<meta name="keywords" content="casamento de Isabela e Alcides, Alcides Augusto Bezerra Neto, Isabela Costa de Santana, casamento, recepção casamento Isabela e Alcides, Isabela e Alcides casamento"/>
		<meta name="author" content="Alcides Augusto Bezerra Neto"/>
		<link rel="stylesheet" type="text/css" href="../_CSSs/estiloGeral.css">
		<link rel="stylesheet" type="text/css" href="../_CSSs/desambiguando.css">
		<link rel="icon" href="_imagens/favicon.ico">
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70802510-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	<body>
		<div class="corpoDaPagina">
			<header>
				Isabela <span id="ezinho">&epsilon;</span> Alcides
			</header>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="../_acoes/cadastrar.html">Cadastrar</a>
					<a href="../login.php">Login</a>
				</nav>
			</aside>
			<section class="principal">
				<h1 class="titulo">Desambiguação</h1>
				<article>
					<?php foreach ($_SESSION["emAmbiguidade"] as $value): ?>
						<table class="candidato">
							<tbody>
								<tr>
									<td rowspan="3">
										<img class="carinha" src='getImage.php?identificador=<?php echo $value; ?>'>
									</td>
									<td class="texto">
										<iframe frameborder="0" src='getNome.php?identificador=<?php echo $value; ?>'></iframe>
									</td>
								</tr>								
								<tr>
									<td class="texto">
										<iframe frameborder="0" src='getCracha.php?identificador=<?php echo $value; ?>'></iframe>
									</td>
								</tr>
								<tr>
									<td>
										<a href='setId.php?identificador=<?php echo $value; ?>'>
											<button>Acessar id = <?php echo $value; ?></button>
										</a>
									</td>
								</tr>
							</tbody>
						</table>
						<hr>
					<?php endforeach; ?>
				</article>
			</section>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="../_acoes/cadastrar.html">Cadastrar</a>
					<a href="../login.php">Login</a>
				</nav>
			</aside>
			<footer>
				<p id="logo"><b>#ADS#</b> Tecnologia
				<p>
					<span id="direitos">Criador: </span>
					<a class="noTexto" href="http://alcides.pe.hu/" target="blank">Alcides Augusto Bezerra Neto</a>
				</p>
			</footer>
		</div>
	</body>
</html>