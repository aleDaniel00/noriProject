
<?php
	require_once '../config.php';
	__autoload('Producto');
	__autoload('DBConnection');

$id = $_GET['ID_PRODUCTOS']	;
$nuevaProd = Producto::borrar($id);

header('Location:panelProd.php');