<?php
	session_start();
	if(!isset($_SESSION["id_pessoa"])) {
		session_unset();
		session_destroy();
		header("location: ../index.html");
		exit();
	}	
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Agenda - Casamento de Isabela e Alcides</title>
		<meta name="keywords" content="casamento de Isabela e Alcides, Alcides Augusto Bezerra Neto, Isabela Costa de Santana, casamento, recepção casamento Isabela e Alcides, Isabela e Alcides casamento"/>
		<meta name="author" content="Alcides Augusto Bezerra Neto"/>
		<link rel="stylesheet" href="../_CSSs/estiloGeral.css" type="text/css" />
		<link rel="icon" href="../_imagens/favicon.ico">
		<link rel="stylesheet" href="../_CSSs/agenda.css" type="text/css" />
		<script>
		  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  	ga('create', 'UA-70802510-1', 'auto');
		  	ga('send', 'pageview');
		</script>
		<script type="text/javascript">
			function mudaDisplay (status) {
				document.getElementById("naoPlagio").style.display=status;
			}
		</script>
	</head>	
	<body>
		<div class="corpoDaPagina">
			<header class="invisivelPrint">
				Isabela <span id="ezinho">&epsilon;</span> Alcides
			</header>
			<aside class="invisivelPrint">
				<nav class="menuDeNavegacao">
					<a href="painel_individual.php">Minha página</a>
					<a href="../_acoes/atualizar.php">Corrigir dados</a>
					<a href="ingresso.php">Senha de entrada</a>
					<a href="agenda.php">Agenda</a>
					<a href="listaCadastrados.php">Demais Cadastros</a>
					<a href="../_acoes/sair.php">Sair</a>
				</nav>
			</aside>	
			<section class="principal">
				<h1 class="titulo">Agenda</h1>
				<article class="agenda">
					<h1>Cerimônia Religiosa</h1>
					<p>
						<span class="campoDoSistema">Horário: </span>
						<span class="respPessoal">17h00min</span>
					</p>
					<div class="localizacao">
						<iframe name="mapaIgreja" id="mapaIgreja" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7777.06603003185!2d-38.371858!3d-12.937708!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x07161773a891d213%3A0x04c68df773250d47!2s4A+Travessa+Lu%C3%ADs+Eduardo+Magalh%C3%A3es%2C+79+-+Itapu%C3%A3%2C+Salvador+-+BA%2C+41610-756%2C+Brasil!5e0!3m2!1spt-BR!2sbr!4v1450288159097" frameborder="0" allowfullscreen></iframe>
						<iframe name="fotoIgreja" id="fotoIgreja" src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-BR!2sbr!4v1450288948947!6m8!1m7!1sYO7IinPuxfBBweF8pUJEOQ!2m2!1d-12.9342647!2d-38.3661735!3f48.25907426860402!4f-1.505960409382979!5f0.7820865974627469" frameborder="0" allowfullscreen></iframe>
					</div>
				</article>
				<article class="agenda">
					<h1>Recepção</h1>
					<p>
						<span class="campoDoSistema">Horário: </span>
						<span class="respPessoal">Após a cerimônia</span>
					</p>
					<div class="localizacao">
						<iframe name="mapaRecepcao" id="mapaRecepcao" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.5331013478167!2d-38.374046984643314!3d-12.93770246263581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x716176effa80fa1%3A0x17fee42afc2a8190!2sTv.+Nossa+Sra.+de+F%C3%A1tima+de+Itapu%C3%A3%2C+100+-+Itapu%C3%A3%2C+Salvador+-+BA%2C+41615-317!5e0!3m2!1spt-BR!2sbr!4v1450287907988"frameborder="0" allowfullscreen></iframe>
						<div class="naLinha">
							<figure id="recepcao">
								<a href="https://www.google.com.br/maps/@-12.9376965,-38.3718376,3a,75y,35.74h,90.93t/data=!3m6!1e1!3m4!1svm5MedKgfwKemVH4a4ulyQ!2e0!7i13312!8i6656?hl=pt-BR" target="_blank">
									<img id="fotoRecepcao" alt="Recepção do casamento de Isabela e Alcides" src="../_imagens/visualizarRecepcao1.jpg" onmouseover="mudaDisplay('none');" onmouseout="mudaDisplay('inline');">
								</a>
								<figcaption id="naoPlagio">
									<a class="noTexto" href="https://www.google.com.br/maps/@-12.9376965,-38.3718376,3a,75y,35.74h,90.93t/data=!3m6!1e1!3m4!1svm5MedKgfwKemVH4a4ulyQ!2e0!7i13312!8i6656?hl=pt-BR" target="_blank">Fonte: google.com/maps</a>
								</figcaption>
							</figure>
						</div>
					</div>
				</article>				
			</section>
			<aside class="invisivelPrint">
				<nav class="menuDeNavegacao">
					<a href="painel_individual.php">Minha página</a>
					<a href="../_acoes/atualizar.php">Corrigir dados</a>
					<a href="ingresso.php">Senha de entrada</a>
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