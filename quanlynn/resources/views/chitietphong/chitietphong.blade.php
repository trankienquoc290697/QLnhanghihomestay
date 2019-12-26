<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tour Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<base href="{{asset('')}}">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('tourcss/css/animate.css')}}"> 
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('tourcss/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('tourcss/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('tourcss/css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('tourcss/css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('tourcss/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('tourcss/css/owl.theme.default.min.css')}}">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('tourcss/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('tourcss/fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('tourcss/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('tourcss/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>

	<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="http://localhost:8888/quanlynn1/quanlynn/public/homepage">Tour</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="http://localhost:8888/quanlynn1/quanlynn/public/homepage">Home</a></li>
								<li class="has-dropdown">
									<a href="tours.html">Tours</a>
									<ul class="dropdown">
										<li><a href="#">Destination</a></li>
										<li><a href="#">Cruises</a></li>
										<li><a href="#">Hotels</a></li>
										<li><a href="#">Booking</a></li>
									</ul>
								</li>
								<li class="active"><a href="hotels.html">Hotels</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/dl.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h1>Hotel Overview</h1>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box">
										<h2>Thông tin phòng</h2>
									</div>
									<div class="row">
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img">
															<img src="{{ asset('images/'.$phong->hinhanh) }}"style="width: 395px; height: 260px">
														</div>
													</div>
													<div class="col-md-6 col-sm-6">
														<div class="desc">
															<h2> @if($phong->tenphong == 0)
																<td>Phòng đơn</td>
																@elseif($phong->tenphong == 1)
																<td>Phòng đôi</td>
																@elseif($phong->tenphong == 2)
																<td>Phòng 3 người</td>
																@else
																<td>Phòng 4 người</td>
															@endif</h2>
															<p class="price"><span>{{$phong->dongia}}</span> <small>/ đêm</small></p>
															
															<p>{{$phong->tentiennghi}}</p>
															<p>Máy sấy</p>
															<p>Bồn tắm</p>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- SIDEBAR-->
					<div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side search-wrap animate-box">
								<h3 class="sidebar-heading">Thông tin đặt phòng</h3>
								<form  class="colorlib-form" action="{{route('storect')}}" method="POST">

									<div class="row">
										<form >
											@csrf
											<div class="col-md-12">

												<div class="form-group">
													<label for="date"></label>
													<input class="form-control" type="hidden" name="phong" value="{{Request()->id}}" readonly="readonly">
												</div>
											</div>
											
											<div class="col-md-12">

												<div class="form-group">
													<label for="date">Tên:</label>
													<input class="form-control" name="ten" />
												</div>
											</div>
											<div class="col-md-12">

												<div class="form-group">
													<label for="date">Đơn giá (/Đêm):</label>
													<input class="form-control" name="dongia" value="{{$phong->dongia}}" readonly="readonly">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="date">Ngày nhận :</label>
													<div class="form-field">
														
														<input type="date" id="date" name="ngaynhan" class="form-control" placeholder="Ngày nhận">
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="date">Ngày trả:</label>
													<div class="form-field">
														
														<input type="date" id="date" name="ngaytra" class="form-control" placeholder="Ngày trả">
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="ngay">Địa chỉ:</label>
													<div class="form-field">
														<input class="form-control" name="diachi" />
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label for="ngay">Hình thức thanh toán:</label><br>
													<input type="radio" name="" value=""> Tiền mặt<br>
													<input type="radio" name="" value=""> Chuyển khoản<br>
												</div>
											</div>
											<div class="col-md-12">
												
												<input type="submit" name="submit" id="submit" value="Đặt phòng" class="btn btn-primary btn-block">
											</form>
										</div>
									</form>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
					<h2>Sign Up for a Newsletter</h2>
					<p>Sign up for our mailing list to get latest updates and offers.</p>
					<form class="form-inline qbstp-header-subscribe">
						<div class="row">
							<div class="col-md-12 col-md-offset-0">
								<div class="form-group">
									<input type="text" class="form-control" id="email" placeholder="Enter your email">
									<button type="submit" class="btn btn-primary">Subscribe</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<footer id="colorlib-footer" role="contentinfo">
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-3 colorlib-widget">
					<h4>Tour Agency</h4>
					<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p>
						<ul class="colorlib-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-2 colorlib-widget">
					<h4>Book Now</h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Flight</a></li>
							<li><a href="#">Hotels</a></li>
							<li><a href="#">Tour</a></li>
							<li><a href="#">Car Rent</a></li>
							<li><a href="#">Beach &amp; Resorts</a></li>
							<li><a href="#">Cruises</a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-2 colorlib-widget">
					<h4>Top Deals</h4>
					<p>
						<ul class="colorlib-footer-links">
							<li><a href="#">Edina Hotel</a></li>
							<li><a href="#">Quality Suites</a></li>
							<li><a href="#">The Hotel Zephyr</a></li>
							<li><a href="#">Da Vinci Villa</a></li>
							<li><a href="#">Hotel Epikk</a></li>
						</ul>
					</p>
				</div>
				<div class="col-md-2">
					<h4>Blog Post</h4>
					<ul class="colorlib-footer-links">
						<li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
						<li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
						<li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
					</ul>
				</div>

				<div class="col-md-3 col-md-push-1">
					<h4>Contact Information</h4>
					<ul class="colorlib-footer-links">
						<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
						<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
						<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
						<li><a href="#">yoursite.com</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
						<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
					</p>
				</div>
			</div>
		</div>
	</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('tourcss/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('tourcss/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('tourcss/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('tourcss/js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('tourcss/js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('tourcss/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('tourcss/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('tourcss/js/magnific-popup-options.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('tourcss/js/bootstrap-datepicker.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('tourcss/js/jquery.stellar.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('tourcss/js/main.js')}}"></script>

</body>
</html>

