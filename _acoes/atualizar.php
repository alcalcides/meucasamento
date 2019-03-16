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
		<meta charset="utf-8">
		<meta name="keywords" content="casamento de Isabela e Alcides, Alcides Augusto Bezerra Neto, Isabela Costa de Santana, casamento, recepção casamento Isabela e Alcides, Isabela e Alcides casamento"/>
		<title>Atualizar Cadastro - Casamento de Isabela e Alcides</title>
		<link rel="icon" href="../_imagens/favicon.ico">
		<script type="text/javascript" src="scriptsAtualizar.js"></script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70802510-1', 'auto');
  ga('send', 'pageview');

</script>
		<link rel="stylesheet" type="text/css" href="../_CSSs/estiloGeral.css">
		<link rel="stylesheet" type="text/css" href="../_CSSs/atualizar.css">
	</head>

	<body>
		<div class="corpoDaPagina">
			<header>
				Isabela <span id="ezinho">&epsilon;</span> Alcides
			</header>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="../_usuarios/painel_individual.php" title="Sem atualizar">Minha página</a>
					<a href="sair.php" title="Sem atualizar">Sair</a>
				</nav>
			</aside>
			<section class="principal">
				<h1 class="titulo">Corrigir dados</h1>
				<form name="formAtualizar" id="atualizar" onsubmit="return formVazio('formAtualizar')" method="post" action="../_bancoDados/central.php?op=atualizar" enctype="multipart/form-data">
					<fieldset>
						<legend class="campoDoSistema">Nome</legend>
						<p class="dadosVelhos"><span class="campoDoSistema">Nome atual: </span><span class="respPessoal"><?php echo $_SESSION["nome"];?></span></p>
						<p class="dadosNovos" title="Digite seu nome completo - só letras"><label for="idNome"><span class="campoDoSistema">Nome corrigido: </span></label><input name="nNome" id="idNome" type="text" size="80" maxlengh="100" placeholder="Nome completo - não use caracteres especiais como '/#$> etc"></p>
						<input class="alinhaEsquerda" type="button" onclick="limpaCampos('idNome')" value="Limpar">
					</fieldset>
					<fieldset>
						<legend class="campoDoSistema">Crachá</legend>
						<p class="dadosVelhos"><span class="campoDoSistema">Crachá atual: </span><span class="respPessoal"><?php echo $_SESSION["username"];?></span></p>
						<p  class="dadosNovos" title="Palavra única que o identificará na portaria"><label for="idUsername"><span class="campoDoSistema">Crachá corrigido: </span></label><input type="text" id="idUsername" name="nUsername" size="23" maxlength="20" placeholder="Reconhecido por"></p>	
						<input class="alinhaEsquerda"  type="button" onclick="limpaCampos('idUsername')" value="Limpar">
					</fieldset>
					<fieldset>
						<legend class="campoDoSistema">Foto</legend>
						<figure id="fotovelha" class="dadosVelhos">
							<figcaption>
									<span class="campoDoSistema">Foto atual</span>
							</figcaption>
							<img class="fotoAntiga" alt="<?php echo $_SESSION["nome"]; ?>" src='../_usuarios/getImage.php?identificador=<?php echo $_SESSION["id_pessoa"]; ?>'>
						</figure>
						<p class="dadosNovos"><label for="idFoto"><span class="campoDoSistema">Nova foto <span id="detalhe">(até 64KB)</span></span>: </label><input type="file" id="idFoto" name="nFoto"></p>
						<input class="alinhaEsquerda" type="button" onclick="limpaCampos('idFoto')" value="Limpar">
					</fieldset>
					<p>
						<input type="reset"  value="Limpar Campos" onclick="colocarCursor('idNome')">
						<input type="submit" value="Atualizar Dados" id="idCadastrar" name="nCadastrar">	
					</p>		
				</form>
			</section>
			<aside>
				<nav class="menuDeNavegacao">
					<a href="../_usuarios/painel_individual.php" title="Sem atualizar">Minha página</a>
					<a href="sair.php" title="Sem atualizar">Sair</a>
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