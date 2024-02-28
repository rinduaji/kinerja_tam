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
						
			<form name="form1" method="post" action="form_password.php" >
			
				<input type="hidden" id="form_req" name="form_req" class="form-control" value="">				
				<input type="hidden" id="vactive_level" class="form-control" value="Supervisor">				
				<input type="hidden" id="active_user_id" name="active_user_id"class="form-control" value="<?php echo $_SESSION["username"]; ?>">	
				
				<input type="hidden" id="sub_menu" name="sub_menu" class="form-control" size="20" value="">
				<input type="hidden" id="sts" name="sts" size="20" class="form-control" value="">
				<input type="hidden" id="from_dash" name="from_dash" class="form-control" size="20" value="">


				
				<a id="msgbox_link" data-toggle="modal" href="#modal_help"></a>	
			
			<!--
			<div class="row">			
		  <div class="col-lg-12">

				<section class="panel">
				  
					  <div class="revenue-head ">
						  <span>
						 <i class="icon-ticket"></i>
						  </span>
						  <h3> News [  ]</h3>
						  <span class="rev-combo pull-right">
							<a data-toggle="modal" href="#" onclick="javascript: help_form();">
							 <i class="icon-question-sign"></i>
							</a>	
						  </span>
					  </div>
			</div>		  
					

			<div class="rowx">	-->		
			<p style="padding-top:100px"></p>
			<div class="col-lg-3">
			</div>
			<div class="col-lg-6">
			  <section class="panel">
					
				  <header class="panel-heading label-success">
					  <i class="icon-paper-clip"></i><div class="label"> Change Password</div>
				  </header>
				  <div class="panel-body" >
				   <p align="centerxx">
					  

					  <div class="form-group">
						  <label for="old_password" class="col-lg-4 control-label">Old Password</label>
						  <div class="col-lg-8">
						  <div class="popovers"
											data-original-title="News Header" 
											data-content="Masukkan password lama" 
											data-placement="top" data-trigger="hover"
										  >
							  <input type="password" class="form-control" id="old_password" name="old_password" value="" placeholder="" autofocus>
								</div>
								<p></p>
						  </div>
					  </div>
					  
					  <div class="form-group">
								<label for="new_password" class="col-lg-4 control-label">New Password</label>
						  
								  <div class="col-lg-8">

									  <input type="password" class="form-control" id="new_password" name="new_password" value="" placeholder="" >
										<p></p>
								  </div>

								<label for="retype" class="col-lg-4 control-label">Retype New Password</label>
						  
								  <div class="col-lg-8">

									  <input type="password" class="form-control" id="retype" name="retype" value="" placeholder="" >
										<p></p>
								  </div>								  
								   <label for="call_id" class="col-lg-4 control-label"></label>
								  <div class="col-lg-8">
									<p align="right">
									<button  width = "100" type="button" id="Save" name="Save" class="btn   btm-block btn-success">Save</button>
									<button  width = "100" type="button" id="Close" name="Close" class="btn   btm-block btn-danger">Close</button>
								  </p>
								  </div>
								  
						  
					  </div>
					  			  
					  

					  </p>
				  </div>
				  
			  </section>								  
			</div>			
			

					
			



			
				</div>
				</section>
				</div>

<!-- save -->				
	<div class="col-lg-12" >
	
	</div>
	<!-- save end -->	
			

							<!-- show Modal buat msgbox .. cakep -->
                              <div class="modal fade" id="modal_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h2 class="modal-title">
											  <div id="msgbox_caption">
												<!--caption-->
											  </div>
											  </h2>
                                          </div>
                                          <div class="modal-body">
											<h3>
											<div id="msgbox_body">
												message
											</div>			
											</h3>
                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-success" type="button"
											  >Close</button>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->				  




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
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- <script src="../js/jquery.scrollTo.min.js"></script> -->
    <!-- <script src="../js/jquery.nicescroll.js" type="text/javascript"></script> -->
	
	
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
    <!-- <script src="../js/common-scripts.js"></script> -->

    <!--script for this page-->
	<!--<script src="../js/morris-script.js"></script>-->
    <!--<script src="../js/sparkline-chart.js"></script>-->
    <!--<script src="../js/easy-pie-chart.js"></script>-->
	<!--<script src="../js/all-chartjs.js"></script>-->
    <!-- script for this page only-->

	
	<!--<script type="text/javascript" src="../library/jquery-1.4.2.min.js"></script> -->
	<!-- <script type="text/javascript" src="../library/jquery-ui-1.8.2.custom.min.js"></script>  -->

	<script type="text/javascript" src="../assets/gritter/js/jquery.gritter.js"></script>
    <script src="../js/gritter.js" type="text/javascript"></script>

  </body>
</html><script>

 //mboh iki gawe opo.. wis jarno wae...
$(".modal").on("shown", function() {
	document.activeElement.blur()
	$(this).find(".modal-body :input:visible:first").focus();
});	 



$(document).ready(function(){

	//init hide
	//init_form();	
	

	function change_password()
	{
		var a_sts = "";
		var a_sts_desc = "Error";
		
		//kasih loading disini
		
			$.ajax({  
				 type: "POST",  
				 async: false,
				 url: 'change_password.php',  
				 data: 'userid='+active_user_id.value+'&old_password='+old_password.value+'&new_password='+new_password.value,
				 dataType: "json",  
				 success: function(data){ 
					//hide loading disini
					//alert(active_user_id.value);
					msgbox("Status","sukses");
					a_sts = data[0].status;				
					a_sts_desc = data[0].status_desc;
					alert(a_sts);
				
					
				  }
			});
			
			//alert('userid='+active_user_id.value+',old_password='+old_password.value+',new_password='+new_password.value);
			if (a_sts == 'ok')
			{
				alert('benar');
				msgbox("Status", "Change password success");
				document.location.href = 'index.php';
				$('#old_password').val("");
				$('#new_password').val("");
				$('#retype').val("");
			}
			else
			{
				msgbox("Status",a_sts_desc);
			}
			
			
	}



	
	//on click save 
	$('#Save').click(function(e){
		if (input_valid())
		{
			change_password();
		}
	});

	
	$('#Close').click(function(e){
	
		document.location.href = 'index.php';
	});	
	
	
	
	
	
	
});





function msgbox(judul,pesan)
{
	document.getElementById('msgbox_link').click();
	document.getElementById("msgbox_caption").innerHTML = '<img src="../img/company_logo.png" width="40" height="40"> '+judul;
	document.getElementById("msgbox_body").innerHTML = pesan;
}	  


function set_focus(id, desc)
{
	document.getElementById(id).focus();		
	document.getElementById(id).placeholder = "Input " + desc + " here..";
}			

function getElement(e,f)
{
    if(document.layers)
    {
        f=(f)?f:self;
        if(f.document.layers[e]) {
            return f.document.layers[e];
        }
        for(W=0;i<f.document.layers.length;W++) {
            return(getElement(e,fdocument.layers[W]));
        }
    }
    
    if(document.all) 
    {
        return document.all[e];
    }
    
    return document.getElementById(e);
}


function help_form()
{
	msgbox("Help","Change password");
}	  





function input_valid()
{

	if (old_password.value == "")
	{
		msgbox("Validation","Old Password harus diisi");
		set_focus("old_password","Old Password");
		return false;
	}else if (new_password.value == "")
	{
		msgbox("Validation","New Password harus diisi");
		set_focus("new_password","New Password");
		return false;
	}else if (retype.value == "")
	{
		msgbox("Validation","Retype Password harus diisi");
		set_focus("retype","Retype Password");
		return false;
	}else if (new_password.value != retype.value)
	{
		msgbox("Validation","Retype password tidak sesuai");
		set_focus("retype","Retype Password");
		return false;
	}


	
return true;
}


function gritter_show(vjudul, vpesan)
	{
		
        $.gritter.add({
            title: vjudul,
            image: '../img/company_logo.png',			
            text: vpesan,
			//sticky: true,
            time: '2000',			
        });

	 } 	

  </script>

