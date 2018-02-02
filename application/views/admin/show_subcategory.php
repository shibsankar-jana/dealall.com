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
                    <div class="panel-heading">
                        All Subcategories
                        <a href="<?php echo base_url().'admin/addSubcategory';?>" class="btn btn-primary btn-xs pull-right"> + Add Subcategory</a>
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
                                        <th>Subcategory Id</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($scate as $Key => $row){?>
                                    <tr class="<?php echo ($Key%2==0) ? "even gradeC" : "odd gradeX"; ?>">
                                        <td><?php echo $Key+1; ?></td>
                                        <td><?php echo $row->s_id; ?></td>
                                        <td><?php echo $row->cat_name; ?></td>
                                        <td><?php echo $row->sub_name; ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/editSubcategory/'.$row->s_id;?>" title="Edit Subcategory"><i class="fa fa-pencil fa-fw"></i></a>&nbsp;&nbsp;
                                            <a href="<?php echo base_url().'admin/deleteSubcategory/'.$row->s_id;?>" title="Delete Subcategory"><i class="fa fa-trash fa-fw"></i></a>
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