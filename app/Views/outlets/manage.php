<?php $this->load->view("partial/header"); ?>

<div id="required_fields_message"><?php echo $this->lang->line('common_fields_required_message'); ?></div>

<div id="feedback_bar"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-piluku">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ion-android-restaurant"></i>
                        Outlet Management
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="outlets_table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Outlet ID</th>
                                    <th>Outlet Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#outlets_table').DataTable({
        "processing": true,
        "ajax": {
            "url": "<?php echo site_url('outlets/get_outlets'); ?>",
            "type": "POST"
        },
        "columns": [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4, "orderable": false }
        ],
        "order": [[ 1, "asc" ]],
        "pageLength": 25,
        "responsive": true
    });
});
</script>

<?php $this->load->view("partial/footer"); ?>
