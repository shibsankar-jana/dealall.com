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
                    <div class="panel-heading">
                        All Categories
                        <a href="<?php echo base_url().'admin/addCategory';?>" class="btn btn-primary btn-xs pull-right"> + Add Category</a>
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
                                        <th>SL. NO</th>
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cate as $Key => $row){?>
                                    <tr class="<?php echo ($Key%2==0) ? "even gradeC" : "odd gradeX"; ?>">
                                        <td><?php echo $Key+1; ?></td>
                                        <td><?php echo $row->cat_id; ?></td>
                                        <td><?php echo $row->cat_name; ?></td>
                                        <td><img src="<?php echo base_url().'resources/category_images/'.$row->cat_name.'/'.$row->cat_image;?>" width="50" height="50"></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/editCategory/'.$row->cat_id;?>" title="Edit Product"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;
                                            <a href="<?php echo base_url().'admin/deleteCategory/'.$row->cat_id;?>" title="Delete Product"><i class="fa fa-trash fa-fw"></i></a>
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