<?php
	session_start();
	session_unset();
	session_destroy();	
?>


<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Login - Casamento de Isabela e Alcides</title>
		<meta name="keywords" content="casamento de Isabela e Alcides, Alcides Augusto Bezerra Neto, Isabela Costa de Santana, casamento, recepção casamento Isabela e Alcides, Isabela e Alcides casamento"/>
		<meta name="description" content="Casamento de Isabela e Alcides. Todos os convidados devem fazer seu cadastro."/>
		<meta name="author" content="Alcides Augusto Bezerra Neto"/>
		<link rel="stylesheet" type="text/css" href="_CSSs/estiloGeral.css">
		<link rel="stylesheet" type="text/css" href="_CSSs/formulario.css">
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
					<a href="_acoes/cadastrar.html">Cadastrar</a>
					<a href="login.php">Login</a>
				</nav>
			</aside>
			<section class="principal">
				<h1 class="titulo">Login</h1>
				<article class="formulario">
					<form action="_bancoDados/central.php?op=entrar" method="post">
						<fieldset id="PreechaParaEntrar">
							<legend>Entre com <span id="detalheLogin">apenas um</span> dos seguintes campos</legend>
						   	<p title="Procure por este campo no seu comprovante de cadastramento">
						   		<label for="idId">
						   			<span class="campoDoSistema">id: </span>
						   		</label>
						   		<input type="number" id="idId" name="nId" placeholder="Digite seu ID único">
						   	</p>
						   	<p title="Você criou este campo ao se cadastrar, procure no seu comprovante">
						   		<label for="idUsername">
						   			<span class="campoDoSistema">Crachá: </span>
						   		</label>
						   		<input type="text" id="idUsername" name="nUsername" size="20" maxlength="20" placeholder="Reconhecido por">
						   	</p>
						   	<p title="Digite seu nome completo atenciosamente">
						   		<label for="idNome">
						   			<span class="campoDoSistema">Nome: </span>
						   		</label>
						   		<input name="nNome" id="idNome" type="text" size="90" maxlengh="100" placeholder="Nome completo cuidadosamente">
						   	</p>
					   	</fieldset>
					  	<p><input type="submit" value="Acessar"></p>
					</form>
				</article>
			</section>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="_acoes/cadastrar.html">Cadastrar</a>
					<a href="login.php">Login</a>
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