<?php

// if(is_array($_GET)){
// 	foreach ($_GET as $_GET_nombre=>$_GET_contenido){
// 		$_GET[$_GET_nombre]= seguridad_x($_GET_contenido);
// 	}
// }

// if(is_array($_POST)){
// 	foreach ($_POST as $_POST_nombre=>$_POST_contenido){
// 		$_GET[$_POST_nombre]= seguridad_x($_POST_contenido);
// 	}
// }

// function seguridad_x($texto){
// 	$texto = stripslashes($texto);
// 	$texto = addslashes($texto);
// 	$texto = ereg_replace(';','',$texto);
// 	$texto = ereg_replace('<','',$texto);
// 	$texto = ereg_replace('>','',$texto);
// 	$texto = ereg_replace('/','',$texto);
// 	$texto = ereg_replace(':','',$texto);
// 	return $texto;
// }

// $ejem = "<script>alert('holamundo');</script>";
// $ejem = seguridad_x($ejem);
// echo $ejem;

/* This will not work as expected. */
// $num = 4;
// $string = "This string has four words.";
// $string = ereg_replace('four', $num, $string);
// echo $string;   /* Output: 'This string has   words.' */

/* This will work. */
$num = '';
$string = "<script>alert('ejemplo');</script>";
$string = ereg_replace('<','', $string);
$string = ereg_replace(';','',$string);
$string = ereg_replace('<','',$string);
$string = ereg_replace('>','',$string);
$string = ereg_replace('/','',$string);
$string = ereg_replace(':','',$string);
$string = ereg_replace('jemp','',$string);
echo $string; 
?>