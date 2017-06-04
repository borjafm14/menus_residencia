function validatelogin(){

	var usuario, pass;

	usuario = document.forms["myForm"]["user"].value;
	pass = document.forms["myForm"]["pass"].value;
	
	if (usuario == "" || pass == "") {

	  Materialize.toast("Se deben rellenar todos los campos", 3000, "light-green darken-1");
	  return false;
	}

	return true;

}


