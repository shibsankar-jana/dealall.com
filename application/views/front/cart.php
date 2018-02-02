	<?php $this->load->view("front/includes/header"); ?>
	
		<section id="cart_items">
			<div class="container">
				<div class="breadcrumbs">
					<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active">Shopping Cart</li>
					</ol>
				</div>
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description">Name</td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td>
									<a class="cart_quantity_delete" href="<?php echo base_url().'home/products';?>">
										<button type="button" class="btn btn-info pull-right" name="" value=""><strong>Add More Item</strong></button>
									</a>
								</td>
							</tr>
						</thead>
						<tbody>
							<form id="crt_prd" action="<?php echo base_url().'home/checkout';?>" method="post">
							<?php foreach($cprod as $Key => $row){ ?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="<?php echo base_url().'resources/product_images/'.$row->p_id.'/'.$row->p_image; ?>" alt="" width="50" height="50"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $row->p_name;?></a></h4>
									<p>Web ID: <?php echo $row->bar_code;?></p>
									<input type="hidden" name="pid[]" value="<?php echo $row->p_id;?>">
								</td>
								<td class="cart_price">
									<p id="cprice_<?php echo $Key;?>"><?php echo $row->p_sale;?></p>
									<input type="hidden" name="prc[]" value="<?php echo $row->p_sale;?>">
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" id="up_<?php echo $Key;?>" href="" style="text-decoration: none;"> + </a>
										<input class="cart_quantity_input" type="text" dat_max="<?php echo $row->quantity;?>" id="qty_<?php echo $Key;?>" name="quantity[]" value="1" autocomplete="off" size="2">
										<a class="cart_quantity_down" id="down_<?php echo $Key;?>" href="" style="text-decoration: none;"> - </a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price" id="tprice_<?php echo $Key;?>"><?php echo $row->p_sale;?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="<?php echo base_url().'home/removecartitem/'.$row->sess_cart_id;?>" title="Remove Item"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php } ?>
							</form>
						</tbody>
					</table>
				</div>
			</div>
		</section> <!--/#cart_items-->
	
		<section id="do_action">
			<div class="container">
				<div class="heading">
					<h3>What would you like to do next?</h3>
					<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
				</div>
				<div class="row">
					<!--<div class="col-sm-6">
						<div class="chose_area">
							<ul class="user_option">
								<li>
									<input type="checkbox">
									<label>Use Coupon Code</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Use Gift Voucher</label>
								</li>
								<li>
									<input type="checkbox">
									<label>Estimate Shipping & Taxes</label>
								</li>
							</ul>
							<ul class="user_info">
								<li class="single_field">
									<label>Country:</label>
									<select>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									
								</li>
								<li class="single_field">
									<label>Region / State:</label>
									<select>
										<option>Select</option>
										<option>Dhaka</option>
										<option>London</option>
										<option>Dillih</option>
										<option>Lahore</option>
										<option>Alaska</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
								
								</li>
								<li class="single_field zip-field">
									<label>Zip Code:</label>
									<input type="text">
								</li>
							</ul>
							<a class="btn btn-default update" href="">Get Quotes</a>
							<a class="btn btn-default check_out" href="">Continue</a>
						</div>
					</div>-->
					<div class="col-sm-6">
						<div class="total_area">
							
							<ul>
								<li>Cart Sub Total <span id="totprice"></span></li>
								<li>Tax <span id="tax">4%</span></li>
								<li>Shipping Cost <span id="shpng"></span></li>
								<li>Total <span id="tot_amt"></span></li>
							</ul>
								<!--<a class="btn btn-default update" href="">Update</a>-->
								<!--<a class="btn btn-default check_out" id="checkout" href="<?php echo base_url().'home/checkout';?>">Check Out</a>-->
								<input type="button" class="btn btn-default check_out" id="checkout" value="Check Out">
						</div>
					</div>
				</div>
			</div>
		</section><!--/#do_action-->
	
	
	
	<?php $this->load->view("front/includes/footer"); ?>
	
	<script>
		$(document).ready(function() {
	
			var tlen = $(".cart_total_price").length;
			var i=0;var totprice = 0;
			for(i=0;i<tlen;i++){
				totprice = totprice + parseFloat($("#tprice_"+i).text());
			}
			$("#totprice").text(totprice);
			
			if(totprice<500){
				$("#shpng").text("Free");
			}
			else{
				$("#shpng").text(100);
			}
			var tax = (4/100)*totprice;
			$("#tot_amt").text(tax+totprice);	
				
			$(document).on('click', '.cart_quantity_up', function(e) {
				e.preventDefault();
				var full_id = $(this).attr("id").split("_");
				var prt_id = full_id[1];
				var max = parseInt($("#qty_"+prt_id).attr("dat_max"));
				
				var qty = parseInt($("#qty_"+prt_id).val());
				var cprice = parseFloat($("#cprice_"+prt_id).text());
				
				if (qty<max){
					qty = qty+1
					$("#qty_"+prt_id).val(qty);
					$("#tprice_"+prt_id).html((cprice*qty).toFixed(2));
					
				}
				
				var tlen = $(".cart_total_price").length;
				var i=0;var totprice = 0;
				for(i=0;i<tlen;i++){
					totprice = totprice + parseFloat($("#tprice_"+i).text());
				}
				$("#totprice").text(totprice);
				
				if(totprice<500){
                    $("#shpng").text("Free");
                }
				else{
					$("#shpng").text(100);
				}
				
				var tax = (4/100)*totprice;
				$("#tot_amt").text(tax+totprice);
				
			});
			
			$(document).on('click', '.cart_quantity_down', function(e) {
				e.preventDefault();
				var full_id = $(this).attr("id").split("_");
				var prt_id = full_id[1];
				var max = parseInt($("#qty_"+prt_id).attr("dat_max"));
				
				var qty = parseInt($("#qty_"+prt_id).val());
				var cprice = parseFloat($("#cprice_"+prt_id).text());
				
				if (qty>1){
					qty = qty-1
					$("#qty_"+prt_id).val(qty);
					$("#tprice_"+prt_id).html((cprice*qty).toFixed(2));
				}
				
				var tlen = $(".cart_total_price").length;
				var i=0;var totprice = 0;
				for(i=0;i<tlen;i++){
					totprice = totprice + parseFloat($("#tprice_"+i).text());
				}
				$("#totprice").text(totprice);
				if(totprice<500){
                    $("#shpng").text("Free");
                }
				else{
					$("#shpng").text(100);
				}
				var tax = (4/100)*totprice;
				$("#tot_amt").text(tax+totprice);
				
			});
			
			
			$(document).on('click', '#checkout', function(e){
				
				$('#crt_prd').submit();
				
			});
	
		});
		
	</script>	