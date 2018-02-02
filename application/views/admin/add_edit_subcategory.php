<?php $this->load->view('admin/includes/header'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view('admin/includes/menu'); ?>
    <!-- Navigation -->
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Subcategory</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php if(!empty($scate)){ ?>
                    <div class="panel-heading">
                        Edit Subcategory
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/editSubcategory/'.$scate->s_id;?>">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="cat_id">
                                            <option value="">Select Category</option>
                                            <?php foreach($cate as $category){ ?>
                                            <option value="<?php echo $category->cat_id; ?>" <?php echo ($category->cat_id == $scate->cat_id) ? "selected" : "";?>><?php echo $category->cat_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <input class="form-control" type="text" name="sub_name" id="" value="<?php echo $scate->sub_name; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="edit_scate" value="Save">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </form>
                    <?php }else{ ?>
                    <div class="panel-heading">
                        Add Subcategory
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/addSubcategory';?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="cat_id">
                                            <option value="">Select Category</option>
                                            <?php foreach($cate as $category){ ?>
                                            <option value="<?php echo $category->cat_id?>"><?php echo $category->cat_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <input class="form-control" type="text" name="sub_name" id="" value="<?php echo $this->input->post("sub_name"); ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="add_scate" value="Save">
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