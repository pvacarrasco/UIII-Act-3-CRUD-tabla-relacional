<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
			
			<label for="marca">Marca:</label>
			<input value="<?php echo $producto->marca ?>" class="form-control" name="marca" required type="text" id="marca" placeholder="Código de título">

			<label for="color">Color:</label>
			<input value="<?php echo $producto->color ?>" class="form-control" name="color" required type="text" id="color" placeholder="Escribe el color">

			<label for="tipo_armazon">Tipo de armazon:</label>
			<input value="<?php echo $producto->tipo_armazon ?>" class="form-control" name="tipo_armazon" required type="text" id="tipo_armazon" placeholder="Escribe el tipo de armazon">

			<label for="diseno">Diseño:</label>
			<input value="<?php echo $producto->diseno ?>" class="form-control" name="diseno" required type="text" id="diseno" placeholder="Escribe el diseño">

			<label for="aumento">Aumento:</label>
			<input value="<?php echo $producto->aumento ?>" class="form-control" name="aumento" required type="text" id="aumento" placeholder="Escribe el aumento">

			<label for="costo">Costo:</label>
			<input value="<?php echo $producto->costo ?>" class="form-control" name="costo" required type="text" id="costo" placeholder="Costo">

			<label for="disponible">Disponible:</label>
			<input value="<?php echo $producto->disponible ?>" class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
