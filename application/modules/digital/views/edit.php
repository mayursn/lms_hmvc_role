<?php
<<<<<<< HEAD
$edit_data = $this->db->get_where('library_manager', array('lm_id' => $param2))->result_array();
foreach ($edit_data as $row):
=======
$this->load->model('digital/Library_manager_model');
$row = $this->Library_manager_model->get($param2);


>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    ?>
    <div class=row>
        <div class=col-lg-12>
            <!-- col-lg-12 start here -->
<<<<<<< HEAD
            <div class="panel-default toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <!--            <div class=panel-heading>
                                    <h4 class=panel-title>  <?php echo ucwords("Update Library"); ?></h4>                
                                </div>                  -->
=======
            <div class="panel-default toggle panelMove panelClose panelRefresh">                
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                            </div>  
<<<<<<< HEAD
                            <?php echo form_open(base_url() . 'digital/update/' . $row['lm_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditlibrary', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
=======
                            <?php echo form_open(base_url() . 'digital/update/' . $row->lm_id, array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditlibrary', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("department"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="degree" id="degree2" class="form-control">
                                        <option value="">Select department</option>
                                        <option value="All" <?php
<<<<<<< HEAD
                                        if ($row['lm_degree'] == "All") {
=======
                                        if ($row->lm_degree == "All") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            echo "selected=selected";
                                        }
                                        ?>>All</option>
                                                <?php
<<<<<<< HEAD
                                                $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                foreach ($datadegree as $rowdegree) {
                                                    if ($rowdegree->d_id == $row['lm_degree']) {
=======
                                                $this->load->model('department/Degree_model');
                                                $datadegree = $this->Degree_model->get_many_by( array('d_status' => 1));                                                 
                                                foreach ($datadegree as $rowdegree) {
                                                    if ($rowdegree->d_id == $row->lm_degree) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                        ?>
                                                <option value="<?= $rowdegree->d_id ?>" selected><?= $rowdegree->d_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>							
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>	
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Branch "); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="course" id="course2" class="form-control">
                                        <option value="">Select Branch</option>
                                        <option value="All" <?php
<<<<<<< HEAD
                                        if ($row['lm_course'] == "All") {
=======
                                        if ($row->lm_course == "All") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            echo "selected=selected";
                                        }
                                        ?>>All</option>
                                                <?php
<<<<<<< HEAD
                                                $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                foreach ($course as $crs) {
                                                    ?>
                                            <option value="<?php echo $crs->course_id ?>" <?php
                                            if ($crs->course_id == $row['lm_course']) {
=======
                                                $this->load->model('branch/Course_model');
                                                $course = $this->Course_model->get_many_by(array('course_status' => 1));                                                
                                                foreach ($course as $crs) {
                                                    ?>
                                            <option value="<?php echo $crs->course_id ?>" <?php
                                            if ($crs->course_id == $row->lm_course) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                echo "selected='selected'";
                                            }
                                            ?> ><?= $crs->c_name ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Batch "); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="batch" id="batch2" onchange="get_student(this.value);" class="form-control"  >
                                        <option value="">Select batch</option>
                                        <option value="All" <?php
<<<<<<< HEAD
                                        if ($row['lm_batch'] == "All") {
=======
                                        if ($row->lm_batch == "All") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            echo "selected=selected";
                                        }
                                        ?>>All</option>
                                                <?php
<<<<<<< HEAD
                                                $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                foreach ($databatch as $row1) {
                                                    if ($row1->b_id == $row['lm_batch']) {
=======
                                                $this->load->model('batch/Batch_model');
                                                $databatch = $this->Batch_model->get_many_by(array('b_status' => 1));
                                                foreach ($databatch as $row1) {
                                                    if ($row1->b_id == $row->lm_batch) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
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
                                <label class="col-sm-4 control-label"><?php echo ucwords("Semester "); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <select name="semester" id="semester2" onchange="get_students(this.value);" class="form-control">
                                        <option value="">Select semester</option>
                                        <option value="All" <?php
<<<<<<< HEAD
                                        if ($row['lm_semester'] == "All") {
=======
                                        if ($row->lm_semester == "All") {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            echo "selected=selected";
                                        }
                                        ?>>All</option>   
                                                <?php
<<<<<<< HEAD
                                                $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                foreach ($datasem as $rowsem) {
                                                    if ($rowsem->s_id == $row['lm_semester']) {
=======
                                                $this->load->model('semester/Semester_model');
                                                $datasem = $this->Semester_model->get_many_by(array('s_status' => 1));
                                                
                                                foreach ($datasem as $rowsem) {
                                                    if ($rowsem->s_id == $row->lm_semester) {
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                        ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" ><?= $rowsem->s_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Library Name "); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
<<<<<<< HEAD
                                    <input type="text" class="form-control" name="title" id="title"  value="<?php echo $row['lm_title']; ?>"/>
=======
                                    <input type="text" class="form-control" name="title" id="title"  value="<?php echo $row->lm_title; ?>"/>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                </div>
                            </div>



<<<<<<< HEAD
                            <input type="hidden" class="form-control" name="pageurl" id="pageurl" value="<?php echo $row['lm_url']; ?>" />
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Description"); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="description" ><?php echo $row['lm_desc']; ?></textarea>
=======
                            <input type="hidden" class="form-control" name="pageurl" id="pageurl" value="<?php echo $row->lm_url; ?>" />
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("Description"); ?></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" id="description" ><?php echo $row->lm_desc; ?></textarea>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><?php echo ucwords("File Upload "); ?><span style="color:red">*</span></label>
                                <div class="col-sm-8">
<<<<<<< HEAD
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['lm_filename']; ?>" />
=======
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row->lm_filename; ?>" />
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

                                    <input type="file" class="form-control" name="libraryfile" id="libraryfile" />

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update"); ?></button>
                                </div>
                            </div>
                            </form>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <?php
endforeach;
?>
=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
<script type="text/javascript">

    function get_student(batch, semester = '') {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/batchwisestudent/',
            type: 'POST',
            data: {'batch': batch},
            success: function (content) {
                $("#student2").html(content);
            }
        });
    }

    function get_students(sem)
    {
<<<<<<< HEAD
        /* var batch = $("#batch2").val();
         $.ajax({
         url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
         type: 'POST',
         data: {'batch': batch, 'sem': sem},
         success: function (content) {
         //alert(content);
         $("#student2").html(content);
         }
         });
         */
=======

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        var batch = $("#batch2").val();
        var course = $("#course2").val();
        var degree = $("#degree2").val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/semwisestudent/',
            type: 'POST',
            data: {'batch': batch, 'sem': sem, 'course': course, 'degree': degree},
            success: function (content) {
                //alert(content);
                $("#student2").html(content);
            }
        });


    }


    $("#degree2").change(function () {
        var degree = $(this).val();
        var dataString = "degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'digital/get_cource/'; ?>",
            data: dataString,
            success: function (response) {
<<<<<<< HEAD
                if (degree == "All")
                {

                    $("#batch2").val($("#batch2 option:eq(1)").val());
                    $("#course2").val($("#course2 option:eq(1)").val());
                    $("#semester2").val($("#semester2 option:eq(1)").val());
                    /*$("#course2").html(response);
                     $("#batch2").html(response);
                     $("#semester2").prepend(response);
                     
                     $("#semester2").val($("#semester2 option:first").val());
                     
                     */
                } else {
                    $("#course2").html(response);
=======
                $('#course2').find('option').remove().end();
                $('#course2').append('<option value>Select</option>');
                $('#course2').append('<option value="All">All</option>');
                if (degree == "All")
                {
                    $("#course2").val($("#course2 option:eq(1)").val());
                    $("#batch2").val($("#batch2 option:eq(1)").val());
                    $("#semester2").val($("#semester2 option:eq(1)").val());
                } else {
                    var branch = jQuery.parseJSON(response);
                    console.log(branch);
                    $.each(branch, function (key, value) {
                        $('#course2').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                    });
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                }

            }
        });
    });

<<<<<<< HEAD
=======

    $("#batch2").change(function () {
        var batches = $("#batch2").val();
        if (batches == 'All')
        {
            $("#semester2").val($("#semester2 option:eq(1)").val());
        }
    });


>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    $("#course2").change(function () {
        var course = $(this).val();
        var degree = $("#degree2").val();
        var dataString = "course=" + course + "&degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'digital/get_batchs/'; ?>",
            data: dataString,
            success: function (response) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'digital/get_semesterall/'; ?>",
                    data: {'course': course},
                    success: function (response1) {
<<<<<<< HEAD
                        $("#semester2").html(response1);
                        $("#semester2").val($("#semester2 option:eq(1)").val());
                    }
                });
                // $("#semester2").val($("#semester2 option:eq(1)").val());
                $("#batch2").html(response);
=======
                        $('#semester2').find('option').remove().end();
                        $('#semester2').append('<option value>Select</option>');
                        $('#semester2').append('<option value="All">All</option>');
                        if (course == "All")
                        {
                            $("#semester2").val($("#semester2 option:eq(1)").val());
                        } else {
                            var sem_value = jQuery.parseJSON(response1);
                            console.log(sem_value);
                            $.each(sem_value, function (key, value) {
                                $('#semester2').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                            });
                        }



                    }
                });
                $('#batch2').find('option').remove().end();
                $('#batch2').append('<option value>Select</option>');
                $('#batch2').append('<option value="All">All</option>');
                //$("#semester").val($("#semester option:eq(1)").val());
                if (course == "All")
                {
                    $("#batch2").val($("#batch2 option:eq(1)").val());
                    $("#semester2").val($("#semester2 option:eq(1)").val());
                } else {

                    var batch_value = jQuery.parseJSON(response);
                    console.log(batch_value);
                    $.each(batch_value, function (key, value) {
                        $('#batch2').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                    });
                }
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
            }
        });
    });


<<<<<<< HEAD
=======

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });
    var js_date_format = '<?php echo js_dateformat(); ?>';
    $("#dateofsubmission1").datepicker({
        dateFormat: js_date_format,
        maxDate: 0
    });
    jQuery.validator.addMethod("character", function (value, element) {
        return this.optional(element) || /^[A-z]+$/.test(value);
    }, 'Please enter a valid character.');

    jQuery.validator.addMethod("url", function (value, element) {
        return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
    }, 'Please enter a valid URL.');

    $().ready(function () {
        $("#frmeditlibrary").validate({
            rules: {
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                student: "required",
                title:
                        {
                            required: true,
                        },
                libraryfile: {
                    extension: 'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',
                },
            },
            messages: {
                degree: "Select department",
                course: "Select Branch",
                batch: "Select batch",
                semester: "Select semester",
                student: "Select student",
                title:
                        {
                            required: "Enter title",
                        },
                libraryfile: {
                    extension: 'Upload valid file',
                },
            }
        });
    });
</script>
