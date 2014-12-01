<?php
session_start();
include_once("autenticacion/class/config.php");

if(isset($_POST["username"]))  //&&isset($_POST["email"])&&isset($_POST["user"])&&isset($_POST["password"])
{
    $NombreUsuario =  $_POST["username"];
    $CorreoUsuario =  $_POST["email"];    
    $LoginUsuario =  $_POST["user"];
    $ContrasenaUsuario =  $_POST["password"];
} else {
    header('Location:registrarse.php?error=1');
}        



function validar($NombreUsuario,$CorreoUsuario,$LoginUsuario,$ContrasenaUsuario){
if($NombreUsuario == null){
    // $error = "Debe digitar su nombre completo.";
    header('Location:registrarse.php?error=3');
}
if($NombreUsuario > 100){
    // $error = "El nombre completo es muy extenso.";
    header('Location:registrarse.php?error=4');
}
if($CorreoUsuario == null){
    // $error = "Debe digitar el correo electrónico.";
    header('Location:registrarse.php?error=5');
}
if(!isEmail($CorreoUsuario)){
    // $error = "Correo electrónico inválido.";
    header('Location:registrarse.php?error=6');
}
if($LoginUsuario == null){
    // $error = "Debe digitar su nombre completo.";
    header('Location:registrarse.php?error=7');
}
if(strlen($LoginUsuario) > 15){
    // $error = "El nombre de usuario no debe ser mayor a 15 caracteres.";
    header('Location:registrarse.php?error=8');
}
// if($LoginUsuario != null){
//     $sql = "select LoginUsuario from Usuario where LoginUsuario = '$LoginUsuario'";
//     $comprobar = mysql_query($sql);
//         if(mysql_num_rows($comprobar) > 0){
//             // $error = "Nombre de usuario incorrecto, ya este usuario existe digite uno nuevo.";
//             header('Location:registrarse.php?error=9');
//         }
// }
if($ContrasenaUsuario == null){
    // $error = "Debe digitar su contraseña.";
    header('Location:registrarse.php?error=10');
}
if(strlen($ContrasenaUsuario) > 10){
    // $error = "El nombre de usuario no debe ser mayor a 10 caracteres.";
    header('Location:registrarse.php?error=11');
}

// return true;
} 

function isEmail($correo_e){
return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i"
,$correo_e));
}

if(validar($NombreUsuario,$CorreoUsuario,$LoginUsuario,$ContrasenaUsuario)){
    try {

        $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
        //Iniciar transacción

        $conn->beginTransaction();

        $IdPerfil = 1;
        $sql = "call Insertar_Usuario(:proc_LoginUsuario,:proc_ContrasenaUsuario,:proc_IdPerfil,:proc_CorreoUsuario,:proc_NombreUsuario)";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(":proc_LoginUsuario", $LoginUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":proc_ContrasenaUsuario", $ContrasenaUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":proc_IdPerfil", $IdPerfil, PDO::PARAM_INT);
        $stmt->bindParam(":proc_CorreoUsuario", $CorreoUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":proc_NombreUsuario", $NombreUsuario, PDO::PARAM_STR);
        $stmt->execute();
        // $r1 = $stmt->fetch();      
                                       
        // $conn->rollBack();
        // echo 'Error: Cantidad de productos menor a la del inventario.';
                                   echo $LoginUsuario.' '.$ContrasenaUsuario.' '.$IdPerfil.' '.$CorreoUsuario.' '.$NombreUsuario;                                          
        //Finalizar transacción 
        $conn->commit();                                                                                                      
        header('Location:registrarse.php?error=2'); 

    } catch (PDOException $pe) {
        $conn->rollBack();
        die("Ocurrio un error: " . $pe->getMessage());    
    }
}
?>
                          