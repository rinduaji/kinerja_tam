<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Moniqa Ver 1.0">
  <meta name="author" content="wapo">
  <meta name="keyword" content="Moniqa Ver 1.0">
  <link rel="shortcut icon" href="../img/company_logo.png">


  <title> Monitoring Quality</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
  <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/bootstrap-autocomplete/bootstrap-chosen.css" />
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.2.custom.css" />
  <link href="../assets/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" media="screen" href="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">




</head>


<body style="background: #f1f2f7 none repeat scroll 0 0;">

  <!--container start-->
  <section id="container" class="">
    <!--header start-->

    <header class="header white-bg">
      <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips">

        </div>
      </div>
      <!--logo start-->
      <!--<a href="index.php" class="logo">Flat<span>lab</span></a>-->
      <a href="index.php" class="logo hidden-xs"><img src="../img/info1.png" height="55px" width="auto">
        <font color="#CC0000" size="2"> </font>
      </a>
      <!--logo end-->

      <div class="top-nav ">
        <!--search & user info start-->

        <ul class="nav pull-right top-menu">
          <li>
            <!--<img src="../img/logo_topx.jpg" height="45px" width="auto">-->
            <!--<input type="text" class="form-control search" placeholder="Search">-->
          </li>
          <!-- user login dropdown start-->


          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">




              <!--img alt="" src="../img/info1.png" width="30px" height="30px"-->



              <span class="username"><?php

                                      session_start();
                                      if ($_SESSION['name'] == "") {
                                        session_destroy();
                                        header("Location:../index.php?pesan=gagal");
                                      }
                                      echo "JABATAN : " . strtoupper($_SESSION['jabatan']) . "<br>";
                                      echo $_SESSION['name'];  ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li><a href="form_profile.php" onclick=""><i class=" icon-suitcase"></i>Profile</a></li>
              <li><a href="idx_login_log.php?Search=1" onclick=""><i class="icon-cog"></i> Log</a></li>
              <li><a href="form_password.php#" onclick=""><i class="icon-key"></i> Password</a></li>
              <li><a href="../logout.php"><i class="icon-signout"></i> Log Out</a></li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
      </div>
    </header>
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="sub-menu ">

            <a class="" href="index.php">
              <i class="icon-list-ul"></i>
              <span>Dashboard</span>
              <!-- <span class="arrow"></span> -->
            </a>

          </li>

          <?php if ($_SESSION['jabatan'] == "Duktek") : ?>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-list-ul"></i>
                <span>Form Tapping</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="form_insert.php">Input Manual</a></li>
                <li class=""><a class="" href="form_ideas_wo_dev1.php">Input WO Ideas</a></li>
                <li class=""><a class="" href="form_ideas_wo_myxena_dev1.php">Input WO MyXena</a></li>
                <li class=""><a class="" href="form_perbaikan_reject_tl.php">Input Perbaikan Reject TL</a></li>
                <li class=""><a class="" href="list_tap_qco.php">QCO Tapping</a></li>
              </ul>
            </li>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="form_export_qa.php">Export Tapping QA</a></li>
                <li class=""><a class="" href="form_export_spv_qa.php">Export Tapping SPV QA</a></li>
                <li class=""><a class="" href="lapor_tl.php">Report Monthly</a></li>
                <li class=""><a class="" href="rep_area.php">Report Approve</a></li>
                <li class=""><a class="" href="rep_reject.php">Report Reject TL</a></li>
                <li class=""><a class="" href="rep_temuan.php">Report Temuan</a></li>
                <li class=""><a class="" href="report_spv_qa.php">Report Monthly QM</a></li>
                <li class=""><a class="" href="rep_tap_tabber.php">Report QCO</a></li>
                <li class=""><a class="" href="rep_tap_tl.php">Report TL</a></li>
              </ul>
            </li>

            <li class="sub-menu">
              <a class="" href="list_user.php">

                <i class="icon-list-ul"></i>
                <span>Add User</span>
              </a>
            </li>
            <li class="sub-menu">
              <a class="" href="list_cuti.php">

                <i class="icon-list-ul"></i>
                <span>Cuti Tabber Fbcc</span>
              </a>
            </li>
            <li class="sub-menu ">

            <a class="" href="news.php">
            <i class="icon-list-ul"></i>
              <span>News</span>
              <!-- <span class="arrow"></span> -->
            </a>

          </li>



          <?php endif ?>

          <?php if ($_SESSION['jabatan'] == "Agent TAM") : ?>

            <li class="sub-menu ">
              <a href="javascript:;" class="">

                <i class="glyphicon glyphicon-export"></i>
                <span>Approval agent</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">


                <li class=""><a class="" href="app_bina_agent_approve.php">Approve Data Agent</a></li>
                

              </ul>
            </li>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="lapor_ag.php">Report Monthly</a></li>

              </ul>
            </li>
            <li class="sub-menu ">

            <a class="" href="news.php">
            <i class="icon-list-ul"></i>
              <span>News</span>
              <!-- <span class="arrow"></span> -->
            </a>

          </li>

          <?php endif ?>

          <?php if ($_SESSION['jabatan'] == "TL TAM DCS") : ?>

            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class=" icon-file-text-alt"></i>
                <span>Approval For TL</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="app_bina_agent_approve.php">Approval TL</a></li>
                <li class=""><a class="" href="app_bina_tl_approve.php">Approve Data Qc</a></li>
                <li class=""><a class="" href="app_bina_tl_rejected.php">Monitor Reject Data TL</a></li>
              </ul>
            </li>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="lapor_tl.php">Report Monthly Agent</a></li>
                <!-- <li class=""><a class="" href="rep_area.php">Approve TL</a></li>
                <li class=""><a class="" href="rep_temuan.php">Report Temuan</a></li> -->
                <li class=""><a class="" href="rep_tap_tl.php">Report TL</a></li>
          </ul>
            </li>
            <li class="sub-menu ">

            <a class="" href="news.php">
              <i class="icon-list-ul"></i>
              <span>News</span>
              <!-- <span class="arrow"></span> -->
            </a>

          </li>
          <?php endif ?>
          <?php if ($_SESSION['jabatan'] == "Tabber TAM") : ?>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-list-ul"></i>
                <span>Form Tapping</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="form_insert.php">Input Manual</a></li>
                <!-- <li class=""><a class="" href="form_ideas_wo_dev1.php">Input WO IDEAS</a></li>
                <li class=""><a class="" href="form_ideas_wo_myxena_dev1.php">Input WO MyXena</a></li>
                <li class=""><a class="" href="form_perbaikan_reject_tl.php">Input Perbaikan Reject TL</a></li>
                <li class=""><a class="" href="list_tap_qco.php">QCO Tapping</a></li> -->
              </ul>
            </li>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="lapor_tl.php">Report Monthly</a></li>
                <li class=""><a class="" href="rep_tap_tabber.php">Report QCO</a></li>
                <!-- <li class=""><a class="" href="rep_area.php">Report Approve</a></li>
                <li class=""><a class="" href="rep_reject.php">Report Reject TL</a></li>
                <li class=""><a class="" href="rep_temuan.php">Report Temuan</a></li> -->

              </ul>
            </li>

            <!-- <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class=" icon-file-text-alt"></i>
                <span>Approval For Tabber</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="app_bina_qco_rejected.php">Reject Data TL</a></li>
              </ul>
            </li> -->
            <!-- <li class="sub-menu ">

              <a class="" href="news.php">
                <i class="icon-list-ul"></i>
                <span>News</span>
                <span class="arrow"></span>
              </a>

            </li> -->
          <?php endif ?>
          <?php if ($_SESSION['jabatan'] == "qa") : ?>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="form_export_qa.php">Export Tapping</a></li>
                <li class=""><a class="" href="rep_tap_tabber.php">Report QCO</a></li>
                <li class=""><a class="" href="rep_tap_tl.php">Report TL</a></li>
                <!-- <li class=""><a class="" href="rep_area.php">Report Approve</a></li>
                <li class=""><a class="" href="rep_reject.php">Report Reject TL</a></li>
                <li class=""><a class="" href="rep_temuan.php">Report Temuan</a></li> -->

              </ul>
            </li>

            <!-- <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class=" icon-file-text-alt"></i>
                <span>Approval For Tabber</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="app_bina_qco_rejected.php">Reject Data TL</a></li>
              </ul>
            </li> -->
            <!-- <li class="sub-menu ">

              <a class="" href="news.php">
                <i class="icon-list-ul"></i>
                <span>News</span>
                <span class="arrow"></span>
              </a>

            </li> -->
          <?php endif ?>
          <?php if ($_SESSION['jabatan'] == "Supervisor QA TAM") : ?>
            <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class="icon-book"></i>
                <span>Report</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="report_spv_qa.php">Report Monthly QM</a></li>
                <li class=""><a class="" href="form_export_spv_qa.php">Export Tapping</a></li>
                <li class=""><a class="" href="rep_tap_tabber.php">Report QCO</a></li>
                <li class=""><a class="" href="rep_tap_tl.php">Report TL</a></li>
                <!-- <li class=""><a class="" href="rep_area.php">Report Approve</a></li>
                <li class=""><a class="" href="rep_reject.php">Report Reject TL</a></li>
                <li class=""><a class="" href="rep_temuan.php">Report Temuan</a></li> -->

              </ul>
            </li>

            <!-- <li class="sub-menu ">
              <a href="javascript:;" class="">
                <i class=" icon-file-text-alt"></i>
                <span>Approval For Tabber</span>
                <span class="arrow"></span>
              </a>
              <ul class="sub">
                <li class=""><a class="" href="app_bina_qco_rejected.php">Reject Data TL</a></li>
              </ul>
            </li> -->
            <!-- <li class="sub-menu ">

              <a class="" href="news.php">
                <i class="icon-list-ul"></i>
                <span>News</span>
                <span class="arrow"></span>
              </a>

            </li> -->
          <?php endif ?>



          </li>

          <!-- sidebar menu end-->
      </div>
    </aside>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  -->
    <!-- <script src="autologout.js"></script> -->