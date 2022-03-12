
<script src="js/js.js"></script>

	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8" id="">
					<div class="login-form" id="login-form"><!--login form-->
						<h2 >Đăng nhập tài khoản của bạn!</h2>
						
						<div id="formdangnhap">
							<form  name="formdangnhap" method="post" onsubmit="return ktdn()">
								<input type="text" name="tkdn" placeholder="Tên tài khoản" >
								<input type="password" name="mkdn" placeholder="Mật khẩu" >
								<input type="submit" name="login" class="btn btn-default"value="Đăng nhập">
								<?php
									if(isset($_POST['login'])){
										$tkdn=$_POST["tkdn"];
										$mkdn=$_POST["mkdn"];
										$conn = mysqli_connect("localhost","root","","webcaycanh");
      									if($conn){
        					  				$dstk="SELECT username,pass FROM taikhoan";
        									$result=mysqli_query($conn,$dstk);
           									while($row=mysqli_fetch_array($result)){
            									if($row['username']==$tkdn&& $row['pass']==$mkdn){ 
													$_SESSION['username'] = $tkdn;
													$sql="select makhachhang from khachhang where username='$tkdn'";
													$result2=mysqli_query($conn,$sql);
													$row2=mysqli_fetch_array($result2);
													$_SESSION['makhachhang']=$row2['makhachhang'];
													echo "<script>alert('Đăng nhập thành ".$_SESSION['username']." công :))');
													window.location.href = './index.php';
													</script>";
													die();
													}
            									}
												echo "<script>alert('Sai tên tài khoản hoặc mật khẩu :(( ');</script>";
        									}
    								}
								?>
							</form>
						</div>
						
					
					<center><a href="index.php?signup">Đăng kí ngay</a></center>
					<!--/login form-->
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
						