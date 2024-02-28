
 <!DOCTYPE html>
<html lang="en">
<?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     //session_start();

   require_once('sidebar.php'); 
     
     date_default_timezone_set('Asia/Jakarta');
     $tgl=date('Y-m-d');
     $lup=date('Y-m-d h:i:s');

   ?>         
     <SCRIPT language=Javascript>
      function isNumberKey(evt)
      {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
      }
     
      </SCRIPT>  
        <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> -->
  <!-- <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../demo/demo.css" rel="stylesheet" />
    <!--sidebar end-->  
    
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
        <!--form name="form1" method="post" action="bina_tl_approve.php" -->
        <form name="form1" method="post" action="lapor_ag.php">
          <!--input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_63"-->
        
          <div class="row">
          
            <div class="col-lg-12" >
              <section class="panel">
                <div class="revenue-head ">
                  <span>
                    <i class="icon-ticket"></i>
                  </span>
                  <h3>Dashboard - Live Aproval Agent</h3>                 
                </div>
              </section>              
            </div>
          
            <!--div class="col-lg-3">             
              <section class="panel">
                <div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">                 
                  <h3>Menu</h3>                 
                </div>
                <div class="panel-body">
                
                  <ul class="nav prod-cat">
                    <li><a href="#"><i class=" icon-angle-right"></i> Export Excel</a></li>
                    <li><a href="#"><i class=" icon-angle-right"></i> Pencarian Canggih</a></li>
                    <li><a href="#"><i class=" icon-angle-right"></i> Kembali ke Pilih Jabatan</a></li>
                    <li><a href="#"><i class=" icon-angle-right"></i> Ketidaksesuaian CHO - (Malang)</a></li>
                  </ul>
                 
                </div>
              </section>
            </div-->            
            
            <div class="col-lg-12">             
              <div class="panel-body">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">
                    <?php 
                    include("koneksi.php");
                    $sql    ="SELECT tanggal FROM `maincc147`.`app_kinerja_nilai` WHERE `status` IN ('1','-1')";
                    $query    =mysqli_query($conn, $sql);
                    $count    =mysqli_num_rows($query);

                     ?>

                  Blm Di Aproved TL</p>
                  <h3 class="card-title"><?php echo $count; ?>
                    <!-- <small>GB</small> -->
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">
                 <?php 
                    include("koneksi.php");
                    $sql    ="SELECT tanggal FROM `maincc147`.`app_kinerja_nilai` WHERE `status` = '2'";
                    $query    =mysqli_query($conn, $sql);
                    $count    =mysqli_num_rows($query);

                     ?>
                  Blm Di Aproved Agent</p>
                  <h3 class="card-title"><?php echo $count; ?></h3>
                </div>
                <div class="card-footer">
                   <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">
                    <?php 
                    include("koneksi.php");
                    $sql    ="SELECT tanggal FROM `maincc147`.`app_kinerja_nilai` WHERE `status` IN ('0')";
                    $query    =mysqli_query($conn, $sql);
                    $count    =mysqli_num_rows($query);

                     ?>
                  Aproval Rejected TL</p>
                  <h3 class="card-title"><?php echo $count; ?></h3>
                </div>
                 <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">
                    <?php 
                    include("koneksi.php");
                    $tgl=date('Y-m-d');;
                    //echo $tgl;
                    $sql    ="SELECT tanggal FROM `maincc147`.`app_kinerja_nilai` WHERE `tanggal` =  '$tgl'";
                    $query    =mysqli_query($conn, $sql);
                    $count    =mysqli_num_rows($query);

                     ?>
                  Aproval Hari ini</p>
                  <h3 class="card-title"><?php echo $count; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Blm Diaprove TL Stats</h4>
                  <p class="card-category">List daftar Tl yang belum Melakukan Aproval</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>NO</th>
                      <th>Login TL</th>
                      <th>Jumlah Aproval</th>
                      
                    </thead>
                    <tbody>
                         <?php
                       //echo $tgl;
                    $sql    ="SELECT lup_tl_name,COUNT(*) FROM `maincc147`.`app_kinerja_nilai` WHERE `status` IN (1,-1)";
                    $query    =mysqli_query($conn, $sql);

                   while ( $queryy =mysqli_fetch_row($query)) {
                    
                     ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $queryy[0]; ?></td>
                        <td><?php echo $queryy[1]; ?></td>
                       
                      </tr>
                  <?php 
                    } 
                   ?>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Blm Diaprove Agent Stats</h4>
                  <p class="card-category">List daftar Agent yang belum Melakukan Aproval</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-success">
                      <th>NO</th>
                      <th>Login Agent</th>
                      <th>Jumlah Aproval</th>
                      
                    </thead>
                    <tbody>
                            <?php
                       //echo $tgl;
                    $sql    ="SELECT user_id,COUNT(*) FROM `maincc147`.`app_kinerja_nilai` WHERE `status` IN (2)";
                    $query    =mysqli_query($conn, $sql);

                   while ( $queryy =mysqli_fetch_row($query)) {
                    
                     ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $queryy[0]; ?></td>
                        <td><?php echo $queryy[1]; ?></td>
                       
                      </tr>
                  <?php 
                    } 
                   ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">Blm Diaprove Tabber </h4>
                  <p class="card-category">List daftar Tabber yang belum Melakukan Aproval Rejected from TL</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-danger">
                      <th>NO</th>
                      <th>Login Tabber</th>
                      <th>Jumlah Aproval</th>
                      
                    </thead>
                    <tbody>
                             <?php
                       //echo $tgl;
                    $sql    ="SELECT lup_qa,COUNT(*) FROM `maincc147`.`app_kinerja_nilai` WHERE `status` IN (0)";
                    $query    =mysqli_query($conn, $sql);

                   while ( $queryy =mysqli_fetch_row($query)) {
                    
                     ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $queryy[0]; ?></td>
                        <td><?php echo $queryy[1]; ?></td>
                       
                      </tr>
                  <?php 
                    } 
                   ?>
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                    <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">Aproval Hari ini</h4>
                  <p class="card-category">List daftar Aproval Live hari ini Per area</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-info">
                      <th>NO</th>
                      <th>Area</th>
                      <th>Jumlah Aproval</th>
                      
                    </thead>
                    <tbody>
                             <?php
                       //echo $tgl;
                    $sql    ="SELECT area,COUNT(*) FROM `maincc147`.`app_kinerja_nilai` WHERE tanggal = '$tgl'";
                    $query    =mysqli_query($conn, $sql);

                   while ( $queryy =mysqli_fetch_row($query)) {
                    
                     ?>
                      <tr>
                        <td>1</td>
                        <td><?php echo $queryy[0]; ?></td>
                        <td><?php echo $queryy[1]; ?></td>
                       
                      </tr>
                  <?php 
                    } 
                   ?>
                  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
         
    </div>
  </div>
  <!--container end-->
  
  <!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- <script src="../js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script> -->
    <!-- <script src="../js/jquery.scrollTo.min.js"></script> -->
    <!-- <script src="../js/jquery.nicescroll.js" type="text/javascript"></script> -->
    <!-- <script src="../js/respond.min.js" ></script> -->
  
  <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>  
  <!-- <script type="text/javascript" src="../assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> -->
  <script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>

    <!--common script for all pages-->
    <script src="../js/common-scripts.js"></script> <script type="text/javascript">

    $(function(){     
      
      $('#x_tgl_bina').datepicker({
        format: 'yyyy-mm',
        viewMode: 'months',
        minViewMode: 'months'

      });
      
      $('#tgl_bina_reset').click(
        function(){         
          $('#x_tgl_bina').val("");
        }
      );
      
      $('#tgl_bina_set').click(
        function(){         
          //alert("test");
          $('#x_tgl_bina').focus();
        }
      );
      
      $('#x_tgl_bina1').datepicker({
        format: 'yyyy-mm-dd'
      });
      
      $('#tgl_bina1_reset').click(
        function(){         
          $('#x_tgl_bina1').val("");
        }
      );
      
      $('#tgl_bina1_set').click(
        function(){         
          //alert("test");
          $('#x_tgl_bina1').focus();
        }
      );
      
      $('#x_tgl_jadi').datepicker({
        format: 'yyyy-mm-dd'
      });
      
      $('#tgl_jadi_reset').click(
        function(){         
          $('#x_tgl_jadi').val("");
        }
      );
      
      $('#tgl_jadi_set').click(
        function(){         
          //alert("test");
          $('#x_tgl_jadi').focus();
        }
      );
      
      $('#x_tgl_jadi1').datepicker({
        format: 'yyyy-mm-dd'
      });
      
      $('#tgl_jadi1_reset').click(
        function(){         
          $('#x_tgl_jadi1').val("");
        }
      );
      
      $('#tgl_jadi1_set').click(
        function(){         
          //alert("test");
          $('#x_tgl_jadi1').focus();
        }
      );

      /*$("#x_user_agent").change(function(){
        var nilai = this.value;
        //alert(nilai);   
        $("#x_nama_agent").val(null);  
        $("#x_nama_agent").val(nilai);
        $("#x_nama_agent").trigger('chosen:updated');
        
      });*/
      
      /*($("#x_nama_agent").change(function(){
        var nilai = this.value;
        //alert(nilai);   
        $("#x_user_agent").val(null);  
        $("#x_user_agent").val(nilai);
        $("#x_user_agent").trigger('chosen:updated');
      });*/

        
  </script>
  <script src="../js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../js/core/popper.min.js" type="text/javascript"></script>
  <script src="../js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chartist JS -->
  <script src="../js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>