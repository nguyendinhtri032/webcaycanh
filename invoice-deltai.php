<section id="cart_items">
<div class="container">
        <div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"><center>STT</center></td>
							<td class="image"><center>Tên sản phẩm</center></td>
							<td class="image"><center>Đơn giá</center></td>
							<td class="image"><center> Số lượng</center></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
                    if(isset($_GET['invoice-deltai'])){
                        $madh=$_GET['invoice-deltai'];
					$sql="select * from chitietdonhang,sanpham where madonhang='$madh' and sanpham.masanpham=chitietdonhang.masanpham ";
					$result=mysqli_query($conn,$sql);
					$stt=0;
                    $total=0;
					
					while($row=mysqli_fetch_array($result)){
						$stt++;
                        $temp=$row['dongia']*$row['soluong'];
						$total+=$temp;
					echo "
						<tr>
							<td class='cart_price'>
								<center><p>".$stt."</p></center>
							</td>
							<td class='cart_price'>
							<center><p>	".$row['tensanpham']."</p></center>
							</td>
                            <td class='cart_price'>
							<center><p>".$row['dongia']." VNĐ</p></center>	
							</td>
							<td class='cart_price'>
								<center><p>".$row['soluong']."</p></center>
								
							</td>
						</tr>

                       
					";}
                    echo " <tr>
                    <td colspan='2'>&nbsp;</td>
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
    </div>