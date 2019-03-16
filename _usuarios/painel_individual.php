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
		<title>
			<?php 
				if(isset($_SESSION["nome"])){
					echo $_SESSION["nome"]." - Casamento de Isabela e Alcides";
				} 
				else{
					echo "Meu lugar especial - Casamento de Isabela e Alcides";
				}
			?>
		</title>
		<link rel="stylesheet" type="text/css" href="../_CSSs/estiloGeral.css">
		<link rel="stylesheet" type="text/css" href="../_CSSs/perfilIndividual.css">
		<link rel="icon" href="../_imagens/favicon.ico">
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
		<?php 
			require "../_bancoDados/config.php";
			require "../_bancoDados/connection.php";
			require "../_bancoDados/database.php";
			//preenchendo variáveis da session
			$id_pessoa=$_SESSION["id_pessoa"];
			$temp=buscarRegBD("nome`,`username",tabela,"id_pessoa={$id_pessoa}");
			if(!isset($_SESSION["nome"])){				
				$_SESSION["nome"]=$temp[0]["nome"];
			}		
			if(!isset($_SESSION["username"])){
				$_SESSION["username"]=$temp[0]["username"];
			}
			if(!isset($_SESSION["foto"])){
				$_SESSION["foto"]=buscarFotoBD($id_pessoa);
			}
		?>
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
					<a href="../_acoes/sair.php">Sair</a>
				</nav>
			</aside>
			<section class="principal">
				<h1 class="titulo">Minha página</h1>
				<article class="perfilPessoal">
					<p><span class="campoDoSistema">id: </span><span class="respPessoal"><?php echo $_SESSION["id_pessoa"]?></span></p>
					<p><span class="campoDoSistema">Nome: </span><span class="respPessoal"><?php echo $_SESSION["nome"]?></span></p>
					<p><span class="campoDoSistema">Crachá: </span><span class="respPessoal"><?php echo $_SESSION["username"]?></span></p>
					<figure class="fotoGrande">
						<img alt="<?php echo $_SESSION["nome"]; ?>" src="getImage.php?identificador=<?php echo $_SESSION["id_pessoa"]; ?>">
					</figure>
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