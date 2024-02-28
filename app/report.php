
 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TASYA TELKOM Ver 1.0">
    <meta name="author" content="wapo">
    <meta name="keyword" content="TASYA TELKOM Ver 1.0">
    <link rel="shortcut icon" href="../img/company_logo.png">

	
    <title> TELKOM Ver 1.0</title>

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
	<!--
    <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">-->


	
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />

	<!--
    <link href="../assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
	-->

		

	<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.2.custom.css" /> 

	<!-- <link href="../assets/css/boxku.css" rel="stylesheet"> -->
    
    <link href="../assets/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
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
				<a href="index.php"  class="logo hidden-xs"><img src="../img/company_logo.png" height="40px" width="auto"><font color="#CC0000" size="2">Malang</font></a>
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
						
							
						
						
                            <img alt="" src="../img/company_logo.png" width="30px" height="30px">
							

							
                            <span class="username">MOCH FAJAR SAHURI [ Supervisor ]</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="form_profile.php" onclick=""><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="idx_login_log.php?Search=1" onclick=""><i class="icon-cog"></i> Log</a></li>
                            <li><a href="form_password.php#" onclick=""><i class="icon-key"></i> Password</a></li>
                            <li><a href="login.php"><i class="icon-signout"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
	
      <!--header end-->
	  <!--sidebar start-->

   <?php require_once('sidebar.php'); ?>         
	
	  <!--sidebar end-->	
      <!--main content start-->
      <section id="main-content">
	  
	  <div class="content">
			<div class="container-fluid">
				<div class="row">
			<div class="col-md-12">
				<div class="card card-plain">		
					<form id='input' name="demoform" action='form_rekap_agent.php' method='post' accept-charset='UTF-8'>
						<div>
						<div align="center" class="panel-heading">
                            <b>REKAP CALL AGENT</b>
                        </div>
						<div class="row row-centered">
						<div align="center" class="col-md-4">
						</div>
						<div align="center" class="col-md-4">
						<table class="table table-hover table-striped">
						<tr>
							<div class="form-group">
								<label>Tanggal</label>
								<input class="form-control"
										   type="text"
										   name="date"
										   id="datepicker"
										   placeholder="ex: 2018-12-31"
										   required
									/>
							</div>
						</tr>
						<tr>	
							<div class="form-group">
								<label>Login Agent</label>
								<input class="form-control" type="text"/>
										   
									
							</div>					
						</tr>
						<tr>
							<input name="search" type="submit" class="btn btn-info" Value="Search">
						</tr>
						</table>
						</div>
						</div>
						<div class="row">
						<div class="col-md-12">
							<div class="card ">
								<div class="header">
									<h4 class="title">Hasil Rekap Call Agent</h4>
								</div>
								
								<div style="overflow-x:auto;">
									
									<table id="data-table" width="150px" class="table table-hover table-striped">
										<thead>
											<th align="center"><font color="red" face="Tahoma" size="2">NO</th>
												<th align="center"><font color="red" face="Tahoma" size="2">Tanggal</th>
											<th align="center"><font color="red" face="Tahoma" size="2">Login</th>
											<th align="center"><font color="red" face="Tahoma" size="2">Nama Agent</th>
											<th align="center"><font color="red" face="Tahoma" size="2">Upd</th>
												<th align="center"><font color="red" face="Tahoma" size="2">Status</th>
													
											
											
										</thead>
										<tbody>
																				</tbody>
									</table>
									
								</div>
								
							</div>
						</div>
						</div>
					</form>	
				</div>
			</div>
			</div>
		</div>
</html
		<!-- wrapper start -->
        		  
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
</html><script type="text/javascript">

	$(function(){
		set_combo_jam();
		set_combo_durasi();
		set_combo_aht();
		set_combo_durasi_wording();

		$("#overlay").hide();
		$(".adv-table").show();
	
		$('#tgl_ol_text').datepicker({
		  format: 'yyyy-mm-dd'
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
			$("#periode").val("");
			if ($(this).val() != "")
			{
				$.ajax({  
					type: "POST",  
					url: 'json_baca_periode.php',  
					data: 'tanggal='+$(this).val(),
					dataType: "json",  
					success: function(data){
						//alert(data);
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
				$('#tgl_ol_text').val("");
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
		
		/*
		$('#jam').timepicker({
			autoclose: true,			
			minuteStep: 1,
			secondStep: 1,
			showSeconds: true,
			showMeridian: false
		})
		.on('show.timepicker', function(e) {
			//bla bla
		})
		.on('hide.timepicker', function(e) {
			//bla bla
		})
		.on('changeTime.timepicker', function(e) {
			//bla bla
		});
		
		$('#jam').focusin(function (event){
			event.preventDefault();
			//$('#jam').timepicker('showWidget');
			//$('#jam_div').focus();			
			$('#jam_set').click();
			//var time = $('#jam').timepicker('showWidget');
			//return time;
			//$(".bootstrap-timepicker dropdown-menu open").show();
			//$('.bootstrap-timepicker-widget.dropdown-menu').css("display", "inline-block");			
		});	
		
		$('#jam_set').click(function (event){
			event.preventDefault();
			if ($("#jam").val() == "" )
			{
				var currentdate = new Date();
				var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				$('#jam').val(currenttime);
			}
		});
		
		$('#jam_reset').click(function (event){
			event.preventDefault();
			$('#jam').val("");
		});
		*/
		
		/*
		$("#tanggal3").blur(function(event){
			event.preventDefault();
			$("#periode").val("");
			if ($("#tanggal3").val() != "")
			{
				$.ajax({  
					type: "POST",  
					url: 'json_baca_periode.php',  
					data: 'tanggal='+$("#tanggal3").val(),
					dataType: "json",  
					success: function(data){
						//alert(data);
						if (data[0].status == '1')
						{
							$("#periode").val(data[0].periode);
						}
					}
				});
			}
		});
		*/
		$('#qco_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		$('#segment_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#pilih_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		$('#jenis1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#case1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#detail1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		$('#jenis2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#case2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#detail2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		$('#jenis3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#case3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#detail3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		$('#jenis4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#case4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		$('#detail4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});			
		
		$("#layanan_cbo").change(function(event){
			event.preventDefault();
			
			var layanan = $("#layanan_cbo").val();			
			
			$("#area_cbo").val(""); 
			$("#area_cbo").trigger("chosen:updated");
			$("#area_cbo").change();
			//bersihkan_inputan_agent();
		});
		
		$("#area_cbo").change(function(event){
			event.preventDefault();
			
			var area = $("#area_cbo").val();
			var layanan = $("#layanan_cbo").val();
			var url = "json_cari_segment_cbo.php";
			var data = "area="+area+"&layanan="+layanan;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 
					$("#segment_cbo").empty(); 
					$("#pilih_cbo").empty(); 
					bersihkan_inputan_agent();
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#segment_cbo').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#segment_cbo").trigger("chosen:updated");
				$("#segment_cbo").trigger("liszt:updated");
				
				var html = "<option value=''>-- CSDM / Nama Agent --</option>";
				$('#pilih_cbo').append(html);
				
				$("#pilih_cbo").trigger("chosen:updated");
				$("#pilih_cbo").trigger("liszt:updated");
	 
	 
			});	
			
			var url = "json_cari_qco.php";
			var data = "area="+area+"&layanan="+layanan;

			$.ajax({  
				type: "POST",  
				url: url,  
				data: data,
				dataType: "json",
				beforeSend: function(){ 
					$("#qco_cbo").empty(); 
					//bersihkan_inputan_qco();
				}

			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#qco_cbo').append(html);
					}										
				}
				
				$("#qco_cbo").trigger("chosen:updated");
				$("#qco_cbo").trigger("liszt:updated");
	 
	 
			});
		});

		
		$("#segment_cbo").change(function(event){
			event.preventDefault();
			
			var area = $("#area_cbo").val();
			var layanan = $("#layanan_cbo").val();
			var segment = $("#segment_cbo").val();
			var url = "json_cari_user_cbo.php";
			var data = "area="+area+"&segment="+segment+"&layanan="+layanan;
			bersihkan_inputan_agent();
			
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
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
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
						
						csdm_co.value = val;
						nama_co.value = data[0].username;
						userlevel.value = data[0].userlevel;
						layanan.value = data[0].layanan;
						ket.value = data[0].ket;
						user_tl.value = data[0].user_tl;
						user_spv.value = data[0].user_spv;
						user_manager.value = data[0].user_manager;
						los.value = data[0].los;
						tenur.value= data[0].tenur;
						gender.value= data[0].gender;
						nama_ol.value= data[0].nama_online;	
						
					}

				});
			}
		});	
		
		$("#qco_cbo").change(function(event){
			event.preventDefault();
			
			val = $("#qco_cbo").val();
			
			bersihkan_inputan_qco();
			
			if (val !== "")
			{
				$.ajax({  
					type: "GET",  
					url: 'json_baca_mlogin.php',  
					data: 'id='+val,
					dataType: "json",  
					success: function(data){
						
						qco.value = data[0].userid;
						nama_qco.value = data[0].username;
						jabatan_qc.value=data[0].userlevel;
						area_qc.value=data[0].ket;
					}
				});
			}
		});

		$("#jenis1").change(function(event){
			event.preventDefault();
			
			var val = $("#jenis1").val();
			var url = "json_cari_case.php";
			var data = "jenis_masalah="+val;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 
					$("#case1").empty(); 
					$("#detail1").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#case1').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#case1").trigger("chosen:updated");
				$("#case1").trigger("liszt:updated");
				
				var html = "<option value=''>-- Pilih Salah Satu --</option>";
				$('#detail1').append(html);
				
				$("#detail1").trigger("chosen:updated");
				$("#detail1").trigger("liszt:updated");
	 
	 
			});			
		});
		
		$("#case1").change(function(event){
			event.preventDefault();
			
			var jenis = $("#jenis1").val();
			var casee = $("#case1").val();
			var url = "json_cari_detail.php";
			var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#detail1").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#detail1').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#detail1").trigger("chosen:updated");
				$("#detail1").trigger("liszt:updated");	
			});			
		});
		
		$("#jenis2").change(function(event){
			event.preventDefault();
			
			var val = $("#jenis2").val();
			var url = "json_cari_case.php";
			var data = "jenis_masalah="+val;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 
					$("#case2").empty(); 
					$("#detail2").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#case2').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#case2").trigger("chosen:updated");
				$("#case2").trigger("liszt:updated");
				
				var html = "<option value=''>-- Pilih Salah Satu --</option>";
				$('#detail2').append(html);
				
				$("#detail2").trigger("chosen:updated");
				$("#detail2").trigger("liszt:updated");
	 
	 
			});			
		});
		
		$("#case2").change(function(event){
			event.preventDefault();
			
			var jenis = $("#jenis2").val();
			var casee = $("#case2").val();
			var url = "json_cari_detail.php";
			var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#detail2").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#detail2').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#detail2").trigger("chosen:updated");
				$("#detail2").trigger("liszt:updated");	
			});			
		});
		
		$("#jenis3").change(function(event){
			event.preventDefault();
			
			var val = $("#jenis3").val();
			var url = "json_cari_case.php";
			var data = "jenis_masalah="+val;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 
					$("#case3").empty(); 
					$("#detail3").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#case3').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#case3").trigger("chosen:updated");
				$("#case3").trigger("liszt:updated");
				
				var html = "<option value=''>-- Pilih Salah Satu --</option>";
				$('#detail3').append(html);
				
				$("#detail3").trigger("chosen:updated");
				$("#detail3").trigger("liszt:updated");
	 
	 
			});			
		});
		
		$("#case3").change(function(event){
			event.preventDefault();
			
			var jenis = $("#jenis3").val();
			var casee = $("#case3").val();
			var url = "json_cari_detail.php";
			var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#detail3").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#detail3').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#detail3").trigger("chosen:updated");
				$("#detail3").trigger("liszt:updated");	
			});			
		});
		
		$("#jenis4").change(function(event){
			event.preventDefault();
			
			var val = $("#jenis4").val();
			var url = "json_cari_case.php";
			var data = "jenis_masalah="+val;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 
					$("#case4").empty(); 
					$("#detail4").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#case4').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#case4").trigger("chosen:updated");
				$("#case4").trigger("liszt:updated");
				
				var html = "<option value=''>-- Pilih Salah Satu --</option>";
				$('#detail4').append(html);
				
				$("#detail4").trigger("chosen:updated");
				$("#detail4").trigger("liszt:updated");
	 
	 
			});			
		});
		
		$("#case4").change(function(event){
			event.preventDefault();
			
			var jenis = $("#jenis4").val();
			var casee = $("#case4").val();
			var url = "json_cari_detail.php";
			var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#detail4").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(len);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+name+"</option>";
						$('#detail4').append(html);
					}					
					/*
					response( $.map( data, function( item ) {
						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
					}));
					*/
				}
	 
				$("#detail4").trigger("chosen:updated");
				$("#detail4").trigger("liszt:updated");	
			});			
		});

		// $("#lc_cust").change(function(event){
		// 	var isi = $("#lc_cust").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_agnt").hide();
		// 		$("#div_lc_syst").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_agnt").show();
		// 		$("#div_lc_syst").show();
		// 	}

		// });

		// $("#lc_agnt").change(function(event){
		// 	var isi = $("#lc_agnt").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_cust").hide();
		// 		$("#div_lc_syst").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_cust").show();
		// 		$("#div_lc_syst").show();
		// 	}

		// });

		// $("#lc_syst").change(function(event){
		// 	var isi = $("#lc_syst").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_agnt").hide();
		// 		$("#div_lc_cust").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_agnt").show();
		// 		$("#div_lc_cust").show();
		// 	}

		// });

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
				

		$("#Save").click(function(event){ 
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
		
		$("#btn_tambah_reason_save").click(function(event){
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
					$("#rs_monitoring").empty(); 
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
						$('#rs_monitoring').append(html);
					}
										
					if (err == "0")
					{
						$("#btn_tambah_reason_close").trigger("click");
					}
					alert(kata_err);	
				}
	 
				$("#rs_monitoring").trigger("chosen:updated");				
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
	
    // $("#user_tl").change(function(){
		// 	event.preventDefault();
		// 	//alert(nilai);	
		// 	// $("#segment").val(nilai);
		// 	// $("#segment").trigger('chosen:updated');
			
		// 	baca_mlogin();
    // });

// function baca_mlogin()
// {
	
// 	var csdm=$('#csdm_co');

// 	//alert(csdm.val());
// 	//$('#user_tl').empty();

// 	//alert(userlevel.val());
	
// 	$('#userlevel').val("");
// 	$('#user_tl').val("");
// 	$('#user_spv').val("");
// 	$('#user_manager').val("");
// 	$('#los').val("");
// 	$('#tenur').val("");
// 	$('#gender').val("");
// 	$('#nama_ol').val("");
	
// 	if (csdm.val() != "")
// 	{			
// 		$.ajax({  
// 			 type: "GET",  
// 			 url: 'json_baca_mlogin.php',  
// 			 data: 'id='+csdm.val(),
// 			 dataType: "json",  
// 			 success: function(data){

// 				//alert(data);
// 				// if (data[0].user_tl == "")
// 				// { 	
// 				// 	alert("user_tl kosong");						
// 				// }
// 				// else{
// 				// 	alert("user tl ada");
// 				// } 
// 				userlevel.value = data[0].userlevel;
// 				user_tl.value = data[0].user_tl;
// 				user_spv.value = data[0].user_spv;
// 				user_manager.value = data[0].user_manager;
// 				los.value = data[0].los;
// 				tenur.value= data[0].tenur;
// 				gender.value= data[0].gender;
// 				nama_online.value= data[0].nama_online;				
// 				//$('#user_tl').append(data[0].user_tl);
				
// 			}

// 		});	
// 	}	
		
// }	
	
</script>