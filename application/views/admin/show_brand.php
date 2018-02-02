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
                    <div class="panel-heading">
                        All Brand
                        <a href="<?php echo base_url().'admin/addBrand';?>" class="btn btn-primary btn-xs pull-right"> + Add Brand</a>
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
                                        <th>Brand Id</th>
                                        <th>Brand Name</th>
                                        <th>Brand Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cate as $Key => $row){?>
                                    <tr class="<?php echo ($Key%2==0) ? "even gradeC" : "odd gradeX"; ?>">
                                        <td><?php echo $Key+1; ?></td>
                                         <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->brand_name; ?></td>                                       
                                        <td><img src="<?php echo base_url().'resources/Brand_logo/'.$row->brand_name.'/'.$row->brand_logo;?>" width="50" height="50"></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/editBrand/'.$row->id;?>" title="Edit Brand"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;
                                            <a href="<?php echo base_url().'admin/deleteBrand/'.$row->id;?>" title="Delete Brand"><i class="fa fa-trash fa-fw"></i></a>
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