<?php 

$create = create_permission($permission, 'Vocational_Course');
$read = read_permission($permission, 'Vocational_Course');
$update = update_permisssion($permission, 'Vocational_Course');
$delete = delete_permission($permission, 'Vocational_Course');

$professor = $this->db->select('professor_id,name')->from('professor')->get()->result_array();
$categories = $this->db->get('course_category')->result();
 $currency=system_info('currency');
?>

<!-- Start .row -->
<div class=row>                      

    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <div class=panel-body>
                 <?php if ($create) { ?>
                <a class="links"  onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/vocationalcourse_create');" href="#" id="navfixed" data-toggle="tab"><i class="fa fa-plus"></i> Vocational Course</a>
                 <?php } ?>
              <?php if ($create || $read || $update || $delete) { ?>
                <table id="vocational-course-list" class="table table-striped table-bordered table-responsive" cellspacing=0 width=100%>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th><?php echo ucwords("course name"); ?></th>
                            <th><?php echo ucwords("category"); ?></th>
                            <th><?php echo ucwords("course start date"); ?></th>
                            <th><?php echo ucwords("course end date"); ?></th>
                            <th><?php echo ucwords("course fee"); ?></th>
                            <th><?php echo ucwords("professor name"); ?></th>
                            <th>Status</th>
                            <?php if ($update || $delete) { ?>
                                    <th>Actions</th>
                                <?php } ?> 
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $counter = 0;
                        foreach ($vocationalcourse as $row):
                            ?><tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row->course_name; ?></td>  
                                <td><?php
                                    foreach ($categories as $category) {

                                        if ($category->category_id == $row->category_id) {
                                            echo $category->category_name;
                                        }
                                    }
                                    ?></td>  
                                <td><?php echo date_formats($row->course_startdate); ?></td>    
                                <td><?php echo date_formats($row->course_enddate); ?></td>    
                                <td><?php echo $currency . $row->course_fee; ?></td>   
                                <td><?php
                                    
                                    foreach ($professor as $pro) {
                                        if ($pro['professor_id'] == $row->professor_id) {
                                            echo $pro['name'];
                                        }
                                    }
                                    ?></td>   
                                <td>
                                    <?php if ($row->status == '1') { ?>
                                        <span>Active</span>
                                    <?php } else { ?>	
                                        <span>InActive</span>
                                    <?php } ?>
                                </td>
                                <td class="menu-action">
                                    <?php if ($update || $delete) { ?>
                                     <?php 
                                            if($update) { ?>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/vocationalcourse_edit/<?php echo $row->vocational_course_id;?>');"  data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span></a>
                                    <?php } ?>
                                            
                                <?php
                                if($delete) { ?>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>vocationalcourse/delete/<?php echo $row->vocational_course_id; ?>');"  data-toggle="tooltip" data-placement="top" ><span class="label label-danger mr6 mb6"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></a>
                                      <?php } ?>
                                    <?php } ?>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>vocationalcourse/vocational_registered_student/<?php echo $row->vocational_course_id;?>');" data-original-title="registered student" data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-desktop" aria-hidden="true"></i>View</span></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>																				
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

<script>
$(document).ready(function(){
    $('#vocational-course-list').DataTable({});
});
</script>
