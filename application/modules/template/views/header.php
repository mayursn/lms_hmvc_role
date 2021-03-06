<!DOCTYPE html>
<html class=no-js>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?> | <?php echo system_name(); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Import google fonts - Heading first/ text second -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" rel=stylesheet type=text/css>
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel=stylesheet type=text/css>
        <!-- Css files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/event_calendar/eventCalendar.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/event_calendar/eventCalendar_theme_responsive.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.min.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css"/>

        <!-- JS Files -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>

        <!-- Fav and touch icons -->
        <link rel=apple-touch-icon-precomposed sizes=144x144 href=<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-144-precomposed.png>
        <link rel=apple-touch-icon-precomposed sizes=114x114 href=<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-114-precomposed.png>
        <link rel=apple-touch-icon-precomposed sizes=72x72 href=<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-72-precomposed.png>
        <link rel=apple-touch-icon-precomposed href=<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-57-precomposed.png>
        <link rel=icon href=<?php echo base_url(); ?>assets/img/ico/favicon.ico type=image/png>
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name=msapplication-TileColor content="#3399cc">
        <script>
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <style>                
            .notification2 {
                background: #ed7a53 none repeat scroll 0 0;
                border-radius: 2px;
                box-shadow: 0 1px 0 0 rgba(0, 0, 0, 0.2);
                color: #fff;
                font-family: Tahoma;
                font-size: 12px;
                font-weight: 700;
                padding: 0 7px;
                position: relative;
                right: 10px;
                text-shadow: none;
                top: 11px;
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="<?php echo $this->router->fetch_method(); ?>" style="min-height: 100%">
        <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--><!-- .#header -->
        <div id="header">
            <nav class="navbar navbar-default" role=navigation>
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url(); ?>admin">
                        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo">
                    </a>
                </div>
                <div id="navbar-no-collapse" class="navbar-no-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <!--Sidebar collapse button-->
                            <a href=# class="collapseBtn leftbar"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </li>
                        <li class="dropdown">
<<<<<<< HEAD
                            <a href="<?php echo base_url(); ?>email/inbox">
=======
                            <a href="<?php echo base_url(); ?>email_inbox">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span class=txt>Messages</span>
                            </a>

                        </li>
                    </ul>
                    <ul class="nav navbar-right usernav">
                        <li class="dropdown">
                            <a href=# class="dropdown-toggle" data-toggle=dropdown>
                                <i class="fa fa-globe" aria-hidden="true"></i>
<<<<<<< HEAD
                                <span class="notification"></span>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class=menu>
                                    <ul class=notif>
                                        <li class=header><strong>No notification is there</strong></li>

                                    </ul>
=======
                                <?php  if($this->session->userdata('notifications')['total_notification'] > 0){ ?>   <span class="notification"><?php echo $this->session->userdata('notifications')['total_notification']; ?></span><?php } ?>
                            </a>
                            <ul class="dropdown-menu right">
                                <li class=menu>
                                     <ul class=notif>
                                            <li class=header><strong>Notifications</strong> (<?php echo $this->session->userdata('notifications')['total_notification']; ?>) items</li>
                                            <?php if (isset($this->session->userdata('notifications')['fees_structure'])) { ?>
                                                <li><a href="<?php echo base_url('student/student_fees'); ?>"><span class=icon>
                                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                                        </span> <span class=event> New fee structure was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['exam_manager']) || isset($this->session->userdata('notifications')['exam_time_table'])) { ?>
                                                <li><a href="<?php echo base_url('student/exam_listing'); ?>"><span class=icon><i class="s16 fa fa-commenting"></i></span> <span class=event>New Exam or Exam schedule was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['assignment_manager'])) { ?>
                                                <li><a href="<?php echo base_url('assignment/submission'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>New Assignment was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['project_manager'])) { ?>
                                                <li><a href="<?php echo base_url('project/submission'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>New Project was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['marks_manager'])) { ?>
                                                <li><a href="<?php echo base_url('student/exam_marks'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>Exam marks was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['participate_manager'])) { ?>
                                                <li><a href="<?php echo base_url('participate/volunteer'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>New Participate was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['study_resources'])) { ?>
                                                <li><a href="<?php echo base_url('student/studyresources'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>New Study Resources was added.</span></a>
                                                </li>
                                            <?php } ?>
                                            <?php if (isset($this->session->userdata('notifications')['library_manager'])) { ?>
                                                <li><a href="<?php echo base_url('student/digitallibrary'); ?>"><span class=icon><i class="s16 fa fa-newspaper-o"></i></span> <span class=event>New Digital Library was added.</span></a>
                                                </li>
                                            <?php } ?>
                               
                                        </ul>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                </li>
                            </ul>
                        </li>
                        <li class=dropdown>
<<<<<<< HEAD
                            <a href=# class="dropdown-toggle avatar" data-toggle=dropdown><img src=<?php echo $this->Crud_model->get_image_url('admin', $this->session->userdata('admin_id')); ?> alt="" class="image"> 
                                <span class=txt>
                                    <?php echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?>
                                </span> <b class=caret></b>
=======
                            <?php $this->load->model('user/User_model');
                            $user_id = $this->session->userdata('user_id');
                            $user = $this->User_model->get($user_id);
                            ?>
                            <a href=# class="dropdown-toggle avatar" data-toggle=dropdown><img src=<?php echo base_url().'system_image/'.$user->profile_pic; ?> alt="" class="image"> 
                                <span class=txt><?php echo $user->first_name.' '.$user->last_name; ?></span> <b class=caret></b>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                            </a>
                            <ul class="dropdown-menu right">
                                <li class=menu>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard" aria-hidden="true"></i>Home</a>
                                        </li>
<<<<<<< HEAD
                                        <li><a href="<?php echo base_url(); ?>admin/manage_profile">
=======
                                        <li><a href="<?php echo base_url(); ?>manage_profile">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                <i class="fa fa-user" aria-hidden="true"></i>Edit profile</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>user/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>user/logout">
                                <i class="fa fa-sign-out" aria-hidden="true"></i><span class=txt>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
            <!-- /navbar -->
        </div>
        <!-- / #header -->
        <div id=wrapper>
            <!-- #wrapper --><!--Sidebar background-->
            <div id=sidebarbg class="hidden-lg hidden-md hidden-sm hidden-xs"></div>
            <!--Sidebar content-->
            <div id="sidebar" class="page-sidebar hidden-lg hidden-md hidden-sm hidden-xs">
                <div class=shortcuts>
                    <ul>
<<<<<<< HEAD
                        <li><a href="<?php echo base_url(); ?>admin/system_settings" title="System Settings" class=tip>
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>admin/backup" title="Database backup" class=tip>
                                <i class="fa fa-database" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>reports" title="Reports" class=tip>
                                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>admin/manage_profile" title="Profile" class=tip>
=======
                        <li><a href="<?php echo base_url(); ?>system_settings" title="System Settings" class=tip>
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>backup" title="Database backup" class=tip>
                                <i class="fa fa-database" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>report_chart" title="Reports" class=tip>
                                <i class="fa fa-pie-chart" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url(); ?>manage_profile" title="Profile" class=tip>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End search -->
                <!-- Start .sidebar-inner -->
                <div class=sidebar-inner>
                    <!-- Start .sidebar-scrollarea -->
                    <div class=sidebar-scrollarea>
                        <div class=sidenav>
                            <div class="sidebar-widget mb0">
                                <h6 class="title mb0">Navigation</h6>
                            </div>
                            <!-- End .sidenav-widget -->
                            <div class=mainnav>
                                <ul>
                                    <li>
<<<<<<< HEAD
                                        <a <?php echo active_single_menu('dashboard', $page); ?> href="<?php echo base_url(); ?>admin/dashboard">
=======
                                        <a <?php echo active_single_menu('dashboard', $page); ?> href="<?php echo base_url(); ?>user/dashboard">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <i class="s16 fa fa-dashboard"></i>
                                            <span class="txt">Dashboard</span>
                                            <span class="indicator"></span>
                                        </a>
                                    </li>          

                                    <?php
                                    $pages = [
                                        'department', 'branch', 'batch', 'semester', 'class', 'admission_type', 'student',
                                        'syllabus', 'subject', 'holiday', 'chancellor', 'course_category', 'vocational_course',
                                        'assessments', 'timeline', 'vocational_register_student'
                                    ];
                                    ?>                                    

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-chain"></i>
                                            <span class="txt">Basic Management</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>

                                            <?php if (check_permission($permission, 'Department')) { ?>
                                                <li>
                                                    <a id="link-department" href="<?php echo base_url(); ?>department">
                                                        <i class="s16 fa fa-exchange"></i>
                                                        <span class="txt">Department</span>
                                                    </a>
                                                </li>
                                            <?php } ?>

                                            <?php if (check_permission($permission, 'Branch')) { ?>
                                                <li>
                                                    <a id="link-branch" href="<?php echo base_url(); ?>branch">
                                                        <i class="s16 icomoon-icon-file"></i>
                                                        <span class="txt">Branch</span>
                                                    </a>
                                                </li>
                                            <?php } ?>                                            

                                            <li class="hide">
<<<<<<< HEAD
                                                <a id="link-batch" href="<?php echo base_url(); ?>admin/batch">
=======
                                                <a id="link-batch" href="<?php echo base_url(); ?>batch">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-share-alt"></i>
                                                    <span class="txt">Batch</span>
                                                </a>
                                            </li>

                                            <?php if (check_permission($permission, 'Semester')) { ?>
                                                <li>
                                                    <a id="link-semester" href="<?php echo base_url(); ?>semester">
                                                        <i class="s16 fa fa-sitemap"></i>
                                                        <span class="txt">Semester</span>
                                                    </a>
                                                </li>
                                            <?php } ?>

<<<<<<< HEAD
                                            <?php if (check_permission($permission, 'Class')) { ?>

                                                <li>
                                                    <a id="link-class" href="<?php echo base_url(); ?>classes">
                                                        <i class="s16 icomoon-icon-unlocked"></i>
                                                        <span class="txt">Class</span>
                                                    </a>
                                                </li>
                                            <?php } ?>

                                            <?php if (check_permission($permission, 'Admission_Type')) { ?>
                                                <li>
                                                    <a id="link-admission_type" href="<?php echo base_url(); ?>admission_type">
                                                        <i class="s16 fa fa-key"></i>
                                                        <span class="txt">Admission Type</span>
                                                    </a>
                                                </li>
                                            <?php } ?>

=======
                                            <li>
                                                <a id="link-class" href="<?php echo base_url(); ?>classes">
                                                    <i class="s16 icomoon-icon-unlocked"></i>
                                                    <span class="txt">Class</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a id="link-admission_type" href="<?php echo base_url(); ?>admission_type">
                                                    <i class="s16 fa fa-key"></i>
                                                    <span class="txt">Admission Type</span>
                                                </a>
                                            </li>
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <li>
                                                <a id="link-student" href="<?php echo base_url(); ?>student">
                                                    <i class="s16 icomoon-icon-user-plus-2"></i>
                                                    <span class="txt">Student</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-subject" href="<?php echo base_url(); ?>admin/subject">
=======
                                                <a id="link-subject" href="<?php echo base_url(); ?>subject">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-book"></i>
                                                    <span class="txt">Subject</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-syllabus" href="<?php echo base_url(); ?>admin/syllabus">
=======
                                                <a id="link-syllabus" href="<?php echo base_url(); ?>syllabus">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file-2"></i>
                                                    <span class="txt">Syllabus</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-holiday" href="<?php echo base_url(); ?>admin/holiday">
=======
                                                <a id="link-holiday" href="<?php echo base_url(); ?>holiday">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file"></i>
                                                    <span class="txt">Holiday</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-chancellor" href="<?php echo base_url(); ?>admin/chancellor">
=======
                                                <a id="link-chancellor" href="<?php echo base_url(); ?>chancellor">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-user"></i>
                                                    <span class="txt">Chancellor</span>
                                                </a>
                                            </li>
<<<<<<< HEAD

                                            <?php if (check_permission($permission, 'Course_Category')) { ?>
                                                <li>
                                                    <a id="link-course_category" href="<?php echo base_url(); ?>course-category">
                                                        <i class="s16 fa fa-globe"></i>
                                                        <span class="txt"> Course Category</span>
                                                    </a>
                                                </li>
                                            <?php } ?>   

                                            <li>
                                                <a id="link-vocational_course" href="<?php echo base_url(); ?>admin/vocationalcourse">
=======
                                            <li>
                                                <a id="link-course_category" href="<?php echo base_url(); ?>category">
                                                    <i class="s16 fa fa-globe"></i>
                                                    <span class="txt"> Course Category</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a id="link-vocational_course" href="<?php echo base_url(); ?>vocationalcourse">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-life-ring"></i>
                                                    <span class="txt">Vocational Course</span>
                                                </a>
                                            </li>

                                            <li>
<<<<<<< HEAD
                                                <a id="link-assessments" href="<?php echo base_url(); ?>admin/assessments">
=======
                                                <a id="link-assessments" href="<?php echo base_url(); ?>assessments">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file"></i>
                                                    <span class="txt">Assessment</span>
                                                </a>
                                            </li>
<<<<<<< HEAD
=======
                                            <li>
                                                <a id="link-assessments" href="<?php echo base_url(); ?>academic_year">
                                                    <i class="s16 icomoon-icon-file"></i>
                                                    <span class="txt">Academic Year</span>
                                                </a>
                                            </li>
                                            
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <!--<li>
                                                <a id="link-timeline" href="<?php echo base_url(); ?>admin/time_line">
                                                    <i class="s16 icomoon-icon-file"></i>
                                                    <span class="txt">Time Line</span>
                                                </a>
                                            </li>-->                                               
                                        </ul>
                                    </li>

                                    <?php
                                    $pages = [
                                        'event', 'assignment', 'studyresource', 'project', 'library', 'courseware', 'subscriber',
                                        'participate'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-try"></i>
                                            <span class="txt">Assets Management</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
<<<<<<< HEAD

                                            <?php if (check_permission($permission, 'Event')) { ?>
                                                <li>
                                                    <a id="link-event" href="<?php echo base_url(); ?>event">
                                                        <i class="s16 fa fa-calendar"></i>
                                                        <span class="txt">Events</span>
                                                    </a>
                                                </li> 
                                            <?php } ?>

                                            <li>
                                                <a id="link-assignment" href="<?php echo base_url(); ?>admin/assignment">
=======
                                             <?php if (check_permission($permission, 'Event')) { ?>
                                            <li>
                                                <a id="link-event" href="<?php echo base_url(); ?>event">
                                                    <i class="s16 fa fa-calendar"></i>
                                                    <span class="txt">Events</span>
                                                </a>
                                            </li> 
                                             <?php } ?>
                                               <?php if (check_permission($permission, 'Assignment')) { ?>
                                            <li>
                                                <a id="link-assignment" href="<?php echo base_url(); ?>assignment">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file-2"></i>
                                                    <span class="txt">Assignments</span>
                                                </a>
                                            </li> 
<<<<<<< HEAD
                                            <li>
                                                <a id="link-studyresource" href="<?php echo base_url(); ?>admin/studyresource">
=======
                                               <?php } ?>
                                            <li>
                                                <a id="link-studyresource" href="<?php echo base_url(); ?>studyresource">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-attachment"></i>
                                                    <span class="txt">Study Resources</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-project" href="<?php echo base_url(); ?>admin/project">
=======
                                                <a id="link-project" href="<?php echo base_url(); ?>project">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-unlocked"></i>
                                                    <span class="txt">Project/Synopsis</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-library" href="<?php echo base_url(); ?>admin/digital_library">
=======
                                                <a id="link-library" href="<?php echo base_url(); ?>digital">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file-2"></i>
                                                    <span class="txt">Digital Library</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-participate" href="<?php echo base_url(); ?>admin/participate">
=======
                                                <a id="link-participate" href="<?php echo base_url(); ?>participate">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-user-plus-2"></i>
                                                    <span class="txt">Participate</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-courseware" href="<?php echo base_url(); ?>admin/courseware">
=======
                                                <a id="link-courseware" href="<?php echo base_url(); ?>courseware">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-attachment"></i>
                                                    <span class="txt">Courseware</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-subscriber" href="<?php echo base_url(); ?>admin/subscriber">
=======
                                                <a id="link-subscriber" href="<?php echo base_url(); ?>subscriber">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-user-plus-2"></i>
                                                    <span class="txt">Subscriber</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
<<<<<<< HEAD
                                        <a <?php echo active_single_menu('class_routine', $page); ?> href="<?php echo base_url() . 'admin/class_routine' ?>">
=======
                                        <a <?php echo active_single_menu('class_routine', $page); ?> href="<?php echo base_url() . 'class_routine' ?>">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <i class="s16 fa fa-book"></i>
                                            <span class=txt>Class Routine </span>
                                        </a>
                                    </li>
                                    <li>
<<<<<<< HEAD
                                        <a <?php echo active_single_menu('attendance', $page); ?> href="<?php echo base_url() . 'admin/attendance' ?>">
=======
                                        <a <?php echo active_single_menu('attendance', $page); ?> href="<?php echo base_url() . 'attendance' ?>">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <i class="s16 fa fa-bars"></i>
                                            <span class=txt>Attendance </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a <?php echo active_single_menu('video_streaming', $page); ?> href="<?php echo base_url(); ?>video_streaming">
                                            <i class="s16 fa fa-video-camera"></i>
                                            <span class=txt>Video Streaming </span>
                                        </a>
                                    </li>                                    

                                    <?php
                                    $pages = [
                                        'forum', 'forum_topic', 'forum_comment'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-comment"></i>
                                            <span class="txt">Forum</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-forum" href="<?php echo base_url(); ?>admin/forum">
=======
                                                <a id="link-forum" href="<?php echo base_url(); ?>forum">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file-2"></i>
                                                    <span class="txt">Forum & Discussion</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-forum_topic" href="<?php echo base_url(); ?>admin/forumtopics">
=======
                                                <a id="link-forum_topic" href="<?php echo base_url(); ?>forumtopic">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 icomoon-icon-file-2"></i>
                                                    <span class="txt">Forum Topics</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
<<<<<<< HEAD

=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                    <?php
                                    $pages = [
                                        'photo_gallery', 'banner_slider'
                                    ];
                                    ?>
<<<<<<< HEAD

=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-picture-o"></i>
                                            <span class="txt">Media</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-photo_gallery" href="<?php echo base_url(); ?>admin/photogallery">
=======
                                                <a id="link-photo_gallery" href="<?php echo base_url(); ?>media/photo_gallery">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-picture-o"></i>
                                                    <span class="txt">Photo Gallery</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-banner_slider" href="<?php echo base_url(); ?>admin/bannerslider">
=======
                                                <a id="link-banner_slider" href="<?php echo base_url(); ?>media/banner_slider">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-desktop"></i>
                                                    <span class="txt">Banner Slider</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php
                                    $pages = [
                                        'compose', 'inbox', 'sent', 'reply'
                                    ];
                                    ?>
                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-envelope"></i>
                                            <span class="txt">Email </span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-compose" href="<?php echo base_url(); ?>email/compose">
=======
                                                <a id="link-compose" href="<?php echo base_url(); ?>email_compose">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-envelope"></i>
                                                    <span class="txt">Compose EMail</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-inbox" href="<?php echo base_url(); ?>email/inbox">
=======
                                                <a id="link-inbox" href="<?php echo base_url(); ?>email_inbox">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-inbox"></i>
                                                    <span class="txt">Inbox</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-sent" href="<?php echo base_url(); ?>email/sent">
=======
                                                <a id="link-sent" href="<?php echo base_url(); ?>email_sent">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-send"></i>
                                                    <span class="txt">Sent Email</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <?php
                                    $pages = [
                                        'import', 'export'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 icomoon-icon-folder"></i>
                                            <span class="txt">Import & Export </span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-import" href="<?php echo base_url(); ?>import-export/import">
=======
                                                <a id="link-import" href="<?php echo base_url(); ?>import">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-upload"></i>
                                                    <span class="txt">Import</span>
                                                </a>
                                            </li>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-export" href="<?php echo base_url(); ?>import-export/export">
=======
                                                <a id="link-export" href="<?php echo base_url(); ?>export">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-download"></i>
                                                    <span class="txt">Export</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <?php
                                    $pages = [
                                        'system_setting', 'authorize_config'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-gears"></i>
                                            <span class="txt">System Setting</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-system_setting" href="<?php echo base_url(); ?>admin/system_settings">
=======
                                                <a id="link-system_setting" href="<?php echo base_url(); ?>system_settings">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-gears"></i>
                                                    <span class="txt">System Settings</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-authorize_config" href="<?php echo base_url(); ?>admin/authorize_payment_config">
=======
                                                <a id="link-authorize_config" href="<?php echo base_url(); ?>payment_gateway_config">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-globe"></i>
                                                    <span class="txt">Authorize.net Config</span>
                                                </a>
                                            </li>                                                 
                                        </ul>
                                    </li>

                                    <?php
                                    $pages = [
                                        'graduate', 'charity'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-building"></i>
                                            <span class="txt">University</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-graduate" href="<?php echo base_url(); ?>admin/graduate">
=======
                                                <a id="link-graduate" href="<?php echo base_url(); ?>graduate">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-graduation-cap"></i>
                                                    <span class="txt">Toppers Graduate</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-charity" href="<?php echo base_url(); ?>admin/charity_fund">
=======
                                                <a id="link-charity" href="<?php echo base_url(); ?>charity_fund">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-money"></i>
                                                    <span class="txt">Charity Fund</span>
                                                </a>
                                            </li>                                                 
                                        </ul>
                                    </li>
                                    <li>
                                        <a <?php echo active_single_menu('professor', $page); ?> href="<?php echo base_url(); ?>professor">
                                            <i class="s16 fa fa-user"></i>
                                            <span class=txt>Staff </span>
                                        </a>
                                    </li>

                                    <?php
                                    $pages = [
                                        'exam', 'exam_schedule', 'exam_grade', 'marks', 'exam_report'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-pencil"></i>
                                            <span class="txt">Examination</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-exam" href="<?php echo base_url(); ?>admin/exam">
=======
                                                <a id="link-exam" href="<?php echo base_url(); ?>exam">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-paper-plane-o"></i>
                                                    <span class="txt">Exam</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-exam_schedule" href="<?php echo base_url(); ?>admin/exam_schedule">
=======
                                                <a id="link-exam_schedule" href="<?php echo base_url(); ?>examschedule">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-history"></i>
                                                    <span class="txt">Exam Schedule</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-marks" href="<?php echo base_url(); ?>admin/exam_marks">
=======
                                                <a id="link-marks" href="<?php echo base_url(); ?>marks">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-star-o"></i>
                                                    <span class="txt">Exam Marks</span>
                                                </a>
                                            </li>     
                                            <li>
<<<<<<< HEAD
                                                <a id="link-exam_grade" href="<?php echo base_url(); ?>admin/exam_grade">
=======
                                                <a id="link-exam_grade" href="<?php echo base_url(); ?>examgrade">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-pencil"></i>
                                                    <span class="txt">Exam Grade</span>
                                                </a>
                                            </li>
<<<<<<< HEAD
                                            <li>
                                                <a id="link-exam_report" href="<?php echo base_url(); ?>admin/exam_report">
                                                    <i class="s16 fa fa-bar-chart"></i>
                                                    <span class="txt">Exam Report</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a <?php echo active_single_menu('cms', $page); ?> href="<?php echo base_url(); ?>admin/cms_pages">
=======
                                        </ul>
                                    </li>
                                    <li>
                                        <a <?php echo active_single_menu('cms', $page); ?> href="<?php echo base_url(); ?>cms_pages">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <i class="s16 fa fa-pagelines"></i>
                                            <span class=txt>CMS Pages</span></a>
                                    </li>

                                    <?php
                                    $pages = [
                                        'fee_structure', 'make_payment', 'due_amount'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-money"></i>
                                            <span class="txt">Payment</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-fee_structure" href="<?php echo base_url(); ?>admin/fees_structure">
=======
                                                <a id="link-fee_structure" href="<?php echo base_url(); ?>fees">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-code-fork"></i>
                                                    <span class="txt">Fee Structure</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-make_payment" href="<?php echo base_url(); ?>admin/make_payment">
=======
                                                <a id="link-make_payment" href="<?php echo base_url(); ?>payment">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-credit-card"></i>
                                                    <span class="txt">Make Payment</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-due_amount" href="<?php echo base_url(); ?>admin/due_amount">
=======
                                                <a id="link-due_amount" href="<?php echo base_url(); ?>payment/due_amount">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-recycle"></i>
                                                    <span class="txt">Due Amount</span>
                                                </a>
                                            </li> 
                                        </ul>
                                    </li>
                                    <li>
<<<<<<< HEAD
                                        <a <?php echo active_single_menu('reports', $page); ?> href="<?php echo base_url(); ?>reports">
=======
                                        <a <?php echo active_single_menu('report_chart', $page); ?> href="<?php echo base_url(); ?>report_chart">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                            <i class="s16 fa fa-bar-chart"></i>
                                            <span class=txt>Reports</span>
                                        </a>
                                    </li>

                                    <?php
                                    $pages = [
                                        'backup', 'restore'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-download"></i>
                                            <span class="txt">Backup/Restore</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
<<<<<<< HEAD
                                                <a id="link-backup" href="<?php echo base_url(); ?>admin/backup">
=======
                                                <a id="link-backup" href="<?php echo base_url(); ?>backup">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-cloud-download"></i>
                                                    <span class="txt">System Backup</span>
                                                </a>
                                            </li> 
                                            <li>
<<<<<<< HEAD
                                                <a id="link-restore" href="<?php echo base_url(); ?>admin/restore">
=======
                                                <a id="link-restore" href="<?php echo base_url(); ?>restore">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                                    <i class="s16 fa fa-cloud-upload"></i>
                                                    <span class="txt">System Restore</span>
                                                </a>
                                            </li>                                                 
                                        </ul>
<<<<<<< HEAD
                                    </li> 
                                    
                                    <?php
                                    $pages = [
                                        'quiz', 'questions', 'result', 'quiz_history'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-book"></i>
                                            <span class="txt">Quiz</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li>
                                                <a id="link-role" href="<?php echo base_url(); ?>quiz">
                                                    <i class="s16 fa fa-list"></i>
                                                    <span class="menu-text">Quiz</span>  
                                                </a>
                                            </li>
                                            <li >
                                                <a id="link-user" href="<?php echo base_url(); ?>quiz/user-quiz-history">
                                                    <i class="s16 fa fa-desktop"></i>
                                                    <span class="menu-text">Quiz History</span>  
                                                </a>
                                            </li>  
                                        </ul>
                                    </li>
=======
                                    </li>                                    
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4

                                    <?php
                                    $pages = [
                                        'role', 'user'
                                    ];
                                    ?>

                                    <li class="hasSub<?php echo highlight_menu($page, $pages); ?>">
                                        <a href="#" class="<?php echo exapnd_not_expand_menu($page, $pages); ?>"><i class="icomoon-icon-arrow-down-2 s16 hasDrop"></i><i class="s16 fa fa-users"></i>
                                            <span class="txt">User Management</span></a>
                                        <ul <?php echo navigation_show_hide_ul($page, $pages); ?>>
                                            <li >
                                                <a id="link-role" href="<?php echo base_url(); ?>user/role">
                                                    <i class="s16 fa fa-list"></i>
                                                    <span class="menu-text">Role Management</span>  
                                                </a>
                                            </li>
                                            <li >
                                                <a id="link-user" href="<?php echo base_url(); ?>user/user_list">
                                                    <i class="s16 fa fa-group"></i>
                                                    <span class="menu-text">Users</span>  
                                                </a>
                                            </li>                                                                                     
                                        </ul>
                                    </li>
                            </div>
                        </div>
                        <!-- End sidenav -->

                        <!-- End .sidenav-widget -->
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </div>
            <!-- End #sidebar --><!--Sidebar background-->


            <!-- End #right-sidebar --><!--Body content-->
            <div id=content class="page-content clearfix">
                <div class=contentwrapper>
                    <!--Content wrapper-->
                    <div class=heading>
                        <!--  .heading-->
                        <h3><?php echo $title; ?></h3>
                        <div class=resBtnSearch><a href=#><span class="s16 icomoon-icon-search-3"></span></a></div>
                        <div class="search_box">
                            <!-- .search -->
<<<<<<< HEAD
                            <form id=searchform class=form-horizontal method="post" action="<?php echo base_url(); ?>admin/search">
=======
                            <form id=searchform class=form-horizontal method="post" action="<?php echo base_url(); ?>search">
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                                <input name="search" class="top-search from-control" placeholder="Search here ..."
                                       value="<?php echo isset($search_string) ? $search_string : ''; ?>"> 
                                <input type=submit class=search-btn>
                                <div class="category">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                                        Category                                     
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="menu">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="student" name="student"
                                                               <?php if (isset($from['student'])) echo 'checked'; ?>>
                                                        <span>Student</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="course" name="course"
                                                               <?php if (isset($from['course'])) echo 'checked'; ?>>
                                                        <span>Branch</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="exam" name="exam"
                                                               <?php if (isset($from['exam'])) echo 'checked'; ?>>
                                                        <span>Exam</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="event" name="event"
                                                               <?php if (isset($from['event'])) echo 'checked'; ?>>
                                                        <span>Event</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" value="assignment" name="assignment"
                                                               <?php if (isset($from['assignment'])) echo 'checked'; ?>>
                                                        <span>Assignment</span>
                                                    </label>
                                                </li>
                                            </ul>                                           
                                        </li>
                                    </ul> 
                                </div>
                            </form>
                        </div>                           
                        <!--  /search -->     

                        <?php echo create_breadcrumb(); ?>
<<<<<<< HEAD

=======
>>>>>>> a2c1d49b70e8b196b56b75d37ae854e2ae6d30e4
                        <?php echo set_active_menu($page); ?>
                    </div>
                    <!-- End  / heading-->