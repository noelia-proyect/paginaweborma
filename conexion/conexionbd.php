<?php
    //Paso 1. Conexion BD
    $cnx = @mysqli_connect('localhost','id18817556_noelia','W(o!#hqiM>\r(!6r','id18817556_bdferreteria')
    or
        //echo "Error de conexion ".mysqli_connect_error();
        die(msj("[ERROR EN CONEXIÓN]", "Revisar los valores del parametro de conexión"));
    

    function msj($titulo, $descripcion){
        echo("
        
            <div style='background:orange; width:300px; margin: 0 auto;
            height:250px; '>

                <p> <h2> $titulo </h2> </p>

                <p> <img src='../img/icons/Alert.ico' > </p>

                <p> <h4> $descripcion </h4> </p>
            </div>
        
        ");
    }
?>