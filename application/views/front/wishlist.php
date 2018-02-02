	<?php $this->load->view("front/includes/header"); ?>
	
		<section id="cart_items">
			<div class="container">
				<div class="breadcrumbs">
					<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li class="active">Wishlist</li>
					</ol>
				</div>
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description">Name</td>
								<td class="price">Price</td>
								<td class="quantity" align="center">Available Quantity</td>
								<td class="total">Total</td>
								<td>
									&nbsp;
								</td>
							</tr>
						</thead>
						<tbody>
							<?php foreach($cprod as $Key => $row){ ?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="<?php echo base_url().'resources/product_images/'.$row->p_id.'/'.$row->p_image; ?>" alt="" width="50" height="50"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $row->p_name;?></a></h4>
									<p>Web ID: <?php echo $row->bar_code;?></p>
								</td>
								<td class="cart_price">
									<p id="cprice_<?php echo $Key;?>"><?php echo $row->p_sale;?></p>
								</td>
								<td class="cart_quantity" align="center">
									<p class="cart_total_price"><?php echo $row->quantity;?></p>
								</td>
								<td class="cart_total">
									<p class="cart_total_price" id="tprice_<?php echo $Key;?>"><?php echo $row->p_sale;?></p>
								</td>
								<td class="cart_delete">
									<a class="cart_quantity_delete" href="<?php echo base_url().'home/removewishlistitem/'.$row->wid;?>" title="Remove Item"><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</section> <!--/#cart_items-->
	
	<?php $this->load->view("front/includes/footer"); ?>
	
	<script>
		$(document).ready(function() {
	
			var tlen = $(".cart_total_price").length;
			var i=0;var totprice = 0;
			for(i=0;i<tlen;i++){
				totprice = totprice + parseFloat($("#tprice_"+i).text());
			}
			$("#totprice").text(totprice);
		
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
				
			});
	
		});
		
	</script>	