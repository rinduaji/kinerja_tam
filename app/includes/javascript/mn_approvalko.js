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
	["Home","index.php?name=approval_req","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
    ["List Approval","","images/new1-08.gif","images/new1-08.gif","Daftar Approval"],
	["|My Approval","","images/b011.gif","images/b01.gif","Daftar Approval","_parent",],
	["||My Task","index.php?name=approval_req&file=approval_spv","images/b011.gif","images/b01.gif","Daftar Task Approval","_parent",],
	["||Handle All by E-MAIL ","index.php?name=approval_req&file=handle_all","images/b011.gif","images/b01.gif","Daftar Task Approval","_parent",],
	["||My History","index.php?name=approval_req&file=happroval_spv","images/b011.gif","images/b01.gif","Daftar History Approval","_parent",],
	["|History Aproval All SPV","index.php?name=approval_req&file=happroval_all","images/b011.gif","images/b01.gif","History Approvall Semua Supervisor","_parent",],
	["|Distribusi Aproval","index.php?name=approval_req&file=approval_dist","images/b011.gif","images/b01.gif","Daftar Approval Layanan Flexi","_parent",],
	["|Approval TAM","index.php?name=approval_req&file=approval_tam","images/b011.gif","images/b01.gif","Daftar Approval Layanan TAM","_parent",],
	["|Approval Informasi","index.php?name=approval_req&file=approval&layanan=11","images/b011.gif","images/b01.gif","Daftar Approval Layanan Informasi","_parent",],
	["|Approval Komplain","index.php?name=approval_req&file=approval&layanan=12","images/b011.gif","images/b01.gif","Daftar Approval Layanan Komplain","_parent",],	
	["|Approval Registrasi","index.php?name=approval_req&file=approval&layanan=4","images/b011.gif","images/b01.gif","Daftar Approval Layanan Registrasi","_parent",],
	["|Approval Tabber 147","index.php?name=approval_req&file=approval&layanan=13","images/b011.gif","images/b01.gif","Daftar Approval Tabber 147","_parent",],
	["|Approval Pengerjaan","index.php?name=approval_req&file=happroval_jum","images/b011.gif","images/b01.gif","Daftar Approval Pengerjaan","_parent",],
	["-"],


    ["Report Approval","","images/new4-0985.gif"],
	["|Status Approval / Supervisor ","index.php?name=approval_req&file=rpt_approval_stsspv","images/b011.gif","images/b01.gif","","_parent",],
	["|Approval / Supervisor ","index.php?name=approval_req&file=jml_appr_spv","images/b011.gif","images/b01.gif","","_parent",],
	["|Approval / Agent ","index.php?name=approval_req&file=jml_appr_ag","images/b011.gif","images/b01.gif","","_parent",],
	["|Approval / Kategori ","index.php?name=approval_req&file=under_const","images/b011.gif","images/b01.gif","","_parent",],
	["-"],


    ["Data Tracking","","images/new4-0985.gif"],
	["|Data Tracking Interval","","images/b011.gif","images/b01.gif","","_parent",],
	["||Interval / Layanan ","index.php?name=approval_req&file=trackintvlay_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["||Interval / Agent ","index.php?name=approval_req&file=trackintvag_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["|Rekap Data Tracking ","index.php?name=approval_req&file=track_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["|Rekap Data Tracking v.2 ","index.php?name=approval_req&file=track_rkp2","images/b011.gif","images/b01.gif","","_parent",], 
	["|Data Tracking / Layanan ","index.php?name=approval_req&file=tracklay_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["|Data Tracking / Agent ","index.php?name=approval_req&file=trackag_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["|Data Tracking export Detail ","index.php?name=approval_req&file=track_rkp_detail","images/b011.gif","images/b01.gif","","_parent",],
	["-"],


	["Data Validasi TOK","","images/new4-0985.gif"],
	["|Rekap Validasi TOK ","index.php?name=approval_req&file=vtok_rkp","images/b011.gif","images/b01.gif","","_parent",],
	["|Validasi TOK / Layanan ","index.php?name=approval_req&file=vtok","images/b011.gif","images/b01.gif","","_parent",],
	["-"],


	["Searching Data","index.php?name=approval_req&file=search_appr","images/b011.gif","images/b01.gif","pencarian Data","_parent",],
	["-"],


	["Report Inbound","","images/new4-0985.gif"],
	["|Data Tracking Interval","index.php?name=approval_req&file=trackintv_sales","images/b011.gif","images/b01.gif","","_parent",],
	["|Data Tracking Daily","index.php?name=approval_req&file=trackdaily_sales","images/b011.gif","images/b01.gif","","_parent",],
	["|Data Tracking Agent","index.php?name=approval_req&file=trackagent_sales","images/b011.gif","images/b01.gif","","_parent",],
	["|Hasil Survey","index.php?name=approval_req&file=hasil_survey","images/b011.gif","images/b01.gif","images/b01.gif","_parent",],
	["|Dashboard CTI","index.php?name=approval_req&file=dashboard","images/b01.gif","_parent",],


	["-"],
	["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];

apy_init();