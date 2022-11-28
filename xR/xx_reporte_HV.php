<?php
function fnH($title, $head, $data){

    echo("<table border='1' width='100%' ");
        //////////////// TITULO //////////////////////////
        echo("<tr>");
            echo("<th colspan='".count($head)."' class='titulo'> $title </th>");
        echo("</tr>");

        //////////////// CABECERA ////////////////////////
        echo("<tr>");
            for ($i=0; $i < count($head); $i++) { 
                echo("<td class='subTitulo'>".$head[$i]."</td>");
            }
        echo("</tr>");

        //////////////// CUERPO ////////////////////////
        for ($f=0; $f < count($data); $f++) {       //f: Filas
            $colorFila = funcionColorFila($f);
        echo("<tr>");
            for ($c=0; $c < count($head); $c++) {   //c: Columnas
                echo("<td class='$colorFila'>".$data[$f][$c]."</td>");
            }
        echo("</tr>");
        }
    echo("</table>");
}

function fnV($title, $head, $data){
    for ($f=0; $f < count($data); $f++) {            //f: Filas
        echo("<table border='1'>");
            echo("<tr>");
                echo("<td colspan='2'> $title </td>");
            echo("</tr>");
            for ($c=0; $c < count($head); $c++) {    //c: Columnas
                echo("<tr>");
                    echo("<td>".$head[$c]."</td>");
                    echo("<td width='120'>".$data[$f][$c]."</td>");
                echo("</tr>");
            }
        echo("</table> <br>");
    }
}

function funcionColorFila($fila){
    if($fila%2){
        return "par";
    }else{
        return "impar";
    }
}
?>