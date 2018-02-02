<?php $this->load->view('admin/includes/login_header'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="<?php echo base_url().'admin/login';?>">
                        <fieldset>
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    
<?php $this->load->view('admin/includes/login_footer'); ?>