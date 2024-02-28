
<!DOCTYPE html>
<html>
<head>
		<title>Data Karyawan Infomedia</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	
</head>

      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
     <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tabel Karyawan</h2>   
                        <h5>Selamat Datang . </h5>
                       <label class="col-xs-1">&nbsp;</label>
                    </div>

                </div>


                 <!-- /. ROW  -->
                
               
            <div class="row">

      
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="width: 1030px;">
                        <div class="panel-heading">
                             Tabel Karyawan Infomedia 
                        </div>
                        <div class="panel-body" style="width: 1030px;">
                            <div class="table-responsive" style="tranf">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <!-- <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th> -->
							        <th >No</th>
							        <th >Picture</th>
							        <th >Perner</th>
							        <th >Nama</th>
							      
							        <th >Jabatan</th>
							     
							        <th >Jenis Kelamin</th>
							     
							        <th >Status</th>
							        <th style="width: 66px;padding-right: 150px;">Modify</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            
                                       
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
               
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
   
</body>
</html>
