 <!DOCTYPE html>
 <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
 <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
 <!--[if !IE]><!-->
 <html lang="en" class="no-js">
 <!--<![endif]-->
 <!-- BEGIN HEAD -->
 <?php

    if ($_GET) {
        extract($_GET, EXTR_OVERWRITE);
    }
    if ($_POST) {
        extract($_POST, EXTR_OVERWRITE);
    }
    include("koneksi.php");
    //require_once('koneksi.php');


    include('sidebar.php');
    //require_once('koneksi.php');
    date_default_timezone_set('Asia/Jakarta');
    $tgl = date('Y-m-d');
    $lup = date('Y-m-d h:i:s');

    ?>

 <!--sidebar end-->
 <!--main content start-->
 <section id="main-content">

     <!-- wrapper start -->
     <section class="wrapper">

         <form name="form1" method="post" action="list_tap_qco.php">

             <input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active26">
             <input type="hidden" id="vactive_level" name="vactive_level" value="Supervisor">
             <input type="hidden" id="agent_ticket" name="agent_ticket" value="">
             <input type="hidden" id="agent_cwc" name="agent_cwc" value="">

             <input type="hidden" id="sts" name="sts" size="20" value="">
             <input type="hidden" id="from_dash" name="from_dash" size="20" value="">


             <div class="row">

                 <div class="col-lg-12">

                     <section class="panel">

                         <div class="revenue-head ">
                             <span>
                                 <i class="icon-ticket"></i>
                             </span>
                             <h3>List Tapping Tabber Fbcc</h3>
                             <span class="rev-combo pull-right">
                                 <a data-toggle="modal" href="#modal_help">
                                     <i class="icon-question-sign"></i>
                                 </a>
                             </span>
                         </div>
                         <div class="panel-body" style="overflow-y: scroll; overflow-x: scroll">


                             <div class="panel-body">

                                 <div class="tab-content tasi-tab">
                                     <?php
                                        if (isset($_GET['status'])) {
                                            if ($_GET['status'] == 'sukses delete') {
                                                echo ("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah dihapus Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  //   <span aria-hidden='true'>&times;</span>
			  // </button></div>");
                                            } else {
                                                echo ("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah diupdate Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			 //   <span aria-hidden='true'>&times;</span>
			  // </button></div>");
                                            }
                                        }
                                        ?>

                                     <table border="0" width="100%" cellpadding="10">
                                         <tr>
                                             <td>
                                                 <label for="start">Cari Tanggal :</label>
                                             </td>
                                             <td width="76%">
                                                 <input type="date" class="form-control" id="keyword" name="keyword" placeholder="Type keyword here Date" value="" size="1" style="width: all;">
                                             </td>
                                         </tr>
                                         <tr>
                                             <td>
                                                 <label for="start">Cari Nama Tabber Fbcc :</label>
                                             </td>
                                             <td width="76%">
                                                 <select class="form-control chosen-select" name="nama_tabber" id="nama_tabber" class="form-control" onChange="document.demo.submit()">
                                                     <option value=" ">-- Pilih Nama Tabber --</option>
                                                     <?php
                                                        $pkat = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");

                                                        while ($ckat = mysqli_fetch_row($pkat)) {
                                                            //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
                                                            if ($nama_tabber == $ckat[1]) {
                                                                $sel = "selected";
                                                            } else {
                                                                $sel = "";
                                                            }
                                                            echo (" <option value=$ckat[1] $sel>$ckat[2]</option>");
                                                        }
                                                        ?>
                                                 </select>
                                             </td>
                                         </tr>
                                         <tr>
                                             <td></td>
                                             <td>

                                                 <!--
																<button type="button" class="btn btn-warning" onClick="caridata();">
																<font color="#000000">Search</font></button>
															-->
                                                 <button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
                                                 <button type="button" id="reset" name="reset" class="btn btn-danger">Reset</button>

                                             </td>
                                         </tr>
                                     </table>


                                     <?php
                                        $search_now = date("Y-m-d");
                                        $month_now = date("m", strtotime($search_now));
                                        $year_now = date("Y", strtotime($search_now));
                                        if (isset($_POST['Search']) and !($_POST['keyword'] == '') and !($_POST['nama_tabber'] == '')) {
                                            $sqlo = "SELECT a.id, b.name, a.user1, c.tanggal, COUNT(*) as total FROM cc147_main_users_extended AS a INNER JOIN cc147_main_users AS b ON a.user1=b.username INNER JOIN app_kinerja_nilai AS c ON c.lup_qa=b.username WHERE a.user3='Tabber Fbcc' AND c.tanggal='$keyword' AND c.lup_qa='$nama_tabber' AND b.username <> '44736' AND b.username <> 'nia' ORDER BY c.tanggal, b.username";

                                        ?>
                                         <br>
                                         <h3><strong>Total Tapping Tabber Fbcc : </strong></h3>
                                         <div class="table-responsive">
                                             <table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
                                                 <div><br></div>
                                                 <thead>
                                                     <tr>
                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">
                                                                 No</font>
                                                         </th>
                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">
                                                                 Username </font>
                                                         </th>

                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">
                                                                 Nama Tabber Fbcc </font>
                                                         </th>


                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">tanggal
                                                             </font>
                                                         </th>

                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">Total Tapping
                                                             </font>
                                                         </th>
                                                         <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                                             <font face="Calibri" size="2">Status
                                                             </font>
                                                         </th>
                                                     </tr>

                                                 </thead>

                                                 <?php
                                                    $sqloo = mysqli_query($conn, $sqlo);
                                                    $no = 1;
                                                    while ($sqlop = mysqli_fetch_row($sqloo)) {

                                                        # code...
                                                        if ($sqlop[1] == "") {
                                                            // var_dump($sqlop[1]);
                                                            // exit();
                                                    ?>
                                                         <tbody>
                                                             <tr class="odd gradeX">
                                                                 <td colspan="6">
                                                                     <font face="Calibri" size="2">
                                                                         <center>DATA TIDAK DITEMUKAN</center>
                                                                     </font>
                                                                 </td>
                                                             </tr>
                                                         </tbody>
                                                     <?php
                                                        } else {
                                                        ?>
                                                         <tbody>


                                                             <tr class="odd gradeX">

                                                                 <td style="padding-top: 2px; padding-bottom: 2px">
                                                                     <font face="Calibri" size="2"><?php echo $no; ?></font>
                                                                 </td>
                                                                 <td style="padding-top: 2px; padding-bottom: 2px">
                                                                     <font face="Calibri" size="2"><?php echo $sqlop[1]; ?>
                                                                     </font>
                                                                 </td>

                                                                 <td style="padding-top: 2px; padding-bottom: 2px">
                                                                     <font face="Calibri" size="2"><?php echo $sqlop[2]; ?>
                                                                     </font>
                                                                 </td>

                                                                 <td style="padding-top: 2px; padding-bottom: 2px">
                                                                     <font face="Calibri" size="2"><?php echo date("d F Y", strtotime($sqlop[3])); ?>
                                                                     </font>
                                                                 </td>

                                                                 <td style="padding-top: 2px; padding-bottom: 2px">
                                                                     <font face="Calibri" size="2"><?php echo $sqlop[4]; ?>
                                                                     </font>
                                                                 </td>
                                                                 <td style="padding-top: 2px; padding-bottom: 2px"><i><strong>
                                                                             <font face="Calibri" size="2">
                                                                                 <?php
                                                                                    if ($sqlop[4] < 30) {
                                                                                        echo "Jumlah Tapping kurang " . abs($sqlop[4] - 30) . " dari target";
                                                                                    } else {
                                                                                        echo "Jumlah Tapping melebihi dari target";
                                                                                    }
                                                                                    ?>
                                                                             </font>
                                                                         </strong></i>
                                                                 </td>
                                                             </tr>
                                                         </tbody>
                                                 <?php
                                                            $no++;
                                                        }
                                                    }
                                                    ?>
                                             </table>
                                         </div>
                                         <h5>* <i><strong>Total Target Tapping Tabber Fbcc Tiap Hari : 30 Tapping</strong></i></h5>
                                     <?php
                                        }
                                        ?>


                                     <!-- 	<table>
											  <TR>
												<TD style="padding-top: 0px; padding-bottom: 0px">
												<p align="center">
														<font color="#000042" face="Verdana" style="font-size: 8pt">
														<b><font face='Verdana' style='font-size: 8pt'>Page 1 of 94 &nbsp;<input class="btn btn-success" type="submit" name="next" value=" > ">&nbsp;<input class="btn btn-success" type="submit" name="last" value=" >> "></font>&nbsp;</b></font>
														<b><font face="Verdana" style="font-size: 8pt" color="#000066">&nbsp;Total : 1407&nbsp; record</b></font></TD>
														
											  </TR>
											  
											</table> -->

                                 </div>








                             </div>



                             <!-- Modal -->
                             <div class="modal fade" id="modal_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                             <h4 class="modal-title">Help</h4>
                                         </div>
                                         <div class="modal-body">
                                             <b>
                                                 Ketik keyword yang anda cari dan tekan search<br>
                                             </b>

                                         </div>
                                         <div class="modal-footer">
                                             <button data-dismiss="modal" class="btn btn-success" type="button">Close</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- modal -->






                             <input type="hidden" name="flag_temp" value="">
                             <input type="hidden" name="page" value="1">
                             <input type="hidden" name="num_page" value="94">
                             <input type="hidden" name="total_data" value="1407">

         </form>


     </section>
     <!--wrapper end -->
 </section>
 <!--main content end-->
 </section>
 <!--container end-->




 <!-- js placed at the end of the document so the pages load faster -->
 <script src="../js/jquery.js"></script>
 <script src="../js/jquery-1.8.3.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/jquery.scrollTo.min.js"></script>
 <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>


 <!-- buat graphic -->
 <!--
	<script src="../assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
	<script src="../assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
    <script src="../assets/chart-master/Chart.js"></script>
    <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
	<script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
-->


 <!--<script src="../js/owl.carousel.js" ></script>-->

 <script src="../js/jquery.customSelect.min.js"></script>
 <!--common script for all pages-->
 <script src="../js/common-scripts.js"></script>


 <!--script for this page-->
 <!--<script src="../js/morris-script.js"></script>-->
 <!--<script src="../js/sparkline-chart.js"></script>-->
 <!--<script src="../js/easy-pie-chart.js"></script>-->
 <!--<script src="../js/all-chartjs.js"></script>-->
 <!-- script for this page only-->

 <script type="text/javascript" src="../assets/gritter/js/jquery.gritter.js"></script>
 <script src="../js/gritter.js" type="text/javascript"></script>





 <script>
     $(document).ready(function() {

         $('#reset').click(function(e) {
             document.location.href = 'list_cuti.php';

         });

     });

     function delete_data(no) {
         return confirm('Hapus data nomer ' + no + ' ?');
     }


     function gritter_show(vjudul, vpesan) {

         $.gritter.add({
             title: vjudul,
             image: '../img/company_logo.png',
             text: vpesan,
             //sticky: true,
             time: '1000',
         });

     }
 </script>

 </body>

 </html>