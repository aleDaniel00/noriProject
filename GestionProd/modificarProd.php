<?php
	require_once '../config.php';
	__autoload('Producto');
	
?>
<!doctype html>
<html>
<head>
	<title>Parametros de la pelicula: </title>
		<link rel="stylesheet" href="../css/css.css" />
</head>
<body>
<div id="menu">
<body>
	<ul>
		<li id="encabezado"><h1><a href="../panelDPaneles.php">Panel ABM</a></h1></li>
		<li class="titulo"><a href="../panelDPaneles.php"> Menu principal > </a> <a href="panelProd.php"> Administrar Productos > </a> <strong> modificar > </strong></li>
		<li class="titulo"><h2>Vamos a modificar los Parametros del Producto: </h2></li>
		<li id="form_load" class="form_modif">
			<?php 	
			$id = $_GET['ID_PRODUCTOS']	;
			$nuevoProd = Producto::cargarDeArrayModif($id);
					
			foreach($nuevoProd as $fila) { 
				?>
						
				<h2><?php echo $fila["NOMBRE"]?></h2>
						
				<form class="formModif" action="modificarProd_2.php" method="post">
					
					<div>
						<p>Nombre Producto </p>
						<input type="text" name="NOMBRE" value="<?php echo $fila["NOMBRE"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_PRODUCTOS" value="<?php echo $fila["ID_PRODUCTOS"];?>">
					</div>
					<div>
						<p>Categoria Producto </p>
						<input type="text" name="CATEGORIA" value="<?php echo $fila["CATEGORIA"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_PRODUCTOS" value="<?php echo $fila["ID_PRODUCTOS"];?>">
					</div>
					
					<div>
						<p>Marca Producto </p>
						<input type="text" name="MARCA" value="<?php echo $fila["MARCA"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_PRODUCTOS" value="<?php echo $fila["ID_PRODUCTOS"];?>">
					</div>
					
					
					<div>
						<p>Precio:</p>
						<input type="number" step="any" name="PRECIO"   min="10" step="500" value="<?php echo $fila["PRECIO"];?>">
					</div>
					<div>
						<input type="hidden" name="ID_PRODUCTOS" value="<?php echo $fila["ID_PRODUCTOS"];?>">
					</div>
					
					<div>
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