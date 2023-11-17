<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM  proveedores;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>productos</h1>
		<div>
			<a class="btn btn-success" href="./formularioproveedor.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>ID producto</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Telefono</th>
					<th>Domicilio</th>
					<th>Código postal</th>
					<th>Ciudad</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->id_Producto ?></td>
					<td><?php echo $producto->nombre ?></td>
					<td><?php echo $producto->correo ?></td>
					<td><?php echo $producto->usuario ?></td>
					<td><?php echo $producto->telefono ?></td>
					<td><?php echo $producto->domicilio ?></td>
					<td><?php echo $producto->cp ?></td>
					<td><?php echo $producto->ciudad ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarproveedor.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarproveedor.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>