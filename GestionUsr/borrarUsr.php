
<?php
require_once '../config.php';
__autoload('Usuario');
__autoload('DBConnection');


$id = $_GET['ID_USUARIO']	;
$nuevaPel = Usuario::borrar($id);

header('Location:panelUsr.php');