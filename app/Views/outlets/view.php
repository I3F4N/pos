<?php $this->load->view("partial/header"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-piluku">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ion-android-restaurant"></i>
                        <?php echo $outlet->outlet_name; ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Outlet ID:</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $outlet->outlet_uid; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name:</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $outlet->outlet_name; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Address:</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $outlet->outlet_address ?: 'N/A'; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone:</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $outlet->outlet_phone ?: 'N/A'; ?></p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-9">
                                <p class="form-control-static"><?php echo $outlet->outlet_email ?: 'N/A'; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("partial/footer"); ?>
