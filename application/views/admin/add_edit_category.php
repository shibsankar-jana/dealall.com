<?php $this->load->view('admin/includes/header'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view('admin/includes/menu'); ?>
    <!-- Navigation -->
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php if(!empty($cate)){ ?>
                    <div class="panel-heading">
                        Edit Category
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/editCategory/'.$cate->cat_id;?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text" name="cat_name" id="" value="<?php echo $cate->cat_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group">
                                        <img src="<?php echo base_url().'category_images/'.$cate->cat_name.'/'.$cate->cat_image;?>" width="60" height="60">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" name="c_image" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="edit_cate" value="Save">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </form>
                    <?php }else{ ?>
                    <div class="panel-heading">
                        Add Category
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/addCategory';?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input class="form-control" type="text" name="cat_name" id="" value="<?php echo $this->input->post("cat_name"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" name="c_image" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="add_cate" value="Save">
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