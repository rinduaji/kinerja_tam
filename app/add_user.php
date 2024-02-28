 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
  <!-- Navbar -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--<![endif]-->
<!-- BEGIN HEAD -->

   <?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     

   include('sidebar.php'); 
     //require_once('koneksi.php');
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
       

						
			<!-- <form name="demoform" method="post" action="add_user.php" accept-charset='UTF-8'> -->
      <form id='input' name="demo" action='add_user.php' method='post' accept-charset='UTF-8' style="overflow-y:auto;">
			
				 <?php
  if(isset($_POST['Save'])){
  
 

   $username = $x_userid;
  //echo "$username";
  $sql="select user_id from cc147_main_users where username='$username' ";
  //echo "hgjhgjhgjhgjhgjhgjhgjhgjg";
  //die();
 
    $hasil=mysqli_query($conn,$sql);
    $row=mysqli_fetch_row($hasil);
    if ($row[0]==''){
      $nama=$txtnama;
  $email = $username."@cctelkom.web.id";
  $password = md5('infomedia');
   $sekarang=date("Y-m-d H:i:s");
   $bulanrek=date("n");
   $tahunrek=date("Y");
   $sarea=$area;
  // $sjabat='Agent TAM';
   //$skelompok='43';
   $mktime=mktime();
   
   
  
   $sql3="INSERT INTO cc147_main_users (username, user_email, user_password,nama_tl,qco, user_regdate, user_avatar, name,user_allow_pm,user_allow_pm_file,user_active) 
                  VALUES ('$username', '$email', '$password','$user_tl', '$qco', '$mktime' , 'gallery/blank.gif', '$user', '0', '0','1')";
   
//    echo "$sql3";

   if(!mysqli_query($conn,$sql3)) {$rep="Penambahan cc147_main_users gagal atau jangan pakai tanda petik untuk username"; 
 	echo "<div id='sas' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  $rep !!</div>";
    }else{
   
    $sql="select user_id from cc147_main_users where username='$username'";
    
    $hasil=mysqli_query($conn,$sql);

    $row=mysqli_fetch_row($hasil);
    $id_cc147_main_user=$row[0];
  
   
   $sql4="INSERT INTO cc147_main_users_extended (id, user_id, user1,user2,user3,user4,user7,user12,user13) values ('$id_cc147_main_user','$id_cc147_main_user','$username','$user','$segment_cbo','$gender','$cbo_areaa','nopict.jpg','AKTIF')";
//    echo $sql4;
   mysqli_query($conn,$sql4);
   
  
     echo "<div id='sas' class='alert alert-success' role='alert'><span class='glyphicon glyphicon-check'></span>  data $username sudah masuk pada database!!</div>"; }
  
 
}else{
  
   $rep="Penambahan cc147_main_users gagal.<br>";
  echo "<div id='sas' class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  data $username sudah sudah ada di database!!</div>";
  }
}
?>  

				
				


				<div class="col-md-12" >
							<section class="panel">
								<div class="revenue-head " style="background: #FF5050;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">								
									<h3>Tambah Login </h3>									
								</div>
							
								<div class="panel-body">
							
									
									<div class="table-responsive" style="overflow-y: scroll;">

										<div class='col-md-12'>
										<div class="form-horizontal tasi-form">
											<div class="form-group">												
												<div class="col-md-12">

																<div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>Area</strong></label>
																	<div class="col-lg-8">																
																		

								                                     <select class="chosen-select" name="cbo_areaa" class="form-control" onChange="document.demo.submit()">
								                                        <option value=" ">-- Pilih Area --</option>
								                                               <?php
								                                        $pkat = mysqli_query($conn, "SELECT kota FROM `app_kinerja_kota` ");
								                                     
								                                        while ($ckat = mysqli_fetch_row($pkat)) {
								                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
								                                        if ($cbo_areaa==$ckat[0]){$sel="selected";} else {$sel="";}
								                                        echo(" <option value=$ckat[0] $sel>$ckat[0]</option>");
								                                       
								                                        }
								                                         ?>
								                                    </select>
                                  
																	</div>
																  </div>
                              
																<div class="form-group">
																  <label  class="col-lg-4 control-label"><strong>Pilih Nama Team Leader</strong></label>
																  <div class="col-lg-8">
																		<!-- <select class="form-control" name="cbo_tl" id="cbo_tl" tabindex="2">
																			<option value="">-- CSDM / Nama TL --</option> -->
							                                       <select class="chosen-select" name="kategori" class="form-control" onChange="document.demo.submit()">
							                                        <option value=" ">-- Pilih Team Leader --</option>
							                                               <?php
							                                        $pkat = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='TL TAM DCS' and b.user7='$cbo_areaa'");
							                                        $k=1;
							                                        while ($ckat = mysqli_fetch_row($pkat)) {
							                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
							                                        if ($kategori==$ckat[0]){$sel="selected";} else {$sel="";}
							                                        echo(" <option value=$ckat[0] $sel>$ckat[1]</option>");
							                                        $k++;
							                                        }
							                                         ?>
							                                        </select>
																			
																		<!-- </select> -->
																	</div>
															  	</div>
																  <div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>User TL</strong></label>
																	<div class="col-lg-8">																
																		<input type="text" width="50px" class="form-control"  name="user_tl" id="user_tl" placeholder=""  readonly="true" value="<?php echo $kategori; ?>" onChange="document.demo.submit()">

																	</div>
																  </div>
																  <div class="form-group">
																  <label  class="col-lg-4 control-label"><strong>Pilih Nama QCO</strong></label>
																  <div class="col-lg-8">
																		<!-- <select class="form-control" name="cbo_tl" id="cbo_tl" tabindex="2">
																			<option value="">-- CSDM / Nama TL --</option> -->
							                                       <select class="chosen-select" name="qco" class="form-control">
							                                        <option value=" ">-- Pilih QCO --</option>
							                                               <?php
							                                        $pkat = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber TAM'");
							                                        $k=1;
							                                        while ($ckat = mysqli_fetch_row($pkat)) {
							                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
							                                        if ($kategori==$ckat[0]){$sel="selected";} else {$sel="";}
							                                        echo(" <option value=$ckat[0] $sel>$ckat[1] -- $ckat[0]</option>");
							                                        $k++;
							                                        }
							                                         ?>
							                                        </select>
																			
																		<!-- </select> -->
																	</div>
															  	</div>																  

																 <div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>Userid</strong></label>
																	<div class="col-lg-8">																
																		<input type="text" width="50px" class="form-control"  name="x_userid" id="x_userid" placeholder="" value="">	
																	</div>
																  </div>

																   <div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>Nama</strong></label>
																	<div class="col-lg-8">																
																		<input type="text" width="50px" class="form-control"  name="user" id="user" placeholder="" onchange="javascript:this.value=this.value.toUpperCase();"  value="">	
																	</div>
																  </div>															  
															
																  <div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>Gender</strong></label>
																	<div class="col-lg-8">																
																		<select class="chosen-select" name="gender" >
                                  
																		<option value="">-- Pilih Gender --</option>
																		
									                                    <option value="Wanita"<?php if($gender=="Wanita") {echo "selected";}?>> Perempuan </option>
									                                    <option value="Pria"<?php if($gender=="Pria") {echo "selected";}?>> Laki-Laki </option>
                                    
																		</select>	
																	</div>
																  </div>

																  <div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label"><strong>User Level</strong></label>
																	<div class="col-lg-8">
																		<select class="chosen-select" class="form-control" name="segment_cbo" id="segment_cbo" tabindex="2" >

													                                 	<option value="">-- Segment / Skill --</option>
													                                    <option value="TL TAM DCS"<?php if($segment_cbo=="TL TAM DCS") {echo "selected";}?>> TL TAM DCS</option>
													                                    <option value="Agent TAM"<?php if($segment_cbo=="Agent TAM") {echo "selected";}?>> Agent TAM </option>
													                                    <option value="Tabber TAM"<?php if($segment_cbo=="Tabber TAM") {echo "selected";}?>> Tabber TAM </option>
																						<option value="qa"<?php if($segment_cbo=="qa") {echo "selected";}?>> qa</option>
													                                    <option value="Supervisor QA TAM"<?php if($segment_cbo=="Supervisor QA TAM") {echo "selected";}?>> Supervisor QA TAM </option>
                                   
																		
																			
																		</select>
																	</div>
																  </div>

																  

												</div>
													   
													 		<div class="col-lg-10">
                                  <div class="col-lg-10" style="display:none">
                                    <p align="right">
                                    <button  width = "100" type="submit" id="Save" name="Save" class="btn   btm-block btn-success">Save</button>
                                    <!-- <button  width = "100" type="button" id="Close" name="Close" class="btn  btm-block btn-danger">Close</button>  --> 
                                    <a width = "100" href="list_user.php" class="btn  btm-block btn-danger" role="button">Closed</a>      
                                
                              </div>
                             </div>
					  								</div>
                             
                                                                          
                                
                                
                      </div>
                    <div>
				  
															  
															  
											
													  	&nbsp
													  </div>
													   <div align="center">
													   	<button  width = "100" type="submit" id="Save" name="Save" class="btn   btm-block btn-success">Save</button>
														<!-- <button  width = "100" type="button" id="Close" name="Close"  class="btn   btm-block btn-danger">Close</button> -->
														<a width = "100" href="list_user.php" class="btn  btm-block btn-danger" role="button">Closed</a>
													   </div>
													   	
										
									</div>
								</div>
							</section>
						</div>	
			
			 
			

				</section>
				</div>
		
 




			</form>	

      



		
		</section>			  
		<!--wrapper end -->	  
	  </section>		  
      <!--main content end-->
  </section>
  <!--container end-->
  
  
  
  
  
  
    <!-- js placed at the end of the document so the pages load faster -->
   <!-- js placed at the end of the document so the pages load faster -->
  <script src="../js/jquery.js"></script>
    <script src="../js/jquery-1.8.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
	
	
	<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../assets/bootstrap-daterangepicker/date.js"></script>
    <script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script>

	
	
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
    <!--script type="text/javascript" src="test.js"></script-->
    <script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>
    

<script>

  $(document).ready(function(){

	$('#reset').click(function(e){
		document.location.href = 'form_insert_vab.php';
	
	});
	  
});

  // $("#user_tl").change(function(){
		// 	event.preventDefault();
		// 	//alert(nilai);	
		// 	// $("#segment").val(nilai);
		// 	// $("#segment").trigger('chosen:updated');

			
		// 	baca_mlogin();



		// });

	

	  
	$(function(){
        //window.prettyPrint && prettyPrint();
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#tanggal1').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#tanggal2').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#tanggal3').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#tanggal4').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#time').datepicker({
            format: 'hh::mm:ss'
        });

   //      $("#segment").change(function(){
			// var nilai = this.value;
			// //alert(nilai);		
			// $("#nama_co").val(null);  
			// $("#nama_co").val(nilai);
			// $("#nama_co").trigger('chosen:updated');

			// $("#csdm_co").val(null);  
			// $("#csdm_co").val(nilai);
			// $("#csdm_co").trigger('chosen:updated');

			//window.alert(nilai);
			
		// });

       /* $("#csdm_co").change(function(){
			var nilai = this.value;
			//alert(nilai);
			// $("#segment").val(nilai);
			// $("#segment").trigger('chosen:updated');			
			$("#nama_co").val(null);  
			$("#nama_co").val(nilai);		
			$("#nama_co").trigger('chosen:updated');
			baca_mlogin();

			 				
		});

		
		$("#nama_co").change(function(){
			var nilai = this.value;
			//alert(nilai);	
			// $("#segment").val(nilai);
			// $("#segment").trigger('chosen:updated');

			$("#csdm_co").val(null);  
			$("#csdm_co").val(nilai);
			$("#csdm_co").trigger('chosen:updated');
			baca_mlogin();



		});*/		



		

        $('.chosen-select').chosen();
		
	});	





function baca_mlogin()
{
	
	var csdm=$('#csdm_co');

	//alert(csdm.val());
	//$('#user_tl').empty();

	//alert(userlevel.val());
	
	$('#userlevel').val("");
	$('#user_tl').val("");
	$('#user_spv').val("");
	$('#user_manager').val("");
	$('#los').val("");
	$('#tenur').val("");
	$('#gender').val("");
	$('#nama_ol').val("");
	
	if (csdm.val() != "")
	{			
		$.ajax({  
			 type: "GET",  
			 url: 'json_baca_mlogin.php',  
			 data: 'id='+csdm.val(),
			 dataType: "json",  
			 success: function(data){

				//alert(data);
				// if (data[0].user_tl == "")
				// { 	
				// 	alert("user_tl kosong");						
				// }
				// else{
				// 	alert("user tl ada");
				// } 
				userlevel.value = data[0].userlevel;
				user_tl.value = data[0].user_tl;
				user_spv.value = data[0].user_spv;
				user_manager.value = data[0].user_manager;
				los.value = data[0].los;
				tenur.value= data[0].tenur;
				gender.value= data[0].gender;
				nama_ol.value= data[0].nama_ol;				
				//$('#user_tl').append(data[0].user_tl);
				
			}

		});	
	}	
		
}
  </script>
   <!-- <script>
    $(document).ready(function(){
      setTimeout(function(){
        $('#sas').fadeOut(1000);

        },3000);
            });

  </script> -->


  

  </body>
</html>

