<?php
function add1(){
    if(isset($_SESSION['username'])){
$id=isset($_GET['addproduct'])?$_GET['addproduct']:'';
// kiểm tra xem id có trong database hay không
$conn = mysqli_connect("localhost","root","","webcaycanh");
$sql="SELECT * FROM sanpham WHERE masanpham='$id'";
$result = mysqli_query($conn,$sql);

// chọn san pham tu database
$product=mysqli_num_rows($result);
//echo $product;
$obj=$result -> fetch_object();
// kiểm tra sản phẩm có trong csdl hay không. Nếu có
if($product>0)
{
    if(isset($_SESSION['cart']) ){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['soluong']+=1;
            $_SESSION['cart'][$id]['anh']=$obj->anh;
            $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
            $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
            $_SESSION['cart'][$id]['dongia']=$obj->dongia;
            
        }
        else{
            $_SESSION['cart'][$id]['soluong']=1;
            $_SESSION['cart'][$id]['anh']=$obj->anh;
            $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
            $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
            $_SESSION['cart'][$id]['dongia']=$obj->dongia;
        
        }
    }
    else{
        $_SESSION['cart'][$id]['soluong']=1;
        $_SESSION['cart'][$id]['anh']=$obj->anh;
        $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
        $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
        $_SESSION['cart'][$id]['dongia']=$obj->dongia;
    }
}
  echo "  <script>alert('Thêm sản phẩm thành công :))');</script>";}
  else {echo "<center><h3>Bạn chưa đăng nhập, Đăng nhập <a href='index.php?login'> tại đây</h3></p></center>";return;}
}

function addn(){
    if(isset($_SESSION['username'])){
$soluong=($_GET['soluong']);
$id=isset($_GET['addproduct'])?$_GET['addproduct']:'';
// kiểm tra xem id có trong database hay không
$conn = mysqli_connect("localhost","root","","webcaycanh");
$sql="SELECT * FROM sanpham WHERE masanpham='$id'";
$result = mysqli_query($conn,$sql);

// chọn san pham tu database
$product=mysqli_num_rows($result);
//echo $product;
$obj=$result -> fetch_object();
// kiểm tra sản phẩm có trong csdl hay không. Nếu có
if($product>0)
{
    if(isset($_SESSION['cart']) ){
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['soluong']+=$soluong;
            $_SESSION['cart'][$id]['anh']=$obj->anh;
            $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
            $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
            $_SESSION['cart'][$id]['dongia']=$obj->dongia;
            
        }
        else{
            $_SESSION['cart'][$id]['soluong']=$soluong;
            $_SESSION['cart'][$id]['anh']=$obj->anh;
            $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
            $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
            $_SESSION['cart'][$id]['dongia']=$obj->dongia;
        
        }
    }
    else{
        $_SESSION['cart'][$id]['soluong']=$soluong;
        $_SESSION['cart'][$id]['anh']=$obj->anh;
        $_SESSION['cart'][$id]['tensanpham']=$obj->tensanpham;
        $_SESSION['cart'][$id]['masanpham']=$obj->masanpham;
        $_SESSION['cart'][$id]['dongia']=$obj->dongia;
    }
    echo "<script>alert('Thêm  ".$soluong." sản phẩm thành công :))');
    history.back();
    </script>}
    ";}}
    else {echo "<center><h3>Bạn chưa đăng nhập, Đăng nhập <a href='index.php?login'> tại đây</h3></p></center>";return;}
}
   
?>

