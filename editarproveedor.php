<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "bd_opticas";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, "");
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
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
		<form method="post" action="guardarProveedores.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
			
			<label for="id_Producto">ID del producto:</label>
			<input class="form-control" value="<?php echo $producto->id_Producto; ?>" name="id_Producto" required type="text" id="id_Producto" placeholder="Escribe el ID del producto">

			<label for="nombre">Nombre del proveedor:</label>
			<input class="form-control" value="<?php echo $producto->nombre; ?>" name="nombre" required type="text" id="nombre" placeholder="Nombre">

			<label for="correo">Correo:</label>
			<input class="form-control" value="<?php echo $producto->correo; ?>" name="correo" required type="text" id="correo" placeholder="Correo">

			<label for="usuario">Usuario:</label>
			<input class="form-control" value="<?php echo $producto->usuario; ?>" name="usuario" required type="text" id="usuario" placeholder="Usuario">

			<label for="telefono">telefono:</label>
			<input class="form-control" value="<?php echo $producto->telefono; ?>" name="telefono" required type="text" id="telefono" placeholder="Escribe el telefono">

			<label for="domicilio">Domicilio:</label>
			<input class="form-control" value="<?php echo $producto->domicilio; ?>" name="domicilio" required type="text" id="domicilio" placeholder="Escribe el domicilio">

			<label for="cp">Código posta;:</label>
			<input class="form-control" value="<?php echo $producto->cp; ?>" name="cp" required type="text" id="cp" placeholder="Escribe el código postal">

			<label for="ciudad">Ciudad:</label>
			<input class="form-control" value="<?php echo $producto->ciudad; ?>" name="ciudad" required type="text" id="ciudad" placeholder="Escribe la ciudad">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./proveedores.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
