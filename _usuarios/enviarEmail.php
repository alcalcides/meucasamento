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
		<meta charset="UTF-8">
		<script type="text/javascript">
			function emailEnviado (feedback) {
				if (feedback) {
					alert("Aguarde 5 minutos e verifique seu email, inclusive a caixa de spam");
					window.location="painel_individual.php";
				}
				else {
					alert("Erro ao enviar email. Procure anotar seus dados ou imprimir");
					window.history.go(-1);
				}
			}
		</script>
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
			$to = $_GET["nEmail"];
			$subject = "Senha do Casamento de Isabela e Alcides para ".$_SESSION["nome"];
			$inicioHtml="
				<html lang='pt-br'>
					<head>
						<meta charset='UTF-8'>
						<style type='text/css'>
							body{
								font-family: 'Calibri','sans-serif';
							}
							.campoDoSistema {
								font-family: 'Agency FB','sans-serif';
							}
							.respPessoal {
								font-family: 'Arial';
								font-style: italic;
							}
							div#senha {
						        margin-left: 15px;
						        margin-top: 20px;
								margin-bottom: 20px;  
							}
						</style>	
					</head>
				<body>";
			$saudacao="<h1>Olá!</h1>";
			$introd = "<p>Nos sentimos honrados pelo prestígio de sua presença em nosso casamento. Esta é a sua senha para a recepção. Ela é individual e intransferível. Sua foto já está em nosso banco de dados.</p>";
			$senha ='
            <br><hr>
            <div id="senha">
			<p>
				<span class="campoDoSistema">Nome: </span>
				<span class="respPessoal">'.$_SESSION["nome"].'</span>
			</p>								
			<p>
				<span class="campoDoSistema">Crachá: </span>
				<span class="respPessoal">'.$_SESSION["username"].'</span>
			</p>
			<p>
				<span class="campoDoSistema">id: </span>
				<span class="respPessoal">'.$_SESSION["id_pessoa"].'</span>
			</p>
            </div><hr>
			<p>Contamos com sua presença</p>
			<p>Até lá!</p>
			';
			$fimHtml="</body>
		</html>";
			$message=$inicioHtml.$saudacao.$introd.$senha.$fimHtml;
			$message=wordwrap($message,70);
			$message=str_replace("/n.", "/n..", $message);

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: isabelaealcides@isabelaealcides.pe.hu' . "\r\n";
			$headers .= 'Cc: isabela_costa12@hotmail.com, alcalcides@hotmail.com' . "\r\n";

			$feedback=mail($to,$subject,$message,$headers);
			echo "<script>emailEnviado($feedback)</script>";
		?>
	</body>
</html>		