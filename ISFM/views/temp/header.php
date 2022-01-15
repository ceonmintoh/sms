<!DOCTYPE html>
<html lang="en" >
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title><?php echo lang('system_title'); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="Md. Omar Faruq"/>

        <!--Base tag start-->
        <base href="<?php echo $this->config->base_url(); ?>">
        <!--Base tag end-->

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="assets/global/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="assets/admin/layout/css/themes/default.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
        <script src="assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>

    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="page-header-fixed page-quick-sidebar-over-content page-header-fixed-mobile page-footer-fixed1">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        <img src="assets/admin/layout/img/smlogo.png" alt="logo" class="logo-default"/>
                    </a>
                    <div class="menu-toggler sidebar-toggler hide">
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                </a>
                <!-- End RESPONSIVE MENU TOGGLER -->
                <?php
                $user = $this->ion_auth->user()->row();
                $userId = $user->id;
                ?>
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-envelope-open"></i>
                                <span class="badge badge-default">
                                    <?php
                                    $data = array();
                                    $query = $this->db->get_where('massage', array('receiver_id' => $userId, 'read_unread' => 0));
                                    foreach ($query->result_array() as $row) {
                                        $data[] = $row;
                                    }$unreadMassage = $data;
                                    $urmAmount = count($unreadMassage);
                                    echo $urmAmount;
                                    ?> 
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <p>
                                        You have <?php echo $urmAmount; ?> new messages
                                    </p>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list scroller headerMassageDiveHeight">
                                        <?php
                                        foreach ($unreadMassage as $urm) {
                                            $senderId = $urm['sender_id'];
                                            $query = $this->common->getWhere('users', 'id', $senderId);
                                            foreach ($query as $row1) {
                                                $senderName = $row1['username'];
                                                $senderImage = $row1['profile_image'];
                                            }
                                            ?>
                                            <li>
                                                <a href="index.php/message/readMassage?id=<?php echo $urm['id']; ?>">
                                                    <span class="photo">
                                                        <img src="assets/uploads/<?php echo $senderImage; ?>" alt=""/>
                                                    </span>
                                                    <span class="subject">
                                                        <span class="from">
                                                            <?php echo $senderName; ?> </span>
                                                        <span class="time">
                                                            <?php echo date('h.mA - d/m/Y', $urm['date']); ?> </span>
                                                    </span>
                                                    <span class="message">
                                                        Subject:  <?php echo $urm['subject']; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="external">
                                    <a href="inbox.html">
                                        <?php echo lang('top_nav_message_text_3'); ?> <i class="m-icon-swapright"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="assets/uploads/<?php echo $user->profile_image; ?>"/>
                                <span class="username">
                                    <?php echo $user->username; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="index.php/home/profileView">
                                        <i class="icon-user"></i> <?php echo lang('top_nav_my_profile'); ?> </a>
                                </li>
                                <li>
                                    <a href="index.php/home/calender">
                                        <i class="icon-calendar"></i> <?php echo lang('top_nav_my_calendar'); ?> </a>
                                </li>
                                <li>
                                    <a href="index.php/message/inbox">
                                        <i class="icon-envelope-open"></i> Message <span class="badge badge-danger">
                                            <?php echo $urmAmount; ?>  </span>
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="index.php/auth/logout">
                                        <i class="icon-key"></i><?php echo lang('top_nav_log_out'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix">
        </div>
        <?php
        $cont = "";  $cont = $this->router->fetch_class();$view = "";$view = $this->router->fetch_method();
        $s = "start";$a = "active";$o = "open";$dashbord = "";$admission = "";$allStudent = "";$student = "";$teachersInfromation = "";$teachers = "";$note = "";$addNote = "";$seclectClassNote = "";$addTeachers = "";$notice = "";$Parents = "";$selectParents = "";$makeParents = "";$class = "";$addClass = "";$allClass = "";$subject = "";$addSubject = "";$attendanse = "";$exam = "";$addExame = "";$addBook = "";$allBook = "";$addSubject = "";$addClassRoutine = "";$classRoutine = "";$Marksheet = "";$transport = "";$addTransport = "";$allTransport = "";$allSubject = "";$makingResilt = "";$account = "";$addAccount = "";$message = "";$sendMessage = "";$inbox = "";$sent = "";$configuration = "";$userAccess = "";$weeklyDay = "";$language = "";$attendansePreviw = "";$allExamRutine = "";$viewAttendence = "";$open = "";$resultView = "";$allSlips = "";$generalSettings = "";$profileview = "";$cleander = "";$addEvent = "";$calenderEvents = "";$suggestion = "";$makeSuggestion = "";$allSuggestion = "";$dormitory = "";$addDormitory = "";$addBedSeat = "";$selectMemberBed = "";$dormitoryReport = "";$messageSettings = "";$systemUsers = "";$addNewUsers = "";$allUserInafo = "";$studentAtten = "";$teacherAtten = "";$leave = "";$applicationForLeave = "";$allLeaveApplication = "";$accountSetting = "";$setStuFee = "";$studentsInfo = "";$ownClassRoutin = "";$promotion = "";$set_optional = "";$addNotice = "";$employee = "";$employatt = "";$stock = "";$vendors = "";$inv_cate = "";$inv_item = "";$sms = "";$eas = "";$sel_ow_ma = "";
        if ($cont == "home") {
            if ($view == "index") {
                $dashbord = $s . ' ' . $a;
            } elseif ($view == "profileView") {
                $profileview = $s . ' ' . $a;
            } elseif ($view == "calender") {
                $cleander = $s . ' ' . $a;
                $calenderEvents = $a;
            } elseif ($view == "addEvent") {
                $cleander = $s . ' ' . $a;
                $add_events = $a;
            } elseif ($view == "delete_event") {
                $cleander = $s . ' ' . $a;
                $addEvent = $s . ' ' . $a;
            }
        } elseif ($cont == "users") {
            if ($view == "admission") {
                $student11 = $s . ' ' . $a;
                $student = $s . ' ' . $a;
                $admission = $a;
            } elseif ($view == "addTeacher") {
                $teachers = $s . ' ' . $a;
                $addTeachers = $a;
            } elseif ($view == "addParents") {
                $student11 = $s . ' ' . $a;
                $Parents = $s . ' ' . $a;
                $makeParents = $a;
            } elseif ($view == "addNewUsers") {
                $hrm = $s . ' ' . $a;
                $employee = $s . ' ' . $a;
                $addNewUsers = $a;
            } elseif ($view == "allUserInafo" || $view == "allUserInafoDetails" || $view == "edit_user") {
                $hrm = $s . ' ' . $a;
                $employee = $s . ' ' . $a;
                $allUserInafo = $a;
            }
        } elseif ($cont == "sclass") {
            if ($view == "addClass") {
                $academic = $s . ' ' . $a;
                $class = $s . ' ' . $a;
                $addClass = $a;
            } elseif ($view == "allClass") {
                $academic = $s . ' ' . $a;
                $class = $s . ' ' . $a;
                $allClass = $a;
            } elseif ($view == "classDetails") {
                $academic = $s . ' ' . $a;
                $class = $s . ' ' . $a;
                $allClass = $a;
            } elseif ($view == "selectClassRoutin") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $addClassRoutine = $a;
            } elseif ($view == "addClassRoutin") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $addClassRoutine = $a;
            } elseif ($view == "selectAllRoutine") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $classRoutine = $a;
            } elseif ($view == "allClassRoutine") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $classRoutine = $a;
            } elseif ($view == "editRoutine") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $classRoutine = $a;
            } elseif ($view == "deleteRoutine") {
                $academic = $s . ' ' . $a;
                $Routine = $s . ' ' . $a;
                $classRoutine = $a;
            } elseif ($view == "ownClassRoutin") {
                $academic = $s . ' ' . $a;
                $ownClassRoutin = $a;
            } elseif ($view == "promotion") {
                $academic = $s . ' ' . $a;
                $class = $s . ' ' . $a;
                $promotion = $a;
            }
        } elseif ($cont == "subjects") {
            if ($view == "addSubject") {
                $academic = $s . ' ' . $a;
                $subject = $s . ' ' . $a;
                $addSubject = $a;
            } elseif ($view == "allSubject") {
                $academic = $s . ' ' . $a;
                $subject = $s . ' ' . $a;
                $allSubject = $a;
            } elseif ($view == "classSubjectDetails") {
                $academic = $s . ' ' . $a;
                $subject = $s . ' ' . $a;
                $allSubject = $a;
            } elseif ($view == "set_optional") {
                $academic = $s . ' ' . $a;
                $subject = $s . ' ' . $a;
                $set_optional = $a;
            }
        } elseif ($cont == "teachers") {
            if ($view == "allTeachers") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            } elseif ($view == "teacherDetails") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            } elseif ($view == "edit_teacher") {
                $teachers = $s . ' ' . $a;
                $teachersInfromation = $a;
            }
        } elseif ($cont == "students") {
            if ($view == "allStudent") {
                $student11 = $s . ' ' . $a;
                $student = $s . ' ' . $a;
                $allStudent = $a;
            } elseif ($view == "students_details") {
                $student11 = $s . ' ' . $a;
                $student = $s . ' ' . $a;
                $allStudent = $a;
            } elseif ($view == "editStudent") {
                $student11 = $s . ' ' . $a;
                $student = $s . ' ' . $a;
                $allStudent = $a;
            } elseif ($view == "studentsInfo") {
                $student11 = $s . ' ' . $a;
                $student = $s . ' ' . $a;
                $studentsInfo = $s . ' ' . $a;
            }
        } elseif ($cont == "dailyAttendance") {
            if ($view == "selectClassAttendance") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "attendance") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "attendanceCompleteMessage") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "selectAttendancePreview") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $attendansePreviw = $a;
            } elseif ($view == "attendencePreview") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "viewExamAttendance") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "attendanceEditCompleteMessage") {
                $student11 = $s . ' ' . $a;
                $attendanse = $s . ' ' . $a;
                $studentAtten = $a;
            } elseif ($view == "t_a_s_p") {
                $hrm = $s . ' ' . $a;
                $employatt = $s . ' ' . $a;
                $teacherAtten = $a;
            } elseif ($view == "employe_atten_view") {
                $hrm = $s . ' ' . $a;
                $employatt = $s . ' ' . $a;
                $empl_att = $a;
            } elseif ($view == "teacherAttendance") {
                $hrm = $s . ' ' . $a;
                $employatt = $s . ' ' . $a;
                $teacherAtten = $a;
            }
        } elseif ($cont == "notice") {
            if ($view == "allNotice") {
                $academic = $s . ' ' . $a;
                $notice = $s . ' ' . $a;
                $allNotice = $a;
            } elseif ($view == "addNotice") {
                $academic = $s . ' ' . $a;
                $notice = $s . ' ' . $a;
                $addNotice = $a;
            } elseif ($view == "noticeDetails") {
                $academic = $s . ' ' . $a;
                $notice = $s . ' ' . $a;
            }
        } elseif ($cont == "parents") {
            if ($view == "parentsInformation") {
                $student11 = $s . ' ' . $a;
                $Parents = $s . ' ' . $a;
                $selectParents = $a;
            } elseif ($view == "editParentsInfo") {
                $student11 = $s . ' ' . $a;
                $Parents = $s . ' ' . $a;
                $selectParents = $a;
            }
        } elseif ($cont == "examination") {
            if ($view == "examGread") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $exameGread = $a;
            } elseif ($view == "addExamGread") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $addGread = $a;
            } elseif ($view == "addExam") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $addExame = $a;
            } elseif ($view == "completExamRoutin") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $addExame = $a;
            } elseif ($view == "allExamRutine") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $allExamRutine = $a;
            } elseif ($view == "routinView") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $allExamRutine = $a;
            } elseif ($view == "selectExamAttendance") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $exameAttendence = $a;
            } elseif ($view == "examAttendance") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $exameAttendence = $a;
            } elseif ($view == "viewExamAttendance") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $viewAttendence = $a;
            } elseif ($view == "editExamAttendance") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $viewAttendence = $a;
            } elseif ($view == "makingResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            } elseif ($view == "submitResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            } elseif ($view == "completeResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            } elseif ($view == "aproveShitView") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $aproveShit = $a;
                $open = $o;
            } elseif ($view == "finalResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $aproveShit = $a;
                $open = $o;
            } elseif ($view == "checkResultShit") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $makingResilt = $a;
                $open = $o;
            } elseif ($view == "selectResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $resultView = $a;
                $open = $o;
            } elseif ($view == "fullResult") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $resultView = $a;
                $open = $o;
            } elseif ($view == "selectClassMarksheet") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $Marksheet = $a;
                $open = $o;
            } elseif ($view == "sel_ow_ma") {
                $academic = $s . ' ' . $a;
                $exam = $s . ' ' . $a;
                $sel_ow_ma = $a;
            }
        } elseif ($cont == "library") {
            if ($view == "addBookCategory") {
                $library = $s . ' ' . $a;
                $addBookCategory = $a;
            } elseif ($view == "allBooksCategory") {
                $library = $s . ' ' . $a;
                $allBookCategory = $a;
            } elseif ($view == "editCategory") {
                $library = $s . ' ' . $a;
                $allBookCategory = $a;
            } elseif ($view == "addBook") {
                $library = $s . ' ' . $a;
                $addBook = $a;
            } elseif ($view == "allBook") {
                $library = $s . ' ' . $a;
                $allBook = $a;
            } elseif ($view == "editBook") {
                $library = $s . ' ' . $a;
                $allBook = $a;
            } elseif ($view == "add_library_member") {
                $library = $s . ' ' . $a;
                $add_library_member = $a;
            } elseif ($view == "member_list") {
                $library = $s . ' ' . $a;
                $member_list = $a;
            } elseif ($view == "issue_return" || $view == "issue" || $view == "return_book") {
                $library = $s . ' ' . $a;
                $issue_return = $a;
            }
        } elseif ($cont == "transport") {
            if ($view == "addTransport") {
                $transport = $s . ' ' . $a;
                $addTransport = $a;
            } elseif ($view == "allTransport") {
                $transport = $s . ' ' . $a;
                $allTransport = $a;
            } elseif ($view == "editTransport") {
                $transport = $s . ' ' . $a;
                $allTransport = $a;
            }
        } elseif ($cont == "account") {
            if ($view == "addAccountTitle" || $view == "deleteAccount" || $view == "editAccountInfo") {
                $account = $s . ' ' . $a;
                $addAccount = $a;
            } elseif ($view == "transection") {
                $account = $s . ' ' . $a;
                $transection = $a;
            } elseif ($view == "teacherCollection") {
                $account = $s . ' ' . $a;
                $teacherCollection = $a;
            } elseif ($view == "allSlips" || $view == "view_invoice" || $view == "editSlip" || $view == "deletSlipItem" || $view == "deletSlip" || $view == "slipAction" || $view == "fee_pay") {
                $account = $s . ' ' . $a;
                $allSlips = $a;
            } elseif ($view == "paySalary") {
                $account = $s . ' ' . $a;
                $paySalary = $a;
            }
        } elseif ($cont == "message") {
            if ($view == "sendMessage") {
                $message = $s . ' ' . $a;
                $sms = $s . ' ' . $a;
                $sendMessage = $a;
            } elseif ($view == "inbox") {
                $message = $s . ' ' . $a;
                $sms = $s . ' ' . $a;
                $inbox = $a;
            } elseif ($view == "sentMessage") {
                $message = $s . ' ' . $a;
                $sent = $a;
            }
        } elseif ($cont == "leave") {
            if ($view == "applicationForLeave") {
                $hrm = $s . ' ' . $a;
                $leave = $s . ' ' . $a;
                $applicationForLeave = $a;
            } elseif ($view == "allAppliction" || $view == "checkApplication" || $view == "ap_or_di") {
                $hrm = $s . ' ' . $a;
                $leave = $s . ' ' . $a;
                $allLeaveApplication = $a;
            }
        } elseif ($cont == "configuration") {
            if ($view == "conWeeklyDay") {
                $configuration = $s . ' ' . $a;
                $weeklyDay = $a;
            } elseif ($view == "language") {
                $configuration = $s . ' ' . $a;
                $language = $a;
            } elseif ($view == "att_pass") {
                $configuration = $s . ' ' . $a;
                $eas = $a;
            } elseif ($view == "generalSetting") {
                $configuration = $s . ' ' . $a;
                $generalSettings = $a;
            } elseif ($view == "userAccessSettings") {
                $configuration = $s . ' ' . $a;
                $systemUsers = $s . ' ' . $a;
                $userAccess = $a;
            } elseif ($view == "groupRole") {
                $configuration = $s . ' ' . $a;
                $systemUsers = $s . ' ' . $a;
                $groupRole = $a;
            } elseif ($view == "individualUser") {
                $configuration = $s . ' ' . $a;
                $systemUsers = $s . ' ' . $a;
                $individualUser = $a;
            } elseif ($view == "messageSettings") {
                $configuration = $s . ' ' . $a;
                $messageSettings = $a;
            } elseif ($view == "setStuFee" || $view == "fee_item_edit" || $view == "delete_fee_item") {
                $configuration = $s . ' ' . $a;
                $accountSetting = $s . ' ' . $a;
                $setStuFee = $a;
            } elseif ($view == "employSalary" || $view == "editEmploySalary" || $view == "setEmployDelete") {
                $configuration = $s . ' ' . $a;
                $accountSetting = $s . ' ' . $a;
                $employSalary = $a;
            }
        } elseif ($cont == "suggestion") {
            if ($view == "makeSuggestion") {
                $academic = $s . ' ' . $a;
                $suggestion = $s . ' ' . $a;
                $makeSuggestion = $a;
            } elseif ($view == "allSuggestion" || $view == "suggestionDetails") {
                $academic = $s . ' ' . $a;
                $suggestion = $s . ' ' . $a;
                $allSuggestion = $a;
            } elseif ($view == "own_suggestion") {
                $academic = $s . ' ' . $a;
                $suggestion = $s . ' ' . $a;
                $own_suggestion = $s . ' ' . $a;
            }
        } elseif ($cont == "WcPanel") {
            if ($view == "setLogo") {
                $WcPanel = $s . ' ' . $a;
                $setLogo = $a;
            } elseif ($view == "sethomepage") {
                $WcPanel = $s . ' ' . $a;
                $sethomepage = $a;
            }
        } elseif ($cont == "dormitory") {
            if ($view == "addDormitory") {
                $dormitory = $s . ' ' . $a;
                $addDormitory = $a;
            } elseif ($view == "addBed") {
                $dormitory = $s . ' ' . $a;
                $addBedSeat = $a;
            } elseif ($view == "dormitoryReport") {
                $dormitory = $s . ' ' . $a;
                $dormitoryReport = $a;
            } elseif ($view == "showDeatails") {
                $dormitory = $s . ' ' . $a;
                $dormitoryReport = $a;
            } elseif ($view == "selectMember") {
                $dormitory = $s . ' ' . $a;
                $selectMemberBed = $a;
            } elseif ($view == "seatBooking") {
                $dormitory = $s . ' ' . $a;
                $selectMemberBed = $a;
            }
        } elseif ($cont == "stock") {
            if ($view == "vendors" || $view == "vendordetails" || $view == "vendoredit" || $view == "deletevendors") {
                $stock = $s . ' ' . $a;
                $vendors = $a;
            } elseif ($view == "inven_category" || $view == "delete_category") {
                $stock = $s . ' ' . $a;
                $inv_cate = $a;
            }elseif ($view == "inv_item" || $view == "edit_item" || $view == "delete_item") {
                $stock = $s . ' ' . $a;
                $inv_item = $a;
            }elseif ($view == "issu_item" || $view == "edit_issue" || $view == "delete_issue") {
                $stock = $s . ' ' . $a;
                $issu_item = $a;
            }
        }
        ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li>
                            &nbsp;
                        </li>
                        <li class="<?php echo $dashbord; ?>">
                            <a href="index.php/home/index">
                                <i class="icon-home"></i>
                                <span class="title"><?php echo lang('header_dashboard'); ?></span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <?php if ($this->common->user_access('add_new_class', $userId) || $this->common->user_access('all_class_info', $userId) || $this->common->user_access('class_promotion', $userId) || $this->common->user_access('add_subject', $userId) || $this->common->user_access('all_subject', $userId) || $this->common->user_access('assin_optio_sub', $userId) || $this->common->user_access('add_class_routine', $userId) || $this->common->user_access('all_class_routine', $userId) || $this->common->user_access('own_class_routine', $userId) || $this->common->user_access('add_exam_gread', $userId) || $this->common->user_access('exam_gread', $userId) || $this->common->user_access('add_exam_routin', $userId) || $this->common->user_access('all_exam_routine', $userId) || $this->common->user_access('take_exam_attend', $userId) || $this->common->user_access('exam_attend_preview', $userId) || $this->common->user_access('make_result', $userId) || $this->common->user_access('approve_result', $userId) || $this->common->user_access('view_result', $userId) || $this->common->user_access('all_mark_sheet', $userId) || $this->common->user_access('own_mark_sheet', $userId) || $this->common->user_access('make_suggestion', $userId) || $this->common->user_access('all_suggestion', $userId) || $this->common->user_access('own_suggestion', $userId) || $this->common->user_access('creat_notice', $userId)) { ?>
                            <li class="nav-item <?php echo $academic; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-group"></i>
                                    <span class="title"><?php echo lang('header_academic'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_new_class', $userId) || $this->common->user_access('all_class_info', $userId) || $this->common->user_access('class_promotion', $userId)) { ?>
                                        <li class="nav-item <?php echo $class; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_cor_clas'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('add_new_class', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addClass; ?>">
                                                        <a href="index.php/sclass/addClass" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_class'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_class_info', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allClass; ?>">
                                                        <a href="index.php/sclass/allClass" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_class_info'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('class_promotion', $userId)) { ?>
                                                    <li class="nav-item <?php echo $promotion; ?>">
                                                        <a href="index.php/sclass/promotion" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_class_promot'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('add_subject', $userId) || $this->common->user_access('all_subject', $userId) || $this->common->user_access('assin_optio_sub', $userId)) { ?>
                                        <li class="nav-item <?php echo $subject; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_subject'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('add_subject', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addSubject; ?>">
                                                        <a href="index.php/subjects/addSubject" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_add_subject'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_subject', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allSubject; ?>">
                                                        <a href="index.php/subjects/allSubject" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_all_subject'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('assin_optio_sub', $userId)) { ?>
                                                    <li class="nav-item <?php echo $set_optional; ?>">
                                                        <a href="index.php/subjects/set_optional" class="nav-link ">
                                                            <span class="badge badge-roundless badge-danger">new</span>
                                                            <span class="title"><?php echo lang('header_ass_opt_sub'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('add_class_routine', $userId) || $this->common->user_access('all_class_routine', $userId)) { ?>
                                        <li class="nav-item <?php echo $Routine; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_routin'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('add_class_routine', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addClassRoutine; ?>">
                                                        <a href="index.php/sclass/selectClassRoutin" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_set_time'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_class_routine', $userId)) { ?>
                                                    <li class="nav-item <?php echo $classRoutine; ?>">
                                                        <a href="index.php/sclass/selectAllRoutine" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_stu_timble'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('own_class_routine', $userId)) { ?>
                                        <li class="<?php echo $ownClassRoutin; ?>">
                                            <a href="index.php/sclass/ownClassRoutin?uisd=<?php echo $userId; ?>">
                                                <i class="fa fa-sitemap"></i>
                                                <span class="title"><?php echo lang('header_class_routine'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_exam_gread', $userId) || $this->common->user_access('exam_gread', $userId) || $this->common->user_access('add_exam_routin', $userId) || $this->common->user_access('all_exam_routine', $userId) || $this->common->user_access('take_exam_attend', $userId) || $this->common->user_access('exam_attend_preview', $userId) || $this->common->user_access('make_result', $userId) || $this->common->user_access('approve_result', $userId) || $this->common->user_access('view_result', $userId) || $this->common->user_access('all_mark_sheet', $userId) || $this->common->user_access('own_mark_sheet', $userId)) { ?>
                                        <li class="nav-item <?php echo $exam; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_examina'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('add_exam_gread', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addGread; ?>">
                                                        <a href="index.php/examination/addExamGread" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_set_gread'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('exam_gread', $userId)) { ?>
                                                    <li class="nav-item <?php echo $exameGread; ?>">
                                                        <a href="index.php/examination/examGread" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_gra_inf'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('add_exam_routin', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addExame; ?>">
                                                        <a href="index.php/examination/addExam" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_cr_ex_ro'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_exam_routine', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allExamRutine; ?>">
                                                        <a href="index.php/examination/allExamRutine" class="nav-link ">
                                                            <span class="title"> <?php echo lang('header_all_exam_rout'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('take_exam_attend', $userId)) { ?>
                                                    <li class="nav-item <?php echo $exameAttendence; ?>">
                                                        <a href="index.php/examination/selectExamAttendance" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_tak_exa_att'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('exam_attend_preview', $userId)) { ?>
                                                    <li class="nav-item <?php echo $viewAttendence; ?>">
                                                        <a href="index.php/examination/viewExamAttendance" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_exa_attan'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('make_result', $userId)) { ?>
                                                    <li class="nav-item <?php echo $makingResilt; ?>">
                                                        <a href="index.php/examination/makingResult" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_sub_result'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('approve_result', $userId)) { ?>
                                                    <li class="nav-item <?php echo $aproveShit; ?>">
                                                        <a href="index.php/examination/aproveShitView" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_app_res_she'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('view_result', $userId)) { ?>
                                                    <li class="nav-item <?php echo $resultView; ?>">
                                                        <a href="index.php/examination/selectResult" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_exam_resu'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_mark_sheet', $userId)) { ?>
                                                    <li class="nav-item <?php echo $Marksheet; ?>">
                                                        <a href="index.php/examination/selectClassMarksheet" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_stu_mark_shee'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('own_mark_sheet', $userId)) { ?>
                                                    <li class="nav-item <?php echo $sel_ow_ma; ?>">
                                                        <a href="index.php/examination/sel_ow_ma" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_my_mar_shee'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('make_suggestion', $userId) || $this->common->user_access('all_suggestion', $userId)) { ?>
                                        <li class="nav-item <?php echo $suggestion; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_suggestion'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('make_suggestion', $userId)) { ?>
                                                    <li class="nav-item <?php echo $makeSuggestion; ?>">
                                                        <a href="index.php/suggestion/makeSuggestion" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_giv_suggest'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_suggestion', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allSuggestion; ?>">
                                                        <a href="index.php/suggestion/allSuggestion?uisd=<?php echo $userId; ?>" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_all_sugges'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('own_suggestion', $userId)) { ?>
                                        <li class="<?php echo $own_suggestion; ?>">
                                            <a href="index.php/suggestion/own_suggestion?uisd=<?php echo $userId; ?>">
                                                <i class="fa fa-list"></i>
                                                <span class="title"> <?php echo lang('header_suggestion'); ?> </span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="nav-item <?php echo $notice; ?>">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title"><?php echo lang('header_notic'); ?></span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <?php if ($this->common->user_access('creat_notice', $userId)) { ?>
                                                <li class="nav-item <?php echo $addNotice; ?>">
                                                    <a href="index.php/notice/addNotice" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_pub_not'); ?></span>
                                                    </a>
                                                </li>
                                            <?php } ?> 
                                            <li class="nav-item <?php echo $allNotice; ?>">
                                                <a href="index.php/notice/allNotice" class="nav-link ">
                                                    <span class="title"><?php echo lang('header_all_notice'); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('admission', $userId) || $this->common->user_access('all_student_info', $userId) || $this->common->user_access('stu_own_info', $userId) || $this->common->user_access('take_studence_atten', $userId) || $this->common->user_access('attendance_preview', $userId) || $this->common->user_access('make_parents_id', $userId) || $this->common->user_access('all_parents_info', $userId)) { ?>
                            <li class="nav-item <?php echo $student11; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title"><?php echo lang('header_stu_paren'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('admission', $userId) || $this->common->user_access('all_student_info', $userId) || $this->common->user_access('stu_own_info', $userId)) { ?>
                                        <li class="nav-item <?php echo $student; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_stude'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('admission', $userId)) { ?>
                                                    <li class="nav-item <?php echo $admission; ?>">
                                                        <a href="index.php/users/admission" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_admission'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_student_info', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allStudent; ?>">
                                                        <a href="index.php/students/allStudent" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_stu_info'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('stu_own_info', $userId)) { ?>
                                                    <li class="<?php echo $studentsInfo; ?>">
                                                        <a href="index.php/students/studentsInfo?uisd=<?php echo $userId; ?>">
                                                            <span class="title"><?php echo lang('header_own_student_info'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('take_studence_atten', $userId) || $this->common->user_access('attendance_preview', $userId)) { ?>
                                        <li class="nav-item <?php echo $attendanse; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_attendance'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('take_studence_atten', $userId)) { ?>
                                                    <li class="nav-item <?php echo $studentAtten; ?>">
                                                        <a href="index.php/dailyAttendance/selectClassAttendance" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_daily_attend'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('attendance_preview', $userId)) { ?>
                                                    <li class="nav-item <?php echo $attendansePreviw; ?>">
                                                        <a href="index.php/dailyAttendance/selectAttendancePreview" class="nav-link">
                                                            <span class="title"><?php echo lang('header_atten_view'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('make_parents_id', $userId) || $this->common->user_access('all_parents_info', $userId)) { ?>
                                        <li class="nav-item <?php echo $Parents; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_parent_info'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('make_parents_id', $userId)) { ?>
                                                    <li class="nav-item <?php echo $makeParents; ?>">
                                                        <a href="index.php/users/addParents" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_give_pare_acc'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('all_parents_info', $userId)) { ?>
                                                    <li class="nav-item <?php echo $selectParents; ?>">
                                                        <a href="index.php/parents/parentsInformation" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_paren_info'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('teacher_info', $userId) || $this->common->user_access('add_employee', $userId) || $this->common->user_access('add_teacher', $userId)) { ?>
                            <li class="nav-item <?php echo $teachers; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="icon-users" aria-hidden="true"></span>
                                    <span class="title"><?php echo lang('header_teacher'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('teacher_info', $userId)) { ?>
                                        <li class="nav-item <?php echo $teachersInfromation; ?>">
                                            <a href="index.php/teachers/allTeachers" class="nav-link ">
                                                <span class="title"><?php echo lang('header_tea_info'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_teacher', $userId)) { ?>
                                        <li class="nav-item <?php echo $addTeachers; ?>">
                                            <a href="index.php/users/addTeacher" class="nav-link ">
                                                <span class="title"><?php echo lang('header_a_nteac'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('add_employee', $userId) || $this->common->user_access('employee_list', $userId) || $this->common->user_access('employ_attendance', $userId) || $this->common->user_access('empl_atte_view', $userId) || $this->common->user_access('check_leav_appli', $userId)) { ?>
                            <li class="nav-item <?php echo $hrm; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-eye"></i>
                                    <span class="title"><?php echo lang('header_hrm'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_employee', $userId) || $this->common->user_access('employee_list', $userId)) { ?>
                                        <li class="nav-item <?php echo $employee; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_employ_manage'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('add_employee', $userId)) { ?>
                                                    <li class="nav-item <?php echo $addNewUsers; ?>">
                                                        <a href="index.php/users/addNewUsers" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_add_employe'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('employee_list', $userId)) { ?>
                                                    <li class="nav-item <?php echo $allUserInafo; ?>">
                                                        <a href="index.php/users/allUserInafo" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_employ_list'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('employ_attendance', $userId) || $this->common->user_access('empl_atte_view', $userId)) { ?>
                                        <li class="nav-item <?php echo $employatt; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_employ_atten'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <?php if ($this->common->user_access('employ_attendance', $userId)) { ?>
                                                    <li class="nav-item <?php echo $teacherAtten; ?>">
                                                        <a href="index.php/dailyAttendance/t_a_s_p" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_tak_emplo_atte'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } if ($this->common->user_access('empl_atte_view', $userId)) { ?>
                                                    <li class="nav-item <?php echo $empl_att; ?>">
                                                        <a href="index.php/dailyAttendance/employe_atten_view" class="nav-link ">
                                                            <span class="title"><?php echo lang('header_emp_atte_view'); ?></span>
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <li class="nav-item <?php echo $leave; ?>">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title"><?php echo lang('header_leave_mana'); ?></span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item <?php echo $applicationForLeave; ?>">
                                                <a href="index.php/leave/applicationForLeave" class="nav-link ">
                                                    <span class="title"><?php echo lang('header_leav_appli'); ?></span>
                                                </a>
                                            </li>
                                            <?php if ($this->common->user_access('check_leav_appli', $userId)) { ?>
                                                <li class="nav-item <?php echo $allLeaveApplication; ?>">
                                                    <a href="index.php/leave/allAppliction" class="nav-link ">
                                                        <span class="badge badge-info">
                                                            <?php
                                                            $query = $this->db->get_where('leave_application', array('cheack_statuse' => 'Not Checked'));
                                                            foreach ($query->result_array() as $row) {
                                                                $data[] = $row;
                                                            }$unreadApp = $data;
                                                            $urAppAmount = count($unreadApp);
                                                            echo $urAppAmount;
                                                            ?>
                                                        </span><?php echo lang('header_all_leav_app'); ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('add_account_title', $userId) || $this->common->user_access('fee_collection', $userId) || $this->common->user_access('all_slips', $userId) || $this->common->user_access('trensection', $userId) || $this->common->user_access('pay_salary', $userId) || $this->common->user_access('own_slip', $userId)) { ?>
                            <li class="nav-item <?php echo $account; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-calculator"></i>
                                    <span class="title"><?php echo lang('header_account'); ?></span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_account_title', $userId)) { ?>
                                        <li class="nav-item <?php echo $addAccount; ?>">
                                            <a href="index.php/account/addAccountTitle" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_acco_tit'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('all_slips', $userId)) { ?>
                                        <li class="nav-item <?php echo $allSlips; ?>">
                                            <a href="index.php/account/allSlips" class="nav-link ">
                                                <span class="title"><?php echo lang('header_stu_payme'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('trensection', $userId)) { ?>
                                        <li class="nav-item <?php echo $transection; ?>">
                                            <a href="index.php/account/transection" class="nav-link ">
                                                <span class="title"><?php echo lang('header_teansec'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('pay_salary', $userId)) { ?>
                                        <li class="nav-item <?php echo $paySalary; ?>">
                                            <a href="index.php/account/paySalary" class="nav-link ">
                                                <span class="title"><?php echo lang('header_pay_sala'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('own_slip', $userId)) { ?>
                                        <li class="nav-item  ">
                                            <a href="index.php/account/due_pay" class="nav-link ">
                                                <span class="badge badge-roundless badge-danger">new</span>
                                                <span class="title"><?php echo lang('header_my_payment'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('add_category', $userId) || $this->common->user_access('all_category', $userId) || $this->common->user_access('add_books', $userId) || $this->common->user_access('all_books', $userId) || $this->common->user_access('add_library_mem', $userId) || $this->common->user_access('memb_list', $userId) || $this->common->user_access('', $userId)) { ?>
                            <li class="nav-item <?php echo $library; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-university"></i>
                                    <span class="title"><?php echo lang('header_library'); ?></span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_category', $userId)) { ?>
                                        <li class="nav-item <?php echo $addBookCategory; ?>">
                                            <a href="index.php/library/addBookCategory" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_book_cate'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('all_category', $userId)) { ?>
                                        <li class="nav-item <?php echo $allBookCategory; ?>">
                                            <a href="index.php/library/allBooksCategory" class="nav-link ">
                                                <span class="title"><?php echo lang('header_all_boobk_cate'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_books', $userId)) { ?>
                                        <li class="nav-item <?php echo $addBook; ?>">
                                            <a href="index.php/library/addBook" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_book'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('all_books', $userId)) { ?>
                                        <li class="nav-item <?php echo $allBook; ?>">
                                            <a href="index.php/library/allBook" class="nav-link ">
                                                <span class="title"><?php echo lang('header_book_list'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_library_mem', $userId)) { ?>
                                        <li class="nav-item <?php echo $add_library_member; ?>">
                                            <a href="index.php/library/add_library_member" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_libr_mem'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('memb_list', $userId)) { ?>
                                        <li class="nav-item <?php echo $member_list; ?>">
                                            <a href="index.php/library/member_list" class="nav-link ">
                                                <span class="title"><?php echo lang('header_membelist'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('issu_return', $userId)) { ?>
                                        <li class="nav-item  <?php echo $issue_return; ?>">
                                            <a href="index.php/library/issue_return" class="nav-link ">
                                                <span class="title"><?php echo lang('header_iss_return'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('add_dormitories', $userId) || $this->common->user_access('add_set_dormi', $userId) || $this->common->user_access('set_member_bed', $userId) || $this->common->user_access('dormi_report', $userId)) { ?>
                            <li class="nav-item <?php echo $dormitory; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-home"></i>
                                    <span class="title"><?php echo lang('header_dormat'); ?></span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_dormitories', $userId)) { ?>
                                        <li class="nav-item <?php echo $addDormitory; ?>">
                                            <a href="index.php/dormitory/addDormitory" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_dormito'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_set_dormi', $userId)) { ?>
                                        <li class="nav-item <?php echo $addBedSeat; ?>">
                                            <a href="index.php/dormitory/addBed" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_set_roo'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('set_member_bed', $userId)) { ?>
                                        <li class="nav-item <?php echo $selectMemberBed; ?>">
                                            <a href="index.php/dormitory/selectMember" class="nav-link ">
                                                <span class="title"><?php echo lang('header_sele_mem_set'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('dormi_report', $userId)) { ?>
                                        <li class="nav-item <?php echo $dormitoryReport; ?>">
                                            <a href="index.php/dormitory/dormitoryReport" class="nav-link ">
                                                <span class="title"><?php echo lang('header_dorme_reop'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } if ($this->common->user_access('add_transport', $userId) || $this->common->user_access('all_transport', $userId)) { ?>
                            <li class="nav-item <?php echo $transport; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-bus"></i>
                                    <span class="title"><?php echo lang('header_transpo'); ?></span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('add_transport', $userId)) { ?>
                                        <li class="nav-item <?php echo $addTransport; ?>">
                                            <a href="index.php/transport/addTransport" class="nav-link ">
                                                <span class="title"><?php echo lang('header_add_trnspo'); ?></span>
                                            </a>
                                        </li>
                                    <?php } if ($this->common->user_access('all_transport', $userId)) { ?>
                                        <li class="nav-item <?php echo $allTransport; ?>">
                                            <a href="index.php/transport/allTransport" class="nav-link ">
                                                <span class="title"><?php echo lang('header_all_transpo'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-item <?php echo $message; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-envelope-open"></i>
                                <span class="title"><?php echo lang('header_message'); ?></span>
                                <span class="arrow "></span>
                            </a>
                            <ul class="sub-menu">
                                <?php if ($this->common->user_access('send_message', $userId)) { ?>
                                    <li class="nav-item <?php echo $sendMessage; ?>">
                                        <a href="index.php/message/sendMessage" class="nav-link"><?php echo lang('header_sent_message'); ?></a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item <?php echo $inbox; ?>">
                                    <a href="index.php/message/inbox" class="nav-link"><?php echo lang('header_inbox'); ?></a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($this->common->user_access('vendor', $userId) || $this->common->user_access('add_inv_cat', $userId) || $this->common->user_access('inve_item', $userId) || $this->common->user_access('inve_issu', $userId)) { ?>
                            <li class="nav-item <?php echo $stock; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-list-ul"></i>
                                    <span class="title"><?php echo lang('header_stor_manage'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('vendor', $userId)) { ?>
                                        <li class="nav-item <?php echo $vendors; ?>">
                                            <a href="index.php/stock/vendors" class="nav-link"><?php echo lang('header_vendor'); ?></a>
                                        </li>
                                    <?php } if ($this->common->user_access('add_inv_cat', $userId)) { ?>
                                        <li class="nav-item  <?php echo $inv_cate; ?>">
                                            <a href="index.php/stock/inven_category" class="nav-link"><?php echo lang('header_inven_cate'); ?></a>
                                        </li>
                                    <?php } if ($this->common->user_access('inve_item', $userId)) { ?>
                                        <li class="nav-item <?php echo $inv_item; ?>">
                                            <a href="index.php/stock/inv_item" class="nav-link"><?php echo lang('header_inve_item'); ?></a>
                                        </li>
                                    <?php } if ($this->common->user_access('inve_issu', $userId)) { ?>
                                        <li class="nav-item <?php echo $issu_item; ?>">
                                            <a href="index.php/stock/issu_item" class="nav-link"><?php echo lang('header_inve_issue'); ?></a>
                                        </li>
                                    <?php } ?>                                
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="nav-item <?php echo $cleander; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-calendar"></i>
                                <span class="title"><?php echo lang('header_event_calan'); ?></span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item <?php echo $add_events; ?>">
                                    <a href="index.php/home/addEvent" class="nav-link ">                                      
                                        <span class="title"><?php echo lang('header_set_event'); ?></span>
                                    </a>
                                </li>
                                <li class="nav-item <?php echo $calenderEvents; ?>">
                                    <a href="index.php/home/calender" class="nav-link ">
                                        <span class="title"><?php echo lang('header_calander'); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item <?php echo $profileview; ?>">
                            <a href="index.php/home/profileView" class="nav-link nav-toggle">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="title"><?php echo lang('header_profile'); ?></span>
                            </a>                            
                        </li>
                        <?php if ($this->common->user_access('setting_manage_user', $userId) || $this->common->user_access('setting_accounts', $userId) || $this->common->user_access('other_setting', $userId)) { ?>
                            <li class="nav-item <?php echo $configuration; ?>">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-cogs"></i>
                                    <span class="title"><?php echo lang('header_setting'); ?></span>
                                    <span class="arrow "></span>
                                </a>
                                <ul class="sub-menu">
                                    <?php if ($this->common->user_access('setting_manage_user', $userId)) { ?>
                                        <li class="nav-item <?php echo $systemUsers; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_set_user_role'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item <?php echo $individualUser; ?>">
                                                    <a href="index.php/configuration/individualUser" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_set_indiv_role'); ?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item <?php echo $groupRole; ?>">
                                                    <a href="index.php/configuration/groupRole" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_set_grou_role'); ?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item <?php echo $userAccess; ?>">
                                                    <a href="index.php/configuration/userAccessSettings" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_reset_all_role'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('setting_accounts', $userId)) { ?>
                                        <li class="nav-item <?php echo $accountSetting; ?>">
                                            <a href="javascript:;" class="nav-link nav-toggle">
                                                <span class="title"><?php echo lang('header_accou_settin'); ?></span>
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="sub-menu">
                                                <li class="nav-item <?php echo $setStuFee; ?>">
                                                    <a href="index.php/configuration/setStuFee" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_set_stu_fee'); ?></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item <?php echo $employSalary; ?>">
                                                    <a href="index.php/configuration/employSalary" class="nav-link ">
                                                        <span class="title"><?php echo lang('header_set_emplo_sala'); ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php } if ($this->common->user_access('other_setting', $userId)) { ?>
                                        <li class="nav-item <?php echo $generalSettings; ?>">
                                            <a href="index.php/configuration/generalSetting" class="nav-link">
                                                <span class="title"><?php echo lang('header_set_gene_info'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item <?php echo $weeklyDay; ?>">
                                            <a href="index.php/configuration/conWeeklyDay" class="nav-link">
                                                <span class="title"><?php echo lang('header_day_setting'); ?></span>
                                            </a>
                                        </li>
            <!--                                            <li class="nav-item <?php echo $language; ?>">
                                                            <a href="index.php/configuration/language" class="nav-link">
                                                                <span class="title"><?php echo lang('header_langu_settin'); ?></span>
                                                            </a>
                                                        </li>-->
                                        <li class="nav-item <?php echo $eas; ?>">
                                            <a href="index.php/configuration/att_pass" class="nav-link">
                                                <span class="title"><?php echo lang('header_eas'); ?></span>
                                            </a>
                                        </li>
                                        <li class="nav-item <?php echo $messageSettings; ?>">
                                            <a href="index.php/configuration/messageSettings" class="nav-link">
                                                <span class="title"><?php echo lang('header_set_sms_api'); ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <li class="heading">
                            <h3 class="uppercase"><?php echo lang('top_nav_log_out'); ?></h3>
                        </li>
                        <li class="nav-item">
                            <a href="index.php/auth/logout" class="nav-link">
                                <i class="fa fa-power-off"></i>
                                <span class="title"><?php echo lang('top_nav_log_out'); ?></span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->
