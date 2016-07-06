<?php
$this->db->select('assign_title,assign_id,assign_degree,course_id,assign_batch,assign_sem,class_id,assign_dos,assign_desc,assignment_instruction,assign_filename');
$edit_data = $this->db->get_where('assignment_manager', array('assign_id' => $param2))->result_array();
<<<<<<< HEAD
foreach ($edit_data as $row):
    ?>

<div class=row>                      
    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
        <div class="panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <!--            <div class=panel-heading>
                                <h4 class=panel-title>  <?php echo ucwords("Update Assignment"); ?></h4>                
                            </div>   -->
=======
$this->load->model('assignment/Assignment_manager_model');
$row = $this->Assignment_manager_model->get($param2);
    ?>

    <div class=row>                      
        <div class=col-lg-12>
            <!-- col-lg-12 start here -->
            <div class="panel-default toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <!--            <div class=panel-heading>
                                    <h4 class=panel-title>  <?php echo ucwords("Update Assignment"); ?></h4>                
                                </div>   -->
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
<<<<<<< HEAD
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>   
                            <?php echo form_open(base_url() . 'assignment/update/' . $row['assign_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Assignment");?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" id="title1" value="<?php echo $row['assign_title']; ?>" />
                                </div>
                                 <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                            </div>
                             <div class="form-group">
                                            <label class="col-sm-4 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <select name="degree" id="degree2"  class="form-control">
                                                    <option value="">Select department</option>
                                                    <?php
                                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                    <option value="<?= $dgr->d_id ?>" <?php if($row['assign_degree']==$dgr->d_id){  echo "selected=selected"; } ?>><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
=======
                                <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                            </div>   
                            <?php echo form_open(base_url() . 'assignment/update/' . $row->assign_id, array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Assignment"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" id="title1" value="<?php echo $row->assign_title; ?>" />
                                </div>
                                <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("department"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="degree" id="degree2"  class="form-control">
                                        <option value="">Select department</option>
                                        <?php
                                        $this->load->model('department/Degree_model');
                                        $degree = $this->Degree_model->get_all();
                                        foreach ($degree as $dgr) {
                                            ?>
                                            <option value="<?= $dgr->d_id ?>" <?php
                                            if ($row->assign_degree== $dgr->d_id) {
                                                echo "selected=selected";
                                            }
                                            ?>><?= $dgr->d_name ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <div class="col-sm-8">
                                    <select name="course" id="course2"  class="form-control">
                                        <option value="">Select Branch</option>
                                        <?php
<<<<<<< HEAD
                                        $course = $this->db->get_where('course', array('course_status' => 1,'degree_id'=>$row['assign_degree']))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['course_id']) {
=======
                                        $course = $this->db->get_where('course', array('course_status' => 1, 'degree_id' => $row->assign_degree))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row->course_id) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                ?>
                                                <option value="<?= $crs->course_id ?>" selected><?= $crs->c_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" ><?= $crs->c_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
<<<<<<< HEAD
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                <div class="col-sm-8">                                    
                                    <select name="batch" id="batch2"  class="form-control">
                                        <option value="">Select batch</option>
    <?php
    
     $databatch = $this->db->query("SELECT * FROM batch WHERE b_status=1 AND FIND_IN_SET('".$row['assign_degree']."',degree_id) AND FIND_IN_SET('".$row['course_id']."',course_id)")->result();
   
       
    foreach ($databatch as $row1) {
        if ($row1->b_id == $row['assign_batch']) {
            ?>
                                                <option value="<?= $row1->b_id ?>" selected><?= $row1->b_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $row1->b_id ?>" ><?= $row1->b_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
=======
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Semester"); ?><span style="color:red">*</span></label>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <div class="col-sm-8">
                                    <select name="semester" id="semester1"  class="form-control">
                                        <option value="">Select semester</option>
                                        <?php
                                        $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                        foreach ($datasem as $rowsem) {
<<<<<<< HEAD
                                            if ($rowsem->s_id == $row['assign_sem']) {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
=======
                                            if ($rowsem->s_id == $row->assign_sem) {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                <?php
                                            } else {
                                                ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                <option value="<?= $rowsem->s_id ?>" ><?= $rowsem->s_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
<<<<<<< HEAD
                                <label class="col-sm-4 control-label"><?php echo ucwords("class");?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="class" id="class"  class="form-control">
                                        <option value="">Select class</option>
                                        <?php 
                                        $this->db->select('class_id,class_name');
                                        $class=$this->db->get('class')->result_array();

                                        foreach($class as $c)
                                        {
                                            if($c['class_id']==$row['class_id'])
                                            {
                                        ?>
                                            <option selected value="<?php echo $c['class_id']?>"><?php echo $c['class_name']?></option>
                                        <?php
                                        }
                                        else 
                                            {                                        
                                        ?>
                                           <option value="<?php echo $c['class_id']?>"><?php echo $c['class_name']?></option>
                                        <?php                                            
                                        }
=======
                                <label class="col-sm-4 control-label"><?php echo ucwords("class"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="class" id="class"  class="form-control">
                                        <option value="">Select class</option>
                                        <?php
                                        $this->load->model('classes/Class_model');
                                        $class = $this->Class_model->order_by_column('class_name');
                                        

                                        foreach ($class as $c) {
                                            if ($c->class_id == $row->class_id) {
                                                ?>
                                                <option selected value="<?php echo $c->class_id; ?>"><?php echo $c->class_name; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $c->class_id; ?>"><?php echo $c->class_name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Subject"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="subject" id="subject"  class="form-control">
                                        <option value="">Select Subject</option>
                                        <?php
                                        $degree_id =$row->assign_degree;
                                        $course_id = $row->course_id;
                                        $sem_id =$row->assign_sem;
                                        
                                        
                                        
                                        $this->load->model('subject/Subject_association_model');
                                        $subject = $this->Subject_association_model->get_subject_list($degree_id,$course_id,$sem_id);                                                                            
                                        foreach ($subject as $sub) {
                                            if ($sub->sm_id == $row->sm_id) {
                                                ?>
                                                <option value="<?= $sub->sm_id ?>" selected><?= $sub->subject_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $sub->sm_id ?>" ><?= $sub->subject_name ?></option>
                                                <?php
                                            }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                        }
                                        ?>
                                    </select>
                                </div>
<<<<<<< HEAD
                                </div>
                           
                                    <input type="hidden" class="form-control" name="assignmenturl" id="assignmenturl" value=""/>
                           
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Submission Date");?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly="" name="submissiondate1" id="submissiondate1"  value="<?php echo date_formats($row['assign_dos']); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Description");?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="description"><?php echo $row['assign_desc']; ?></textarea>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Instructions & guidance"); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="instruction" id="instruction"><?php echo $row['assignment_instruction']; ?></textarea>
                                </div>
                            </div>       
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("File Upload");?></label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['assign_filename']; ?>" />
=======
                            </div>

                            <input type="hidden" class="form-control" name="assignmenturl" id="assignmenturl" value=""/>

                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Submission Date"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" readonly="" name="submissiondate1" id="submissiondate1"  value="<?php echo date_formats($row->assign_dos); ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Description"); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="description"><?php echo $row->assign_desc; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Instructions & guidance"); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="instruction" id="instruction"><?php echo $row->assignment_instruction; ?></textarea>
                                </div>
                            </div>       
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("File Upload"); ?></label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row->assign_filename; ?>" />
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                    <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
<<<<<<< HEAD
                                    <button type="submit" id="btnupd" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
=======
                                    <button type="submit" id="btnupd" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update"); ?></button>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                </div>
                            </div>
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <?php
endforeach;
?>
<script type="text/javascript">
     
    $("#btnupd").click(function (event) {
        if ($("#title1").val() != null & $("#degree2").val() != null & $("#batch2").val() != null & $("#semester1").val() != null & $("#course2").val() != null)
        {   
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'assignment/checkassignment/'.$param2; ?>",
=======
<script type="text/javascript">

    $("#btnupd").click(function (event) {
        if ($("#title1").val() != null & $("#degree2").val() != null & $("#subject").val() != null & $("#semester1").val() != null & $("#course2").val() != null)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'assignment/checkassignment/' . $param2; ?>",
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                dataType: 'json',
                async: false,
                data:
                        {
                            'title': $("#title1").val(),
                            'semester': $("#semester1").val(),
                            'degree': $("#degree2").val(),
<<<<<<< HEAD
                            'batch': $("#batch2").val(),
=======
                            'subject': $("#subject").val(),
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                            'course': $("#course2").val()
                        },
                success: function (response) {

<<<<<<< HEAD
                   
=======

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                    if (response.length == 0) {
                        $("#error_lable_exist").html('');
                        $('#frmeditassignment').attr('validated', true);
                        $('#frmeditassignment').submit();
                    } else
<<<<<<< HEAD
                    {                         
=======
                    {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        $("#error_lable_exist").html('Record is already present in the system');
                        return false;
                    }
                }
            });
            return false;
        }
        event.preventDefault();

<<<<<<< HEAD
    });$(document).ready(function(){
       
=======
    });
    $(document).ready(function () {

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        $('#degree2').on('change', function () {
            var department_id = $(this).val();
            department_branch(department_id);
        });
        $('#course2').on('change', function () {
            var branch_id = $(this).val();
            var department = $('#degree2').val();
            batch_form_department_branch(department, branch_id);
            semester_from_branch(branch_id);
        });
        
<<<<<<< HEAD
=======
         $('#semester1').on('change', function () {
             var semester = $(this).val();
            var branch_id = $("#course2").val();
            var department = $('#degree2').val();    
            subject_list_from_department_branch_semester(department,branch_id,semester);
        });

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        function department_branch(department_id) {
            $('#course2').find('option').remove().end();
            $('#course2').append('<option value>Select</option>');
            $.ajax({
                url: '<?php echo base_url(); ?>branch/department_branch/' + department_id,
                type: 'GET',
                success: function (content) {
                    var branch = jQuery.parseJSON(content);
                    console.log(branch);
                    $.each(branch, function (key, value) {
                        $('#course2').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                    });
                }
            });
        }
<<<<<<< HEAD
=======
        
          function subject_list_from_department_branch_semester(department, branch, semester)
        {
              $('#subject').find('option').remove().end();
            $('#subject').append('<option value>Select</option>');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>subject/subject_department_branch_sem/" + department + '/' + branch + '/' + semester ,
                success: function (response) {
                    var subject = jQuery.parseJSON(response);
                    $.each(subject, function (key, value) {
                        $('#subject').append('<option value=' + value.sm_id + '>' + value.subject_name + '</option>');
                    });
                }
            });
        }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

        function batch_form_department_branch(department, branch) {
            $('#batch2').find('option').remove().end();
            $('#batch2').append('<option value>Select</option>');
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>batch/department_branch_batch/" + department + '/' + branch,
                success: function (response) {
                    var branch = jQuery.parseJSON(response);
                    $.each(branch, function (key, value) {
                        $('#batch2').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                    });
                }
            });
        }

        function semester_from_branch(branch) {
            $('#semester1').find('option').remove().end();
            $('#semester1').append('<option value>Select</option>');
            $.ajax({
                url: '<?php echo base_url(); ?>semester/semester_branch/' + branch,
                type: 'GET',
                success: function (content) {
                    var semester = jQuery.parseJSON(content);
                    $.each(semester, function (key, value) {
                        $('#semester1').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                    });
                }
            });
<<<<<<< HEAD
        } 
=======
        }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    });
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
<<<<<<< HEAD
     var js_date_format = '<?php echo js_dateformat(); ?>';
        $("#submissiondate1").datepicker({
             format: js_date_format, 
             startDate : new Date(),
            autoclose:true,
=======
        var js_date_format = '<?php echo js_dateformat(); ?>';
        $("#submissiondate1").datepicker({
            format: js_date_format,
            startDate: new Date(),
            autoclose: true,
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        });

        $("#frmeditassignment").validate({
            rules: {
<<<<<<< HEAD
                degree:"required",
                course: "required",
                batch: "required",
                semester: "required",
                submissiondate: "required",              
                title:
                        {
                            required: true,
                           
                        },
                assignmentfile: {
                    
                    extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|txt',                                                                              
                },
            },
            messages: {
                degree:"Select department",
=======
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                submissiondate: "required",
                title:
                        {
                            required: true,
                        },
                assignmentfile: {
                    extension: 'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|txt',
                },
            },
            messages: {
                degree: "Select department",
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                course: "Select Branch",
                batch: "Select Batch",
                semester: "Select Semester",
                submissiondate: "Select date of submission",
                title:
                        {
<<<<<<< HEAD
                            required: "Enter title",                            
                        },
                assignmentfile: 
                        {
                            extension:'Upload valid file',  
=======
                            required: "Enter title",
                        },
                assignmentfile:
                        {
                            extension: 'Upload valid file',
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        },
            }
        });
    });
</script>
