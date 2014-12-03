<?php 



include("autenticacion/class/config.php");
	
		$CodigoProducto = 'mongo3';
		$NombreProducto = 'ejemplo3';
		$CantidadProducto = '15';
		$PrecioProducto = '5000';
		$DescripcionProducto = 'Prueba';
		 $imagen ='8081_2014-12-03.png';


$conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
// $fileContent = file_get_contents($_FILES['documento']['tmp_name']);
//   $documento = subirDocumento($_FILES['documento']);

echo $CodigoProducto .'<br>';
echo $NombreProducto.'<br>';
echo $CantidadProducto .'<br>';
echo $PrecioProducto .'<br>';
echo $DescripcionProducto .'<br>';
echo $documento .'<br>';
  //Iniciar transacción

// $conn->beginTransaction();

$sql = "call  Insertar_Producto(:proc_CodigoProducto,:proc_NombreProducto,:proc_CantidadProducto,:proc_PrecioProducto,:proc_DescripcionProducto,:proc_ImagenProducto)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":proc_CodigoProducto", $CodigoProducto, PDO::PARAM_STR);
$stmt->bindParam(":proc_NombreProducto", $NombreProducto, PDO::PARAM_STR);
$stmt->bindParam(":proc_CantidadProducto", $CantidadProducto, PDO::PARAM_INT);
$stmt->bindParam(":proc_PrecioProducto", $PrecioProducto, PDO::PARAM_INT);
$stmt->bindParam(":proc_DescripcionProducto", $DescripcionProducto, PDO::PARAM_STR);
$stmt->bindParam(":proc_ImagenProducto", $imagen, PDO::PARAM_STR);
$stmt->execute(); 

//Finalizar transacción 
// $conn->commit();                                                                                                      


// } catch (PDOException $pe) {
// // $conn->rollBack();
// 	echo 'jejeje';
// die("Ocurrio un error: " . $pe->getMessage());    
// }


// function subirDocumento(array $_files,&$newname = ""){  

// 	$fecha = date("Y-m-d");
// 	$rd2 = mt_rand(1000,9999)."_".$fecha; 
// 	//$rd2 =  basename($_files['name'])."_".date("Y-m-d").date("H:i:s"); 
// 	if((!empty($_files)) && ($_files['error'] == 0)) {
  
//   		$filename = basename($_files['name']);

//   	  	$ext = substr($filename, strrpos($filename, '.') + 1);
  
// 	 	if (($ext != "exe") && ($_files["type"] != "application/x-msdownload"))  {
	
		 
// 			$newname="images/".$rd2.".".$ext;      
// 		  //Check if the file with the same name is already exists on the server
	 
// 			//Attempt to move the uploaded file to it's new place
// 			if ((move_uploaded_file($_files['tmp_name'],$newname))) {
				
// 				return $rd2.".".$ext;
			
// 			}
			
// 		} 
		  	  
//   	} 
	
// }


?>
