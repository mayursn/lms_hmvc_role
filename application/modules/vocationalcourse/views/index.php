<?php 

$create = create_permission($permission, 'Vocational_Course');
$read = read_permission($permission, 'Vocational_Course');
$update = update_permisssion($permission, 'Vocational_Course');
$delete = delete_permission($permission, 'Vocational_Course');
<<<<<<< HEAD

$professor = $this->db->select('professor_id,name')->from('professor')->get()->result_array();
=======
$this->load->model('professor/Professor_model');

$professor = $this->Professor_model->get_all();
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
$categories = $this->db->get('course_category')->result();
 $currency=system_info('currency');
?>

<!-- Start .row -->
<<<<<<< HEAD
=======
<?php
if($this->session->userdata('role_name')!='Student')
{
?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
<<<<<<< HEAD
                                        if ($pro['professor_id'] == $row->professor_id) {
                                            echo $pro['name'];
=======
                                        if ($pro->professor_id == $row->professor_id) {
                                            echo $pro->name;
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
<<<<<<< HEAD
                                            
=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <?php
                                if($delete) { ?>
                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>vocationalcourse/delete/<?php echo $row->vocational_course_id; ?>');"  data-toggle="tooltip" data-placement="top" ><span class="label label-danger mr6 mb6"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></a>
                                      <?php } ?>
                                    <?php } ?>
<<<<<<< HEAD
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>vocationalcourse/vocational_registered_student/<?php echo $row->vocational_course_id;?>');" data-original-title="registered student" data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-desktop" aria-hidden="true"></i>View</span></a>
=======
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>vocationalcourse/vocational_registered_student/<?php echo $row->vocational_course_id;?>');" data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-desktop" aria-hidden="true"></i>Registered Student</span></a>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
<<<<<<< HEAD

=======
<?php
}
elseif($this->session->userdata('role_name')=="Student")
{
   ?>
<div class=row>                      

    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <div class=panel-body>
                <div class="tabs mb20">
                    <ul id="import-tab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#course-list" data-toggle="tab" aria-expanded="true">Vocational Course List</a>
                        </li>
                        <li class="">
                            <a href="#submitted-course-list" data-toggle="tab" aria-expanded="false">Submitted Vocational Course List</a>
                        </li>
                    </ul>
                    <div id="import-tab-content" class="tab-content">
                        <div class="tab-pane fade active in" id="course-list">
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
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $counter = 0;
                        $vocid=array();
                        foreach ($vocationalcoursefee as $vocfee)
                        {
                            if($this->session->userdata('user_id')==$vocfee->user_id)
                            {
                                $vocid[]=$vocfee->vocational_course_id;
                            }
                        }
                        foreach ($vocationalcourse as $row):
                            if($row->course_startdate > date('Y-m-d'))
                            {
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
                                        if ($pro->professor_id == $row->professor_id) {
                                            echo $pro->name;
                                        }
                                    }
                                    ?></td> 
                                <td class="menu-action">
                                   <?php
                                   if(empty($vocid))
                                   {
                                       ?>
                                    <a href="<?php echo base_url();?>vocationalcourse/register_course/<?php echo $row->vocational_course_id;?>"   data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Register Now</span></a>
                                    <?php
                                   }
                                   else
                                   {
                                       if(in_array($row->vocational_course_id,$vocid))
                                       {
                                           ?>
                                    <a href="#" data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Registered</span></a>
                                    <?php
                                       }
                                       else
                                       {
                                          ?>
                                    <a href="<?php echo base_url();?>vocationalcourse/register_course/<?php echo $row->vocational_course_id;?>"  data-toggle="tooltip" data-placement="top" ><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Register Now</span></a>
                                    <?php
                                       }
                                   }
                                   ?>
                                </td>
                            </tr>
                        <?php
                            }
                        endforeach;
                        ?>																				
                    </tbody>
                </table>
                        </div>
                        <div class="tab-pane fade" id="submitted-course-list">
                              <table id="datatable-list-course" class="table table-striped table-bordered table-responsive" cellspacing=0 width=100%>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th><?php echo ucwords("course name"); ?></th>
                            <th><?php echo ucwords("category"); ?></th>
                            <th><?php echo ucwords("course start date"); ?></th>
                            <th><?php echo ucwords("course end date"); ?></th>
                            <th><?php echo ucwords("course fee"); ?></th>
                            <th><?php echo ucwords("professor name"); ?></th>                         
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counts = 1;
                        foreach ($register as $rows):
                            ?><tr>
                                <td><?php echo $counts++; ?></td>
                                <td><?php echo $rows['course_name']; ?></td>   
                                <td><?php
                                   $this->load->model('course_category/Course_category_model');
                                   $cate = $this->Course_category_model->get($rows['category_id']);
                                   echo $cate->category_name;                                   
                                    ?></td>    
                                <td><?php echo date_formats($rows['course_startdate']); ?></td>    
                                <td><?php echo date_formats($rows['course_enddate']); ?></td>    
                                <td><?php echo $currency. $rows['course_fee']; ?></td>   
                                <td><?php
                                $this->load->model("professor/Professor_model");
                              $professor_name =   $this->Professor_model->get($rows['professor_id']);
                              echo $professor_name->name;
                                   
                                    ?></td>   
                               
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
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
    <?php
}
?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
<script>
$(document).ready(function(){
    $('#vocational-course-list').DataTable({});
});
</script>
