<?php
session_start();
include_once("autenticacion/class/config.php");

if(isset($_SESSION["usuario"]))
{
    $idusuario =  $_SESSION["idusuario"];
} else {
    header('Location:iniciar_sesion.php?error=3');
}                            

try {

    $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password);
    //Iniciar transacción
    $conn->beginTransaction();
    $total = 0;                                 

    $sql = "call Insertar_EncabezadoFactura(:proc_TotalFactura,:proc_Usuario_IdUsuario)";
    $stmt = $conn->prepare($sql); 
    $stmt->bindParam(":proc_TotalFactura", $total, PDO::PARAM_INT);
    $stmt->bindParam(":proc_Usuario_IdUsuario", $idusuario, PDO::PARAM_INT);
    $stmt->execute();
    $r = $stmt->fetch();

// echo $r["outid"];

    if(isset($_SESSION["products"]))
    {
        $total = 0;
        $cart_items = 0;                               
        foreach ($_SESSION["products"] as $cart_itm)
        {
            $product_code = $cart_itm["code"];
            $product_price = $cart_itm["price"];
            $cart_itm["id"];
            $product_id = $cart_itm["id"];                                     

            //Ingreso de detalle en la tabla FacturaDetalle           
            $total = 0;  
            $cantidad = 1;
            $subtotal = $cantidad *  $product_price;                                           
            $sql = "call Insertar_FacturaDetalle(:proc_EncabezadoFactura_NumeroEncabezadoFactura,
            :proc_Cantidad,:proc_SubTotal,:Producto_IdProducto)";
            $stmt = $conn->prepare($sql); 
            $stmt->bindParam(":proc_EncabezadoFactura_NumeroEncabezadoFactura", $r["outid"], PDO::PARAM_INT);
            $stmt->bindParam(":proc_Cantidad", $cantidad, PDO::PARAM_INT);
            $stmt->bindParam(":proc_SubTotal", $subtotal, PDO::PARAM_INT);
            $stmt->bindParam(":Producto_IdProducto", $product_id, PDO::PARAM_INT);
            $stmt->execute();                                            

            //Consultar la cantidad de productos 
            $sql = "call Consultar_CantidadProducto(:proc_IdProducto)";
            $stmt = $conn->prepare($sql); 
            $stmt->bindParam(":proc_IdProducto", $product_id, PDO::PARAM_INT);
            $stmt->execute();
            $r1 = $stmt->fetch();

            $calculo = $r1["CantidadProducto"] - $cantidad;            

            If($calculo >= 0)
            {
                //Restar la cantidad de productos de producto comprado de la tabla productos
                $sql = "call Modificar_CantidadProducto(:proc_IdProducto,:proc_Cantidad)";
                $stmt = $conn->prepare($sql); 
                $stmt->bindParam(":proc_IdProducto", $product_id, PDO::PARAM_INT);
                $stmt->bindParam(":proc_Cantidad", $calculo, PDO::PARAM_INT);
                $stmt->execute();

                $cart_items ++;                 
            } else {
                $conn->rollBack();
                echo 'Error: Cantidad de productos menor a la del inventario.';
            }                                      
        }

        //consultar total factura
        $sql = "call Consultar_TotalFacturaDetalle(:proc_EncabezadoFactura_NumeroEncabezadoFactura)";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(":proc_EncabezadoFactura_NumeroEncabezadoFactura", $r["outid"], PDO::PARAM_INT);
        $stmt->execute();
        $r2 = $stmt->fetch();

        //Actualizar total factura
        $sql = "call Modificar_TotalEncabezadoFactura(:proc_NumeroFactura,:proc_TotalFactura)";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(":proc_NumeroFactura", $r["outid"], PDO::PARAM_INT);
        $stmt->bindParam(":proc_TotalFactura", $r2["SubTotal"], PDO::PARAM_INT);
        $stmt->execute();
                                                                
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
                          