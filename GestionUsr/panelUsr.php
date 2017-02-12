<?php
require_once '../config.php';
__autoload('Usuario');
__autoload('DBConnection');
?>
<!doctype html>
<html>
<head>
	<title>Panel Usuarios</title>
	<link rel="stylesheet" href="../css/css.css" />
</head>
<body>
	<ul>
		<li id="encabezado"><h1><a href="../panelDPaneles.php">Panel de paneles ABM</a></h1></li>
		<li class="titulo"><a href="../panelDPaneles.php"> Menu principal > </a> <strong> Administrar Usuarios > </strong> </li>
		
		<li class="tituloDos"><h2>Lista de Usuarios</h2></li>
		<li id="list_table">
			<table border="1">
				<thead>
					<tr>
					  <th>Usuario</th>
					  <th>Modificar</th>
					  <th>Borrar</th>
					</tr>
				</thead>
				<?php
					$usrs = Usuario::getAll();
					foreach($usrs as $fila) {
						?>
						<tr>
							<td>
								
								<?php echo $fila["NOMBRE"]; ?>
							</td>
							<td>
								<a class='botonModificar' title='Modificar' href="modificarUsr.php?ID_USUARIO=<?php echo $fila["ID_USUARIO"];?>">
								modificar	
								</a>
							</td>
							<td>
								<a class='botonBorrar' title='Borrar' href="borrarUsr.php?ID_USUARIO=<?php echo $fila["ID_USUARIO"];?>">
									BORRAR
								</a>
							</td>
						</tr>
						<?php
					} 
						?> 
			</table>
		</li>
		<?php
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				$pel = new Usuario();
				//$pel->cargarDatosDeForm();
				$pel->cargarDeArray($_POST);
				//if($pel->validate()) {
				if($pel->grabar()) {
					echo "Usuario grabado! :D";
				}
				//}
			}
		?>
		<li class="tituloDos" ><h2>Dar alta a Usuario</h2></li>
		<li id="form_load">
			<form action="agregarUsr.php" method="post">
				
				
				<div>
					<label for="usuario">Escribe el nombre de usuario: </label>
					<input id="usuario" type="text" name="NOMBRE" placeholder="Campo Obligatorio">
				</div>
				
				<div>
					<label for="password">Escribe el password: </label>
					<input id="password" type="password" name="PASSWORD" placeholder="Campo Obligatorio">
				</div>
				
				
				<div class="add_usr">
					<input type="submit" value="Agregar Usuario">
				</div>
			</form>
		</li>
	
	</ul>
</body>
</html>