<?php 
require_once '../config.php';
	__autoload('Producto');
	

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$prod = new Producto();
	//$pel->cargarDatosDeForm();
	$prod->cargarDeArray($_POST);
	//if($pel->validate()) {
	if($prod->actualizar()) {
		header("Location:modificarProd.php?ID_PRODUCTOS=$ID_PRODUCTOS");
	}
	//}
}