<?php
    if(isset($_GET["cart"])){ 
        include("./cart.php");
    	return;
	}
    if(isset($_GET["login"])){
        include("./login.php");
        return;
	}
	if(isset($_GET["product"])||isset($_GET["SP"])){
		include("./product.php");
		return;
	}
	if(isset($_GET["contact-us"])){
		include("./contact-us.php");
		return;
	}
	if(isset($_GET["signup"])){
		include("./signup.php");
		return;
	}
	if(isset($_GET["product-details"])){
			include("./product-details.php");
			return;
	}
	
	if(isset($_GET["account"])){
		include("./account.php");
		return;
	}
	if(isset($_GET["invoice"])||isset($_GET["DH"])){
		include("./invoice.php");
		return;
	}

	if(isset($_GET["product-add"])){
		include("./product-add.php");
		return;
	}	

	if(isset($_GET['search'])){
		include("./product-search.php");
		return;
	}
	if(isset($_GET['manageproduct'])){
		include("./manageproduct.php");
		return;
	}
	if(isset($_GET['soluong'])&&isset($_GET['addproduct']))
	{
		include("product-addtocart.php");
		addn();
		return;
	}
	if(isset($_GET['addproduct']))
	{
		include("product-addtocart.php");
		add1();
		
	}
	if(isset($_GET['cart-plus-product']))
	{  
		$id=$_GET['cart-plus-product'];
		$_SESSION['cart'][$id]['soluong']+=1;
		include('./cart.php');
		return;
	}
	if(isset($_GET['cart-minus-product']))
	{  
		$id=$_GET['cart-minus-product'];
		$_SESSION['cart'][$id]['soluong']-=1;
		if($_SESSION['cart'][$id]['soluong']==0){
			unset($_SESSION['cart'][$id]);
		}
		include('./cart.php');
		return;
	}
	if(isset($_GET['cart-delete-product'])){
		
	$id=$_GET['cart-delete-product'];
  
	unset($_SESSION['cart'][$id]);	
	include('cart.php');
	return;}

	
	if(isset($_GET['tenkh']) && isset($_GET['diachi']) && isset($_GET['sdt']) && isset($_GET['ghichu']) && isset($_GET['ptthanhtoan']) && isset($_GET['dathang']))
	{
		include("./order.php");
	
	}
	if(isset($_GET['invoice-deltai'])){
		include('./invoice-deltai.php');
		return;
	}
	
?>

<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
					
									<center><img src="images/home/nen1.png" class="girl img-responsive" alt="" /></center>
							
							</div>

							<div class="item">
								<div class="col-sm-6">
									<img src="images/home/nen2.jpg" class="girl img-responsive" alt="" />
									</div>
									<div class="col-sm-6">
									<h3>Cây xương rồng đa phần có hình dáng xù xì, có gai, được coi là biểu tượng của sức sống mãnh liệt, vươn lên khó khăn, đồng thời rất dễ trồng nên được mọi người ở nhiều lứa tuổi ưa chuộng. Bạn có thể đặt chậu cây xương rồng trong căn phòng hay góc làm việc, học tập của mình, thậm chí ở ngoài vườn như một đồ vật trang trí nội thất.
									</h3>
									<a href="index.php?product=XR&page=1" class="btn btn-default get">Xem ngay...</a>
									</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h3>Cây Sen Đá được ước tính có khoảng 60 họ thực vật khác nhau và hơn 3000 loài trên thể giới. Sen Đá sống và phát triển được ở Việt Nam thì chỉ khoảng hơn 300 loại, và hơn 100 loại Sen Đá đẹp trong số đó sức sống tốt, được con người nhân giống và phát triển làm kiểng và làm cây phong thủy. Sen đá giống giá chỉ từ 11.000 VND.
									</h3>
									<a href="index.php?product=SD&page=1" class="btn btn-default get">Xem ngay...</a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/nen3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->

		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Thể Loại</h2>
						<div class='panel-group category-products' id='accordian'><!--category-productsr-->
								<?php
							  		$conn = mysqli_connect("localhost","root","","webcaycanh");
							  		if($conn)
						   			{
							 			$sql="SELECT * from loai";
							 			$result=mysqli_query($conn,$sql);
							  			while($row=mysqli_fetch_array($result))
								 		{	
									 		echo "
											 <div class='panel panel-default'>
										 	<div class='panel-heading'>
											 <h4 class='panel-title'><a href='index.php?product=".$row['maloai']."&page=1'>".$row['tenloai']."</a></h4>
										 	</div>
									 		</div>";
											 
										}
						 			}				 
								?>
								</div><!--/category-products-->";
					</div>
				</div>
						


				<div class="col-sm-9 padding-right">	
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Sản Phẩm</h2>

			 <?php
				 $conn = mysqli_connect("localhost","root","","webcaycanh");
				 if($conn){
					$sql="select * from sanpham limit 9";
					$result=mysqli_query($conn,$sql);
				
					while($row=(mysqli_fetch_array($result))){
						echo "<div class='col-sm-4'>
						<div class='product-image-wrapper'>
							<div class='single-products'>
								<div class='productinfo text-center'>";
						echo "<a href='index.php?product-details=".$row['masanpham']."'>";
						echo "<img src='./images/product/" .$row['anh']."'>";
						echo "<h2>" .$row['dongia']." VNĐ</h2>";
						echo "<p>".$row['tensanpham']."</p>";
						echo "<a href='index.php?addproduct=".$row['masanpham']." ' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Thêm vào giỏ hàng</a>
						</a>";
						echo "</div>
						</div>	
						</div>
					</div>";
					 }
				 }
			?> 
			

</div><!--features_items-->

	</div>
			</div>
		</div>
	</section>


