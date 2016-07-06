<!-- Start .row -->
<div class=row>                      

    <div class=col-lg-12>
        <!-- col-lg-12 start here -->
<<<<<<< HEAD
        <div class="panel-default toggle panelMove panelClose panelRefresh">      
            <div class=panel-body>
                <div class="row filter-row">
                <form id="attendance-routine" action="#" method="post" class="form-groups-bordered validate">
                    <div class="col-md-12">
                        <div class="form-group col-sm-3">
                            <label><?php echo ucwords("department"); ?></label>
                            <select class="form-control" id="department" name="department" >
                                <option value="">Select</option>
                                <?php foreach ($degree as $row) { ?>
                                    <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label><?php echo ucwords("Branch"); ?></label>
                            <select id="branch" name="branch" class="form-control" >
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label><?php echo ucwords("Batch"); ?></label>
                            <select id="batch" name="batch" class="form-control" >
                                <option value="">Select</option>
                            </select>
                        </div>    
                        <div class="form-group col-sm-3">
                            <label> <?php echo ucwords("Semester"); ?></label>
                            <select id="semester" name="semester" data-filter="6" class="form-control" >
                                <option value="">Select</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group col-sm-3">
                            <label> <?php echo ucwords("class"); ?></label>
                            <select id="class" name="class" class="form-control" >
                                <option value="">Select</option>
                                <?php foreach ($class as $row) { ?>
                                    <option value="<?php echo $row->class_id; ?>"><?php echo $row->class_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label> <?php echo ucwords("date"); ?></label>
                            <input id="date" type="text" class="form-control datepicker-normal" name="date" placeholder="Select"/>
                        </div>
                        <div class="form-group col-sm-5">
                            <label> <?php echo ucwords("class routine"); ?></label>
                            <select id="class_routine" name="class_routine" class="form-control" >
                                <option value="">Select</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-1">
                            <label>&nbsp;</label><br/>
                            <input id="search-exam-data" type="submit" value="Go" class="btn btn-info vd_bg-green"/>
                        </div>
                    </div>
                </form>
                </div>
                <div id="student-attendance-list">
                    <div class="col-md-12">
=======
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
                <div class="row filter-row">
                    <form id="attendance-routine" action="#" method="post" class="form-groups-bordered form-horizontal validate">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Date<span style="color:red">*</span></label>
                            <div class="col-sm-6">
                                <input id="date" type="text" class="form-control datepicker-normal" name="date" placeholder="Select"
                                       value="<?php echo $date; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-md-offset-2">
                                <input id="search-exam-data" type="submit" value="Submit" class="btn btn-info vd_bg-green"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="student-attendance-list">
                    <div class="col-md-12">
                        <?php if (count($professor_class_routine_list)) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Class Routine List</h4>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <table id="class-routine-list" class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <th>Department</th>
                                                <th>Branch</th>
                                                <th>Semester</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $counter = 1;
                                            foreach ($professor_class_routine_list as $routine) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><?php echo $routine->d_name; ?></td>
                                                    <td><?php echo $routine->c_name; ?></td>
                                                    <td><?php echo $routine->s_name; ?></td>
                                                    <td><?php echo $routine->class_name; ?></td>
                                                    <td><?php echo $routine->subject_name; ?></td>                                                    
                                                    <td><?php 
                                                        echo date('h:i A', strtotime($routine->Start)) . ' - ' .
                                                        date('h:i A', strtotime($routine->End));
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $this->load->model('attendance/Attendance_model');
                                                        $status = $this->Attendance_model->class_routine_status($routine->ClassRoutineId, date('Y-m-d', strtotime($date)));
                                                        ?>

                                                        <?php
                                                        if ($status) {
                                                            echo 'Done';
                                                        } else {
                                                            echo 'Pending';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>attendance/take_attedance/<?php echo $routine->ClassRoutineId; ?>/<?php echo date('Y-m-d', strtotime($date)) ?>">
                                                            <span class="label label-primary mr6 mb6">
                                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                                Attendance
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">Class Routine List</div>
                                </div>
                                <div class="panel-body">
                                    <table id="class-routine-list" class="table table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <td>No</td>
                                                <th>Department</th>
                                                <th>Branch</th>
                                                <th>Semester</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        <?php if (count($student)) { ?>
                            <?php
                            $this->load->model('admin/Crud_model');
                            ?>
                            <br/>
<<<<<<< HEAD
                            <form method="post" action="<?php echo base_url(); ?>professor/take_class_routine_attendance"
=======
                            <form method="post" action="<?php echo base_url(); ?>attendance/take_class_routine_attendance"
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                  class="form-groups-bordered">
                                <input type="hidden" name="department" value="<?php echo $department; ?>"/>
                                <input type="hidden" name="branch" value="<?php echo $branch; ?>"/>
                                <input type="hidden" name="batch" value="<?php echo $batch; ?>"/>
                                <input type="hidden" name="semester" value="<?php echo $semester; ?>"/>
                                <input type="hidden" name="class" value="<?php echo $class_name; ?>"/>
                                <input type="hidden" name="professor" value="<?php echo $professor; ?>"/>
                                <input type="hidden" name="class_routine" value="<?php echo $class_routine; ?>"/>
                                <input type="hidden" name="date" value="<?php echo $date; ?>"/>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h4>Student List</h4>
<<<<<<< HEAD
                                            
=======

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                        </div>
                                    </div>
                                    <div class="panel-body">                                        
                                        <table class="table table-striped table-bordered table-responsive" id="attendance-data-table-2">
                                            <thead>
                                            <th>No</th>
                                            <th>Roll No</th>
                                            <th>Student Name</th>
                                            <th>Action</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $counter = 1;
                                                $date = date('Y-m-d', strtotime($date));
                                                foreach ($student as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $counter++; ?></td>
                                                        <td><?php echo $row->std_roll; ?></td>
                                                        <td><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></td>
                                                        <?php
                                                        $status = $this->Crud_model->check_attendance_status($department, $branch, $batch, $semester, $class_name, $class_routine, $date, $row->std_id);
                                                        ?>
                                                        <td>
                                                            <?php if (isset($status)) { ?>
                                                                <input type="checkbox" name="student_<?php echo $row->std_id; ?>" 
                                                                       <?php if ($status->is_present == 1) echo 'checked=""'; ?>/>
                                                                   <?php } else { ?>
                                                                <input type="checkbox" name="student_<?php echo $row->std_id; ?>" checked=""/>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-info"/>
                            </form>
                        <?php } ?>
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
</div>

<script type="text/javascript">
    $(document).ready(function () {
<<<<<<< HEAD
        "use strict";
        var department_id = '<?php echo $department; ?>';
        var branch_id = '<?php echo $branch; ?>';
        var batch_id = '<?php echo $batch; ?>';
        var semester_id = '<?php echo $semester; ?>';
        var class_id = '<?php echo $class_name; ?>';
        var class_date = '<?php echo $date; ?>';
        var class_routine = '<?php echo $class_routine; ?>';
        var professor_id = '<?php echo $this->session->userdata('login_user_id'); ?>';

        $('#department').val(department_id);
        branch_from_department(department_id);
        setTimeout(function () {
            $('#branch').val(branch_id)
        }, 100);
        batch_from_department_and_branch(department_id, branch_id);
        setTimeout(function () {
            $('#batch').val(batch_id);
        }, 100);
        semester_list_from_branch(branch_id);
        setTimeout(function () {
            $('#semester').val(semester_id);
        }, 100);
        $('#class').val(class_id);
<?php if ($date != '') { ?>
            $('#date').val('<?php echo date('d F Y', strtotime($date)); ?>');
<?php } ?>

        setTimeout(function () {
            fetch_class_routine(department_id, branch_id, batch_id, semester_id, class_id, professor_id, class_date)
        }, 100);
        setTimeout(function () {
            $('#class_routine').val(class_routine)
        }, 1000);

        $('#attendance-data-table').dataTable({
            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "language": { "emptyTable": "No data available" }
        });
        
        
=======
        $('#class-routine-list').DataTable({});
        "use strict";

>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
        $("#attendance-routine").validate({
            rules: {
                'department': "required",
                'branch': "required",
                'batch': "required",
                'semester': "required",
                'class': "required",
                'date': "required",
                'class_routine': "required",
            },
            messages: {
                'department': "Select department",
                'branch': "Select branch",
                'batch': "Select batch",
                'semester': "Select semester",
                'class': "Select class",
                'date': "Select date",
                'class_routine': "Select class routine"
            }
        });
<<<<<<< HEAD
        
        $(".datepicker-normal").datepicker({
            format: ' MM d, yyyy',
            autoclose:true,
            changeMonth: true,
            changeYear: true
            
        });
        $('#exam-data-table').dataTable({
            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            "language": { "emptyTable": "No data available" }
        });
        // branch from department
        $('#department').on('change', function () {
            department_id = $(this).val();
            branch_from_department(department_id);
        });
        $('#branch').on('change', function () {
            department_id = $('#department').val();
            branch_id = $(this).val();
            batch_from_department_and_branch(department_id, branch_id);
            semester_list_from_branch(branch_id);
        });
        $('#date').on('change', function () {
            class_date = $(this).val();
            department_id = $('#department').val();
            branch_id = $('#branch').val();
            batch_id = $('#batch').val();
            semester_id = $('#semester').val();
            class_id = $('#class').val();
            var professor_id = '<?php echo $this->session->userdata('login_user_id'); ?>';
            fetch_class_routine(department_id, branch_id, batch_id, semester_id, class_id, professor_id, class_date);

        });

        function fetch_class_routine(department_id, branch_id, batch_id, semester_id, class_id, professor_id, class_date) {
            $.ajax({
                url: '<?php echo base_url(); ?>professor/check_class_routine',
                type: 'POST',
                data: {
                    'class_date': class_date,
                    'professor_id': professor_id,
                    'department_id': department_id,
                    'branch_id': branch_id,
                    'semester_id': semester_id,
                    'class_id': class_id,
                    'batch_id': batch_id
                },
                success: function (content) {
                    $('#class_routine').html(content);
                }
            });
        }
        function branch_from_department(department_id) {
            $('#branch').find('option').remove().end();
            $('#branch').append('<option value="">Select</option>');
            $.ajax({
                url: '<?php echo base_url(); ?>professor/course_list_from_degree/' + department_id,
                type: 'get',
                success: function (content) {
                    var branch = jQuery.parseJSON(content);
                    $.each(branch, function (key, value) {
                        $('#branch').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                    });
                }
            });
        }

        function batch_from_department_and_branch(department, branch) {
            $('#batch').find('option').remove().end();
            $('#batch').append('<option value="">Select</option>');
            $.ajax({
                url: '<?php echo base_url(); ?>professor/batch_list_from_degree_and_course/' + department + '/' + branch,
                type: 'get',
                success: function (content) {
                    var batch = jQuery.parseJSON(content);
                    $.each(batch, function (key, value) {
                        $('#batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                    });
                }
            });
        }

        function semester_list_from_branch(branch_id) {
            $('#semester').find('option').remove().end();
            $('#semester').append('<option value="">Select</option>');
            $.ajax({
                url: '<?php echo base_url(); ?>professor/get_semesters_of_branch/' + branch_id,
                type: 'get',
                success: function (content) {
                    var semester = jQuery.parseJSON(content);
                    $.each(semester, function (key, value) {
                        $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                    });
                }
            });
        }

=======
  var js_format = '<?php echo js_dateformat(); ?>';
        $(".datepicker-normal").datepicker({
            format: js_format,
            todayHighlight: true,
            autoclose: true

        });
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
    });
</script>