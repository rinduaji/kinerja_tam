 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">


   <?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
// include("koneksi2.php");
// include("koneksi.php");
include("koneksi.php");
//require_once('koneksi.php');
include('sidebar.php'); 
		 //require_once('koneksi.php');
		 date_default_timezone_set('Asia/Jakarta');
		 $tgl=date('Y-m-d');
		 $lup=date('Y-m-d h:i:s');
    if ($_SESSION['jabatan']=="Tabber Fbcc" || $_SESSION['jabatan']=="Duktek"): 
    	$id_kat="";
		$val_itm="";
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
      <style type="text/css">
      	#tgl_ol_text_set{
      		    margin-left: -34;
    border-left-width: -34;
    padding-left: 12px;
    width: 37px;
    padding-top: 6px;
    margin-top: -;
    padding-right: 12px;
    margin-top: -30;
    margin-right: 0px;
    bottom: -32;
    top: -32;
    margin-top: -34;
    margin-bottom: 0px;
    margin-left: 34px;
    padding-bottom: 7px;
background: blue;
      	}

      </style>      
	
	  <!--sidebar end-->	
      <!--main content start-->
      <section id="main-content">
	  
		<!-- wrapper start -->
        <section class="wrapper">
						
			<!-- <form name="form1" id="form1" method="post" action="simpan.php" > -->
			<form id="form" name="demoform" method="post" action="form_ideas.php">
<?php



if (isset($_POST['Save']) ){

if ($tgl_nilai_text=="")
	{	
	?>
	<script type="text/javascript">
    alert("Mohon periksa kembali! Data yg anda masukkan ada yg belum lengkap");
    //history.back();
	</script>
	<?php
	}
else
	{


 $nilai='-|'.$na11.'|-'.'|'.$na21.'|'.$na22.'|'.$na23.'|-'.'|'.$na31.'|'.$na32.'|-'.'|'.$na41.'|'.$na42.'|-'.'|'.$na51.'|-'.'|'.$na61.'|-'.'|'.$na71.'|'.$na72.'|'.$na73.'|';
	
		//$nilai=$value;
// $item='1;-|1;1|2;-|2;1|2;2|2;3|3;-|3;1|3;2|4;-|4;1|4;2|5;-|5;1|6;-|6;1|7;-|7;1|7;2|7;3|';
		$item=$items;


$nilaipl=$na11+$na21+$na22+$na23+$na31+$na32+$na41+$na42+$na51+$na61;
$nilaisl=$na71+$na72+$na73;

$qq=mysqli_query($conn, " select nama_tl FROM cc147_main_users WHERE username='$pilih_cbo'");
$qqq=mysqli_fetch_row($qq);
$qqqq=$qqq[0];

		$sql="INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`recordid`,`ani`,`reason_monitoring`,`durasi`,`param_tapping_proses`,`param_tapping_sikap`,`ofi`,`lup`,`status`,`human`,`system_prosedur`,`tools`,`lup_qa`,`area`,`proses_layanan`,`sikap_layanan`,`periode`,`lup_tl_name`) 
		VALUES ('$tgl_nilai_text','$pilih_cbo','$nilai','$item','$tgl_ol_text','$record_id','$msisdn','$rs_monitoring','$jam','$param_tapping_proses','$param_tapping_sikap','$ofi','$lup','1','$human','$system_prosedur','$tools','$qco','$area_cbo','$nilaipl','$nilaisl','$periode','$qqqq')";
		//echo "$sql";
		//$query=mysqli_query($conn, $sql);
	 //Refresh by HTTP META

	if ($query=mysqli_query($conn, $sql)) {
    	mysqli_query($conn, $sql);

		 // echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-warning-sign'></span>  Data  Bisa masuk !!</div>");
    	echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah Disimpan Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button></div>");
		$area_cbo="";
		$pilih_cbo="";

			} else {
	   
		 echo("<div id='' class='alert alert-danger alert-dismissible' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Tidak Bisa masuk Mohon periksa kembali !!! User telah di input 1 kali pada hari ini!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button></div>");
		//die();
		

			}
	
	
			}
			}
?>
			
				<div class="row">

		  			<section class="panel">

		  			 <div class="panel-body">

		  			  <div class="box">
						<div class="overlay" id="overlay">
						  <p align="center">
						  	<span style="font-size: 6em;">Mohon ditunggu </span><br/>
                          	<i class="fa fa-refresh fa-spin fa-40x"></i>
                     	  </p>
                        </div>

                        <div class="adv-table">

						<div class="col-lg-12">							
							<section class="panel">
								<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
									<h3><i>Data IDEAS Monitoring</i></h3>						
								</div>

								<div class="panel-body">
									
									<p align="right">										
									</p>								
									
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
																		Nama</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">Tanggal
																		</font>
																	</th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">Action
																		</font>
																	</th>




																</tr>

															</thead>
															<tbody>
																<?php 
     															include 'koneksi2.php';
	

																$qq=date('m');
																$q=date('Y-m');


																$date1 = str_replace('-', '/', $date);
																$yesterday = date('Y-m-d',strtotime($date1 . "-1 days"));
																$range_tanggal1 = $yesterday." 00:00:00";
																$range_tanggal2 = $yesterday." 23:59:59";

																$no=1;

																while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
$sql=mysqli_query($conn,"SELECT UPD_AGENT, TGL_CALL, COUNT(*) as jumlah FROM TRANS   
WHERE STATUS_CALL='CONTACTED' AND REASON_CALL ='SETUJU' AND LUP between '$range_tanggal1' and '$range_tanggal2' 
GROUP BY UPD_AGENT ORDER BY jumlah ASC");

 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																	while($row=mysqli_fetch_row($sql)){
																		$month = date(m,strtotime($row[1]));
																		if ($qq==$month) {
	# code...
																			?>

																			<tr class="odd gradeX">

																				<td style="padding-top: 2px; padding-bottom: 2px">
																					<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>					
																					<td style="padding-top: 2px; padding-bottom: 2px">
																						<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0]; ?>
																					</font>
																				</td>
																				<td style="padding-top: 2px; padding-bottom: 2px">
																					<font face="Tahoma" style="font-size: 9pt"><?php echo date($row[1]);  ?>
																				</font>
																			</td>
																			<td style="padding-top: 2px; padding-bottom: 2px">
																				<a href="form_ideas_wo.php?agent=<?php echo $row[0];?>" class="btn btn-primary btn-sm">Detail</a>
																			</td>


																		</tr>

																		<?php  

																		$no++;
																	}

																}





																$qq++;
																$q--;
															}

															?>
														</tbody>
													</table>
												</div>
							</section>
						</div>



						


						

                        


						<!-- save end -->	

					   </div><!--<div class="adv-table"> -->
					  </div><!-- <div class="box"> -->

					 </div><!-- <div class="panel-body"> -->


					</section> <!-- <section class="panel"> -->			

				</div> <!-- <div class="row"> -->
			
			
				<input type="hidden"  name="items" class="form-control"  value="<?= $id_all; ?>">	
				<input type="hidden"  name="value" class="form-control"  value="<?= $value; ?>">				

			</form>


			<!-- show Modal buat msgbox .. cakep -->
			  <div class="modal fade" id="modal_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							  <!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button-->
							  <h4 class="modal-title">Tambah Reason Monitoring
							  <div id="msgbox_caption">
								<!--caption-->
							  </div>
							  </h4>
						  </div>
						  <div class="modal-body">
							<div class="form-group">
								<label for="ticket_id" class="col-lg-3 control-label"><strong>Nama Reason Monitoring</label>
								<div class="col-lg-9">
									<input type="text" width="50px" class="form-control"  name="nama_reason" id="nama_reason" maxlength="100" placeholder="" >
								</div>
							</div>
						  </div>
						  <div class="modal-footer">
								<button  width = "100" type="submit" id="btn_tambah_reason_save" name="Save" class="btn  btm-block btn-success">Save</button>
								<button id="btn_tambah_reason_close" data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
						  </div>
					  </div>
				  </div>
			  </div>
			<!-- modal -->	


			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="display:none;" id="close_modal">x</button>
							<h4 class="modal-title">Simpan Data</h4>
						</div>
						<div class="modal-body">

							<form role="form">
								<div class="form-group">
									<span style="font-size: 16px;" id="div_kata_err">
										
									</span>
								</div>																						
								<div class="form-group">
									
									<div class="col-lg-12" >
										<section  class="panel tab-bg-dark-navy-blue">
										  <div class="panel-body">
										  <p align="center">
											<button type="submit" class="btn btn-danger" id="modal_close_gagal">Close</button>
											<button type="submit" class="btn btn-danger" id="modal_close_berhasil" style="display:none;">Close</button>
										  </p>
										</div>	
										</section>
									</div>
								
									
								</div>														
							</form>
						</div>
					</div>
				</div>
			</div>

		
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
    <script type="text/javascript" src="../js/gritter.js"></script>
    <!--script type="text/javascript" src="test.js"></script-->
    <script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>

  </body>
</html>


<script type="text/javascript">

	$(function(){


		set_combo_jam();
		set_combo_durasi();
		set_combo_aht();
		set_combo_durasi_wording();

		$("#overlay").hide();
		$(".adv-table").show();
	
		$('#tgl_ol_text').datetimepicker({
		  format: 'yyyy-MM-dd hh:mm:ss',
		  language: 'pt-BR'
		}).on('changeDate', function(e){

			$("#tgl_ol_text").find("input").val();
			  var date = $("#tgl_ol_text").data("datetimepicker").getDate(),formatted = date.getDate() ;
			 $("#periode").val("");
			 if (formatted != "")
			 {
				$.ajax({  
					type: "POST",  
					url: 'json_baca_periode.php',  
					data: 'tanggal='+formatted,
					dataType: "json",  
					success: function(data){
						//alert(formatted);
						 if (data[0].status == '1')
						 {
						 	$("#periode").val(data[0].periode);
						 }
					}
				});
			}
		});
		
		$('#tgl_ol_text_reset').click(
			function(){					
				$('#tgl_ol_textx').val("");
				$("#periode").val("");
			}
		);
		
		$('#tgl_ol_text_set').click(
			function(){					
				//alert("test");
				$('#tgl_ol_text').focus();
			}
		);

		$('#tgl_ol_text').blur(function(event){
			event.preventDefault();
			$(this).datepicker('hide');
		});
		
		$('#tgl_nilai_text').datepicker({
		  format: 'yyyy-mm-dd'
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
		});
		
		$('#tgl_nilai_text_reset').click(
			function(){					
				$('#tgl_nilai_text').val("");
			}
		);
		
		$('#tgl_nilai_text_set').click(
			function(){					
				//alert("test");
				$('#tgl_nilai_text').focus();
			}
		);
		
		$('#tgl_nilai_text').blur(function(event){
			event.preventDefault();
			$(this).datepicker('hide');
		});
		
		$('#jam').focusin(function (event){
			event.preventDefault();
			if ($("#jam").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});
		$('#durasi').focusin(function (event){
			event.preventDefault();
			if ($("#durasi").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});

		$('#aht').focusin(function (event){
			event.preventDefault();
			if ($("#aht").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});
		
		$('#cbo_jam').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});
		
		$('#cbo_menit').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});
		
		$('#cbo_detik').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});


		$('#cbo_jam2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});
		$('#cbo_menit2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();			
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});
		
		$('#cbo_detik2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();
			var j = "00:"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});

		$('#cbo_jam3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});
		$('#cbo_menit3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();			
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});
		
		$('#cbo_detik3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});

		$('#cbo_jam4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		$('#cbo_menit4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();			
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		
		$('#cbo_detik4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		
			
		
		
		


			$("#area_cbo").change(function(event){
			event.preventDefault();
			
			var area = $("#area_cbo").val();
			// var layanan = $("#layanan_cbo").val();
			// var segment = $("#segment_cbo").val();
			var url = "json_cari_user_cbo.php";
			var data = "area="+area;
			// bersihkan_inputan_agent();
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#pilih_cbo").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(area);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+value+" -- "+name+"</option>";
						$('#pilih_cbo').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#pilih_cbo").trigger("chosen:updated");
				$("#pilih_cbo").trigger("liszt:updated");
	 
			});			
		});

		



		$("#pilih_cbo").change(function(event){
			event.preventDefault();
			
			val = $("#pilih_cbo").val();
			
			bersihkan_inputan_agent();
			
			if (val !== "")
			{
				$.ajax({  
					type: "GET",  
					url: 'json_baca_mlogin.php',  
					data: 'id='+val,
					dataType: "json",  
					success: function(data){
						//alert(data);
						csdm_co.value = val;
						nama_co.value = data[0].username;
						userlevel.value = data[0].userlevel;
						layanan.value = data[0].layanan;
						ket.value = data[0].ket;
						user_tl.value = data[0].user_tl;
						
						los.value = data[0].los;
						
						gender.value= data[0].gender;
						
						
					}

				});
			}
		});	
		


		$('#modal_close_gagal').click(function(event){
			event.preventDefault();
			$("#overlay").hide();
			$(".adv-table").show();
			$("#close_modal").trigger("click");		
		});
		
		$('#modal_close_berhasil').click(function(event){
			event.preventDefault();
			window.location = "form_insert_laporan_tabbing.php?wapo_key=n2CesKkdK7ErtKvD%252FUWnBUGtIGpQaFO5stOQyyjY4Is%253D";
		});
				

		$("#").click(function(event){ 
			event.preventDefault();		
			
			$("#overlay").show();
			$(".adv-table").hide();

			$("#div_kata_err").html('<div class="overlay" id="overlay"><p align="center"><span style="font-size: 3em;">Mohon ditunggu </span><br/><i class="fa fa-refresh fa-spin fa-5x"></i></p></div>');	

			$.post("form_insert_taphist_simpan_ajax.php", $("#form1").serialize(), function(data) {
				//alert(data);
				var arr = {};
				var arr = $.parseJSON(data);
				var err = arr.err;
				var kata_err = "";						

				if (err > 0)
				{
					var obj = arr.kata_err;
					var len = obj.length;
					kata_err = kata_err + "<strong> Mohon dicek data anda yang anda input yaitu : </strong> <br/> "
					for (var i = 0; i < len; i++) 
					{
						var r = obj[i];
						kata_err = kata_err + r + " <br/>";
					}
					$("#modal_close_gagal").show();
					$("#modal_close_berhasil").hide();
					$('#mulai1').trigger("click");
				}
				else
				{
					kata_err = arr.kata_err;
					$("#modal_close_gagal").hide();
					$("#modal_close_berhasil").show();
				}
				$("#div_kata_err").html(kata_err);	
			});					
			$("#link_simpan").trigger("click");
			
		});
		
		$('#reset').click(function(event){
			event.preventDefault();
			document.location.href = 'form_insert_laporan_tabbing.php';
		
		});
		
		$("#btn_tambah_reason_bersih").click(function(event){
			event.preventDefault();
			
			$("#nama_reason").val("");
			$("#btn_tambah_reason").trigger( "click" );
		});
		
		$("#").click(function(event){
			event.preventDefault();
			
			var nama_reason = $('#nama_reason').val();
			var url = "json_simpan_reason.php";
			var data = "nama_reason="+nama_reason;				
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					// $("#rs_monitoring").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;
					var kata_err = item.kata_a;
					var err = item.err_a;
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						// $('#rs_monitoring').append(html);
					}
										
					if (err == "0")
					{
						// $("#btn_tambah_reason_close").trigger("click");
					}
					alert(kata_err);	
				}
	 
				// $("#rs_monitoring").trigger("chosen:updated");				
			});	
		});
		
	});	
	
	function bersihkan_inputan_agent()
	{
		$('#csdm_co').val("");
		$('#nama_co').val("");
		$('#userlevel').val("");
		$('#layanan').val("");
		$('#ket').val("");
		$('#user_tl').val("");
		$('#user_spv').val("");
		$('#user_manager').val("");
		$('#los').val("");
		$('#tenur').val("");
		$('#gender').val("");
		$('#nama_ol').val("");
		//alert($('#layanan').val()+$('#ket').val());
	}
	
	function bersihkan_inputan_qco()
	{
		$('#qco').val("");
		$('#nama_qco').val("");	
		$('#jabatan_qc').val("");
		$('#area_qc').val("");	
	}
	
	function set_combo_jam()
	{
		$('#cbo_jam').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_menit').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		
		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam").html(list_cbo_jam);
		$("#cbo_jam").trigger("chosen:updated");
		$("#cbo_jam").trigger("liszt:updated");
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit").html(list_cbo_59);
		$("#cbo_detik").html(list_cbo_59);
		
		$("#cbo_menit").trigger("chosen:updated");
		$("#cbo_menit").trigger("liszt:updated");
		
		$("#cbo_detik").trigger("chosen:updated");
		$("#cbo_detik").trigger("liszt:updated");
	}

	function set_combo_durasi()
	{
		$('#cbo_jam2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_menit2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam2").html(list_cbo_jam);
		$("#cbo_jam2").trigger("chosen:updated");
		$("#cbo_jam2").trigger("liszt:updated");
		
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit2").html(list_cbo_59);
		$("#cbo_detik2").html(list_cbo_59);
		
		$("#cbo_menit2").trigger("chosen:updated");
		$("#cbo_menit2").trigger("liszt:updated");
		
		$("#cbo_detik2").trigger("chosen:updated");
		$("#cbo_detik2").trigger("liszt:updated");
	}


	function set_combo_aht()
	{
		$('#cbo_jam3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});	
		$('#cbo_menit3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam3").html(list_cbo_jam);
		$("#cbo_jam3").trigger("chosen:updated");
		$("#cbo_jam3").trigger("liszt:updated");
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit3").html(list_cbo_59);
		$("#cbo_detik3").html(list_cbo_59);
		
		$("#cbo_menit3").trigger("chosen:updated");
		$("#cbo_menit3").trigger("liszt:updated");
		
		$("#cbo_detik3").trigger("chosen:updated");
		$("#cbo_detik3").trigger("liszt:updated");
	}

	function set_combo_durasi_wording()
	{
		$('#cbo_jam4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});	
		$('#cbo_menit4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam4").html(list_cbo_jam);
		$("#cbo_jam4").trigger("chosen:updated");
		$("#cbo_jam4").trigger("liszt:updated");
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit4").html(list_cbo_59);
		$("#cbo_detik4").html(list_cbo_59);
		
		$("#cbo_menit4").trigger("chosen:updated");
		$("#cbo_menit4").trigger("liszt:updated");
		
		$("#cbo_detik4").trigger("chosen:updated");
		$("#cbo_detik4").trigger("liszt:updated");
	}
	
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

		//$("#segment").change(function(){
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
	
    
</script>
<script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script> 

<script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.pt-BR.js"></script>
 <?php endif ?> 