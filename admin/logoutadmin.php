<?php session_start(); 
if (isset($_SESSION['username-admin'])){
    unset($_SESSION['username-admin']); // xóa session login
    header("location: admin.php");
} 
?>