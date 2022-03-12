<?php
function plusproduct(){
    if(isset($_GET['cart-plus-product']))
    $id=$_GET['cart-plus-product'];
    $_SESSION['cart'][$id]['soluong']+=1;  }
            
?>
