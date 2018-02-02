<?php $this->load->view("front/includes/header"); ?>

	<section id="form1"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-1"></div>
				<div class="col-sm-4 col-sm-offset-1" style="border: 1px solid #f0f0e9; border-radius: 5px; padding: 20px;">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="<?php echo base_url().'home/login';?>">
						 <?php if($this->session->flashdata('msg_error') != ""){?>
							<div class="alert alert-danger">
								<strong><?php echo $this->session->flashdata('msg_error');?> Either create new account .</strong> 
							</div>
							<?php } ?>
							<input type="hidden" name="ref_page" value="<?php echo (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : "";?>"/>
							<input type="text" name="username" value="" placeholder="Name" />
							<input type="Password" name="password" value="" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default" name="login" value="login">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-3 col-sm-offset-1"></div>
			</div>
		</div>
	</section><!--/form-->
	
<?php $this->load->view("front/includes/footer"); ?>