//para que funcionen los modal
$(document).ready(function(){
	$('#modal_menu').modal();	
	$('#modal_ingredient').modal();
	$('#modal_user').modal();
});


function validateIngredient(){
	var ingredient, quantity;

	ingredient = document.forms["form_ingredient"]["nombre_ingrediente"].value;
	quantity = document.forms["form_ingredient"]["cantidad_inicial"].value;
	
	if (ingredient == "" || quantity == "") {

	  Materialize.toast("Se deben rellenar todos los campos", 3000, "light-green darken-1");
	  return false;
	}

	return true;
}


function validateUser(){
	var nombre_usuario, pass_usuario, nombre, apellido, email, direccion_email, tipo_usuario;

	nombre_usuario = document.forms["form_user"]["nombre_usuario"].value;
	pass_usuario = document.forms["form_user"]["pass_usuario"].value;
	nombre = document.forms["form_user"]["nombre"].value;
	apellido = document.forms["form_user"]["apellido"].value;
	direccion_email = document.forms["form_user"]["direccion_email"].value;
	tipo_usuario = document.forms["form_user"]["tipo_usuario"].value;


	
	if (nombre_usuario == "" || pass_usuario == "" || nombre == "" || apellido == "" || direccion_email == "" || tipo_usuario == "") {

	  Materialize.toast("Se deben rellenar todos los campos", 3000, "light-green darken-1");
	  return false;
	}
	else if(tipo_usuario != 2 && tipo_usuario != 3){
	  Materialize.toast("El tipo de usuario introducido no es correcto", 3000, "light-green darken-1");
	  return false;
	}
	else{
	  return true;
	}

	
}


function validateIncrement(){
	var increment;

	increment = document.forms["form_increment"]["quantity"].value;
	
	if (increment == "") {
	  return false;
	}

	return true;
}


function validateSuggestion(){
	var txt;
	txt = document.forms["form_suggestion"]["suggestion"].value;

	if(txt == "") {
		return false;
	}

	return true;
}