<!-- Start .row -->
<!-- Start .row -->
<?php
$create = create_permission($permission, 'Courseware');
$read = read_permission($permission, 'Courseware');
$update = update_permisssion($permission, 'Courseware');
$delete = delete_permission($permission, 'Courseware');
?>
<div class=row>                      

    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <!--            <div class=panel-heading>
                            <h4 class=panel-title><?php echo $title; ?></h4>
                            <div class="panel-controls panel-controls-right">
                                <a class="panel-refresh" href="#"><i class="fa fa-refresh s12"></i></a>
                                <a class="toggle panel-minimize" href="#"><i class="fa fa-plus s12"></i></a>
                                <a class="panel-close" href="#"><i class="fa fa-times s12"></i></a>
                            </div>
                        </div>-->
            <div class=panel-body>
                 <?php if ($create) { ?>
                <a href="#" class="links" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/courseware_create/');" data-original-title="" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus"></i> Courseware</a>
                 <?php } ?>
                  <?php if ($create || $read || $update || $delete) { ?>
                <table id="datatable-list" class="table table-striped table-bordered table-responsive" cellspacing=0 width=100%>
                    <thead>
                        <tr>
                            <th>No</th>			
                            <th>Topic</th>
                            <th>Subject Name</th>                            
                            <th>Chapter</th>                            
                            <th>Branch</th>                            
                            <th>Description</th>
                            <th>Status</th>
                            <th>Attachment</th>
                              <?php if ($update || $delete) { ?>
                            <th>Action</th>
                              <?php } ?>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($courseware as $row) { ?>
                            <tr>
                                <td></td>
                                <td><?php echo $row['topic']; ?></td>
                                <td><?php echo $row['subject_name']; ?></td>                                
                                <td><?php echo $row['chapter']; ?></td>                                
                                <td><?php echo $row['c_name']; ?></td>                                
                                <td><?php echo $row['description']; ?></td>
                                <td>
                                    <?php if ($row['status'] == '1') { ?>
                                        <span>Active</span>
                                    <?php } else { ?>	
                                        <span>InActive</span>
                                    <?php } ?>
                                </td>
                                <td id="downloadedfile"><a href="<?= base_url() ?>uploads/courseware/<?php echo $row['attachment']; ?>" download="" title="download"><i class="fa fa-download"></i></a></td>	
                                <td class="menu-action">
                                      <?php if ($update) { ?>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/courseware_edit/<?php echo $row['courseware_id']; ?>');"  data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Edit
                                    </span></a>
                                      <?php } ?>
                                      <?php if ($delete) { ?>
                                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>courseware/delete/<?php echo $row['courseware_id']; ?>');"  data-toggle="tooltip" data-placement="top"><span class="label label-danger mr6 mb6">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    Delete
                                    </span></a>
                                      <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>																
                    </tbody>
                </table>
                  <?php } ?>
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
<!-- End .row -->
</div>
<!-- End contentwrapper -->
</div>
<!-- End #content -->