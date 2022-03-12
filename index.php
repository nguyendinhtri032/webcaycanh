<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web Cây Cảnh</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>	
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							 	<li><a href="index.php?account"> <i class="fa fa-user"></i>
							
							<?php 
									if (isset($_SESSION['username']) && $_SESSION['username']){
           									echo $_SESSION['username'];
       								}
       							?>
								</a></li>
				
								<li><i></i>
								<?php 
       								if (isset($_SESSION['username']) && $_SESSION['username']){
										echo '<a href="logout.php">Đăng xuất</a>';
       								}
									   else{
										echo " <li><a href='index.php?login'><i class='fa fa-lock'></i> Đăng nhập</a></li>";
									   }
       							?>
								</a></li>
							 	<li ><a href="index.php?cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<!-- <div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> -->
						
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="index.php" class="active">Trang Chủ</a></li>
							<li class='dropdown'><a>Danh Mục<i class='fa fa-angle-down'></i></a><ul role=menu class="sub-menu">
								<?php 
								$conn = mysqli_connect("localhost","root","","webcaycanh");
								if($conn){
{
									$sql="select * from danhmuc";
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($result))
									{
										if($row['madanhmuc']=='SP'){
                                   			 echo  "<li><a href='index.php?product=all&page=1'>".$row['tendanhmuc']."</a></li>";}
										
										else{  echo  "<li><a href='index.php?".$row['madanhmuc']."'>".$row['tendanhmuc']."</a></li>";}
								 }
								}}
								 ?>
									</ul>
                                	</li>
							
								<li><a href="index.php?contact-us">Liên Hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="" method="get" name="formsearch">
								<input class="search_box" type="text" name="search" placeholder="Bạn muốn tìm gì..."/>
								<input type="submit" name="btnsearch" value="Tìm"  class="btnsearch" >
								<input style="display:none" type="text" name="page" value="1">
						</form>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<?php include("mid.php")	?>
	<footer id="footer"><!--Footer-->		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>WEBCAYCANH</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>Văn Phòng: 273 An Dương Vương F3, Q5, TP. Hồ Chí Minh</li>
								<li>Số điện thoại liên hệ: 035.123.6789</li>
							</ul>
						</div>
					</div>
			
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Địa chỉ bán lẻ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>Hà Nội: Số 1 đường Hai Bà Trưng</li>
								<li>TP. Hồ Chí Minh: Số 109 đường Nam Kì Khởi Nghĩa</li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">NĐT</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
  	 <script src="js/jquery.js"></script>
	<!-- <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script> 
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script> -->
	 <script src="js/bootstrap.min.js"></script>
	 <script src="js/js.js"></script>
	
</body>
</html>
