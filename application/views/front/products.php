<?php $this->load->view("front/includes/header"); ?>
	
	
	<section id="advertisement">
		<div class="container">
			<img src="<?php echo base_url();?>assets/assets_front/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				
				<!-- Left sidebar for filtering products -->
				<?php $this->load->view("front/includes/product_sidebar"); ?>
				<!-- End Left sidebar -->
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						
						<?php foreach($prods as $row){ ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="<?php echo base_url().'home/product_details/'.$row->p_id; ?>" style="text-decoration: none;">
											<img src="<?php echo base_url().'resources/product_images/'.$row->p_id.'/'.$row->p_image; ?>" alt="" width="150" height=
											"170"/>
											<h2><?php echo $row->p_sale; ?></h2>
											<p><?php echo $row->p_name; ?></p>
											</a>											
											<a href="<?php echo base_url().'home/sess_cart/'.$row->p_id;?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="<?php echo base_url().'home/addwishlist/'.$row->p_id;?>"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
						
						
						<ul class="pagination">
							<?php echo $links;?>
							
							<!--<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>-->
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	
	
	
	
<?php $this->load->view("front/includes/footer"); ?>

<?php $this->load->view("front/includes/filter_jquery"); ?>