	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->

					<?php
					$conn = mysqli_connect("localhost","root","","webcaycanh");
					
									if(isset($_GET['product-details']));
									{
										$productdetails=$_GET['product-details'];
									}
									$sql="SELECT * FROM sanpham where masanpham='$productdetails'";
									$result=mysqli_query($conn,$sql);
									while($row=mysqli_fetch_array($result)){
										{
									echo "<div class='col-sm-5'>
									<div class='view-product'>
										<img src='./images/product/" .$row['anh']."'>
									</div>
								</div>";
								echo "<div class='col-sm-7'>
								<div class='product-information'>
									<img src='images/product-details/new.jpg' class='newarrival' >
									<h2>".$row['tensanpham']."</h2>
									<form method='get'>
									<p>Mã sản phẩm: <input type='text' readonly name='addproduct' width='20' value= ".$row['masanpham']." ></p>
								 	<img src='' >
									<span>
										<span>Giá : ".$row['dongia']." VND</span><br>
										
										<label>Số lượng:</label>
											<input type='number' name ='soluong'value='1' >
											<input type='submit' name='add' value='Thêm'>
										</form>
									</span>
									<div style='display:;'>
																		</div>
								</div>
							</div>
							<div class='product-information2'>
									<p>".$row['chitietsanpham']."</p>
						</div>
							";}}

					?>
					


											
					</div><!--/product-details-->
					
				
					
					
				</div>
			</div>
		</div>
	</section>