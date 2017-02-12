<?php
	require_once '../config.php';
	__autoload('Producto');
	__autoload('DBConnection');
?>
<!doctype html>
<html>
<head>
	<title>Panel Producto</title>
	<link rel="stylesheet" href="../css/css.css" />
</head>
<body>
	<ul>
		<li id="encabezado"><h1><a href="../panelDPaneles.php">Panel de paneles ABM</a></h1></li>
		<li class="titulo"><a href="../panelDPaneles.php"> Menu principal > </a> <strong> Administrar Producto > </strong> </li>
		
		<li class="tituloDos"><h2>Lista de Producto ></h2></li>
		<li id="list_table">
			<table border="1">
				<thead>               
					<tr>
					  <th>Producto</th>
					  <th>Modificar</th>
					  <th>Borrar</th>
					</tr>
				</thead>
				<?php
					$prod = Producto::getAll();
					foreach($prod as $fila) {
				
						?>
							<tr>
								<td>
									<?php echo $fila["NOMBRE"];?>
								</td>
								<td>
									<a class='botonModificar' title='Modificar' href="modificarProd.php?ID_PRODUCTOS=<?php echo $fila["ID_PRODUCTOS"];?>">
									modificar	
									</a>
								</td>
							 	<td >
									<a class='botonBorrar' title='Borrar' href="borrarProd.php?ID_PRODUCTOS=<?php echo $fila["ID_PRODUCTOS"];?>">
										BORRAR
									</a>
								</td> 
							</tr>
						<?php
					} 
				?> 
			</table>
		</li>
	

		<li class="tituloDos"><h2>Dar alta a Producto ></h2></li>
		<li id="form_load">
			<form action="altaProd.php" method="post">
				
				<div>
					<label for="nombreProd">Escribe el nombre del nuevo producto: </label>
					<input id="nombreProd" type="text" name="NOMBRE" placeholder="Campo Obligatorio">
				</div>
				<div>
					<label for="categoria">Escribe la categoria: </label>
					<input id="categoria" type="text" name="CATEGORIA" placeholder="Campo Obligatorio">
				</div>
				<div>
					<label for="marca">Escribe la marca: </label>
					<input id="marca" type="text" name="MARCA" placeholder="Campo Obligatorio">
				</div>
				<div>
					<label for="precio">Que precio tiene a la venta la unidad? : Pesos
					<input id="precio" name="PRECIO" type="number" value="10" min="10" max="500" /> </label>
				</div>
				
				<div>
					<input type="submit" value="Agregar">
				</div>
			</form>
		</li>
	
	</ul>
</body>
</html>