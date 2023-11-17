<?php
#Salir si alguno de los datos no está presente
if
(!isset($_POST["id_Producto"]) || 
!isset($_POST["nombre"]) || 
!isset($_POST["correo"]) || 
!isset($_POST["usuario"]) || 
!isset($_POST["telefono"]) || 
!isset($_POST["domicilio"]) ||
!isset($_POST["cp"]) ||
!isset($_POST["ciudad"]))

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
}$id_Producto = $_POST["id_Producto"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$telefono = $_POST["telefono"];
$domicilio = $_POST["domicilio"];
$cp = $_POST["cp"];
$ciudad = $_POST["ciudad"];

$sentencia = $base_de_datos->prepare("INSERT INTO `proveedores`(`id_Producto`, `nombre`, `correo`, `usuario`, `telefono`, `domicilio`, `cp`, `ciudad`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$id_Producto, $nombre, $correo, $usuario, $telefono, $domicilio, $cp, $ciudad]);

if($resultado === TRUE){
	header("Location: ./proveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>