<style>
	.side_len{
		max-height:200px;
		overflow-y: auto;			
	}
	.brands_products{
					margin-bottom: 30px !important;
	}
					
</style>

<div class="col-sm-3">
<div class="left-sidebar">
	
	<div class="brands_products"><!--category_products-->
        <h2>Category</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked side_len">
					<?php foreach($cate as $Key1 => $row1){ ?>
					<li>
					<input type="checkbox" name="sr_prod[]" class="cat_sel ser_br" id="cat_<?php echo $Key1;?>" value="<?php echo $row1->cat_id;?>" <?php if(!empty($cid)){if(in_array($row1->cat_id, $cid)){echo "Checked";}}?>> <span class="pull-right"></span> <?php echo $row1->cat_name; ?></input>
					</li>
					<?php } ?>	
			</ul>
		</div>
	</div><!--/category_products-->
	<div class="brands_products"><!--brands_products-->
		<h2>Brands</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked side_len">
					<?php foreach($brnd as $Key2 =>  $row2){ ?>
					<li>
					<input type="checkbox" name="sr_brand" class="brnd_sel ser_br" id="brand_<?php echo $Key2;?>" value="<?php echo $row2->id;?>" <?php if(!empty($bid)){if(in_array($row2->id, $bid)){echo "Checked";}}?>> <span class="pull-right"></span> <?php echo $row2->brand_name;	?></input>
					</li>
					<?php } ?>	
			</ul>
		</div>
	</div><!--/brands_products-->
	<div class="brands_products"><!--price-range-->
        <h2>Price Range</h2>
		<div class="brands-name">
			<ul class="nav nav-pills nav-stacked side_len">
					
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_1" value="1_3000" <?php if(!empty($pid)){if(in_array("1_3000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> Below - 3000</input></li>
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_2" value="3001_5000" <?php if(!empty($pid)){if(in_array("3001_5000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> 3000 - 5000</li>
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_3" value="5001_7000" <?php if(!empty($pid)){if(in_array("5001_7000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> 5000 - 7000</li>
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_4" value="7001_10000" <?php if(!empty($pid)){if(in_array("7001_10000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> 7000 - 10000</li>
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_5" value="10001_20000" <?php if(!empty($pid)){if(in_array("10001_20000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> 10000 - 20000</li>
					<li><input type="checkbox" name="sr_price" class="pr_sel ser_br" id="srpr_6" value="20001_1500000" <?php if(!empty($pid)){if(in_array("20001_1500000", $pid)){echo "Checked";}}?>><span class="pull-right"></span> 20000 and above</li>
			</ul>
		</div>
	</div><!--/price-range-->
	
	
	
	<div class="shipping text-center"><!--shipping-->
		<img src="images/home/shipping.jpg" alt="" />
	</div><!--/shipping-->
	
</div>
</div>

