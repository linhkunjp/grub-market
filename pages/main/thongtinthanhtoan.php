<h4>Hình thức thanh toán</h4>
<?php
if (isset($_SESSION['id_khachhang'])) {
	?>
	<!-- Responsive Arrow Progress Bar -->
	<div class="container mb-0">
		<div class="arrow-steps clearfix">
			<div class="step done"> <span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
			<div class="step done"> <span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
			<div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a><span>
			</div>
		</div>
	</div>
	<?php
}
?>
<form action="pages/main/xulythanhtoan.php" method="POST">
	<?php
	$id_dangky = $_SESSION['id_khachhang'];
	$sql_get_vanchuyen = mysqli_query($mysqli, "SELECT * FROM tbl_shipping WHERE id_dangky='$id_dangky' LIMIT 1");
	$count = mysqli_num_rows($sql_get_vanchuyen);
	if ($count > 0) {
		$row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
		$name = $row_get_vanchuyen['name'];
		$phone = $row_get_vanchuyen['phone'];
		$address = $row_get_vanchuyen['address'];
		$note = $row_get_vanchuyen['note'];
	} else {
		$name = '';
		$phone = '';
		$address = '';
		$note = '';
	}
	?>

	<!--------Giỏ hàng------------------>
	<div class="row mb-3s">
		<div class="col-12 col-lg-8 pb-0">
			<div class="border form-trans mb-4">
				<div class="form-group">
					<label for="email">Họ và tên</label>
					<input type="text" name="name" class="form-control border-0" disabled value="<?php echo $name ?>"
						placeholder="...">
				</div>
				<div class="form-group">
					<label for="email">Phone</label>
					<input type="text" name="phone" class="form-control border-0" disabled value="<?php echo $phone ?>"
						placeholder="...">
				</div>
				<div class="form-group">
					<label for="email">Địa chỉ</label>
					<input type="text" name="address" class="form-control border-0" disabled
						value="<?php echo $address ?>" placeholder="...">
				</div>
				<div class="form-group">
					<label for="email">Ghi chú</label>
					<input type="text" name="note" class="form-control border-0" disabled value="<?php echo $note ?>"
						placeholder="...">
				</div>
			</div>
			<div class="border mb-3 border-bottom-0">
				<div class="">
					<div class="bg-light pt-3s px-3 pd-10">
						<div class="row g-0 w-100">
							<div class="col col-lg-8 align-self-center pd-0">
								<strong class="fs-16">Sản phẩm</strong>
							</div>
							<div class="col-12 col-lg align-self-center text-center pd-0 f-impor cart-soluong pl-26">
								<strong class="fs-16">Số lượng</strong>
							</div>

						</div>
					</div>
					<?php
					if (isset($_SESSION['cart'])) {
						$i = 0;
						$tongtien = 0;
						foreach ($_SESSION['cart'] as $cart_item) {
							$thanhtien = ((int) $cart_item['soluong'] * (int) $cart_item['pdt_price']);
							$tongtien += $thanhtien;
							$i++;
							?>
							<div class="pt-3">
								<div class=" px-3 border-bottom">
									<div class="row g-3 cart-content">
										<div class="col col-lg-8 align-self-center pd-0 ml-3 cart-item">
											<div class=" row g-3s mb-3 cart-name">
												<div class="col-auto mb-0 pt-0 pb-0 cart-img">
													<div class=" img"><img
															src="admin/modules/qlsp/uploads/<?php echo $cart_item['pdt_img']; ?>"
															width="112">
													</div>
												</div>
												<div class="col cart-title info-mobile">
													<h4 class="">
														<?php echo $cart_item['pdt_name']; ?>
													</h4>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg align-self-center text-center f-impor cart-pay">
											<div class=" mb-2 cart-price">
												<?php echo number_format($thanhtien, 0, ',', '.'); ?>&nbsp;₫
											</div>
											<div class="">
												<div class="">
													<div class="input-group mx-auto cart-quan mr-56 text-muted">
														Số lượng:
														<?php echo $cart_item['soluong']; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>
						<?php
					} else {
						?>
						<div class="border cart-empty">
							<div class="col-xl-5 mx-auto text-center my-5 empty-mobile">
								<h2 class="mb-3 ">Chưa có sản phẩm!</h2>
								<p class="img mb-3"><img src="images/empty-img.png" alt="" /></p>
								<a class="btn btn-danger w-100 m-0 fs-16" type="button" href="index.php">Tiếp tục mua
									hàng</a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<!-- giỏ hàng trống -->
			<!-- giỏ hàng trống -->
		</div>
		<div class="col-12 col-lg-4">
			<div class="cart-sale">
				<h3 class=" px-3s py-1 bg-light text-center rounded-1 mb-3 ">
					Thông tin thanh toán</h3>
				<ul class="list-unstyled">
					<li><a class="d-flex align-items-center py-1 fs-18" href="#"><strong class="pe-2">Phương thức thanh
								toán</strong><span class="text-gray"></span><i
								class=" fas fa-chevron-right ms-auto"></i></a>
					</li>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="Tiền mặt"
							checked>
						<label class="form-check-label" for="exampleRadios1">
							Tiền mặt
						</label>
					</div>
					<div class="form-check my-2">
						<input class="form-check-input" type="radio" name="payment" id="exampleRadios2"
							value="Chuyển khoản">
						<label class="form-check-label" for="exampleRadios2">
							Chuyển khoản
						</label>
					</div>
					<li><a class="d-flex align-items-center py-1 fs-18" href="#"><strong class="pe-2">In
								hoá đơn</strong><span class="text-gray"></span><i
								class=" fas fa-chevron-right ms-auto"></i></a>
					</li>
				</ul>
				<div class="mb-2 fs-18"><a class="align-items-center py-1" href=""><strong class="pe-2">Thời gian giao
							hàng</strong></a></div>
				<div class="border px-3 p-2">
					<div><i class="icons icon-truck w-20 me-2"></i><strong class="me-2">Giao hàng tiêu chuẩn</strong>-
						Dự
						kiến giao hàng:<strong class="d-block text-red mt-2">18:00 - 20:00 Hôm nay</strong></div>
				</div>
				<dl class="row g-3s mb-0 mt-4">
					<dt class="col-7 fw-normal text-black-50 mb-2 pb-0 pt-0 fs-16">Tổng giá trị đơn hàng</dt>
					<dd class="col-5 text-end mb-2 pb-0 pt-0"><strong class="fs-16">
							<?php if (isset($_SESSION['cart']))
								echo number_format($tongtien, 0, ',', '.');
							else
								echo 0 ?> ₫
							</strong></dd>
						<dt class="col-7 fw-normal text-black-50 mb-2 pb-0 pt-0 fs-16">Phí vận chuyển</dt>
						<dd class="col-5 text-end mb-2 pb-0 pt-0"><strong class="fs-16">0 ₫</strong></dd>
					</dl>
					<div class="row g-3s mb-4s cart-price-title">
						<div class="col align-self-center cart-price pb-0 pt-0">Thành tiền</div>
						<div class="col text-end text-danger cart-price pb-0 pt-0">
						<?php if (isset($_SESSION['cart']))
								echo number_format($tongtien, 0, ',', '.');
							else
								echo 0 ?> ₫
						</div>
					</div>
					<div class="">

						<?php
							if (isset($_SESSION['dangky'])) {
								?>
						<div class="container p-0">
							<a>
								<button class="btn btn-danger w-100 m-0 fs-16" type="submit">
									Thanh toán
								</button>
							</a>
						</div>
						<?php
							} else {
								?>
						<div class="container px-2">
							<a href="index.php?quanly=dangky">
								<button class="btn btn-danger w-100 m-0 fs-16" type="button">
									Đăng ký đặt hàng
								</button>
							</a>
						</div>
						<?php
							}
							?>
				</div>
			</div>
		</div>
	</div>
</form>