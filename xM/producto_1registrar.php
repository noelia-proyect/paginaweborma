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
			$insertSQL = sprintf("INSERT INTO operadores (codoper, nombre, login, clave, permisos, estado, tipo) VALUES (%s, %s, %s, %s, %s, %s, %s)",
								   GetSQLValueString($_POST['codoper'], "int"),
								   GetSQLValueString($_POST['nombre'], "text"),
								   GetSQLValueString($_POST['login'], "text"),
								   GetSQLValueString($_POST['clave'], "text"),
								   GetSQLValueString($_POST['permisos'], "text"),
								   GetSQLValueString($_POST['estado'], "text"),								   								
								   GetSQLValueString($_POST['tipo'], "text"));
			
			//$Result1 = $cnx->query($insertSQL) or die("Error en SQL");
		}
		echo $insertSQL; die("Impprimiendo SQL");  
		
		//Revisar salto
		$insertGoTo = "../sistema.php?ope=1&cnt=".$_POST['codoper'];

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
<div style="border:1px solid red; margin: 0 auto;">
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return validaFormOpe();">
<center>
	<table>

		<tr>
			<th colspan="2" class="titulo">Registrar nuevo operador</th>
		</tr>
  
		<tr>
			<td class="tdIzq" >Último Código operador</td>

			<td class="tdDer">
				<input type='text' id="codoper" name="codoper" size='15' maxlength='8' value="">
				<a> <?php  ?> </a> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">Nombres</td>
      		<td class="tdDer">
      			<input type="text" id="nombre" name="nombre" value="" size="32" /> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">Usuario</td>
      		<td class="tdDer">
      			<input type="text" id="login" name="login" value="" size="32" /> 
			</td>
		</tr>

		<tr>
      		<td class="tdIzq">Contraseña</td>
      		<td class="tdDer">
      			<input type="text" id="clave" name="clave" value="" size="32" /> 
			</td>
		</tr>

		<tr>
			<td class="tdIzq">permisos:</td>
			<td class="tdDer">        
				<select name="permisos" id="permisos">
					<option value=""  <?php if (!(strcmp('', ""))) {echo "SELECTED";} ?>>Seleccione...</option>
					<option value="C" <?php if (!(strcmp("C", ""))) {echo "SELECTED";} ?>>Opcion1</option>
					<option value="R" <?php if (!(strcmp("R", ""))) {echo "SELECTED";} ?>>Opcion2</option>
				</select>
			</td>
		</tr>

		<tr>
			<td class="tdIzq">Estado:</td>
			<td class="tdDer">        
				<select name="estado" id="estado">
					<option value=""    <?php if (!(strcmp('', ""))) {echo "SELECTED";} ?>>Seleccione...</option>
					<option value="A" <?php if (!(strcmp("A", ""))) {echo "SELECTED";} ?>>Habilitado</option>
					<option value="I" <?php if (!(strcmp("I", ""))) {echo "SELECTED";} ?>>Inhabilitado</option>
				</select>
			</td>
		</tr>

		<tr>
			<td class="tdIzq">Tipo:</td>
			<td class="tdDer">        
				<select name="tipo" id="tipo">
					<option value=""    <?php if (!(strcmp('', ""))) {echo "SELECTED";} ?>>Seleccione...</option>
					<option value="A" <?php if (!(strcmp("A", ""))) {echo "SELECTED";} ?>>Administrador</option>
					<option value="O" <?php if (!(strcmp("O", ""))) {echo "SELECTED";} ?>>Operador</option>
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