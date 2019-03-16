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
		<title>Sua senha - Casamento de Isabela e Alcides</title>
		<meta name="keywords" content="casamento de Isabela e Alcides, Alcides Augusto Bezerra Neto, Isabela Costa de Santana, casamento, recepção casamento Isabela e Alcides, Isabela e Alcides casamento"/>
		<meta name="author" content="Alcides Augusto Bezerra Neto"/>
		<link rel="stylesheet" href="../_CSSs/estiloGeral.css" type="text/css" />
		<link rel="icon" href="../_imagens/favicon.ico">
		<link rel="stylesheet" href="../_CSSs/estilo_cartao.css" type="text/css" />
		<link rel="stylesheet" href="../_CSSs/impressaoInvisivel.css" type="text/css" media="print" />
		<script type="text/javascript" src="../_bancoDados/scriptsEnvioEmail.js"></script>
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
				<div class="invisivelPrint">
					<h1 class="titulo">Senha de entrada</h1>
				</div>
				<article class="perfilPessoal"> 
					<article id="infoGeral" class="invisivelPrint">
						<h1>Sua senha é <span class="enfase">pessoal</span> e <span class="enfase">intransferível.</span></h1>
						<p>Na recepção, o Agente de Segurança e Controle de Pessoal procederá com sua identificação. Você deve informar o "id" ou o "Crachá". Os noivos agradecem sua colaboração e entendem que uma festa agradável e organizada é o objetivo de todos.</p>
						<p>Guarde com você os seguintes dados:</p>
					</article>
					<table id="senha">
						<caption>Senha</caption>
						<tbody>
							<tr id="nome">
								<td id="celImagem" rowspan="3">
									<img id="imagemParaIngresso" src="getImage.php?identificador=<?php echo $_SESSION["id_pessoa"];?>"></td>
								<td id="celulaNome" class="lador"><span class="campoDoSistema">Nome: </span><span class="respPessoal"><?php echo $_SESSION["nome"]; ?></span></td>								
							</tr>
							<tr id="username">
								<td class="lador"><span class="campoDoSistema">Crachá: </span><span class="respPessoal"><?php echo $_SESSION["username"]; ?></span></td></tr>
							<tr id="id_pessoa">
								<td class="lador"><span class="campoDoSistema">id: </span><span class="respPessoal"><?php echo $_SESSION["id_pessoa"]; ?></span></td></tr>
						</tbody>
					</table>
					<nav class="menuOperacoes">
						<button class="invisivelPrint" onclick="pedirEmail();" >Enviar por email</button>
						<button class="invisivelPrint" onclick="window.print();">Imprimir</button>
					</nav>
					<form id="pedirEmail" method="get" action="enviarEmail.php" style="display: none;">
						<label class="campoDoSistema" for="idEmail">Informe seu email: </label>
						<input type="email" id="idEmail" name="nEmail">
						<input type="submit">				
					</form>					
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