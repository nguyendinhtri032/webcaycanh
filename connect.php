echo "<tr>
									<td class='cart_product'>
									<a href=''><img src='images/product/'></a>
									</td>
									<td class='cart_description'>
										<h4><a href=''>".$val['anh']."</a></h4>
										<p>Mã sản phẩm:" .$key"</p>
									</td>
									<td class='cart_price'>
										<p>".$val['dongia']."</p>
									</td>
									<td class='cart_quantity'>
										<div class='cart_quantity_button'>
											<a class='cart_quantity_up' href=''> + </a>
											<input class='cart_quantity_input' type='text' name='quantity' value='".$val['soluong']."' autocomplete='off' size='2'>
											<a class='cart_quantity_down' href=''> - </a>
										</div>
									</td>
									<td class='cart_total'>
										<p class='cart_total_price'></p>
									</td>
									<td class='cart_delete'>
										<a class='cart_quantity_delete' href=''><i class='fa fa-times'></i></a>
									</td>
								</tr>";	