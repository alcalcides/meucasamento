function limpaCampos (paciente) {
	document.getElementById(paciente).value="";
	colocarCursor(paciente);
}

function colocarCursor (paciente) {
	document.getElementById(paciente).focus();
}

function formVazio (formNome) {
	var x = document.forms[formNome]["nNome"].value;
	var y = document.forms[formNome]["nUsername"].value;
	var z = document.forms[formNome]["nFoto"].value;				
	if(x=="" && y=="" && z==""){
		alert("Todos os campos estão vazios");
		window.location="atualizar.php";
		return false;
	}
	else return true;
}