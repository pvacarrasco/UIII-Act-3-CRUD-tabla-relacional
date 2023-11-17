<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">

	<label for="marca">Marca:</label>
			<input class="form-control" name="marca" required type="text" id="marca" placeholder="Código de título">

			<label for="color">Color:</label>
			<input class="form-control" name="color" required type="text" id="color" placeholder="Escribe el color">

			<label for="tipo_armazon">Tipo de armazon:</label>
			<input class="form-control" name="tipo_armazon" required type="text" id="tipo_armazon" placeholder="Escribe el tipo de armazon">

			<label for="diseno">Diseño:</label>
			<input class="form-control" name="diseno" required type="text" id="diseno" placeholder="Escribe el diseño">

			<label for="aumento">Aumento:</label>
			<input class="form-control" name="aumento" required type="text" id="aumento" placeholder="Escribe el aumento">

			<label for="costo">Costo:</label>
			<input class="form-control" name="costo" required type="text" id="costo" placeholder="Costo">

			<label for="disponible">Disponible:</label>
			<input class="form-control" name="disponible" required type="text" id="disponible" placeholder="Disponible">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>