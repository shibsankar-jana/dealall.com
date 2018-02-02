<!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/assets_admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/assets_admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/assets_admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/assets_admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/assets_admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/assets_admin/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        
        $('.table').DataTable({
                responsive: true
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#del_0").css("display", "none");
        $(document).on('click', '#img_add_more', function(){
            var iclone = $("#pimg_0").clone();
            var tot_row = $(".pmg_all").length;
            var pclone = iclone.attr("id", "pimg_"+tot_row);
            var pclone = iclone.find(".del_img").attr("id", "del_"+tot_row);
            var pclone = iclone.find("#del_"+tot_row).css("display", "inline-block");
            var pclone = iclone.find("#del_"+tot_row).css("cursor", "pointer");
            $("#pimage_container").append(iclone);
        });
        
        $(document).on('click', '.del_img', function(){
            var tot_id = $(this).attr("id").split("_");
            $("#pimg_"+tot_id[1]).remove();
        });
        
    });
    </script>

</body>

</html>
