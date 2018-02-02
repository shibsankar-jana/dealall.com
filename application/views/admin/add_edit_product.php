<?php $this->load->view('admin/includes/header'); ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php $this->load->view('admin/includes/menu'); ?>
    <!-- Navigation -->
    
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php if(!empty($prod)){ ?>
                    <div class="panel-heading">
                        Edit Product
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/editProduct/'.$prod->p_id;?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="cat_id">
                                            <option>Select Category</option>
                                            <?php foreach($cate as $category){ ?>
                                            <option value="<?php echo $category->cat_id; ?>" <?php echo ($category->cat_id== $prod->cat_id) ? "selected" : "";?>><?php echo $category->cat_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="s_id">
                                            <option>Select Subcategory</option>
                                            <?php foreach($subcate as $subcategory){ ?>
                                            <option value="<?php echo $subcategory->s_id; ?>" <?php echo ($subcategory->s_id== $prod->s_id) ? "selected" : "";?>><?php echo $subcategory->sub_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_name">
                                            <option>Select Brand</option>
                                            <?php foreach($brnd as $brand){ ?>
                                            <option value="<?php echo $brand->id; ?>" <?php echo ($brand->id== $prod->brand_name) ? "selected" : "";?>><?php echo $brand->brand_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input class="form-control" type="text" name="p_name" id="" value="<?php echo $prod->p_name; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Details</label>
                                        <input class="form-control" type="text" name="p_details" id="" value="<?php echo $prod->p_details; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input class="form-control" type="text" name="quantity" id="" value="<?php echo $prod->quantity; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input class="form-control" type="text" name="p_price" id="" value="<?php echo $prod->p_price; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Selling Price</label>
                                        <input class="form-control" type="text" name="p_sale" id="" value="<?php echo $prod->p_sale; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Warenty</label>
                                        <input class="form-control" type="text" name="p_war" id="" value="<?php echo $prod->p_war; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Color</label>
                                        <select class="form-control" name="p_color">
                                            <option>Select Colour</option>
                                            <option value="1" <?php echo ($prod->p_color == 1) ? "selected" : "";?>>White</option>
                                            <option value="2" <?php echo ($prod->p_color == 2) ? "selected" : "";?>>Black</option>
                                            <option value="3" <?php echo ($prod->p_color == 3) ? "selected" : "";?>>Red</option>
                                            <option value="4" <?php echo ($prod->p_color == 4) ? "selected" : "";?>>Silver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Dimension</label>
                                        <input class="form-control" type="text" name="p_dims" id="" value="<?php echo $prod->p_dims; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Feature</label>
                                        <input class="form-control" type="text" name="features" id="" value="<?php echo $prod->features; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Discount</label>
                                        <input class="form-control" type="text" name="discount" id="" value="<?php echo $prod->discount; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Special Offer</label>
                                        <input class="form-control" type="text" name="offer" id="" value="<?php echo $prod->offer; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Bar Code</label>
                                        <input class="form-control" type="text" name="bar_code" id="" value="<?php echo $prod->bar_code; ?>" readonly>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="edit_prod" value="Save">
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </form>
                    <?php }else{ ?>
                    <div class="panel-heading">
                        Add Product
                    </div>
                    <form method="post" action="<?php echo base_url().'admin/addProduct';?>" enctype="multipart/form-data">
                        <div class="panel-body">
                            <?php if($this->session->flashdata('msg_error') != ""){?>
                            <div class="alert alert-danger">
                                <strong><?php echo $this->session->flashdata('msg_error');?></strong> 
                            </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="cat_id">
                                            <option>Select Category</option>
                                            <?php foreach($cate as $category){ ?>
                                            <option value="<?php echo $category->cat_id?>"><?php echo $category->cat_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control" name="s_id">
                                            <option>Select Subcategory</option>
                                            <?php foreach($subcate as $subcategory){ ?>
                                            <option value="<?php echo $subcategory->s_id?>"><?php echo $subcategory->sub_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_name">
                                            <option>Select Brand</option>
                                            <?php foreach($brnd as $brand){ ?>
                                            <option value="<?php echo $brand->id?>"><?php echo $brand->brand_name?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input class="form-control" type="text" name="p_name" id="" value="<?php echo $this->input->post("p_name"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Details</label>
                                        <input class="form-control" type="text" name="p_details" id="" value="<?php echo $this->input->post("p_details"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input class="form-control" type="text" name="quantity" id="" value="<?php echo $this->input->post("quantity"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input class="form-control" type="text" name="p_price" id="" value="<?php echo $this->input->post("p_price"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Selling Price</label>
                                        <input class="form-control" type="text" name="p_sale" id="" value="<?php echo $this->input->post("p_sale"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Warenty</label>
                                        <input class="form-control" type="text" name="p_war" id="" value="<?php echo $this->input->post("p_war"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Color</label>
                                        <select class="form-control" name="p_color">
                                            <option>Select Colour</option>
                                            <option value="1">White</option>
                                            <option value="2">Black</option>
                                            <option value="3">Red</option>
                                            <option value="4">Silver</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Dimension</label>
                                        <input class="form-control" type="text" name="p_dims" id="" value="<?php echo $this->input->post("p_dims"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Feature</label>
                                        <input class="form-control" type="text" name="features" id="" value="<?php echo $this->input->post("features"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Product Discount</label>
                                        <input class="form-control" type="text" name="discount" id="" value="<?php echo $this->input->post("discount"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Special Offer</label>
                                        <input class="form-control" type="text" name="offer" id="" value="<?php echo $this->input->post("offer"); ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Bar Code</label>
                                        <input class="form-control" type="text" name="bar_code" id="" value="<?php echo rand();?>" readonly>
                                    </div>
                                </div>
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Image upload</legend>
                                    <div class="col-lg-12">
                                        <div class="col-lg-12 text-right">
                                            <a class="btn btn-xs btn-info" id="img_add_more">Add More</a>
                                        </div>
                                        <div id="pimage_container">
                                            <div class="col-lg-4 pmg_all" id="pimg_0">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <i class="fa fa-trash fa-fw fa-1x text-danger del_img" id="del_0"></i>
                                                    <input type="file" name="p_image[]" id="" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="button" class="btn btn-info" name="" id="" value="Reset">
                                    <input type="submit" class="btn btn-primary pull-right" name="add_prod" value="Save">
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