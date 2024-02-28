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
	["Home","index.php?name=request&file=list_req","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
    ["Request IT","","images/new1-08.gif","images/new1-08.gif","Request"],
	["|Add Request IT","index.php?name=request&file=add_new","images/b011.gif","images/b01.gif","Request","_parent",],
	
	["-"],
	["LIST REQUEST","","images/new1-08.gif","images/new1-08.gif","Request"],
	["|LIST REQUEST","index.php?name=request&file=list_req","images/b011.gif","images/b01.gif","LIST REQUEST ","_parent",],
	["|HISTORY REQUEST","index.php?name=request&file=list_history","images/b011.gif","images/b01.gif","HISTORY REQUEST ","_parent",],
	["|SPV APPROVE ","index.php?name=request&file=list_approve","images/b011.gif","images/b01.gif","SPV APPROVE","_parent",],
	["|IN PROGRES ","index.php?name=request&file=list_inprog","images/b011.gif","images/b01.gif","IN PROGRES ","_parent",],
	["|LIST REKAP ","index.php?name=request&file=list_rekap","images/b011.gif","images/b01.gif","LIST REKAP ","_parent",],
	
	["-"],
	["REKAP REQUEST","","images/new1-08.gif","images/new1-08.gif","Request"],
	["|LIST REKAP PERANGKAT AGENT","index.php?name=request&file=list_rekap","images/b011.gif","images/b01.gif","LIST REKAP PERANGKAT AGENT","_parent",],
	["|GRAFIK KATEGORI REQUEST IT","index.php?name=request&file=test","images/b011.gif","images/b01.gif","GRAFIK REQUEST IT","_parent",],
	["|GRAFIK SUB KATEGORI REQUEST IT","index.php?name=request&file=sub_kat","images/b011.gif","images/b01.gif","GRAFIK REQUEST IT","_parent",],
	["|GRAFIK STATUS REQUEST IT","index.php?name=request&file=stat","images/b011.gif","images/b01.gif","GRAFIK REQUEST IT","_parent",],
	["|EXPORT","index.php?name=request&file=form_export","images/b011.gif","images/b01.gif","EXPORT","_parent",],
	
	["-"],
	["LOG ACTIVITY","index.php?name=LogApp&file=log_activitylist","images/new1-08.gif","images/new1-05.gif","Log Activity","_parent",],
	
	["-"],
	["LOG BOOK","index.php?name=LogApp&file=log_bookalllist","images/new1-08.gif","images/new1-05.gif","Log Book","_parent",],
	
	["-"],
	["CEK LIST","index.php?name=LogApp&file=cek_harianlist","images/new1-08.gif","images/new1-05.gif","Cek List","_parent",],
	
	["-"],
	["ECHI","","images/new1-08.gif","images/new1-08.gif","ECHI"],
	["|Cek Data Echi 100","index.php?name=LogApp&file=rekapcall_d2","images/new1-05.gif","images/new1-05.gif","Cek Data Echi","_parent",],
	["|Cek Data Echi 103","index.php?name=LogApp&file=rekapcall_d3","images/new1-05.gif","images/new1-05.gif","Cek Data Echi","_parent",],
	["|Upload Data Echi 100","index.php?name=LogApp&file=upload_echi","images/new1-05.gif","images/new1-05.gif","Upload Data Echi","_parent",],
	["|Upload Data Echi 103","index.php?name=LogApp&file=upload_echi103","images/new1-05.gif","images/new1-05.gif","Upload Data Echi","_parent",],
	["|Compare Data Serv","index.php?name=LogApp&file=compare_serv","images/new1-05.gif","images/new1-05.gif","Compare Data Serv","_parent",],

	["-"],
	["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];

apy_init();