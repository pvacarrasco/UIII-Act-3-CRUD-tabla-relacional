<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo proveedor</h1>
	<form method="post" action="guardar.php">

			<label for="id_Producto">ID del producto:</label>
			<input class="form-control" name="id_Producto" required type="text" id="id_Producto" placeholder="Escribe el ID del producto">

			<label for="nombre">Nombre del proveedor:</label>
			<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Nombre">

			<label for="correo">Correo:</label>
			<input class="form-control" name="correo" required type="text" id="correo" placeholder="Correo">

			<label for="usuario">Usuario:</label>
			<input class="form-control" name="usuario" required type="text" id="usuario" placeholder="Usuario">

			<label for="telefono">telefono:</label>
			<input class="form-control" name="telefono" required type="text" id="telefono" placeholder="Escribe el telefono">

			<label for="domicilio">Domicilio:</label>
			<input class="form-control" name="domicilio" required type="text" id="domicilio" placeholder="Escribe el domicilio">

			<label for="cp">Código posta;:</label>
			<input class="form-control" name="cp" required type="text" id="cp" placeholder="Escribe el código postal">

			<label for="ciudad">Ciudad:</label>
			<input class="form-control" name="ciudad" required type="text" id="ciudad" placeholder="Escribe la ciudad">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>