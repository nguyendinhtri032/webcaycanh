<?php
    $tenkh=$_GET['tenkh'];
    $diachi=$_GET['diachi'];
    $sdt=$_GET['sdt'];
    $ghichu=$_GET['ghichu'];
    $ptthanhtoan=$_GET['ptthanhtoan'];
    $last_id=0;
    $makh=$_SESSION['makhachhang'];
    $total=0;
    $day= date("d/m/Y");
    foreach($_SESSION['cart'] as $key=>$val){
        $temp=$val['dongia']*$val['soluong'];
        $total+=$temp;
    }
    $sql="insert into donhang values ('','$makh','NV1','$day','$total','Chưa giao hàng','$ptthanhtoan')";
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
    }
    foreach($_SESSION['cart'] as $key=>$val)
    {
        $dongia=$val['dongia'];
        $soluong=$val['soluong'];
        $sql="insert into chitietdonhang values ('$key','$dongia','$soluong','$last_id')";
        mysqli_query($conn,$sql);
    }
    unset($_SESSION['cart']);
    echo "<script>alert('Đặt hàng thành công :))');</script>";
?>