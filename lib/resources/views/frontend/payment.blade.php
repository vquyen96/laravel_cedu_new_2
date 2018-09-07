@extends('frontend.master')
@section('title','Thanh toán')
@section('main')
<link rel="stylesheet" type="text/css" href="css/payment.css">

<div >
	<div class="paymentHeader">
		<div class="paymentHeaderMain">
			<div class="headerCircle paymentHeaderLogin done"><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLinePayment done"></div>
			<div class="headerCircle paymentHeaderPayment active"><i class="fa fa-check" aria-hidden="true"></i></div>
			<div class="headerLine paymentHeaderLineComplete"></div>
			<div class="headerCircle paymentHeaderComplete"><i class="fa fa-check" aria-hidden="true"></i></div>
		</div>
		<div class="paymentHeaderContent">
			<span>Đăng nhập</span>
			<span class="active">Cách thức thanh toán</span>
			<span>Xác nhận</span>
		</div>
	</div>
	<div class="container">
		<div class="paymentBody">
			<div class="row">
				<div class="col-md-6 col-sm-6 paymentBodyLeft" >
					<h3>Cách thức thanh toán</h3>
					<div class="paymentBodyLeftItem">
						<input type="radio" name="payment" id="ship" value="ship" checked>
						<div class="paymentBodyContent">
							<h4>Giao mã khóa học và thu tiền tận nơi</h4>
							<p>Cedu sẽ giao mã code(mã kích hoạt) khóa học và thu tiền tận nơi(Ship COD) tới bạn trong vòng 2-5 ngày.</p>
						</div>
					</div>
					<div class="paymentBodyLeftItem">
					  	<input type="radio" name="payment" id="online" value="online"> 
					  	<div class="paymentBodyContent">
					  		<h4>Thanh toán online</h4>
					  		<p>Thanh toán trực tiếp qua thẻ ATM hoặc Visa, Mastercard, Discover, Paypal, Bảo Kim, Ngân Lượng. Sau khi thanh toán thành công, bạn sẽ nhận được mã code qua số điện thoại và email.</p>
					  	</div>
					</div> 	
					<div class="paymentBodyLeftItem">
					  	<input type="radio" name="payment" id="office" value="office">
					  	<div class="paymentBodyContent">
					  		<h4>Thanh toán tại văn phòng</h4>
					  		<p>Sau khi thanh toán thành công tại văn phòng của Cedu bạn sẽ nhận được mã code để kích hoạt khóa học.</p>
					  	</div>
					</div> 	
				</div>
				<div class="col-md-6 col-sm-6 paymentBodyRight">
					<h3>Thông tin thanh toán</h3>
					<div class="paymentRight online">
						<div class="paymentRightHeader">
							<div class="paymentRightHeaderLogo">
								<img src="img/ic_atm.png">
							</div>
							<div class="paymentRightHeaderName">
								Thanh toán online
							</div>
						</div>
						<div>
							<a target="_blank" href="{{ asset('cart/get_ngan_luong') }}" style="clear: both;"><img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" /></a>
						</div>
						
						{{-- <div class="paymentBodyRightItem">
						  	<input type="radio" name="paymentOnline" class="choose" id="paymentATM">
						  	<div class="paymentBodyRightContent">
						  		<p>Thanh toán thẻ ATM nội địa/Internet Banking</p>
						  		<div class="tableChoose atm">
						  			
						  		</div>
						  	</div>
						  	
						</div>
						<div class="paymentBodyRightItem">
							<input type="radio" name="paymentOnline" class="choose" id="paymentVISA">
							<div class="paymentBodyRightContent">
						  		<p>Thanh toán qua Paypal</p>
						  		<div class="tableChoose visa">
						  			<form method="post" action="{{ url('payment') }}">
			  							{{csrf_field()}}
			  							<input type="submit" name="btnSbm" value="Thanh toán qua paypal" class="btn btn-primary">

			  						</form>
						  		</div>
						  	</div>
						</div>
						<div class="paymentBodyRightItem">
							<input type="radio" name="paymentOnline" class="choose" id="paymentBAOKIM">
							<div class="paymentBodyRightContent baokim">
						  		<p>Thanh toán qua Bảo Kim, Ngân Lượng</p>
						  		<div class="tableChoose baokim">
						  			<form name="Test"  method="post" action="{{ asset('cart/post_ngan_luong') }}" onsubmit="return check();">
									<table>
										<tr><th><strong>Họ Tên:</strong></th><td><input  type="text" name="txh_name" size="28" placeholder="Họ tên" /></td></tr>
										<tr><th><strong>Email:</strong></th><td><input  type="text" name="txt_email" size="28" placeholder="địa chỉ email" /></td></tr>
										<tr><th><strong>Số điện thoại:</strong></th><td><input  type="text" name="txt_phone" size="28" placeholder="Số điện thoại" /></td></tr>
										<tr><th><strong>Số tền thanh toán:</strong></th><td><input name="txt_gia" type="text" size="28" placeholder="Số tiền quyên góp" /></td></tr>	
										<tr><th></th><td><input  type="submit" name="submit" value="Thanh Toán"></td></tr>	
									</table>
									{{csrf_field()}}

									</form>
						  			
						  			<div class="btn btn-primary btnCheckOrder" >
						  				check order
						  			</div>
						  		</div>
						  	</div>
						  	
						</div> --}}

						{{-- <div class="paymentBodyRightItem">
						  	<input type="radio" name="paymentOnline" class="choose" id="paymentATM">
						  	<div class="paymentBodyRightContent">
						  		<p>Thanh toán thẻ ATM nội địa/Internet Banking</p>
						  		<div class="tableChoose atm">
						  			<div class="container-fluid">
						  				<div class="row">
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/bidv.png">
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						
						  						<div class="chooseItem">
						  							<img src="img/vietcombank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/vietinbank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/sacombank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/acb.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/vpbank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/techcombank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/martimebank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/vib.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/agribank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/scb.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/tpbank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/mbabnk.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/pvcombank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/vietbank.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/hdbank.png">	
						  						</div>
						  					</div>

						  				</div>
						  				<div class="row">
						  					<div class="col-md-12 col-sm-12">
						  						<div class="formOnline">
						  							<div class="row formOnlineItem">
							  							<div class="col-md-5">Tên in trên thẻ</div>
							  							<div class="col-md-7 inputBank" >
							  								<input type="text" name="">
							  								<div class="inputLogoBank">
							  									<img src="img/Techcombank_logo.png">
							  								</div>
							  							</div>
							  						</div>
							  						<div class="row formOnlineItem">
							  							<div class="col-md-5">Số thẻ</div>
							  							<div class="col-md-7 inputBank">
							  								<input type="text" name="">
							  								<div class="inputLogoBank">
							  									<img src="img/Techcombank_logo.png">
							  								</div>
							  							</div>
							  						</div>
							  						<div class="row formOnlineItem">
							  							<div class="col-md-5">Ngày phát hành</div>
							  							<div class="col-md-7">
							  								<input type="number" name="" value="1">
							  								/
							  								<input type="number" name="" value="2018">
							  							</div>
							  						</div>
						  						</div>
							  						
						  					</div>
						  				</div>
						  			</div>
						  		</div>
						  	</div>
						  	
						</div>
						<div class="paymentBodyRightItem">
							<input type="radio" name="paymentOnline" class="choose" id="paymentVISA">
							<div class="paymentBodyRightContent">
						  		<p>Thanh toán thẻ quốc tể Visa, Master, Paypal, JCB</p>
						  		<div class="tableChoose visa">
						  			<div class="container-fluid">
						  				<div class="row">
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/visa.png">
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						
						  						<div class="chooseItem">
						  							<img src="img/MASTERCAD.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/PAYPAL.png">	
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/jcb.png">	
						  						</div>
						  					</div>
						  				</div>
						  				
						  			</div>
						  		</div>
						  	</div>
						</div>
						<div class="paymentBodyRightItem">
							<input type="radio" name="paymentOnline" class="choose" id="paymentBAOKIM">
							<div class="paymentBodyRightContent baokim">
						  		<p>Thanh toán qua Bảo Kim, Ngân Lượng</p>
						  		<div class="tableChoose baokim">
						  			<div class="container-fluid">
						  				<div class="row">
						  					<div class="col-md-3 col-sm-3">
						  						<div class="chooseItem">
						  							<img src="img/BaoKim.png">
						  						</div>
						  					</div>
						  					<div class="col-md-3 col-sm-3">
						  						
						  						<div class="chooseItem">
						  							<img src="img/NganLuong.png">	
						  						</div>
						  						
						  					</div>
						  				</div>
						  				<div class="row">
						  					<div class="col-md-12 col-sm-12">
						  						<div class="formOnline">
						  							<div class="row formOnlineItem">
							  							<div class="col-md-5">Tên in trên thẻ</div>
							  							<div class="col-md-7 inputBank" >
							  								<input type="text" name="">
							  								<div class="inputLogoBank">
							  									<img src="img/Techcombank_logo.png">
							  								</div>
							  							</div>
							  						</div>
							  						<div class="row formOnlineItem">
							  							<div class="col-md-5">Số thẻ</div>
							  							<div class="col-md-7 inputBank">
							  								<input type="text" name="">
							  								<div class="inputLogoBank">
							  									<img src="img/Techcombank_logo.png">
							  								</div>
							  							</div>
							  						</div>
							  						<div class="row formOnlineItem">
							  							<div class="col-md-5">Ngày phát hành</div>
							  							<div class="col-md-7">
							  								<input type="number" name="" value="1">
							  								/
							  								<input type="number" name="" value="2018">
							  							</div>
							  						</div>
						  						</div>
							  						
						  					</div>
						  				</div>
						  			</div>
						  		</div>
						  	</div>
						  	<a target="_blank" href="https://www.nganluong.vn/button_payment.php?receiver=info@ceduvn.com&product_name=365987&price=10000&return_url={{ asset('cart/complete') }}&comments=test"><img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" /></a>
						</div> --}}
					</div>
					<div class="paymentRight ship">
						<div class="paymentRightHeader">
							<div class="paymentRightHeaderLogo">
								<img src="img/ic_ship.png">
							</div>
							<div class="paymentRightHeaderName">
								Giao mã khóa học và thu tiền tận nơi
							</div>
						</div>
						<div class="paymentBodyShipRightItem">
						  	<form method="post" >
						  		<div class="row formControl" >
						  			<div class="col-md-7 col-sm-7">
						  				<b>Họ và tên:</b> {{Auth::user()->name}}
						  			</div>
						  			<div class="col-md-5 col-sm-5">
										<select class="city" name="city" required="required" title="Tỉnh/ Thành phố!">
											<option disabled="" selected="" value="">Tỉnh / Thành phố</option>
											<option value="An Giang">An Giang</option>
											<option value="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>
											<option value="Bạc Liêu">Bạc Liêu</option>
											<option value="Bắc Kạn">Bắc Kạn</option>
											<option value="Bắc Giang">Bắc Giang</option>
											<option value="Bắc Ninh">Bắc Ninh</option>
											<option value="Bến Tre">Bến Tre</option>
											<option value="Bình Dương">Bình Dương</option>
											<option value="Bình Định">Bình Định</option>
											<option value="Bình Phước">Bình Phước</option>
											<option value="Bình Thuận">Bình Thuận</option>
											<option value="Cà Mau">Cà Mau</option>
											<option value="Cao Bằng">Cao Bằng</option>
											<option value="Cần Thơ">Cần Thơ</option>
											<option value="Đà Nẵng">Đà Nẵng</option>
											<option value="Đắk Lắk">Đắk Lắk</option>
											<option value="Đắk Nông">Đắk Nông</option>
											<option value="Điện Biên">Điện Biên</option>
											<option value="Đồng Nai">Đồng Nai</option>
											<option value="Đồng Tháp">Đồng Tháp</option>
											<option value="Gia Lai">Gia Lai</option>
											<option value="Hà Giang">Hà Giang</option>
											<option value="Hà Nam">Hà Nam</option>
											<option value="Hà Nội">Hà Nội</option>
											<option value="Hà Tây">Hà Tây</option>
											<option value="Hà Tĩnh">Hà Tĩnh</option>
											<option value="Hải Dương">Hải Dương</option>
											<option value="Hải Phòng">Hải Phòng</option>
											<option value="Hòa Bình">Hòa Bình</option>
											<option value="Hồ Chí Minh">Hồ Chí Minh</option>
											<option value="Hậu Giang">Hậu Giang</option>
											<option value="Hưng Yên">Hưng Yên</option>
											<option value="Khánh Hòa">Khánh Hòa</option>
											<option value="Kiên Giang">Kiên Giang</option>
											<option value="Kon Tum">Kon Tum</option>
											<option value="Lai Châu">Lai Châu</option>
											<option value="Lào Cai">Lào Cai</option>
											<option value="Lạng Sơn">Lạng Sơn</option>
											<option value="Lâm Đồng">Lâm Đồng</option>
											<option value="Long An">Long An</option>
											<option value="Nam Định">Nam Định</option>
											<option value="Nghệ An">Nghệ An</option>
											<option value="Ninh Bình">Ninh Bình</option>
											<option value="Ninh Thuận">Ninh Thuận</option>
											<option value="Phú Thọ">Phú Thọ</option>
											<option value="Phú Yên">Phú Yên</option>
											<option value="Quảng Bình">Quảng Bình</option>
											<option value="Quảng Nam">Quảng Nam</option>
											<option value="Quảng Ngãi">Quảng Ngãi</option>
											<option value="Quảng Ninh">Quảng Ninh</option>
											<option value="Quảng Trị">Quảng Trị</option>
											<option value="Sóc Trăng">Sóc Trăng</option>
											<option value="Sơn La">Sơn La</option>
											<option value="Tây Ninh">Tây Ninh</option>
											<option value="Thái Bình">Thái Bình</option>
											<option value="Thái Nguyên">Thái Nguyên</option>
											<option value="Thanh Hóa">Thanh Hóa</option>
											<option value="Thừa Thiên - Huế">Thừa Thiên - Huế</option>
											<option value="Tiền Giang">Tiền Giang</option>
											<option value="Trà Vinh">Trà Vinh</option>
											<option value="Tuyên Quang">Tuyên Quang</option>
											<option value="Vĩnh Long">Vĩnh Long</option>
											<option value="Vĩnh Phúc">Vĩnh Phúc</option>
											<option value="Yên Bái">Yên Bái</option>
										</select>
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-7 col-sm-7">
						  				<b>Email:</b> {{Auth::user()->email}}
						  			</div>
						  			<div class="col-md-5 col-sm-5">
						  				<input type="text" name="quan" placeholder="Quận/Huyện">
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-7 col-sm-7">
						  				<input type="text" name="phone" placeholder="Số điện thoại">
						  			</div>
						  			<div class="col-md-5 col-sm-5">
						  				<input type="text" name="phuong" placeholder="Phường xã">
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-12 col-sm-12">
						  				<input type="text" name="adress" placeholder="Địa chỉ">
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-12 col-sm-12">
						  				<input type="text" name="note" placeholder="Ghi chú">
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-12 col-sm-12">
						  				<h4>Miễn phí giao hàng tại Hà Nội và TP.HCM</h4>
						  			</div>
						  		</div>
						  		<div class="row formControl">
						  			<div class="col-md-4 col-sm-4 btnBack">
						  				<a href="">Hủy</a>
						  			</div>
						  			<div class="col-md-4 col-sm-4">
						  				
						  			</div>
						  			<div class="col-md-4 col-sm-4 btnSbm">
						  				<input type="submit" name="btnSubmit" value="Xác nhận" >
						  			</div>
						  		</div>
						  		{{csrf_field()}}
						  	</form>
						</div>
						
					</div>
					<div class="paymentRight office">
						<div class="paymentRightHeader">
							<div class="paymentRightHeaderLogo">
								<img src="img/ic_vanphong.png">
							</div>
							<div class="paymentRightHeaderName">
								Thanh toán tại văn phòng
							</div>
						</div>
						<div class="paymentBodyOfficeRightItem">
						  	<h3>Bạn đến trực tiếp trụ sợ công ty tại:</h3>
						  	<p>Tầng 4,5,6 Tòa nhà CPHONE Tower, Số 456 Xô Viết Nghệ Tĩnh, Phường 25, Quận Bình Thạnh, HCM.</p>
						  	<p>Tầng 5, Tòa nhè Diamond Flower, Số 1 Hoàng Đạo Thúy, Quận Thanh Xuân, Hà Nội.</p>
						  	<p>Nhân viên Cedu sẽ tận tình hướng dẫn và tư vấn cho bạn về khóa học, cách thanh toán và bạn sẽ nhận được code để kích hoạt khóa học của mình.</p>
						  	<div class="row">
						  		<div class="col-md-4 col-sm-4">
						  			
						  		</div>
						  		<div class="col-md-4 col-sm-4">
						  			
						  		</div>
						  		<div class="col-md-4 col-sm-4">
						  			<a href="" >Xác nhận</a>
						  		</div>
						  		
						  	</div>
						  	
						</div>
						
					</div>
					<div class="paymentRight card">
						<div class="paymentRightHeader">
							<div class="paymentRightHeaderLogo">
								<img src="img/ic_thantoanthe.png">
							</div>
							<div class="paymentRightHeaderName">
								Thanh toán qua thẻ cào điện thoại
							</div>
						</div>
						<div class="paymentBodyCardRightItem">
						  	<div class="row">
						  		<div class="col-md-4 col-sm-4 ">
						  			<div class="cardLogo">
						  				<img src="img/Viettel.png">
						  			</div>
						  			
						  		</div>
						  		<div class="col-md-4 col-sm-4 ">
						  			<div class="cardLogo">
						  				<img src="img/mobiphone.png">
						  			</div>
						  			
						  		</div>
						  		<div class="col-md-4 col-sm-4">
						  			<div class="cardLogo">
						  				<img src="img/vinaphone.png">
						  			</div>
						  		</div>
						  	</div>
						  	<div class="row inputControl">
						  		<div class="col-md-10">
						  			<div class="formControl">
						  				<input type="text" name="" placeholder="Mã thẻ cào">
						  			</div>
						  			<div class="formControl">
						  				<input type="text" name="" placeholder="Số seri thẻ">
						  			</div>
						  			<div class="formControl">
						  				Mã xác nhận
						  				<input type="number" name="">
						  			</div>
						  		</div>
						  	</div>
						  	<div class="row btnFoot">
						  		<div class="col-md-4 col-sm-4 btnBack">
						  			<a href="" >Hủy</a>
						  		</div>
						  		<div class="col-md-4 col-sm-4">
						  			
						  		</div>
						  		<div class="col-md-4 col-sm-4 btnSbm">
						  			<input type="submit" name="" value="Xác nhận">
						  		</div>
						  	</div>
						</div>
						
					</div>

				</div>
			</div>
		</div>
	</div>
	
	
</div>

@stop
@section('script')
<script type="text/javascript" src="js/payment.js"></script>
<script type="text/javascript">
function check(){
		var price = document.Test.txt_gia.value;
		
		if (price < 2000) {
		
		alert('Minimum amount is 2000 VNĐ');
		return false;
		}
		
	return true;	
}
</script>

@stop
