<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<link rel="shortcut icon" type="image/x-icon" href="slc.ico">

	<!-- Stylesheets
	============================================= -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" /> -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url() ?>style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/magnific-popup.css" type="text/css" />

	<!-- Star Rating CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/components/bs-rating.css" type="text/css" />

	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>include/rs-plugin/css/settings.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>include/rs-plugin/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>include/rs-plugin/css/navigation.css">

	<!-- Bootstrap File Upload CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/components/bs-filestyle.css" type="text/css" />

	<!-- Bootstrap Data Table Plugin -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/components/bs-datatable.css" type="text/css" />







	<!-- Document Title
	============================================= -->

	<style>
		.revo-slider-emphasis-text {
			font-size: 58px;
			font-weight: 700;
			letter-spacing: 1px;
			font-family: 'Sarabun', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Sarabun', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Sarabun', sans-serif;
		}

		.tp-video-play-button {
			display: none !important;
		}

		.tp-caption {
			white-space: nowrap;
		}


		/* thai */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aAFJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0E01-0E5B, U+200C-200D, U+25CC;
		}

		/* vietnamese */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBpJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
		}

		/* latin-ext */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBtJn2QN.woff2') ?>) format('woff2');
			unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
		}

		/* latin */
		@font-face {
			font-family: 'Sarabun';
			font-style: normal;
			font-weight: 400;
			font-display: swap;
			src: local('Sarabun Regular'), local('Sarabun-Regular'), url(<?= base_url('assets/fonts/DtVjJx26TKEr37c9aBVJnw.woff2') ?>) format('woff2');
			unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
		}

		* {
			font-family: 'Sarabun', sans-serif;
		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		label {
			font-family: 'Sarabun', sans-serif !important;
		}

		body {
			font-size: .85rem !important;
		}

		.form-control {
			font-size: .85rem !important;
		}

		.process-steps li h5 {
			font-size: .85rem !important;
		}

		.col-search-input {
			width: 100% !important;
		}
	</style>


</head>

<?= getModal() ?>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar">
			<div class="container">

				<div class="row justify-content-between align-items-center">
					<div class="col-12 col-md-auto">
						<!-- <p class="mb-0 py-2 text-center text-md-left"><strong>Call:</strong> 1800-547-2145 | <strong>Email:</strong> info@canvas.com</p> -->
					</div>

					<div class="col-12 col-md-auto">

						<!-- Top Links
						============================================= -->
						<div class="top-links on-click">
							<ul class="top-links-container">
								<!-- <li class="top-links-item"><a href="#">USD</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#">EUR</a></li>
										<li class="top-links-item"><a href="#">AUD</a></li>
										<li class="top-links-item"><a href="#">GBP</a></li>
									</ul>
								</li> -->
								<!-- <li class="top-links-item"><a href="#">EN</a>
									<ul class="top-links-sub-menu">
										<li class="top-links-item"><a href="#"><img src="<?= base_url('assets/') ?>images/icons/flags/french.png" alt="French"> FR</a></li>
										<li class="top-links-item"><a href="#"><img src="<?= base_url('assets/') ?>images/icons/flags/italian.png" alt="Italian"> IT</a></li>
										<li class="top-links-item"><a href="#"><img src="<?= base_url('assets/') ?>images/icons/flags/german.png" alt="German"> DE</a></li>
									</ul>
								</li> -->


								<input hidden type="text" name="checkpage" id="checkpage" value="<?= $this->uri->segment(1) ?>">
								<input hidden type="text" name="checkecode" id="checkecode" value="<?= getUser()->ecode ?>">
								<input hidden type="text" name="checkdeptcode" id="checkdeptcode" value="<?= getUser()->DeptCode ?>">
								<input hidden type="text" name="checkperg" id="checkperg" value="<?= getUserPerGroup(getUser()->ecode) ?>">


								<li id="nonelogin" class="top-links-item"><a href="#">เข้าสู่ระบบ</a>
									<div class="top-links-section">
										<form id="top-login" autocomplete="off">
											<div class="form-group">
												<label>ชื่อผู้ใช้งาน</label>
												<input type="text" class="form-control" placeholder="Username">
											</div>
											<div class="form-group">
												<label>รหัสผ่าน</label>
												<input type="password" class="form-control" placeholder="Password" required="">
											</div>
											<div class="form-group form-check">
												<input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
												<label class="form-check-label" for="top-login-checkbox">จดจำฉัน</label>
											</div>
											<button class="btn btn-danger btn-block" type="submit">เข้าสู่ระบบ</button>
										</form>
									</div>
								</li>


								<li style="display:none;" id="loginalready" class="top-links-item">
									<a href="#"><?=alertWaitApp()?> สวัสดีคุณ <?= getUser()->Fname . " " . getUser()->Lname ?></a>
									<ul class="top-links-sub-menu subMenuArea">

										<li class="top-links-item">
											<a href="#" data-toggle="modal" data-target="#md_waitpublishOwner" id="waitOwner"><span class="txtWaitApp">รายการรอตรวจสอบ</span> ( <span class="countTxt"><?=getuserWaitdata(getUser()->ecode)?></span> )
											</a>
										</li>

										<li class="top-links-item">
											<a href="#" data-toggle="modal" data-target="#md_waitpublishOwner" id="pubOwner"><span class="txtDataPub">รายการที่เผยแพร่</span> ( <span class="countTxtPub"><?=getuserWaitdataPub(getUser()->ecode)?></span> )
											</a>
										</li>

										<li class="top-links-item">
											<a href="#" data-toggle="modal" data-target="#md_waitpublishOwner" id="canOwner"><span class="txtDataCan">รายการถูกยกเลิก</span> ( <span class="countTxtCan"><?=getuserWaitdataCan(getUser()->ecode)?></span> )
											</a>
										</li>

										<li class="top-links-item">
											<a href="#" data-toggle="modal" data-target="#md_waitpublishOwner" id="totalOwner">
												<span class="txtDataTotal">รายการโพสต์ทั้งหมด</span> ( <span class="countTxtDataAll"><?=getuserWaitdataTotal(getUser()->ecode)?></span> )
											</a>
										</li>

										<li class="top-links-item"><a href="<?= base_url('login/logout') ?>" class="txtLogout" onclick="return confirm('คุณต้องการลงชื่อออกจากระบบใช่หรือไม่ ?')"><i class="icon-line-log-out iconLogout"></i>ออกจากระบบ</a></li>
									</ul>

									<!-- <div class="top-links-section">
										<a href=""><span>รายการรอตรวจสอบ</span></a>
										<a href="<?= base_url('login/logout') ?>"><button onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่')" class="btn btn-danger btn-block" type="submit">ออกจากระบบ</button></a>
									</div> -->

								</li>

							</ul>
						</div><!-- .top-links end -->

					</div>
				</div>

			</div>
		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="index.html" class="standard-logo" data-dark-logo="<?= base_url('assets/') ?>images/logo-dark.png"><img src="<?= base_url('assets/') ?>images/kb3.png" alt="Canvas Logo"></a>
							<a href="index.html" class="retina-logo" data-dark-logo="<?= base_url('assets/') ?>images/logo-dark@2x.png"><img src="<?= base_url('assets/') ?>images/kb3.png" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<!-- <div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
                            </div> -->
							<!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<!-- <div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>Shopping Cart</h4>
									</div>
									<div class="top-cart-items">
										<div class="top-cart-item">
											<div class="top-cart-item-image">
												<a href="#"><img src="<?= base_url('assets/') ?>images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
											</div>
											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#">Blue Round-Neck Tshirt with a Button</a>
													<span class="top-cart-item-price d-block">$19.99</span>
												</div>
												<div class="top-cart-item-quantity">x 2</div>
											</div>
										</div>
										<div class="top-cart-item">
											<div class="top-cart-item-image">
												<a href="#"><img src="<?= base_url('assets/') ?>images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
											</div>
											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#">Light Blue Denim Dress</a>
													<span class="top-cart-item-price d-block">$24.99</span>
												</div>
												<div class="top-cart-item-quantity">x 3</div>
											</div>
										</div>
									</div>
									<div class="top-cart-action">
										<span class="top-checkout-price">$114.95</span>
										<a href="#" class="button button-3d button-small m-0">View Cart</a>
									</div>
								</div>
                            </div> -->
							<!-- #top-cart end -->

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100">
								<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
								<path d="m 30,50 h 40"></path>
								<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
							</svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu mobile-menu-off-canvas">

							<ul class="menu-container">
								<li id="m_home" class="menu-item"><a class="menu-link" href="<?= base_url() ?>">
										<div>หน้าหลัก</div>
									</a></li>
								<!-- Mega Menu
								============================================= -->
								<li id="m_add" class="menu-item"><a class="menu-link" href="<?= base_url('listdata.html') ?>">
										<div>คลังข้อมูลของเรา</div><span>Latest News</span>
									</a>

								</li>
								<li id="m_list" class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#">
										<div>คลังข้อมูลแต่ละแผนก</div>
									</a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="sub-menu-container mega-menu-column col-lg-12">

													<ul class="sub-menu-container">
														<!-- <li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
                                                            <li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li> -->
														<?= getDept(getUser()->DeptCode) ?>
													</ul>

												</ul>
											</div>
										</div>
									</div>
								</li><!-- .mega-menu end -->
								<!-- <li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#"><div>วิธีการใช้งาน</div></a>
									<div class="mega-menu-content mega-menu-style-2">
										<div class="container">
											<div class="row">
												<ul class="sub-menu-container mega-menu-column col-lg-6">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li>
														</ul>
													</li>
												</ul>
												<ul class="sub-menu-container mega-menu-column col-lg-6">
													<li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Clothing</div></a>
														<ul class="sub-menu-container">
															<li class="menu-item"><a class="menu-link" href="#"><div>Casual Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Collared Tees</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Pants / Trousers</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Ethnic Wear</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Jeans</div></a></li>
															<li class="menu-item"><a class="menu-link" href="#"><div>Sweamwear</div></a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</div>
                                </li> -->
								<!-- .mega-menu end -->
								<!-- <li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div><span>Awesome Works</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>Sale</div><span>Awesome Works</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>Blog</div><span>Latest News</span></a></li>
								<li class="menu-item"><a class="menu-link" href="#"><div>Videos</div><span>Latest News</span></a></li>
                                <li class="menu-item"><a class="menu-link" href="#"><div>Contact</div><span>Get In Touch</span></a></li> -->
								<li id="m_manual" class="menu-item"><a class="menu-link" href="#">
										<div>วิธีการใช้งาน</div><span>Latest News</span>
									</a></li>

							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="search.html" method="get">
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->