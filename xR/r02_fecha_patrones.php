<?php include("xx_reporte_HV.php"); ?>
<?php include("../conexion/conexionbd.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de aspecto Horizontal o vertical </h1>

    <?php
    //VARIABLES PARA REPORTES
    $titulo = "Lista de CLIENTES de la Ferreteria";
    $cabecera = array("No.","Descripcion", "Fecha","Cantidad","Precio","Movimiento");
    $dataOrg  = array();

    //OBTENER DATOS DE BD
    $SQL = "SELECT Descripcion_producto, fecha, Cantidad_Producto, Precio_Unitario, tipo_movimiento 
    FROM movimientos m, detalle_movimientos d, productos p 
    WHERE p.codigo_producto=d.codigo_producto 
        AND d.codigo_movimiento=m.codigo_movimiento 
        AND p.codigo_producto=9 
        AND tipo_movimiento='Venta' 
        AND fecha LIKE '2005-03%' 
    ORDER BY fecha";

    $result = $cnx->query($SQL) or die(msj("[ERROR SQL]", "Revisar la consulta a BD"));
    $numero_columnas =  $result->field_count;   //Numero de columnas
    $numero_filas = $result->num_rows;          //Numero de filas
    echo "COLUMNAS: $numero_columnas , FILAS: $numero_filas";
    
    //ORGANIZANDO DATOS
    $i=0;
    while ($fila = $result->fetch_array(MYSQLI_ASSOC)) {                    //fetch_assoc Nombre de campo
        $c1 = ++$i;                             //Numero orden
        $c2 = $fila["Descripcion_producto"];    //Descripcion_producto
        $c3 = $fila["fecha"];                   //fecha
        $c4 = $fila["Cantidad_Producto"];       //Cantidad_Producto
        $c5 = $fila["Precio_Unitario"];         //Precio_Unitario
        $c6 = $fila["tipo_movimiento"];         //tipo_movimiento

        $dataOrg[] = array($c1,$c2,$c3,$c4,$c5,$c6);
    }
    //var_dump($dataOrg);

    //LLAMADA A LA FUNCIÓN
    fnH($titulo, $cabecera, $dataOrg);

    $result->free();            //Liberar memoria
    $cnx->close();              //Desconectar BD

    ?>
</body>
</html>