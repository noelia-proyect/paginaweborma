<?php require_once('../conexion/conexionbd.php'); ?>
<?php date_default_timezone_set('America/Lima'); ?>
<?php
$hoy=date("Y-m-d H:i:s");

//$cd=$_SESSION["codOp"];		//=> string(6) "AD0001" 
//$na=$_SESSION["napOp"];

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  //$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];

//	var_dump($editFormAction);  die("hh");			//string(31) "/proyecto/xM/operador_1registrar.php" hh
if (isset($_SERVER['QUERY_STRING'])) {
	//$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		

		////////////////////////////////////////////////////////////////////////////////////////////////
		///////////////////////////////////// OPERADORES ///////////////////////////////////////////////	
		////////////////////////////////////////////////////////////////////////////////////////////////
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
			$insertSQL = sprintf("INSERT INTO relacion_nominal001 (numero, grado, nombre, fechanac, dni, orinscripcion, lugar, uuasignada, guasignada, fechacaptacion, car, sexo, gradoinstrucion, nombreear, numseriecim, omisoinscripcion) VALUES (%s, %s, %s, %s, %s, %s, %s,%s, %s, %s, %s, %s, %s, %s, %s, %s)",
								   GetSQLValueString($_POST['numero'], "int"),
								   GetSQLValueString($_POST['grado'], "text"),
								   GetSQLValueString($_POST['nombre'], "text"),
								   GetSQLValueString($_POST['fechanac'], "text"),
								   GetSQLValueString($_POST['dni'], "int"),
								   GetSQLValueString($_POST['orinscripcion'], "text"),								   								
								   GetSQLValueString($_POST['lugar'], "text"),
								   GetSQLValueString($_POST['uuasignada'], "text"),
								   GetSQLValueString($_POST['guasignada'], "text"),
								   GetSQLValueString($_POST['fechacaptacion'], "text"),
								   GetSQLValueString($_POST['car'], "text"),
								   GetSQLValueString($_POST['sexo'], "int"),
								   GetSQLValueString($_POST['gradoinstrucion'], "text"),
								   GetSQLValueString($_POST['nombreear'], "text"),
								   GetSQLValueString($_POST['numseriecim'], "text"),
								   GetSQLValueString($_POST['omisoinscripcion'], "text"));
			
			$Result1 = $cnx->query($insertSQL) or die(msj("HOLA","COMO ESTAS"));
		}
		
		//echo($insertSQL); die("hola");
		//Revisar salto
		$insertGoTo = "../sistema.php?ope=1&cnt=".$_POST['numero'];

		//$insertGoTo = "../_sistema.php";
		if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		}
		header(sprintf("Location: %s", $insertGoTo));
	}

}else{
	die("No se guardo... Revice...$editFormAction");
}

?>

<!---------------------------------------------------------------------------------------------------//-->
<!------------------------------------------- OPERADORES --------------------------------------------//-->
<!---------------------------------------------------------------------------------------------------//-->
<div style="border:1px solid #00bba2; margin: 0 auto;">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return validaFormOpe();">
<center>
	<table>

		<tr>
			<th colspan="2" class="titulo">Registrar reemplazo</th>
		</tr>
  
		<tr>
			<td class="tdIzq" >Orden</td>

			<td class="tdDer">
				<input type='int' id="numero" name="numero" size='15' maxlength='8' value="">
				<a> <?php  ?> </a> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">Grado</td>
      		<td class="tdDer">
      			<input type="text" id="grado" name="grado" value="" size="32"/> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">Nombre</td>
      		<td class="tdDer">
      			<input type="text" id="nombre" name="nombre" value="" size="32"/> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">fechanac</td>
      		<td class="tdDer">
      			<input type="text" id="fechanac" name="fechanac" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Dni</td>
      		<td class="tdDer">
      			<input type="int" id="dni" name="dni" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">OR Inscripción</td>
      		<td class="tdDer">
      			<input type="text" id="orinscripcion" name="orinscripcion" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Lugar</td>
      		<td class="tdDer">
      			<input type="text" id="lugar" name="lugar" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">UU Asignada</td>
      		<td class="tdDer">
      			<input type="text" id="uuasignada" name="uuasignada" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">GU Asignada</td>
      		<td class="tdDer">
      			<input type="text" id="guasignada" name="guasignada" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Fecha de Captación</td>
      		<td class="tdDer">
      			<input type="text" id="guasignada" name="guasignada" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">CAR</td>
      		<td class="tdDer">
      			<input type="text" id="car" name="car" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Sexo</td>
      		<td class="tdDer">
      			<input type="int" id="sexo" name="sexo" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Grado de instrucción</td>
      		<td class="tdDer">
      			<input type="text" id="gradoinstrucion" name="gradoinstrucion" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">Nombre de EAR</td>
      		<td class="tdDer">
      			<input type="text" id="nombreear" name="nombreear" value="" size="32"/> 
			</td>
		</tr>
		<tr>
      		<td class="tdIzq">N° de serie de formato cim</td>
      		<td class="tdDer">
      			<input type="text" id="nombreear" name="nombreear" value="" size="32"/> 
			</td>
		</tr>
		<tr>
			<td class="tdIzq">Omiso a la inscripcion</td>
			<td class="tdDer">        
				<select name="omisoinscripcion" id="omisoinscripcion">
					<option value=""  <?php if (!(strcmp('', ""))) {echo "SELECTED";} ?>>Seleccione...</option>
					<option value="S" <?php if (!(strcmp("Si", ""))) {echo "SELECTED";} ?>>SI</option>
					<option value="N" <?php if (!(strcmp("No", ""))) {echo "SELECTED";} ?>>NO</option>
				</select>
			</td>
		</tr>

		<tr>
			<th colspan="2" class="pieForm">
            <input type="hidden" id="estOpe" name="estOpe" value="1" />
            <input class="pieForm" type='submit' id='guardar' style="width:100%;"  
            	value='Insertar registro' />
			<input type="hidden" name="MM_insert" value="form1" />
			</th>
		</tr>
	</form>

</table>
</center>
</div>