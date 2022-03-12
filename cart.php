<?php 
if(empty($_SESSION['username']))
		{
			 echo "<center>Bạn chưa đăng nhập, Đăng nhập <a href='index.php?login'> tại đây</a></center>";
			return;		
		}
		if(empty($_SESSION['cart']))
		{
			echo "<center>Giỏ hàng rỗng :(( <br><a href='index.php?product=all&page=1'>Mua sắm tại đây!</a></center>";return;	
		}
	
		?>
							
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Giỏ Hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">STT</td>
							<td class="image">Sản phẩm</td>
							<td class="image"><center>Mô tả</center></td>	
							<td class="price">Giá tiền</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền<nav></nav></td>
							<td class="total">Xóa<nav></nav></td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
						 $conn = mysqli_connect("localhost","root","","webcaycanh");
						 if($conn){
							$stt=0;
							$total=0;
							foreach($_SESSION['cart'] as $key=>$val){
							$stt++;
							$temp=$val['dongia']*$val['soluong'];
							$total+=$temp;
					
							echo "<tr>
							
							<td class='cart_description'>
							<h4><center>".$stt."</center></h4>
							</td>

							<td class='cart_product'>
							<a href='index.php?product-details=".$val['masanpham']."'><img src='images/product/".$val['anh']."' width='119' height='128'></a>
							</td>

							<td class='cart_description'><center>
								<h4><a href='index.php?product-details=".$val['masanpham']."'>".$val['tensanpham']."</a></h4>
								<p>Mã sản phẩm: " .$key."</p></center>
							</td>
							</a>
							<td class='cart_price'>
								<p>".$val['dongia']." VNĐ</p>
							</td>

							<td class='cart_quantity'>
								<div class='cart_quantity_button'>
									
									<a href='index.php?cart-plus-product=".$val['masanpham']."'>+</a>
									<input class='cart_quantity_input' type='text' name='quantity' value='".$val['soluong']."' autocomplete='off' size='2'>
									<a href='index.php?cart-minus-product=".$val['masanpham']."' >-</a>
									</div>
							</td>

							<td class='cart_total'>
								<p class='cart_total_price'>".$temp." VNĐ</p>
							</td>"
							?>
							<td class='cart_delete'>
								<a class='cart_quantity_delete' data-idsp="<?php print $val['masanpham'] ?>" onclick="deleteItem(this);" ><i class='fa fa-times'></i></a>
							</td>
							<script>
								function deleteItem(element){
									let rs = confirm('Bạn có muốn xoá không?');
									if (rs == true)
									element.setAttribute('href','index.php?cart-delete-product='+element.getAttribute('data-idsp'));
								}
							</script>
							<?php "
						</tr>";	
							}
						echo "<tr>
						<td colspan='4'>&nbsp;</td>
						<td colspan='2'>
							<table class='table table-condensed total-result'>
								<tr>
									<td>Phí vận chuyển</td>
									<td>FreeShip</td>
								</tr>
								<tr>
									<td>Tổng tiền</td>
									<td><span> ".$total." VNĐ</span></td>
								</tr>
							</table>
						</td>
					</tr>";
						}
								
						 
					?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<script src="js/js.js"></script>
	<section id="do_action">
		<div class="container">
					<div class="total_area">
						<ul>
						<center>
				<h3>Hãy nhập thông tin của bạn </h3></center>
							<form name="formdathang" method="GET" onsubmit="return ktdh()">
								<input type="text" name="tenkh" placeholder="Họ và tên người nhận"></br>
								<input type="text" name="diachi" placeholder="Địa chỉ"></br>
								<input type="text" name="sdt" placeholder="Số điện thoại" pattern="^0[3579](\d{8}$)"></br>
								<input type="text" name="ghichu" placeholder="Ghi chú"></br>
								<select name="ptthanhtoan">
									<option value="" disabled="disabled" selected="selected">Chọn phương thức thanh toán</option>
									<option value="Thanh toán khi nhận hàng" >Thanh toán khi nhận hàng</option>
									<option value="2"disabled="disabled">Thanh toán bằng Momo</option>
									<option value="3"disabled="disabled">Thanh toán qua Internet Banking</option>
								</select>
								<center><input type="submit" name="dathang" value="Đặt hàng"></center>
												</form>
						</ul>
						
					</div>
				
			
		</div>
	</section><!--/#do_action-->

