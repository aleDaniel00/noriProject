	<?php
	require_once 'config.php';
	__autoload('DBConnection');
	
	?>
<!doctype html>
<html>
<head>
	<title>PARCIAL 1 ALEX PEREZ</title>
	<link rel="stylesheet" href="css/css.css" />
</head>
<body>
	
	<?php
	if( empty($_SESSION)){
		echo '<h1 >No has iniciado sesion!</h1>'; 
	}
	if( ! isset($_SESSION['ID_USUARIO']) ){
	?>		
		<div id="miVentana" >
			<div id="login">
				<div class="encabezadoLogin">
					<ul>
						<li >
							<p>Logueate</p>
						</li>
					</ul>
				</div>
				
				<div  id="contenidoSinLogin">
					<form id="formLogin" method="post" action="login.php">
						<?php
						if( isset($_SESSION['error'])){
						echo '<div style="color: red">'.$_SESSION['error'].'</div>';
						unset( $_SESSION['error'] );
						}
						?>
						<div>
							<input type="text" name="NOMBRE" placeholder="NOMBRE">
						</div>
						<div>
							<input type="password" name="PASSWORD" placeholder="PASSWORD">
						</div>
						 <div>
							<input type="submit" value="Entrar">
							<!--<a id="botonRegistrarme" href="index.php?seccion=registro">Registrarme</a> -->
						</div>
					</form>
				</div>
				<?php
	}else{ //tenes session[id] o sea que estas logueado
				?>
				<div  id="contenidoLogin">
					<h2>Logueado como:</h2>
					<?php
					echo "<p>Nombre usuario: ".strtoupper($_SESSION['NOMBRE'])."</p>";
					
					
					?>
					<div>
						<a href="logout.php">SALIR</a>
					</div>
				</div>
					
			</div>
		</div>
		<ul>
			<li id="encabezado"><h1><a href="#">Panel de paneles ABM</a></h1></li>
			<li class="menuabm"><a href="GestionUsr/panelUsr.php">Administrar Usuarios</a></li>
			<li class="menuabm"><a href="GestionProd/panelProd.php">Administrar Productos</a></li>
		</ul>
		
		<ul>
			<li>Presentado por: <a href="http://www.danielperezdw.com.ar"> Daniel Perez</a></li>
			<li>Materia: Programacion 3 (PHP)</li>
			<li>Docente: Santiago Gallino</li>
		</ul>
		<?php
	}
	?>
	
	
	
</body>
</html>