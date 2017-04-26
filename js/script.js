function validatelogin(){

	var usuario, pass;

	usuario = document.forms["myForm"]["user"].value;
	pass = document.forms["myForm"]["pass"].value;

	/* Si alguno de los campos esta vacio no se admite inicio de sesion,
	 * se devuelve false.
	 */
	if (usuario == "" || pass == "") {

	  Materialize.toast("Se deben rellenar todos los campos", 4000, 'rounded');
	  return false;
	}

	return true;

}