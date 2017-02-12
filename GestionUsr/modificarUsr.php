<?php 
	require_once '../config.php';
__autoload('Usuario');

?>
<!doctype html>
<html>
<head>
	<title>Parametros de Usuario: </title>
		<link rel="stylesheet" href="../css/css.css" />
</head>
<body>
<div id="menu">
<body>
	<ul>
		<li id="encabezado"><h1><a href="panel.php">Panel ABM</a></h1></li>
		<li class="titulo"><a href="../panelDPaneles.php"> Menu principal > </a> <a href="panelUsr.php"> Administrar Usuarios > </a> <strong> modificar > </strong></li>
		<li class="titulo"><h2>Vamos a modificar los Parametros de usuario: </h2></li>
		
		
		<li id="form_load" class="form_modif">
		<?php 
	
			$id = $_GET['ID_USUARIO'];
			$nuevoUsr = Usuario::cargarDeArrayModif($id);
					
			foreach($nuevoUsr as $fila) { 
				?>
				<h2><?php echo $fila["NOMBRE"]?></h2>
								
				<form class="formModif" action="modificarUsr_2.php" method="post">
		
					<div>
						<p>Nombre:</p>
						<input type="text" name="NOMBRE" value="<?php echo $fila["NOMBRE"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_USUARIO" value="<?php echo $fila["ID_USUARIO"];?>">
					</div>
					
					<div>
						<p>Password:</p>
						<input type="text" name="PASSWORD" value="<?php echo $fila["PASSWORD"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_USUARIO" value="<?php echo $fila["ID_USUARIO"];?>">
					</div>
					
					<div >
						<input type="submit" value="MODIFICAR">
					</div>
				<form>
				<?php 
			} 
			?>
		</li>

	</ul>
</div>

</body>
</html>