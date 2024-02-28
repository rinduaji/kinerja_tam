 <!DOCTYPE html>
 <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
 <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
 <!--[if !IE]><!-->
 <html lang="en" class="no-js">
 <!--<![endif]-->
 <!-- BEGIN HEAD -->
 <?php 

 if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
 if ($_POST){extract($_POST,EXTR_OVERWRITE);}

//require_once('koneksi.php');
     //session_start();

 require_once('sidebar.php'); 
 require_once('koneksi.php');
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
<!--sidebar end--> 
<!--main content start-->
<section id="main-content">

  <!-- wrapper start -->
  <section class="wrapper">

    <form name="form1" method="post" action="form_perbaikan_reject_tl.php" >

      <input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_115">
      <input type="hidden" id="vactive_level" name="vactive_level"  value="Supervisor">
      <input type="hidden" id="agent_ticket" name="agent_ticket"  value="">
      <input type="hidden" id="agent_cwc" name="agent_cwc"  value="">

      <input type="hidden" id="sts" name="sts" size="20" value="">
      <input type="hidden" id="from_dash" name="from_dash" size="20" value="">


      <div class="row">

        <div class="col-lg-12">

          <section class="panel">

            <div class="revenue-head ">
              <span>
                <i class="icon-ticket"></i>
              </span>
              
              <h3>Perbaikan Reject Team Leader</h3>  
            </div>
            

            <div class="panel-body">

              <div class="tab-content tasi-tab">

                <table border="0" width="100%">
                  <tr>
                    <td>
                      <label for="start">Cari Bulan dan Tahun :</label>
                    </td>
                    <td width="74%">
                      <input type="month" class="form-control" name="keyword" size="1" value="<?php echo date("F Y");?>">
                    </td>

                    <td>

                                  <!--
                                <button type="button" class="btn btn-warning" onClick="caridata();">
                                <font color="#000000">Search</font></button>
                              -->       
                              <button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
                              <button type="button" id="reset" name="reset"  class="btn btn-danger">Reset</button>

                            </td>
                          </tr>
                        </table>



                        <div class="table-responsive">
                          <table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
                            <div><br></div>
                            <thead>
                              <tr>
                                <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                  <font face="Verdana" style="font-size: 9pt">
                                  No</font></th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Jenis <br/> Bina
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Tanggal <br/> Bina
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Tanggal <br/> Kejadian
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Agent <br/> (CO)
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Team <br/> Leader
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      QCO <br/> Penilai
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      ND
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Status <br/> Bina
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Uraian Aproval<br/>
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Rekomendasi <br/> QCO
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Rekomendasi <br/> Agent
                                    </font>
                                  </th>

                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Komitmen <br/> Team Leader
                                    </font>
                                  </th>
                                  <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
                                    <font face="Verdana" style="font-size: 9pt">
                                      Action
                                    </font>
                                  </th>
                                </tr>

                              </thead>
                              <tbody>
                                <?php 
                      //echo date('m');

                                $qq=date('m');
                                $q=date('Y');
                                $month = $qq;
                                $year = date("Y",strtotime($q));

                                $no=1;

                                if($_POST['keyword'] == "" OR $_POST['keyword'] == null){
                                  if(!isset($_POST['search'])){
                                    while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
                                      $sql=mysqli_query($conn,"SELECT a.reason_monitoring,a.tanggal,a.tglrecord,a.user_id,b.nama_tl,a.lup_qa,a.nd,a.status,a.recordid,a.ani,a.param_tapping_proses,a.param_tapping_sikap,a.ofi,a.rekomendasi_tl,a.komitmen_agent,a.human,a.system_prosedur,a.tools FROM app_kinerja_nilai AS a INNER JOIN cc147_main_users AS b ON a.user_id = b.username WHERE MONTH(a.tanggal) = '$qq' and YEAR(a.tanggal) = '$q' and a.status = 0");

 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
                                      while($rsk=mysqli_fetch_row($sql)){
                                        $month = date(m,strtotime($row[1]));
                                        // if ($qq==$month) {
  # code...
                                        ?>

                                        <tr class="odd gradeX">

                                          <td style="padding-top: 2px; padding-bottom: 2px">
                                            <font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>         
                                            <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[0]; ?></font>
                                           </td>

                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y",strtotime($rsk[1]));?></font>
                                           </td>
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y h:i:s",strtotime($rsk[2]));?></font>
                                           </td>
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[3];?></font>
                                           </td>
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[4];?></font>
                                           </td>                         
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[5];?></font>
                                           </td>    
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[6];?></font>
                                           </td>                         
                                           <td style="padding-top: 2px; padding-bottom: 2px">
                                             <font face="Tahoma" style="font-size: 9pt"><?php 
                                             if ($rsk[7]==0) {
                                              echo "Need Approve QCO Rejected TL";
                                            }else{
                                              echo "Need Approve Rejected TL From QCO";
                                            } ?>

                                          </font>
                                        </td>
                                        <td style="padding-top: 2px; padding-bottom: 2px">
                                         <font face="Tahoma" style="font-size: 9pt">MSISDN=<?php echo $rsk[9];?><br>Record ID=<?php echo $rsk[8];?><br>Param Taping Solusi=<?php echo $rsk[10];?><br>Param Taping Sikap=<?php echo $rsk[11];?><br>OFI=<?php echo $rsk[12];?></font>
                                       </td>
                                       <td style="padding-top: 2px; padding-bottom: 2px">
                                         <font face="Tahoma" style="font-size: 9pt">HUMAN=<?php echo $rsk[15];?><br>System Procedure=<?php echo $rsk[16];?><br>Tools=<?php echo $rsk[17];?></font>
                                       </td>
                                       <td style="padding-top: 2px; padding-bottom: 2px">
                                         <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[14];?></font>
                                       </td>
                                       <td style="padding-top: 2px; padding-bottom: 2px">
                                         <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[13];?></font>
                                       </td>
                                       <td style="padding-top: 2px; padding-bottom: 2px">
                                        <a href="form_perbaikan_reject_tl_detail.php?user_id=<?php echo $rsk[3];?>&ani=<?php echo $rsk[9];?>&tanggal=<?php echo $rsk[1];?>&nd=<?php echo $rsk[6];?>" class="btn btn-primary btn-sm">Detail</a>
                                      </td>

                                    </tr>

                                    <?php  

                                    $no++;
                                     // }

                                  }





                                  $qq++;
                                  $q--;
                                }
                              }

                            }
                            else {
                              $month = date(m,strtotime($_POST['keyword']));
                              $year = date(Y,strtotime($_POST['keyword']));
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
                              $sql=mysqli_query($conn,"SELECT a.reason_monitoring,a.tanggal,a.tglrecord,a.user_id,b.nama_tl,a.lup_qa,a.nd,a.status,a.recordid,a.ani,a.param_tapping_proses,a.param_tapping_sikap,a.ofi,a.rekomendasi_tl,a.komitmen_agent,a.human,a.system_prosedur,a.tools FROM app_kinerja_nilai AS a INNER JOIN cc147_main_users AS b ON a.user_id = b.username WHERE MONTH(a.tanggal) = '$month' and YEAR(a.tanggal) = '$year' and a.status = 0");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
                              while($rsk=mysqli_fetch_row($sql)){


  # code...
                                ?>

                                <tr class="odd gradeX">

                                  <td style="padding-top: 2px; padding-bottom: 2px">
                                    <font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>         
                                    <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[0]; ?></font>
                                   </td>

                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y",strtotime($rsk[1]));?></font>
                                   </td>
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y h:i:s",strtotime($rsk[2]));?></font>
                                   </td>
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[3];?></font>
                                   </td>
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[4];?></font>
                                   </td>                         
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[5];?></font>
                                   </td>    
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[6];?></font>
                                   </td>                         
                                   <td style="padding-top: 2px; padding-bottom: 2px">
                                     <font face="Tahoma" style="font-size: 9pt"><?php 
                                     if ($rsk[7]==0) {
                                      echo "Need Approve QCO Rejected TL";
                                    }else{
                                      echo "Need Approve Rejected TL From QCO";
                                    } ?>

                                  </font>
                                </td>
                                <td style="padding-top: 2px; padding-bottom: 2px">
                                 <font face="Tahoma" style="font-size: 9pt">MSISDN=<?php echo $rsk[9];?><br>Record ID=<?php echo $rsk[8];?><br>Param Taping Solusi=<?php echo $rsk[10];?><br>Param Taping Sikap=<?php echo $rsk[11];?><br>OFI=<?php echo $rsk[12];?></font>
                               </td>
                               <td style="padding-top: 2px; padding-bottom: 2px">
                                 <font face="Tahoma" style="font-size: 9pt">HUMAN=<?php echo $rsk[15];?><br>System Procedure=<?php echo $rsk[16];?><br>Tools=<?php echo $rsk[17];?></font>
                               </td>
                               <td style="padding-top: 2px; padding-bottom: 2px">
                                 <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[14];?></font>
                               </td>
                               <td style="padding-top: 2px; padding-bottom: 2px">
                                 <font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[13];?></font>
                               </td>
                               <td style="padding-top: 2px; padding-bottom: 2px">
                                <a href="form_perbaikan_reject_tl_detail.php?user_id=<?php echo $rsk[3];?>&ani=<?php echo $rsk[9];?>&tanggal=<?php echo $rsk[1];?>" class="btn btn-primary btn-sm">Detail</a>
                              </td>

                            </tr>

                            <?php  

                            $no++;


                          }
                          $q--;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>

                  <table>
                    <TR>
                      <TD style="padding-top: 0px; padding-bottom: 0px">
                        <p align="center">
                          <font color="#000042" face="Verdana" style="font-size: 8pt">
                            <b>&nbsp;</b>
                          </font>
                          <!-- <b><font face="Verdana" style="font-size: 8pt" color="#000066">&nbsp;Total : &nbsp; record</b></font></TD> -->

                        </TR>

                      </table>
                      <!--<p align="center">History Ticket</p>-->

                      <!-- detil grid start-->
          <!--        
          <div class="row">
          
          
              <header class="panel-heading label-default">
                              <p class="label"><i class="icon-comment-alt"></i> &nbsp;History Ticket</p>
                          </header>                 
              <div class="panel-body">
                <iframe width="100%" border="0" frameborder="0" scrolling="yes" name="frame_detail" src="ticket_log.php?select_id="></iframe>
              </div>        
          </div>
        -->
        <!-- detil grid end-->
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
              cari bulan yang anda cari dan tekan search<br>
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
    <input type="hidden" name="num_page" value="">
    <input type="hidden" name="total_data" value="">

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

<script src="../js/jquery.customSelect.min.js" ></script>
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


  $(document).ready(function(){

    $('#reset').click(function(e){
      document.location.href = 'idx_office.php?sub_menu='+sub_menu.value+'&Search=1';

    });

  });

  function delete_data(no)
  {
    return confirm('Hapus data nomer '+no+' ?');
  }


  function gritter_show(vjudul, vpesan)
  {

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

