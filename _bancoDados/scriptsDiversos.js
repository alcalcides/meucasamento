function cadastroDuplicado() {
	alert("Não é possível duplicar cadastro para o nome inserido.");
	window.history.go(-1);
}

function erroFoto () {
	alert("Foto muito grande: primeiro compacte ou corte sua imagem, caso não prefira escolher outra foto.");
	window.history.go(-1);
}

function errofoto (caso) {
	if(caso=="fotoVazia"){
		alert("fotoVazia");
		window.location = "../_acoes/cadastrar.html";
	}
	else {
		alert("Foto muito grande: primeiro compacte ou corte sua imagem, caso não prefira escolher outra foto.");
		window.history.go(-1);//Volta para cadastrar.html ou para atualizar.php
	}
}

function subirFoto (caso) {
	alert("executando função subirFoto");
	if (!caso) {
		alert("Envie uma foto");
		window.location="../_acoes/cadastrar.html";
	}
	else {
		alert("Foto muito grande: primeiro compacte ou corte sua imagem, caso não prefira escolher outra foto.");
		if(caso=="cadastrar") {
			window.location="../_acoes/"+caso+".html";
		}
		else {
			window.location="../_acoes/"+caso+".php";
		}
	}
}


function loginErrado (caso) {
	if (!caso) {//Deixou os campos em branco
		alert("Digite alguma coisa");
		window.location="../login.php";	
	}
	else {
		alert(caso+";"+" não há registro no banco de dados com o perfil desejado, cadastre-se ou reveja a digitação");
		history.go(-1);
	}	
}

function ErroDeCadastro () {
	alert("Faça seu cadastro corretamente");
	window.location="../_acoes/cadastrar.html";
}

function cadastroFeito () {
	alert("Convidado especial incorporado");
	window.location="../_usuarios/painel_individual.php";
}

function loginCorreto () {
	alert("Bem-vindo!");
	window.location="../_usuarios/painel_individual.php";
}

function erroAtualizacao() {
	alert("Erro ao atualizar cadastro!");
	window.location="../_usuarios/painel_individual.php";
}

function dadosAtualizados () {
	alert("Dados Atualizados");
	window.location="../_usuarios/painel_individual.php";
}