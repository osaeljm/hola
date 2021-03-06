<?php
session_start();
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>	
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
	<header>
		<hgroup>
			<h1>Carro de compras</h1>			
		</hgroup>
	</header>

	<section>
		<article>
			<div class="products">
			<?php
			//current URL of the Page. cart_update.php redirects back to this URL
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			    
			    $results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
			    if ($results) { 
			        //output results from database
			        while($obj = $results->fetch_object())
			        {			            
			            echo '<div class="product">'; 
			            echo '<form method="post" action="cart_update.php">';
			            echo '<div class="product-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
			            echo '<div class="product-thumb">'.$obj->product_qty.'</div>';
			            echo '<div class="product-content"><h3>'.$obj->product_name.'</h3>';
			            echo '<div class="product-desc">'.$obj->product_desc.'</div>';
			            echo '<div class="product-info">Price '.$currency.$obj->price.' <button class="add_to_cart">Add To Cart</button></div>';
			            echo '</div>';
			            echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
			            echo '<input type="hidden" name="type" value="add" />';
			            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
			            echo '</form>';
			            echo '</div>';
			        }			    
				}
			?>
			</div>		
		</article>	
	</section>
	<aside>
		<section>
			<div class="shopping-cart">
				<h2>Your Shopping Cart</h2>
				<?php
				if(isset($_SESSION["products"]))
				{
				    $total = 0;
				    echo '<ol>';
				    foreach ($_SESSION["products"] as $cart_itm)
				    {
				        echo '<li class="cart-itm">';
				        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
				        echo '<h3>'.$cart_itm["name"].'</h3>';
				        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
				        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
				        echo '<div class="p-price">Price :'.$currency.$cart_itm["price"].'</div>';
				        echo '</li>';
				        $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
				        $total = ($total + $subtotal);
				    }
				    echo '</ol>';
				    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Check-out!</a></span>';
				    echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
				}else{
				    echo 'Your Cart is empty';
				}
				?>
			</div>	
		</section>	
	</aside>
	<footer>Footer - Copyright 2014</footer>
</body>
</html>