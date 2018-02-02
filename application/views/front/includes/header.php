		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>Dealall - Deal at a glance</title>
			<link href="<?php echo base_url();?>assets/assets_front/css/bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/font-awesome.min.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/prettyPhoto.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/price-range.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/animate.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/main.css" rel="stylesheet">
			<link href="<?php echo base_url();?>assets/assets_front/css/responsive.css" rel="stylesheet">
			<!--[if lt IE 9]>
			<script src="<?php echo base_url();?>assets/assets_front/js/html5shiv.js"></script>
			<script src="<?php echo base_url();?>assets/assets_front/js/respond.min.js"></script>
			<![endif]-->       
			<link rel="shortcut icon" href="images/ico/favicon.ico">
			<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/assets_front/images/ico/apple-touch-icon-144-precomposed.png">
			<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/assets_front/images/ico/apple-touch-icon-114-precomposed.png">
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/assets_front/images/ico/apple-touch-icon-72-precomposed.png">
			<link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/assets_front/images/ico/apple-touch-icon-57-precomposed.png">
		</head><!--/head-->
		<header id="header"><!--header-->
				<div class="header_top"><!--header_top-->
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="contactinfo">
									<ul class="nav nav-pills">
										<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
										<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="social-icons pull-right">
									<ul class="nav navbar-nav">
										<!--src="http://www.youtube.com/v/XGSy3_Czz8k"
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
										<li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
										<li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="http://www.google.com"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div><!--/header_top-->
				
				<div class="header-middle"><!--header-middle-->
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<div class="logo pull-left">
									<a href="index.html"><img src="<?php echo base_url();?>assets/assets_front/images/home/logo.png" alt="" /></a>
								</div>
								<!--<div class="btn-group pull-right">-->
								<!--	<div class="btn-group">-->
								<!--		<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
								<!--			USA-->
								<!--			<span class="caret"></span>-->
								<!--		</button>-->
								<!--		<ul class="dropdown-menu">-->
								<!--			<li><a href="#">Canada</a></li>-->
								<!--			<li><a href="#">UK</a></li>-->
								<!--		</ul>-->
								<!--	</div>-->
								<!--	-->
								<!--	<div class="btn-group">-->
								<!--		<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
								<!--			DOLLAR-->
								<!--			<span class="caret"></span>-->
								<!--		</button>-->
								<!--		<ul class="dropdown-menu">-->
								<!--			<li><a href="#">Canadian Dollar</a></li>-->
								<!--			<li><a href="#">Pound</a></li>-->
								<!--		</ul>-->
								<!--	</div>-->
								<!--</div>-->
							</div>
							
							<div class="col-sm-8">
								
								<div class="shop-menu pull-right">
									<ul class="nav navbar-nav">
										<li>
												<?php if($this->session->userdata("is_logged_in") == 1){ ?>
												<a href="<?php echo base_url().'home/wishlist';?>"><i class="fa fa-star"></i> Wishlist</a>
												<?php }else{ ?>
												<a href="<?php echo base_url().'home/login';?>"><i class="fa fa-star"></i> Wishlist</a>
												<?php } ?>	
												
										</li>
										<li>
												<?php if($this->session->userdata("is_logged_in") == 1){ ?>
												<a href="<?php echo base_url().'home/cart';?>"><i class="fa fa-shopping-cart"></i> Cart</a>
												<?php }else{ ?>
												<a href="<?php echo base_url().'home/login';?>"><i class="fa fa-shopping-cart"></i> Cart</a>
												<?php } ?>		
										</li>
										<li><a href="<?php echo base_url().'home/products';?>"> Account</a></li> 
										<li>
										</li>
										<li><a href="<?php echo base_url().'home/signup';?>"> Signup</a></li> 
										<li>
												<?php if($this->session->userdata("is_logged_in") == 1){ ?>
												<a href="<?php echo base_url().'home/logout';?>">Logout</a>
												<?php }else{ ?>
												
												<a href="<?php echo base_url().'home/login';?>">Login</a>
												<?php } ?>										
										</li> 
									</ul>
									
								</div>
							</div>
						</div>
					</div>
				</div><!--/header-middle-->
			
				<div class="header-bottom"><!--header-bottom-->
					<div class="container">
						<div class="row">
							<div class="col-sm-9">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="mainmenu pull-left">
									<ul class="nav navbar-nav collapse navbar-collapse">
										<li><a href="<?php echo base_url().'home/home';?>" class="active">Home</a></li>
										<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
											<ul role="menu" class="sub-menu">
												<li><a href="<?php echo base_url().'home/products';?>">Products</a></li>
												
												<li><a href="<?php echo base_url().'home/checkout';?>">Checkout</a></li> 
												<li>
														<?php if($this->session->userdata("is_logged_in") == 1){ ?>
																<a href="<?php echo base_url().'home/cart';?>">Cart</a>
														<?php }else{ ?>
																<a href="<?php echo base_url().'home/login';?>">Cart</a>
														<?php } ?>
												</li>
												
											</ul>
										</li> 
										<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
											<ul role="menu" class="sub-menu">
												<li><a href="<?php echo base_url().'home/blog';?>">Blog List</a></li>
												<li><a href="<?php echo base_url().'home/blog_single';?>">Blog Single</a></li>
											</ul>
										</li> 
										<li><a href="<?php echo base_url().'home/error_page';?>">404</a></li>
										<li><a href="<?php echo base_url().'home/contact_us';?>">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="search_box pull-right ">
									<input type="text" placeholder="Search"/>
								</div>
							</div>
						</div>
					</div>
				</div><!--/header-bottom-->
			</header><!--/header-->
			