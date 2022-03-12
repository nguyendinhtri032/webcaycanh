<?php 
if(empty($_SESSION['username']))
		{
			 echo "<center><h3>Bạn chưa đăng nhập, Đăng nhập <a href='index.php?login'> tại đây</a></h3></center>";
			return;		
		}
		
	
		?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="./index.php">Home</a></li>
				  <li class="active">Hóa đơn</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"><center>STT</center></td>
							<td class="description"><center>Mã đơn hàng</center></td>
							<td class="price"><center>Ngày mua</center></td>
							<td class="quantity"><center>Tổng tiền đơn hàng</center></td>
							<td class="total"><center>Tình trạng</center></td>
							<td class="price"><center>Phương thức thanh toán</center></td>
							<td class="price"><center>Phương thức thanh toán</center></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					$makh=$_SESSION['makhachhang'];
					$sql="select * from donhang where makhachhang='$makh' ";
					$result=mysqli_query($conn,$sql);
					if($result!=null){
					$stt=0;
					while($row=mysqli_fetch_array($result)){
						$stt++;
					echo "<center>
						<tr>
							<td class='cart_price'>
								<center><p>".$stt."</p></center>
							</td>
							<td class='cart_price'>
							<center><p>	".$row['madonhang']."</p></center>
							</td>
							<td class='cart_description'>
								<p>".$row['ngaymua']."</p></center>
								
							</td>
							<td class='cart_price'>
							<center><p>".$row['tongtiendonhang']." VNĐ</p></center>
							</td>
							<td class='cart_price'>
							<center><p>".$row['tinhtrang']."</p></center>
							</td>
							<td class='cart_price'>
							<center><p>".$row['phuongthucthanhtoan']."</p></center>
							</td>
							<td class='cart_price'>
							<center><p><a href='index.php?invoice-deltai=".$row['madonhang']."'>Chi tiết đơn hàng</a></p></center>
							</td>
						
						</tr>
						</center>
					";}}
				?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
