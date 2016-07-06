<?php
$this->load->model('user/User_model');
$this->load->model('department/Degree_model');

$edit_data = $this->db->get_where('student', array('std_id' => $param2))->result_array();
$department = $this->Degree_model->order_by_column('d_name');

foreach ($edit_data as $row):
    ?>
    <?php
    $user = $this->User_model->get($row['user_id']);
    ?>
    <div class=row>                      
        <div class=col-lg-12>
            <!-- col-lg-12 start here -->
            <div class="panel-default">
                <div class="panel-body">
                    <div class="">
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>
                    <form name="frmstudentedit" id="frmstudentedit" method="post" action="<?php echo base_url(); ?>student/update/<?php echo $row['std_id'] ?>" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate"> 
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>"/>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("First Name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $row['std_first_name']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Last Name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $row['std_last_name'] ?>"/>
                            </div>
                        </div>												
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Email Id"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email_id" id="email_id" value="<?php echo $row['email'] ?>" disabled=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Password"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" name="password" id="password"  
                                       value="<?php echo $user->password; ?>" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Gender"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <?php
                                $male = "";
                                $female = "";
                                if ($row['std_gender'] == 'Male') {
                                    $male = 'checked';
                                } else {
                                    $female = 'checked';
                                }
                                ?>
                                <input type="radio" name="gen" value="male" <?php echo $male; ?> >Male
                                <input type="radio" name="gen" value="female" <?php echo $female; ?>>Female
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Parent Name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="parentname" id="parentname" value="<?php echo $row['parent_name'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Parent Contact No"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="parentcontact" id="parentcontact" value="<?php echo $row['parent_contact'] ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Parent Email Id"); ?><span style="color:red"></span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="parent_email_id" id="parent_email_id" value="<?php echo $row['parent_email'] ?>" />
                                <span id="emailerror" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Address"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address"><?php echo $row['address'] ?></textarea>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("City"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city'] ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Zip"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $row['zip'] ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Birth Date"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="birthdate1" id="basic-datepicker" value="<?php echo date("F d, Y", strtotime($row['std_birthdate'])); ?>" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Marital Status"); ?></label>
                            <div class="col-sm-8">
                                <?php
                                $single = "";
                                $married = "";
                                $separated = "";
                                $widowed = "";
                                if ($row['std_marital'] == 'Single') {
                                    $single = "selected";
                                } elseif ($row['std_marital'] == 'Married') {
                                    $married = "selected";
                                } elseif ($row['std_marital'] == 'Separated') {
                                    $separated = "selected";
                                } elseif ($row['std_marital'] == 'Widowed') {
                                    $widowed = "selected";
                                }
                                ?>
                                <select name="maritalstatus" class="form-control" id="maritalstatus">
                                    <option value="">Select marital status</option>
                                    <option value="single" <?= $single; ?>>Single</option>
                                    <option value="married" <?= $married; ?>>Married</option>
                                    <option value="separated" <?= $separated; ?>>Separated</option>
                                    <option value="widowed" <?= $widowed; ?>>Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("department"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="degree" class="form-control" id="edit-degree">
                                    <option value="">Select department</option>
                                    <?php foreach ($department as $degree) { ?>
                                    <option value="<?php $degree->d_id ?>" 
                                        <?php if ($row['std_degree'] == $degree->d_id) {
                                            echo "selected";
                                        }
                                        ?>><?php echo $degree->d_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="course" class="form-control" id="edit-course">
                                    <option value="">Select branch</option>
                                    <?php
                                    $datacourse = $this->db->get_where('course', array('course_status' => 1))->result();
                                    foreach ($datacourse as $rowcourse) {
                                        if ($rowcourse->course_id == $row['course_id']) {
                                            ?>
                                            <option value="<?= $rowcourse->course_id ?>" selected><?= $rowcourse->c_name ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $rowcourse->course_id ?>"><?= $rowcourse->c_name ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Batch"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="batch" class="form-control" id="edit-batch">
                                    <option value="">Select batch</option>
                                    <?php
                                    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                    foreach ($databatch as $row1) {
                                        if ($row1->b_id == $row['std_batch']) {
                                            ?>
                                            <option value="<?= $row1->b_id ?>" selected><?= $row1->b_name ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $row1->b_id ?>"><?= $row1->b_name ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Semester"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="semester" class="form-control"  id="edit-semester">
                                    <option value="">Select semester</option>
                                    <?php
                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                    foreach ($datasem as $rowsem) {
                                        if ($rowsem->s_id == $row['semester_id']) {
                                            ?>
                                            <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("class"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select name="class" class="form-control" id="class1">
                                    <option value="">Select class</option>
                                    <?php
                                    $class = $this->db->get('class')->result_array();

                                    foreach ($class as $c) {
                                        if ($c['class_id'] == $row['class_id']) {
                                            ?>
                                            <option selected value="<?php echo $c['class_id'] ?>"><?php echo $c['class_name'] ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $c['class_id'] ?>"><?php echo $c['class_name'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Mobile No"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="mobileno" id="mobileno"  value="<?php echo $row['std_mobile'] ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Facebook URL"); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $row['std_fb'] ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Twitter URL"); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $row['std_twitter'] ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Group "); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly value="<?php echo $row['group_id'] ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("User Type"); ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly value="<?php echo $row['user_type'] ?>" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Admission Type"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-8">

                                <select name="admissiontype" class="form-control" id="admissiontype">
                                    <option value="">Select admission type</option>

                                    <?php
                                    $admissiontype = $this->db->get_where('admission_type', array('at_status' => 1))->result();
                                    foreach ($admissiontype as $rowtype) {
                                        if ($rowtype->at_id == $row['admission_type_id']) {
                                            ?>
                                            <option value="<?= $rowtype->at_id ?>" selected><?= $rowtype->at_name ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>

                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("File Upload"); ?></label>
                            <div class="col-sm-8">
                                <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['profile_photo']; ?>" />
                                <input type="file" class="form-control" name="profilefile" id="profilefile" />

                                <img src="<?= base_url() ?>/uploads/student_image/<?= $row['profile_photo']; ?>" height="100px" width="100px" id="blah"  />

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo ucwords("Description"); ?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="std_about" id="std_about" ><?php echo $row['std_about'] ?></textarea>
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

    <?php
endforeach;
?>
<script type="text/javascript">

    $('#edit-degree').on('change', function () {
        var department_id = $(this).val();
        department_branch(department_id);
    });
    $('#edit-course').on('change', function () {
        var branch_id = $(this).val();
        var department = $('#edit-degree').val();
        batch_form_department_branch(department, branch_id);
        semester_from_branch(branch_id);
    });

    function department_branch(department_id) {
        $('#edit-course').find('option').remove().end();
        $('#edit-course').append('<option value>Select</option>');
        $.ajax({
            url: '<?php echo base_url(); ?>branch/department_branch/' + department_id,
            type: 'GET',
            success: function (content) {
                var branch = jQuery.parseJSON(content);
                console.log(branch);
                $.each(branch, function (key, value) {
                    $('#edit-course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                });
            }
        });
    }

    function batch_form_department_branch(department, branch) {
        $('#edit-batch').find('option').remove().end();
        $('#edit-batch').append('<option value>Select</option>');
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>batch/department_branch_batch/" + department + '/' + branch,
            success: function (response) {
                var branch = jQuery.parseJSON(response);
                $.each(branch, function (key, value) {
                    $('#edit-batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                });
            }
        });
    }

    function semester_from_branch(branch) {
        $('#edit-semester').find('option').remove().end();
        $('#edit-semester').append('<option value>Select</option>');
        $.ajax({
            url: '<?php echo base_url(); ?>semester/semester_branch/' + branch,
            type: 'GET',
            success: function (content) {
                var semester = jQuery.parseJSON(content);
                $.each(semester, function (key, value) {
                    $('#edit-semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                });
            }
        });
    }

    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $(document).ready(function () {
        $("#birthdate1").datepicker({
        });
        $("#basic-datepicker").datepicker({
            endDate: new Date(),
            format: "MM d, yyyy",
            autoclose: true});

        jQuery.validator.addMethod("mobile_no", function (value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        }, 'Please enter a valid contact no.');
        jQuery.validator.addMethod("email_id", function (value, element) {
            return this.optional(element) || /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value);
        }, 'Please enter a valid email address.');

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("zip_code", function (value, element) {
            return this.optional(element) || /^[0-9]+$/.test(value);
        }, 'Please enter a valid zip code.');

        $("#frmstudentedit").validate({
            rules: {
                name: {
                    required: true,
                },
                f_name:
                        {
                            required: true,
                            character: true,
                        },
                l_name:
                        {
                            required: true,
                            character: true,
                        },
                email_id:
                        {
                            required: true,
                            email: true,
                        },
                password: "required",
                gen: "required",
                birthdate1: "required",
                address: "required",
                mobileno:
                        {
                            required: true,
                            maxlength: 11,
                            mobile_no: true,
                            minlength: 10,
                        },
                parentname: {
                    required: true,
                    character: true,
                },
                parentcontact: {
                    required: true,
                    maxlength: 11,
                    mobile_no: true,
                    minlength: 10,
                },
                parent_email_id: {
                    email_id: true,
                },
                city:
                        {
                            required: true,
                            character: true,
                        },
                zip:
                        {
                            required: true,
                            zip_code: true,
                        },
                address:"required",
                        degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                class: "required",
                facebook:
                        {
                            url2: true,
                        },
                twitter:
                        {
                            url2: true,
                        },
                profilefile:
                        {
                            extension: 'gif|jpg|png|jpeg',
                        },
                admissiontype: "required",
            },
            messages: {
                name: {
                    required: "Enter name",
                },
                f_name:
                        {
                            required: "Enter first name",
                            character: "Enter valid name",
                        },
                l_name:
                        {
                            required: "Enter last name",
                            character: "Enter valid name",
                        },
                email_id: {
                    required: "Enter email id",
                },
                password: "Enter password",
                gen: "Slect gender",
                birthdate1: "Select birthdate",
                address: "Enter address",
                mobileno:
                        {
                            required: "Enter mobile no",
                            maxlength: "Enter maximum 10 digit number",
                            mobile_no: "Enter valid mobile number",
                            minlength: "Enter minimum 10 digit number",
                        },
                parentname: {
                    required: "Enter parent name",
                    character: "Enter valid name",
                },
                parentcontact: {
                    required: "Enter mobile no",
                    maxlength: "Enter maximum 10 digit number",
                    mobile_no: "Enter valid mobile number",
                    minlength: "Enter minimum 10 digit number",
                },
                parent_email_id: {
                    email_id: "Enter valid email id",
                },
                city:
                        {
                            required: "Enter city",
                            character: "Enter valid city name",
                        },
                zip:
                        {
                            required: "Enter zip code",
                        },
                degree: "Select department",
                course: "Select branch",
                batch: "Select batch",
                semester: "Select semester",
                class: "Select class",
                profilefile:
                        {
                            extension: 'Upload valid file',
                        },
                admissiontype: "Select admission type",
            }
        });
    });
</script>
