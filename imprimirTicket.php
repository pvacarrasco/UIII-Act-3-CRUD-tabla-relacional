<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$setenciaproductos = $base_de_datos->prepare("SELECT  v.marca, v.costo, v.aumento, vv.id_producto, vv.cantidad, p.id, p.nombre, p.telefono, p.ciudad, p.cp
FROM productos v
INNER JOIN 
productos_vendidos vv
ON v.id = vv.id_producto
INNER JOIN 
proveedores p
ON v.id = p.id_Producto
WHERE vv.id_venta = ?");
$setenciaproductos->execute([$id]);
$productos = $setenciaproductos->fetchAll();
if (!$productos) {
    exit("No hay productos");
}

?>
<style>
    * {
        font-size: 20px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        padding-top: 10px;
        padding-bottom: 10px;
        border-collapse: collapse;
    }

    td.id{
        width: 15px;
        max-width: 15px;
    }

    td.producto,
    th.producto {
        width: 80px;
        max-width: 80px;
    }

    td.cantidad,
    th.cantidad {
        padding-left: 45px;
        width: 150px;
        max-width: 150px;
        word-break: break-all;
    }

    td.costo,
    th.costo {
        width: 135px;
        max-width: 135px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 700px;
        max-width: 700px;
    }

    img {
        border-radius: 50%;
        max-width: 100px;
        width: 100px;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h1 style="color: lightgray;">OP</h1>
        <h1>Opticas.</h1>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="id">ID</th>
                    <th class="cantidad">MARCA</th>
                    <th class="cantidad">AUMENTO</th>
                    <th class="costo">COSTO</th>
                    <th class="costo">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($productos as $producto) {
                    $subtotal = $producto->costo * $producto->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="producto"><?php echo $producto->id_producto;  ?></td>
                        <td class="cantidad"><?php echo $producto->marca;  ?> </td>
                        <td class="cantidad">  <?php echo $producto->aumento;  ?></td>
                        <td class="costo"><strong>$<?php echo number_format($producto->costo, 2) ?></strong></td>
                        <td class="costo">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                    <tr>
                    <th class="id">ID</th>
                    <th class="cantidad">NOMBRE</th>
                    <th class="cantidad">TELEFONO</th>
                    <th class="costo">CIUDAD</th>
                    <th class="cantidad">CÓDIGO POSTAL</th>
                </tr>
                <?php } ?>
                <?php
                foreach ($productos as $producto) {
                ?>
                    <tr>
                        <td class="id"><?php echo $producto->id;  ?></td>
                        <td class="cantidad"><?php echo $producto->nombre;  ?> </td>
                        <td class="cantidad">  <?php echo $producto->telefono;  ?></td>
                        <td class="costo">  <?php echo $producto->ciudad;  ?></td>
                        <td class="cantidad">  <?php echo $producto->cp;  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="costo">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>