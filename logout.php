<?php session_start(); 
 
if (isset($_SESSION['username'])&&isset($_SESSION['makhachhang'])){
    unset($_SESSION['username']); // xóa session login
    unset($_SESSION['makhachhhang']);
    unset($_SESSION['cart']);
    
    header("location: index.php");
}
   
?>
