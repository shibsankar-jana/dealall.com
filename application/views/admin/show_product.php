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
                    <div class="panel-heading">
                        All Products
                        <a href="<?php echo base_url().'admin/addProduct';?>" class="btn btn-primary btn-xs pull-right"> + Add Product</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php if($this->session->flashdata('msg_success') != ""){?>
                        <div class="alert alert-success">
                            <strong><?php echo $this->session->flashdata('msg_success');?></strong> 
                        </div>
                        <?php } ?>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SI NO</th>
                                        <th>Bar Code</th>
                                        <th>Product Name</th>
                                        <th>Product Details</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sale Price</th>
                                        <th>Product Image</th>
                                        <th>Featues</th>
                                        <th>Warenty</th>
                                        <th>Color</th>
                                        <th>Dimensions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($prod as $Key => $row){?>
                                    <tr class="<?php echo ($Key%2==0) ? "even gradeC" : "odd gradeX"; ?>">
                                        <td><?php echo $row->p_id; ?></td>
                                        <td><?php echo $row->bar_code; ?></td>
                                        <td><?php echo $row->p_name; ?></td>
                                        <td><?php echo $row->p_details; ?></td>
                                        <td><?php echo $row->quantity; ?></td>
                                        <td><?php echo $row->p_price; ?></td>
                                        <td><?php echo $row->p_sale; ?></td>
                                        <td><img src="<?php echo base_url().'resources/product_images/'.$row->p_id.'/'.$row->p_image;?>" width="50" height="50"></td>
                                        <td><?php echo $row->features; ?></td>
                                        <td><?php echo $row->p_war; ?></td>
                                        <td><?php echo $row->p_color; ?></td>
                                        <td><?php echo $row->p_dims; ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/editProduct/'.$row->p_id;?>" title="Edit Product"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;
                                            <a href="<?php echo base_url().'admin/deleteProduct/'.$row->p_id;?>" title="Delete Product"><i class="fa fa-trash fa-fw"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        
    </div>
    <!-- /#page-wrapper -->

</div>

    
<?php $this->load->view('admin/includes/footer'); ?>