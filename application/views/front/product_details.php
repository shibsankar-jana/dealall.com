<?php $this->load->view("front/includes/header"); ?>
<section>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">			
								<img src="<?php echo base_url().'resources/product_images/'.$prod->p_id.'/'.$pimage[0]->p_image; ?>" alt="" />
								
								<h3>ZOOM</h3>							
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
									<div class="carousel-inner">
										<?php foreach($pimage as $prow){ ?>
										<div class="item active">												
												<a href=""><img src="<?php echo base_url().'resources/product_images/'.$prod->p_id.'/'.$prow->p_image; ?>" alt="" width="70" height="70"/></a>												
										</div>									
										<?php } ?>								
									</div>								  
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
									
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo base_url();?>assets/assets_front/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $prod->p_name; ?></h2>
								<p>Web ID: 1089772</p>
								<img src="<?php echo base_url();?>assets/assets_front/images/product-details/rating.png" alt="" />
								<span>
									<span>RS-<?php echo $prod->p_sale; ?></span>
									<label>Quantity:</label>
									<input type="text" value="<?php echo $prod->quantity; ?>" readonly/>
									<a href="<?php echo base_url().'home/sess_cart/'.$prod->p_id;?>">
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
									</a>
								</span>
								<p><b>Features:</b> <?php echo $prod->features; ?></p>
								<p><b>Product Color:</b> <?php echo $prod->p_color; ?></p>
								<p><b>Product Dimension:</b> <?php echo $prod->p_dims; ?></p>
								<p><b>Discount:</b> <?php echo $prod->discount; ?></p>
								<p><b>Availability:</b> <?php echo ($prod->quantity > 0) ? "In Stock" : "Out of Stock"; ?></p>
								<p><b>Condition:</b> New</p>
								<p><b>Offer:</b> <?php echo $prod->offer; ?></p>
								<p><b>Warranty:</b> <?php echo $prod->p_war; ?></p>
								<p><b>Details:</b> <?php echo $prod->p_details; ?></p>
								<p><b>Brand:</b> <?php echo $prod->brand_name; ?></p>
								<a href=""><img src="<?php echo base_url();?>assets/assets_front/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						
						
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<!--<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>-->
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
								<div class="tab-pane fade" id="details" >
									<div class="col-sm-12" style="margin:0 20px 0 20px;">
										<?php echo $prod->p_details; ?>
									</div>
								</div>
								
								<div class="tab-pane fade" id="companyprofile" >
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery4.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-pane fade" id="tag" >
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/gallery4.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="tab-pane fade active in" id="reviews" >
									<div class="col-sm-12">
										<ul>
											<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
											<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
											<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
										<p><b>Write Your Review</b></p>
										
										<form action="#">
											<span>
												<input type="text" placeholder="Your Name"/>
												<input type="email" placeholder="Email Address"/>
											</span>
											<textarea name="" ></textarea>
											<b>Rating: </b> <img src="<?php echo base_url();?>assets/assets_front/images/product-details/rating.png" alt="" />
											<button type="button" class="btn btn-default pull-right">
												Submit
											</button>
										</form>
									</div>
								</div>
								
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url();?>assets/assets_front/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php $this->load->view("front/includes/footer"); ?>

</head>


<script>
window.onload = function(){zoom(1)}


function zoom(zm) {
img=document.getElementById("pic")
wid=img.width
ht=img.height
img.style.width=(wid*zm)+"px"
img.style.height=(ht*zm)+"px"
	img.style.marginLeft = -(img.width/2) + "px";
	img.style.marginTop = -(img.height/2) + "px";
}

</script>