var isHorizontal=1;

var pressedItem = 0;

var iconTopWidth  = 20;
var iconTopHeight = 20;
var subMenuAlign = "left";
var moveImage  = "images/movepic4.gif";
var moveWidth      = 20;
var moveHeight      = 10;

var blankImage="images/blank.gif";
var fontStyle="normal 12pt Arial";
var fontColor=["#000000","#FF0000"];
var fontDecoration=["none","none"];

var itemBackColor=["#DDE6FF","#EFF3FF"];
var itemBorderWidth=0;
var itemAlign="left";
var itemBorderColor=["#6655ff","#665500"];
var itemBorderStyle=["solid","solid"];
var itemBackImage=["",""];

var menuBackImage="";
var menuBackColor="#EAEDF4";
var menuBorderColor="#006699";
var menuBorderStyle="solid";
var menuBorderWidth=1;
var transparency=90;
var transition=12;
var transDuration=300;
var shadowColor="#999999";
var shadowLen=8;
var menuWidth="";

var itemCursor="hand";
var itemTarget="_blank";
var statusString="text";
var subMenuAlign = "left";
var iconTopWidth  = 16;
var iconTopHeight = 16;
var iconWidth=16;
var iconHeight=16;
var arrowImageMain=["images/arrow_d.gif","images/arrow_d2.gif"];
var arrowImageSub=["images/arrow_r.gif","images/arrow_r2.gif"];
var arrowWidth=7;
var arrowHeight=7;
var itemSpacing=1;
var itemPadding=3;

var separatorImage="images/separ1.gif";
var separatorWidth="100%";
var separatorHeight="5";
var separatorAlignment="center";

var separatorVImage="images/separv1.gif";
var separatorVWidth="5";
var separatorVHeight="16";

var moveCursor = "move";
var movable = 0;
var absolutePos = 0;
var posX = 170;
var posY = 160;

var floatable=1;
var floatIterations=100;

var menuItems = 
[
    ["-"],
	["Home","index.php?name=Wfm","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
	["Absen","","images/new1-08.gif","images/new1-08.gif","WFM Absen","_parent"],
	["|Absen","index.php?name=Wfm&file=absen","images/b011.gif","images/b01.gif","Absen Masuk/Pulang","_parent",],
	["|My Absen","index.php?name=Wfm&file=myabsen","images/b011.gif","images/b01.gif","Daftar Absen","_parent",],
	["-"],
    ["TKD Online","","images/new1-08.gif","images/new1-08.gif","Tukar Dinas Online","_parent"],
	["|My TKD ","index.php?name=Wfm&file=mytkd","images/b011.gif","images/b01.gif","Daftar History Tukar Dinas","_parent",],
	["|Request ","index.php?name=Wfm&file=tkd_requestst","images/b011.gif","images/b01.gif","Request Tukar Dinas","_parent",],
	["|Approve ","index.php?name=Wfm&file=tkd_approve","images/b011.gif","images/b01.gif","Approve Tukar Dinas","_parent",],
	["|Pembatalan ","","images/b011.gif","images/b01.gif","Approve Tukar Dinas","_parent",],
	["||Request ","index.php?name=Wfm&file=tkd_reqbtl","images/b011.gif","images/b01.gif","Request Pembatalan Tukar Dinas","_parent",],
	["||Approve ","index.php?name=Wfm&file=tkd_appbtl","images/b011.gif","images/b01.gif","Approve Pembatalan Tukar Dinas","_parent",],
	["-"],
	["Rooster","","images/new1-08.gif","images/new1-08.gif","Rooster Online","_parent"],
	["|Design","","images/b011.gif","images/b01.gif","Administrasi Rooster","_parent"],
	["||KKWT / CUTI","index.php?name=Wfm&file=kkwt","images/b011.gif","images/b01.gif","App KKWT / CUTI","_parent"],
	["||Aturan Cuti","index.php?name=Wfm&file=atr_cuti","images/b011.gif","images/b01.gif","WFM CUTI RULE","_parent"],
	["||APP Kelompok","index.php?name=app_kelompok","images/b011.gif","images/b01.gif","Aplikasi Kelompok","_parent"],
	["||Group Mail","index.php?name=Wfm&file=gm_list","images/b011.gif","images/b01.gif","Group Mail","_parent"],
	["|My Rooster","index.php?name=Wfm&file=myrooster","images/b011.gif","images/b01.gif","Daftar History Tukar Dinas","_parent",],
	["|CUTI","","images/b011.gif","images/b01.gif","","_parent",],
	["||Request Cuti","index.php?name=Wfm&file=cuti_request","images/b011.gif","images/b01.gif","Request Cuti Online","_parent",],
	["|Administrasi","","images/b011.gif","images/b01.gif","Administrasi","_parent"],
	["||Update Status","","images/b011.gif","images/b01.gif","Update Status","_parent"],
	["|||Update Status ALL","index.php?name=Wfm&file=adm_all","images/b011.gif","images/b01.gif","Update Status ALL","_parent"],
	["|||Status Tidak Masuk","index.php?name=Wfm&file=adm_tmasuk","images/b011.gif","images/b01.gif","Update Status Tdk Masuk","_parent"],
	["|||Status IMP","index.php?name=Wfm&file=adm_imp","images/b011.gif","images/b01.gif","Update Status IMP","_parent"],
	["|||Status Training","index.php?name=Wfm&file=adm_training","images/b011.gif","images/b01.gif","Update Status Training","_parent"],
	["|Report","","images/b011.gif","images/b01.gif","Report Rooster","_parent",],
	["||List Rooster","index.php?name=Wfm&file=rooster_list","images/b011.gif","images/b01.gif","Daftar Rooster","_parent",],
	["||List Rooster Daily","index.php?name=Wfm&file=rooster_listd","images/b011.gif","images/b01.gif","Daftar Rooster Harian","_parent",],
	["||Summary Rooster","index.php?name=Wfm&file=rooster_sum","images/b011.gif","images/b01.gif","Summary Rooster","_parent",],
	["||Tukar Dinas","index.php?name=Wfm&file=tkd_report","images/b011.gif","images/b01.gif","Report Tukar Dinas","_parent",],
	["||List Absen","index.php?name=Wfm&file=absen_list","images/b011.gif","images/b01.gif","Daftar Absen","_parent",],
	["||List Absen 2","index.php?name=Wfm&file=absen_list2","images/b011.gif","images/b01.gif","Daftar Absen","_parent",],
	["||Posisi Duduk","index.php?name=Wfm&file=posduk","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["||Posisi Duduk/Kel","index.php?name=Wfm&file=posdukkel","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["|Rekapitulasi","","images/b011.gif","images/b01.gif","Report Rooster","_parent",],
	["||Timesheet","index.php?name=Wfm&file=rkpt_timesheet","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["||Terlambat","index.php?name=Wfm&file=rkpt_terlambat","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["||Tercepat","index.php?name=Wfm&file=rkpt_tercepat","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["||Payroll","index.php?name=Wfm&file=rkpt_payroll","images/b011.gif","images/b01.gif","Posisi Duduk Agent","_parent",],
	["||CUTI","index.php?name=Wfm&file=rkpt_cuti","images/b011.gif","images/b01.gif","Rekapitulasi CUTI","_parent",],
	["-"],
	["Kinerja","","images/new1-08.gif","images/new1-08.gif","Kinerja","_parent"],
	["|My Tupres","","images/b011.gif","images/b01.gif","Quantity","_parent",],
	["|Quantity","","images/b011.gif","images/b01.gif","Quantity","_parent",],
	["||My Quantity","index.php?name=Wfm&file=myquantity","images/b011.gif","images/b01.gif","My Quantity","_parent",],
	["||My Quantity Interval","index.php?name=Wfm&file=myquantity_int","images/b011.gif","images/b01.gif","My Quantity","_parent",],
	["|Quality","","images/b011.gif","images/b01.gif","Quality","_parent",],
	["|Login Logout","","images/b011.gif","images/b01.gif","Login Logout","_parent",],
	["||My Login Logout","index.php?name=Wfm&file=myloglog","images/b011.gif","images/b01.gif","My Login Logout","_parent",],
	["-"],
	["Cek Kehadiran","","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["|Real","","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["||Agent 108","index.php?name=Wfm&file=posdir_real&jbt=Agent 108&detail=pola&detail=pola","images/b011.gif","images/b01.gif","Cek kehadiran","",],	
	["||Agent Flexi","index.php?name=Wfm&file=posdir_real&jbt=Agent Flexi&detail=pola","images/b011.gif","images/b01.gif","Cek kehadiran","",],	
	["||Agent POTS","index.php?name=Wfm&file=posdir_real&jbt=Agent POTS&detail=pola","images/b011.gif","images/b01.gif","Cek kehadiran","",],	
	["||Agent Speedy","index.php?name=Wfm&file=posdir_real&jbt=Agent Speedy&detail=pola","images/b011.gif","images/b01.gif","Cek kehadiran","",],
	["||Agent Inb Sales","index.php?name=Wfm&file=posdir_real&jbt=Agent Inb Sales&detail=pola","images/b011.gif","images/b01.gif","Cek kehadiran","",],	
	["|Historical","index.php?name=Wfm&file=posdir_historical","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["-"],
	["ISH","index.php?name=karyawan&fldr=karyawan&mode=index","images/new1-08.gif","images/new1-08.gif","Data ISH","_parent",],
	["-"],
    ["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];
apy_init();