<?php $this->load->view("front/includes/header"); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<!--<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div>--><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<!--<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div>
					-->
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one" style="width:30%;">
								<form>
									<input type="text" placeholder="Name *" value="<?php echo $user->name; ?>">
									<textarea rows="3" cols="40" input type="text" placeholder="Address 1 "><?php echo $user->address; ?></textarea>
									<input type="text" placeholder="Zip / Postal Code *" value="<?php echo $user->city; ?>" style="margin-top: 11px;">
									
								</form>
							</div>
							<div class="form-two" style="width:30%;">
								<form>
									
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<input type="text" placeholder="Zip / Postal Code *" value="<?php echo $user->pin_code; ?>">
									<input type="text" placeholder="Email*" value="<?php echo $user->email; ?>">
									<input type="text" placeholder="Mobile Phone" value="<?php echo $user->phone; ?>">
								</form>
							</div>
							<div class="form-two" style="width:30%;">
								<form>
									<textarea rows="8" cols="40" input type="text" placeholder="Notes about your order, Special Notes for Delivery"></textarea>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>	
					</div>
					<div class="col-sm-8">
						<div class="order-message">
							<button type="button" class="btn btn-info btn-sm pull-right" name="" value=""><strong>Continue</strong></button>
						</div>	
					</div>	
				</div>
			</div>
			<div style=""></div>
			<!--<div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div>-->
		</div>
	</section> <!--/#cart_items-->

	

	
<?php $this->load->view("front/includes/footer"); ?>