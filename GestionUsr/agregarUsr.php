
<?php
require_once '../config.php';
__autoload('Usuario');


if($_SERVER['REQUEST_METHOD'] == "POST") {
	$usr = new Usuario();
	//$usr->cargarDatosDeForm();
	$usr->cargarDeArray($_POST);
	//if($usr->validate()) {
	var_dump($usr);
	if($usr->grabar()) {
		echo "Usuario grabado! :D";
	}
	//}
}
