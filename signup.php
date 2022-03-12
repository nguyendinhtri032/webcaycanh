<script src="js/js.js"></script>
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">     
                <div class="col-sm-8">    
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí tài khoản mới!</h2>
						<form action="" name="formdangki" method="post" onsubmit="return ktdk()">
							<input type="text" name="tkdk" placeholder="Tên tài khoản">
							<input type="password" name="mkdk" placeholder="Mật khẩu">
							<input type="password" name="nlmkdk" placeholder="Nhập lại mật khẩu">
							<input type="text" name="hovaten" placeholder="Họ và tên">
							<input type="text" name="diachi" placeholder="Địa chỉ">
							<input type="text" name="sodienthoai" placeholder="Số điện thoại" pattern="^0[3579](\d{8}$)">
							<select name="gioitinh" id="">
								<option value="" disabled="disabled"selected="selected">Giới tính</option>
   								<option value="Nam">Nam</option>
								<option value="Nữ">Nữ</option>
							</select>
							<input type="submit" name="signup" class="btn btn-default" value="Đăng kí">				
 <?php 
 
	$conn=mysqli_connect("localhost","root","","webcaycanh");
   	if(isset($_POST["signup"]))
		{
			$tkdk=$_POST['tkdk'];
			$mkdk=$_POST['mkdk'];
			$hovaten=$_POST['hovaten'];
			$diachi=$_POST['diachi'];
			$sodienthoai=$_POST['sodienthoai'];
			$gioitinh=$_POST['gioitinh'];	
			$valueKH="INSERT INTO khachhang VALUES('','$hovaten','$sodienthoai','$diachi','$gioitinh','$tkdk')"; 
			$valueTK="INSERT INTO taikhoan VALUES('$tkdk','$mkdk','1','1')";
			if(mysqli_query($conn,$valueTK)&&mysqli_query($conn,$valueKH))
			{
			
				echo "<script>alert('Đăng kí thành công, chuyển tới trang đăng nhập :))');
				window.location.href = './index.php?login';
				</script>";
			}
			else { 
			echo "<script>alert('Tài khoản đã tồn tại :((');</script>";}
		}   
	
?>  
						</form>
                        <center><a href="index.php?login">Bạn đã có tài khoản</a></center>
					</div><!--/sign up form-->
                </div>
            </div>
		</div>
	</section><!--/form-->
