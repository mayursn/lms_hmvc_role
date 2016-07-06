<<<<<<< HEAD
<?php if ($param == 'allassignment') { ?>

=======
<!-- Start .row -->
<?php
$create = create_permission($permission, 'Assignment');
$read = read_permission($permission, 'Assignment');
$update = update_permisssion($permission, 'Assignment');
$delete = delete_permission($permission, 'Assignment');
  $this->load->model('subject/Subject_manager_model');
?>
<?php if ($param == 'allassignment') { ?>
<?php if($create || $read || $update || $delete){ ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    <table class="table table-striped table-bordered table-responsive" cellspacing=0 width=100% id="data-tables">
        <thead>
            <tr>
                <th>No</th>												
                <th>Assignment</th>
                <th>Department</th>
<<<<<<< HEAD
                <th>Branch</th>												
                <th>Batch</th>												
                <th>Semester</th>	
=======
                <th>Branch</th>											
                <th>Semester</th>	
                <th>Subject</th>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                <th>Class</th>
                <th><?php echo ucwords("Description"); ?></th>
                <th>File</th>
                <th>Date of Submission</th>												
<<<<<<< HEAD
                <th>Action</th>											
=======
                <?php if( $update || $delete){ ?>
                <th>Action</th>											
                <?php } ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            </tr>
        </thead>
        <tbody>                                           
            <?php
            $count = 1;
            foreach ($assignment as $row):
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>	

                    <td><?php echo $row->assign_title; ?></td>	
                    <td><?php
                        foreach ($degree as $dgr):
                            if ($dgr->d_id == $row->assign_degree):

                                echo $dgr->d_name;
                            endif;


                        endforeach;
                        ?></td>
                    <td>
                        <?php
                        foreach ($course as $crs) {
                            if ($crs->course_id == $row->course_id) {
                                echo $crs->c_name;
                            }
                        }
                        ?>
<<<<<<< HEAD
                    </td>
                    <td>
                        <?php
                        foreach ($batch as $bch) {
                            if ($bch->b_id == $row->assign_batch) {
                                echo $bch->b_name;
                            }
                        }
                        ?>
                    </td>
=======
                    </td>                   
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <td>
                        <?php
                        foreach ($semester as $sem) {
                            if ($sem->s_id == $row->assign_sem) {
                                echo $sem->s_name;
                            }
                        }
                        ?>													
                    </td>
<<<<<<< HEAD
=======
                     <td>
                        <?php
                       
                       $name = $this->Subject_manager_model->get_subject_name($row->sm_id);
                       echo $name;
                        ?>
                    </td>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <td>
                        <?php
                        foreach ($class as $c) {
                            if ($c->class_id == $row->class_id) {
                                echo $c->class_name;
                            }
                        }
                        ?>
                    </td>
                    <td  ><?php echo wordwrap($row->assign_desc, 30, "<br>\n"); ?></td>
                    <td><a href="<?php echo base_url() . 'uploads/project_file/' . $row->assign_filename; ?>" download="" title="<?php echo $row->assign_title; ?>"><i class="fa fa-download"></i></a></td>	
                    <td><?php echo date_formats($row->assign_dos); ?></td>	
<<<<<<< HEAD
                    <td class="menu-action">
                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/assignment_edit/<?php echo $row->assign_id; ?>');" data-toggle="modal"><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span></a>
                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>assignment/delete/<?php echo $row->assign_id; ?>');" data-toggle="modal" ><span class="label label-danger mr6 mb6"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></a>
=======
                    <?php if($update || $delete){ ?>
                    <td class="menu-action">
                        <?php if($update){ ?>
                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/assignment_edit/<?php echo $row->assign_id; ?>');" data-toggle="modal"><span class="label label-primary mr6 mb6"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span></a>
                        <?php } ?>
                        <?php if($delete){ ?>
                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>assignment/delete/<?php echo $row->assign_id; ?>');" data-toggle="modal" ><span class="label label-danger mr6 mb6"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</span></a>
                        <?php } ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        <?php
                        $current = date("Y-m-d H:i:s");
                        $dos = date("Y-m-d H:i:s", strtotime($row->assign_dos));
                        if ($dos < $current) {
                            ?>
<<<<<<< HEAD
                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_reopen_assignment/<?php echo $row->assign_id; ?>');" data-toggle="modal"><span class="label label-primary mr6 mb6">Reopen</span></a>
                        <?php } ?>
                    </td>	
=======
                        <?php if($update){ ?>
                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_reopen_assignment/<?php echo $row->assign_id; ?>');" data-toggle="modal"><span class="label label-primary mr6 mb6">Reopen</span></a>
                            <?php } ?>
                        <?php } ?>
                    </td>	
                    <?php } ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                </tr>
            <?php endforeach; ?>						
        </tbody>
    </table>

<<<<<<< HEAD
=======
<script type="text/javascript">
    $(document).ready(function () {
        $('#data-tables').dataTable({"language": {"emptyTable": "No data available"}});             
    });
</script>
<?php } ?>

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    <?php
}
if ($param == 'submitted') {
    ?>
<<<<<<< HEAD
    <table class="table table-striped table-bordered table-responsive" cellspacing=0 width=100% id="data-tabless">
=======
    <table class="table table-striped table-bordered table-responsive" cellspacing=0 width=100% id="submit-table">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        <thead>
            <tr>
                <th>No</th>												
                <th>Assignment</th>
                <th>Student</th>
                <th>Department</th>
                <th>Branch</th>												
<<<<<<< HEAD
                <th>Batch</th>												
=======
                <th>Subject</th>												
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                <th>Semester</th>	                    
                <th>Submission Date</th>	
                <th>Submitted Date</th>	
                <th>Comment</th>
                <th>Action</th>												                                            
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($submitedassignment as $rowsub):
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $rowsub->assign_title; ?></td>
                    <td><?php echo $rowsub->name; ?></td>
                    <td><?php
                        foreach ($degree as $dgr):
                            if ($dgr->d_id == $rowsub->assign_degree):

                                echo $dgr->d_name;
                            endif;


                        endforeach;
                        ?></td>
                    <td>
                        <?php
                        foreach ($course as $crs) {
                            if ($crs->course_id == $rowsub->course_id) {
                                echo $crs->c_name;
                            }
                        }
                        ?>
                    </td>
                    <td>
<<<<<<< HEAD
                        <?php
                        foreach ($batch as $bch) {
                            if ($bch->b_id == $rowsub->assign_batch) {
                                echo $bch->b_name;
                            }
                        }
=======
                         <?php
                      
                       $name = $this->Subject_manager_model->get_subject_name($rowsub->sm_id);
                       echo $name;
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($semester as $sem) {
                            if ($sem->s_id == $rowsub->assign_sem) {
                                echo $sem->s_name;
                            }
                        }
                        ?>													
                    </td>                          
                    <td><?php echo date_formats($rowsub->assign_dos); ?></td>	
                    <td><?php echo date_formats($rowsub->submited_date); ?></td>	
                    <td><?php echo $rowsub->comment; ?></td>
                    <td><a href="<?php echo base_url() . 'uploads/project_file/' . $rowsub->document_file; ?>" download="" title="<?php echo $rowsub->document_file; ?>"><i class="fa fa-download"></i></a></td>                      	
                </tr>
            <?php endforeach; ?>						
        </tbody>
    </table>
<<<<<<< HEAD

=======
<script type="text/javascript">
    $(document).ready(function () {
        $('#submit-table').dataTable({"language": {"emptyTable": "No data available"}});             
    });
</script>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    <?php
}
if ($param == 'assessments') {
    ?>

<<<<<<< HEAD
    <table class="table table-striped table-bordered table-responsive" id="data-tabless">
=======
    <table class="table table-striped table-bordered table-responsive" id="latesubmit-list">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        <thead>
            <tr>
                <th>No</th>												
                <th><div>Assignment</div></th>
                <th><div>Student</div></th>
                <th><div>Department</div></th>
<<<<<<< HEAD
                <th><div>Branch</div></th>												
                <th><div>Batch</div></th>												
                <th><div>Semester</div></th>	
=======
                <th><div>Branch</div></th>												                
                <th><div>Semester</div></th>	
                <th><div>Subject</div></th>	
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                <th>Submission Date</th>	
                <th><div>Submitted-Date</div></th>	
                <th><div>Comment</div></th>
                <th><div><?php echo ucwords("File"); ?></div></th>	
                <th><div>Action</div></th>												                                            
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($submitedassignment as $rowsub):
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $rowsub->assign_title; ?></td>
                    <td><?php echo $rowsub->name; ?></td>
                    <td><?php
                        foreach ($degree as $dgr):
                            if ($dgr->d_id == $rowsub->assign_degree):

                                echo $dgr->d_name;
                            endif;


                        endforeach;
                        ?></td>
                    <td>
                        <?php
                        foreach ($course as $crs) {
                            if ($crs->course_id == $rowsub->course_id) {
                                echo $crs->c_name;
                            }
                        }
                        ?>
                    </td>
<<<<<<< HEAD
                    <td>
                        <?php
                        foreach ($batch as $bch) {
                            if ($bch->b_id == $rowsub->assign_batch) {
                                echo $bch->b_name;
                            }
                        }
                        ?>
                    </td>
=======
                    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <td>
                        <?php
                        foreach ($semester as $sem) {
                            if ($sem->s_id == $rowsub->assign_sem) {
                                echo $sem->s_name;
                            }
                        }
                        ?>													
                    </td>	
<<<<<<< HEAD
=======
                    <td>
                       <?php
                      
                       $name = $this->Subject_manager_model->get_subject_name($rowsub->sm_id);
                       echo $name;
                        ?>
                    </td>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <td><?php echo date_formats($rowsub->assign_dos); ?></td>	
                    <td><?php echo date_formats($rowsub->submited_date); ?></td>	
                    <td><?php echo $rowsub->comment; ?></td>
                    <td><a href="<?php echo base_url(); ?>uploads/project_file/<?php echo $rowsub->document_file; ?>" download="" title="<?php echo $rowsub->document_file; ?>"><i class="fa fa-download"></i></a></td>                      	
                    <td class="menu-action">
                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/assessments_create/<?php echo $rowsub->assignment_submit_id; ?>');" data-toggle="modal"><span class="label label-primary mr6 mb6">Assessment</span></a>

                    </td>	
                </tr>
            <?php endforeach; ?>						
        </tbody>
    </table>

<<<<<<< HEAD
=======
<script type="text/javascript">
    $(document).ready(function () {
        $('#latesubmit-list').dataTable({"language": {"emptyTable": "No data available"}});             
    });
</script>

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
<?php } ?>

<?php if ($param == "notsubmitted") { ?>
    <?php
<<<<<<< HEAD
    $assignment = $this->db->get_where("assignment_manager", array("assign_id" => $assign_id))->row();
=======
    $this->load->model("assignment/Assignment_manager_model");
    $assignment =$this->Assignment_manager_model->get($assign_id);    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    ?>
    <div class="panel-body table-responsive" >
        <table class="table table-striped table-bordered table-responsive" cellspacing=0 width=100% id="not_submitted_assignment_list">
            <thead>
                <tr>
                    <th>No</th>												
                    <th><div><?php echo ucwords("Assignment"); ?></div></th>
                    <th><div><?php echo ucwords("Student Name"); ?></div></th>
                    <th><div><?php echo ucwords("Student Email"); ?></div></th>
                    <th><div><?php echo ucwords("Department"); ?></div></th>
                    <th><div><?php echo ucwords("Branch"); ?></div></th>												
<<<<<<< HEAD
                    <th><div><?php echo ucwords("Batch"); ?></div></th>												
=======
                    <th><div><?php echo ucwords("Subject"); ?></div></th>												
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    <th><div><?php echo ucwords("Semester"); ?></div></th>	
                    <th><div><?php echo ucwords("Class"); ?></div></th>	
                    <th><div><?php echo ucwords("last date of submission"); ?></div></th>	                                            
                    <th><div><?php echo ucwords("Assignment File"); ?></div></th>	
                </tr>
            </thead>
            <tbody>
                <?php
                $countn = 1;
                foreach ($not_submitted as $rownot):
                    ?>
                    <tr>
                        <td><?php echo $countn++; ?></td>
                        <td><?php echo $assignment->assign_title; ?></td>
                        <td><?php echo $rownot->name; ?></td>
                        <td><?php echo $rownot->email; ?></td>
                        <td>
                            <?php
                            foreach ($degree as $dgr):
                                if ($dgr->d_id == $assignment->assign_degree):

                                    echo $dgr->d_name;
                                endif;
                            endforeach;
                            ?></td>
                        <td>
                            <?php
                            foreach ($course as $crs) {
                                if ($crs->course_id == $assignment->course_id) {
                                    echo $crs->c_name;
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php
<<<<<<< HEAD
                            foreach ($batch as $bch) {
                                if ($bch->b_id == $assignment->assign_batch) {
                                    echo $bch->b_name;
                                }
                            }
=======
                            $name = $this->Subject_manager_model->get_subject_name($assignment->sm_id);
                       echo $name;
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                            ?>
                        </td>
                        <td>
                            <?php
                            foreach ($semester as $sem) {
                                if ($sem->s_id == $assignment->assign_sem) {
                                    echo $sem->s_name;
                                }
                            }
                            ?>													
                        </td>
                        <td>
                            <?php
                            foreach ($class as $c) {
                                if ($c->class_id == $assignment->class_id) {
                                    echo $c->class_name;
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo date_formats($assignment->assign_dos); ?></td>	                                                
                        <td id="downloadedfile"><a href="<?php echo base_url(); ?>uploads/project_file/<?php echo $assignment->assign_filename; ?>" download="" title="download"><i class="fa fa-download"></i></a></td>                      	
                    </tr>
                <?php endforeach; ?>						
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        $('#data-tables').dataTable({"language": {"emptyTable": "No data available"}});
    });
    $(document).ready(function () {
        "use strict";
        $('#data-tabless').dataTable({"language": {"emptyTable": "No data available"}});
        $("#not_submitted_assignment_list").dataTable({"language": {"emptyTable": "No data available"}});
    });

</script>
=======
<script type="text/javascript">
    $(document).ready(function () {
        $('#not_submitted_assignment_list').dataTable({"language": {"emptyTable": "No data available"}});             
    });
</script>
<?php } ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
