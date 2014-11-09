<?php
session_start();
include_once("config.php");

//current URL of the Page. cart_update.php redirects back to this URL
            $current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    if(isset($_SESSION["products"]))
    {
        $total = 0;
        echo '<form method="post" action="PAYMENT-GATEWAY">';
        echo '<ul>';
        $cart_items = 0;
        foreach ($_SESSION["products"] as $cart_itm)
        {
           $CodigoProducto = $cart_itm["code"];
           $results = $mysqli->query("SELECT NombreProducto,CantidadProducto,DescripcionProducto,PrecioProducto FROM Producto WHERE CodigoProducto='$CodigoProducto' LIMIT 1");
           $obj = $results->fetch_object();
           
            echo '<li class="cart-itm">';
            echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
            echo '<div class="p-price">'.$currency.$obj->price.'</div>';
            echo '<div class="product-info">';
            echo '<h3>'.$obj->NombreProducto.' (Code :'.$CodigoProducto.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->DescripcionProducto.'</div>';
            echo '</div>';
            echo '</li>';
            $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
            $total = ($total + $subtotal);

            echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->NombreProducto.'" />';
            echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$CodigoProducto.'" />';
            echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->DescripcionProducto.'" />';
            echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
            $cart_items ++;
            
        }
        echo '</ul>';
        echo '<span class="check-out-txt">';
        echo '<strong>Total : '.$currency.$total.'</strong>  ';
        echo '</span>';
        echo '</form>';
        
    }else{
        echo 'Your Cart is empty';
    }
    echo '<span class="check-out-txt"><a href="index.php">Productos - Inicio</a></span>';
?>