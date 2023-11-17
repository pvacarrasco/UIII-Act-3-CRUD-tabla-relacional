<?php
#Salir si alguno de los datos no está presente
if( !isset($_POST["id"]) ||
	!isset($_POST["marca"]) || 
	!isset($_POST["color"]) || 
	!isset($_POST["tipo_armazon"]) || 
	!isset($_POST["diseno"]) || 
	!isset($_POST["aumento"]) ||
	!isset($_POST["costo"]) ||
	!isset($_POST["disponible"]))


#Si todo va bien, se ejecuta esta parte del código...

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
}
$id = $_POST["id"];
$marca = $_POST["marca"];
$color = $_POST["color"];
$tipo_armazon = $_POST["tipo_armazon"];
$diseno = $_POST["diseno"];
$aumento = $_POST["aumento"];
$costo = $_POST["costo"];
$disponible = $_POST["disponible"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET marca = ?, color = ?, tipo_armazon = ?, diseno = ?, aumento = ?, costo = ?, disponible = ? WHERE id = ?;");
$resultado = $sentencia->execute([$marca, $color, $tipo_armazon, $diseno, $aumento, $costo, $disponible, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del vuelo";
?>