<?php $this->load->view('admin/includes/header'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view('admin/includes/menu'); ?>
    <!-- Navigation -->
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Brand</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php if(!empty($brnd)){ ?>
                    <div class="panel-heading">
                        Edit Brand
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/editBrand/'.$brnd->id;?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input class="form-control" type="text" name="brand_name" id="" value="<?php echo $brnd->brand_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <img src="<?php echo base_url().'resources/Brand_logo/'.$brnd->brand_name.'/'.$brnd->brand_logo;?>" width="60" height="60">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Brand logo</label>
                                        <input type="file" name="brand_logo" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="edit_brand" value="Save">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </form>
                    <?php }else{ ?>
                    <div class="panel-heading">
                        Add Brand
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/addBrand';?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input class="form-control" type="text" name="brand_name" id="" value="<?php echo $this->input->post("brand_name"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Brand Logo</label>
                                        <input type="file" name="brand_logo" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="add_brand" value="Save">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </form>
                
                    <?php } ?>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>



<?php $this->load->view('admin/includes/footer'); ?>