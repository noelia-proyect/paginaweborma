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

    <?php
    //VARIABLES PARA REPORTES
    $titulo = "reportes";
    $cabecera = array("No.","Cliente", "Movimiento","Comprobante");
    $dataOrg  = array();

    //OBTENER DATOS DE BD
    $SQL = "SELECT DISTINCT Razon_Social, tipo_movimiento, Tipo_comprobante 
            FROM movimientos 
            WHERE Tipo_Movimiento='Venta' LIMIT 15";
    $result = $cnx->query($SQL) or die(msj("[ERROR SQL]", "Revisar la consulta a BD"));
    $numero_columnas =  $result->field_count;   //Numero de columnas
    $numero_filas = $result->num_rows;          //Numero de filas
    //echo "COLUMNAS: $numero_columnas , FILAS: $numero_filas";
    
    //ORGANIZANDO DATOS
    $i=0;
    while ($fila = $result->fetch_assoc()) {                    //fetch_assoc Nombre de campo
        $c1 = ++$i;                         //Numero orden
        $c2 = $fila["Razon_Social"];        //Cliente
        $c3 = $fila["tipo_movimiento"];     //Cliente
        $c4 = $fila["Tipo_comprobante"];    //Cliente

        $dataOrg[] = array($c1,$c2,$c3,$c4);
    }
    //var_dump($dataOrg);

    //LLAMADA A LA FUNCIÓN
    //fnH($titulo, $cabecera, $dataOrg);

    $result->free();            //Liberar memoria
    $cnx->close();              //Desconectar BD

    ?>

<table border="1" width="100%">
        <tr>
            <td colspan="2" >
                <?php
                    fnH($titulo, $cabecera, $dataOrg);
                ?>
            </td>
        </tr>

        <tr>
            <td class="pieForm">Reporte PDF</td>
            <td class="pieForm">Reporte XLS</td>
        </tr>
    </table>

</body>
</html>