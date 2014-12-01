<?php
session_start();
include_once("autenticacion/class/config.php");

if(isset($_POST["username"])&&isset($_POST["email"])&&isset($_POST["user"])&&isset($_POST["password"]))
{
    $NombreUsuario =  $_POST["username"];
    $CorreoUsuario =  $_POST["email"];
    
    $LoginUsuario =  $_POST["user"];
    $ContrasenaUsuario =  $_POST["password"];
} else {
    header('Location:iniciar_sesion.php?error=3');
}                            

try {

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
    //Iniciar transacción
    $conn->beginTransaction();
                              
    $IdPerfil = 1;
    $sql = "call Crear_Usuario(:proc_LoginUsuario,:proc_ContrasenaUsuario,:proc_IdPerfil,:proc_CorreoUsuario,:proc_NombreUsuario)";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(":proc_LoginUsuario", $LoginUsuario, PDO::PARAM_STR);
    $stmt->bindParam(":proc_ContrasenaUsuario", $ContrasenaUsuario, PDO::PARAM_STR);
    $stmt->bindParam(":proc_IdPerfil", $IdPerfil, PDO::PARAM_INT);
    $stmt->bindParam(":proc_CorreoUsuario", $CorreoUsuario, PDO::PARAM_STR);
    $stmt->bindParam(":proc_NombreUsuario", $NombreUsuario, PDO::PARAM_STR);
    $stmt->execute();
    $r1 = $stmt->fetch();      
                                   
    // $conn->rollBack();
    // echo 'Error: Cantidad de productos menor a la del inventario.';
         
                                                                
    //Finalizar transacción 
    $conn->commit();                                                                                                      
    }       
    unset($_SESSION['products']);
    header('Location:view_cart.php');
   
} catch (PDOException $pe) {
    $conn->rollBack();
    die("Ocurrio un error: " . $pe->getMessage());    
}
?>
                          