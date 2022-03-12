

<section id="advertisement">
		<div class="container">
			<img src="images/product/nen3.jpg" alt="" />
		</div>
</section>
<section>	
<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Thể Loại</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					 	<?php
							$conn = mysqli_connect("localhost","root","","webcaycanh");
						   if($conn)
						   {
							 $sql="SELECT * from loai";
							 $result=mysqli_query($conn,$sql);
							  while($row=mysqli_fetch_array($result))
								 {	
									 echo "<div class='panel panel-default'>
										 <div class='panel-heading'>
											 <h4 class='panel-title'><a href='index.php?product=".$row['maloai']."&page=1'>".$row['tenloai']."</a></h4>
										 </div>
									 </div>";
									}
						 } 
						?>
						
							</div>
						<!--/category-products-->
					</div>
				</div>

<div class="col-sm-9 padding-right">
<div class="features_items"><!--features_items-->
<h2 class="title text-center">Sản Phẩm</h2>

<?php
    
    if(isset($_GET['btnsearch'])&&isset($_GET['search'])&&isset($_GET['page']))
    {
		$limit=9;
        $search=$_GET['search'];
        $page=$_GET['page'];
		$btnsearch=$_GET['btnsearch'];
		$start = ($page - 1)*$limit;   
		$sql="select * from sanpham where tensanpham like '%$search%' LIMIT $start , $limit";
        $i=0;
		$output = "";
        $conn = mysqli_connect("localhost","root","","webcaycanh");
        if($conn){
      		$result=mysqli_query($conn,$sql);
			if($result!=null){
	        while($row=mysqli_fetch_array($result)){
            echo "<div class='col-sm-4'>
            <div class='product-image-wrapper'>
                <div class='single-products'>
                    <div class='productinfo text-center'>";
            echo "<a href='index.php?product-details=".$row['masanpham']."'>";
            echo "<img src='./images/product/" .$row['anh']."'>";
            echo "<h2>" .$row['dongia']." VNĐ</h2>";
            echo "<p>".$row['tensanpham']."</p>";
            echo "<a href='index.php?productactionid=".$row['masanpham']." ' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Thêm vào giỏ hàng</a>
            </a>";
            echo "</div>
            </div>	
            </div>
        </div>";
         }}
		 else echo "<center><h2>Không tìm thấy sản phẩm  $search<br><a onclick='quay_lai_trang_truoc()'>Quay lại trang trước 
		 <script>
		 function quay_lai_trang_truoc(){
			 history.back();
		 }
	 </script>
		 </a></h2></center>";
		 $sql_total='';
		 
		 $sql_total="select * from sanpham where tensanpham like '%$search%' ";
		  $records = mysqli_query( $conn, $sql_total) or die ("sai");
		   $total_records = mysqli_num_rows($records);
		   $total_page = ceil($total_records/$limit);
		   if ($page > 1 && $total_page > 1){
			$output .= '<a href="index.php?search=' .$search. '&btnsearch=' .$btnsearch.  '&page='.($page-1).'"><</a>  ';
		  }
		   // Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++){
 // Nếu là trang hiện tại thì hiển thị thẻ span
 // ngược lại hiển thị thẻ a
 if ($i == $page){
	 $output .= '<span>'.$i.'</span>  ';
 }
 else{
	 $output .= '<a href="index.php?search=' .$search. '&btnsearch=' .$btnsearch. '&page='.$i.'">'.$i.'</a>  ';
 }
}

// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
if ($page < $total_page && $total_page > 1){
 $output .= '<a href="index.php?search=' .$search. '&btnsearch=' .$btnsearch.  '&page='.($page+1).'">></a>  ';
}
echo "</div><div><ul class='pagination'>
					 <li class='active'>$output</li></ul>";
	 }	 
}
?>



		
<!--features_items-->
								
						
</section>
