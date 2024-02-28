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
	["|My TKD","index.php?name=Wfm&file=mytkd","images/b011.gif","images/b01.gif","Daftar History Tukar Dinas","_parent",],
	["|Request","index.php?name=Wfm&file=tkd_requestst","images/b011.gif","images/b01.gif","Request Tukar Dinas","_parent",],
	["|Approve","index.php?name=Wfm&file=tkd_approve","images/b011.gif","images/b01.gif","Approve Tukar Dinas","_parent",],
	["|Pembatalan ","","images/b011.gif","images/b01.gif","Approve Tukar Dinas","_parent",],
	["||Request ","index.php?name=Wfm&file=tkd_reqbtl","images/b011.gif","images/b01.gif","Request Pembatalan Tukar Dinas","_parent",],
	["||Approve ","index.php?name=Wfm&file=tkd_appbtl","images/b011.gif","images/b01.gif","Approve Pembatalan Tukar Dinas","_parent",],
	["-"],
	["Rooster","","images/new1-08.gif","images/new1-08.gif","Rooster Online","_parent"],
	["|My Rooster","index.php?name=Wfm&file=myrooster","images/b011.gif","images/b01.gif","Daftar History Tukar Dinas","_parent",],
	["|List Rooster","index.php?name=Wfm&file=rooster_list","images/b011.gif","images/b01.gif","Daftar Rooster","_parent",],
	["|List Rooster Daily","index.php?name=Wfm&file=rooster_listd","images/b011.gif","images/b01.gif","Daftar Rooster Harian","_parent",],

	["-"],
	["Kinerja","","images/new1-08.gif","images/new1-08.gif","Kinerja","_parent"],
	["|My Tupres","","images/b011.gif","images/b01.gif","Quantity","_parent",],
	["-"],
	["ISH","index.php?name=karyawan&fldr=karyawan&mode=index","images/new1-08.gif","images/new1-08.gif","Data ISH","_parent",],
	["-"],
    ["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];

apy_init();