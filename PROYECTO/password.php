<?php include("comunes/header.php"); ?>
</head>
<body>
<?php
$claveactual = $clave = $confirmaClave = "";

require_once "dbconfig.php";
;function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $claveactual = test_input($_POST["claveactual"]);
   $clave = test_input($_POST["clave"]);
   $confirmaClave = test_input($_POST["confirmaClave"]);
}
if (isset($_SESSION["usuario"]))
{
	$usuario = $_SESSION["usuario"];
	$cedula = $_SESSION["cedula"];
}
try 
{
	$conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
	$sql = "CALL Consulta_Login(:usuario)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$r = $stmt->fetch();
	$antclave = $r['clave'];
} catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
}
$error_clave = "";	
	
function validar_clave($clave, &$error_clave, $confirmaClave, $antclave, $claveactual){
if($antclave <> $claveactual){
$error_clave = "Las clave actual es incorrecta.";
return false;
}
if(strlen($clave) < 6){
$error_clave = "La clave debe tener al menos 6 caracteres.";
return false;
}
if(!preg_match('`[0-9]`',$clave)){
$error_clave = "La clave debe tener al menos un caracter numérico.";
return false;
}
if ($clave <> $confirmaClave){
$error_clave = "Las claves no coinciden";
return false;
}
$error_clave = "";
return true;
} 

if ($_POST){
   $error_encontrado="";
   if (validar_clave($clave, $error_encontrado, $confirmaClave, $antclave, $claveactual))
	{
		try {		
			$sql = "call Modifica_Claves_Usuario(:cedula,:clave)";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(":cedula", $cedula, PDO::PARAM_STR);
			$stmt->bindParam(":clave", $clave, PDO::PARAM_STR); 
			$stmt->execute();
		header("location:principal.php");
		}
		catch (PDOException $pe) {
			die("Ocurrio un error:" . $pe->getMessage());
		}
    }else{
      $msj_error = "Contraseña invalida: " . $error_encontrado;
    }
}
?>
<div id="main_container">
<div id="header">
<div id="logo">
	<h1>Sistema Control de Cambios</h1>
</div>

<div class="banner">
</div>    

<div class="menu">
		<?php include("comunes/menu.php"); ?>
</div>
</div>

<div id="ContPrincipal"> 
<div id="admin_cabezera">
<div class="admin_titulo">
<?php
echo "Bienvenido ".$usuario;
?>
</div>       
<!--<div class="botones_derecha">
	<div class="boton_derecha"><a href="#">Nuevo</a></div>
	<div class="boton_derecha"><a href="#">Menú Principal</a></div>
</div>-->
</div>
<div id="admin_cabezera_border"></div>
    <div id="cambio_contrasena">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
			<div class="box_title"> Cambio de Contraseña </div>
			<div class="form">
			<div class="form_col"><label class="leftContrasena">Contraseña actual:</label><input type="password" name="claveactual"/><br></div>
			<div class="form_col"><label class="leftContrasena">Nueva contraseña:</label><input type="password" name="clave"/><br></div>
			<div class="form_col"><label class="leftContrasena">Confirmar contraseña:</label><input type="password" name="confirmaClave"/><br></div>
			<div style="float:right; padding:10px 0 0 0;"><input type="submit" value="Aceptar"/></div>
			</div>
		</form>
	</div>
<div>
<?php
if (isset($error_encontrado)) {
echo '<div class="admin_footer_help" style="color:#FF0000; width:192px;  visibility: visible; margin-left:2px;">';
echo $msj_error;
echo '</div>';
}
?>
</div>
<div class="admin_footer_help">
<!--Falto el nombre de usuario-->
</div>  

</div>
</div>
</body>
</html>