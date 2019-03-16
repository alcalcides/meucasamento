<?php
	session_start();
	if(!isset($_SESSION["id_pessoa"])) {
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
		<title>Cadastrados - Casamento de Isabela e Alcides</title>
		<meta name="author" content="Alcides Augusto Bezerra Neto"/>
		<link rel="stylesheet" type="text/css" href="../_CSSs/estiloGeral.css">
		<link rel="icon" href="../_imagens/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../_CSSs/desambiguando.css">
		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-70802510-1', 'auto');
			  ga('send', 'pageview');

			</script>
		<?php 
			require "../_bancoDados/config.php";
			require "../_bancoDados/connection.php";
			require "../_bancoDados/database.php";
		?>
	</head>
	<body>
		<div class="corpoDaPagina">
			<header>
				Isabela <span id="ezinho">&epsilon;</span> Alcides
			</header>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="painel_individual.php">Minha Página</a>
					<a href="../_acoes/atualizar.php">Corrigir dados</a>
					<a href="ingresso.php" title="Senha para a portaria">Senha de entrada</a>
					<a href="agenda.php">Agenda</a>
					<a href="listaCadastrados.php">Demais Cadastros</a>
					<a href="../_acoes/sair.php">Sair</a
				</nav>
			</aside>
			<section class="principal">
				<h1 class="titulo">Cadastrados</h1>
				<article>
					<?php 
						$ultimoId = idUltimoReg(tabela);
						for ($value=1; $value <= $ultimoId["id_pessoa"]; $value++): ?>
							<?php if(!existeRegistro($value, tabela)) continue; ?>
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
					<?php endfor; ?>
				</article>
			</section>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="painel_individual.php">Minha Página</a>
					<a href="../_acoes/atualizar.php">Corrigir dados</a>
					<a href="ingresso.php" title="Senha para a portaria">Senha de entrada</a>
					<a href="agenda.php">Agenda</a>
					<a href="listaCadastrados.php">Demais Cadastros</a>
					<a href="../_acoes/sair.php">Sair</a>
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