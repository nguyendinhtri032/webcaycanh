
<div id="contact-page" class="container">
    	<div class="bg">
			<div class="features_items"><!--features_items-->
			<h2 class="title text-center">Thông Tin Tài Khoản</h2>
			</div>
		</div>    	
    	<div class="row">  	
<center>
<?php					if(!empty($_SESSION['username']))
						{
							$conn = mysqli_connect("localhost","root","","webcaycanh");
							if($conn){
								
								$temp=$_SESSION['username'];
							 $sql="select * from khachhang where username='$temp'";
								$result=mysqli_query($conn,$sql);
								echo "<table class='thongtintaikhoan'>";
								echo "<tr>";
					
						echo "<th>Mã khách hàng</th>";
						echo "<th>Tên khách hàng</th>";
						echo "<th>Số điện thoại</th>";
						echo "<th>Địa chỉ</th>";
						echo "<th>Giới tính</th>";
						echo "</tr>";
							 $row=mysqli_fetch_array($result);
								{
									echo "<tr>";
									echo "<td>" . $row['makhachhang'] . "</td>";
									echo "<td>" . $row['tenkhachhang'] . "</td>";
									echo "<td>" . $row['sdt'] . "</td>";
									echo "<td>" . $row['diachi'] . "</td>";
									echo "<td>" . $row['gioitinh'] . "</td>";
								echo "</tr>";
								}
								echo "</table>";
							}	
						}
						else echo "Bạn chưa đăng nhập, Đăng nhập <a href='index.php?login'> tại đây</a>";
							 ?>
</center>
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
  