<?php $this->load->view("front/includes/header"); ?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="<?php echo base_url().'home/signup';?>" method="post">
						 <?php if($this->session->flashdata('msg_error') != ""){?>
							<div class="alert alert-danger">
								<strong><?php echo $this->session->flashdata('msg_error');?> you allready create a account .</strong> 
							</div>
							<?php } ?>
							<input type="text"name="name" id="" placeholder="Name *"/>
							<input type="email" name="email" id="" placeholder="Email Address *"/>
							<input type="text" name="phone" id="" placeholder="Mobile Number *"/>
							<input type="text" name="username" id="" placeholder="User Name *"/>												
							<input type="text" name="address" id="" placeholder=" Address *"/>
							<input type="text" name="city" id="" placeholder="City *"/>
							<input type="text" name="country" id="" placeholder="Country *"/>
							<input type="text" name="pin_code" id="" placeholder="Pin_code *"/>
							<button type="submit" name="sub" value="sub" class="btn btn-default"> Signup </button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php $this->load->view("front/includes/footer"); ?>