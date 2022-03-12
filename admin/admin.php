<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/reset.css">
</head>
<script>
    function reloadPage()
    {
        window.reload();
    }
    // function deleteall()
    // {
    //     if(confirm("Bạn có muốn xóa tất cả"))
    //     {
    //         <?php
                
    //         ?>
    //     }
    // }
</script>
<body class='bg-white'>
<?php
    session_start();
    if(!isset($_SESSION['username-admin']))
    {
       echo "<script>window.location.href = './loginadmin.php';</script>";
    }
?>
<div class="container" id='container'>
    <div class="row">
        <div class="col-12 text-center bg-light p-2">ADMIN</div>
    </div>
    <div class="row d-flex justify-content-center">
        <a href="admin.php?chuyentrang=1" class="col-2 btn btn-info border-dark">QUẢN LÍ TÀI KHOẢN</a>
        <!-- <a href="admin.php?chuyentrang=2" class="col-2 nav-link"><button>QUẢN LÍ QUYỀN TÀI KHOẢN</button></a> -->
        <a href="admin.php?chuyentrang=3" class="col-2 btn btn-info border-success">QUẢN LÍ KHÁCH HÀNG</a>
        <a href="admin.php?chuyentrang=4" class="col-2 btn btn-info border-success">QUẢN LÍ NHÂN VIÊN</a>
        <a href="admin.php?chuyentrang=5" class="col-2 btn btn-info border-success">QUẢN LÍ SẢN PHẨM</a>
        <a href="admin.php?chuyentrang=6" class="col-2 btn btn-info border-success">QUẢN LÍ PHIẾU NHẬP</a>
       
    </div>
    <div class='row' id='main'>
    <?php
        if(isset($_GET['chuyentrang']))
        {
            $chuyentrang= $_GET['chuyentrang'];
            switch($chuyentrang)    
            {
                case 1: include("manageaccount.php");
                break;
                case 2: include("managepower.php");
                break;
                case 3: include("managecustomer.php");
                break;
                case 4: include("managestaff.php");
                break;
                case 5: include("manageproduct.php");
                break;      
                case 6:
                    include("manageimport.php");
                break;
             
            }
        }
    ?>
    </div>
</div>
<center><h2><a href="logoutadmin.php">Đăng xuất<a></h2></center>
</body>
</html>