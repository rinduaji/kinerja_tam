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
	["Home","index.php?name=logapp","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
    ["REQUEST IT","","images/new1-08.gif","images/new1-08.gif","Daftar Request"],
	["|List Request","index.php?name=LogApp&file=index","images/b011.gif","images/b01.gif","","_parent",],
	["|History Req","index.php?name=LogApp&file=vw_requestitlist","images/b011.gif","images/b01.gif","","_parent",],
	["|In Progres","index.php?name=LogApp&file=log_requestinprogress","images/b011.gif","images/b01.gif","","_parent",],
	["|Spv Approve","index.php?name=LogApp&file=vw_needapprovelist","images/b011.gif","images/b01.gif","","_parent",],
	["-"],
    ["LOG ACTIVITY","index.php?name=LogApp&file=log_activitylist","images/new4-0985.gif","images/new4-0985.gif","Log Activity","_parent",],
	["-"],
    ["LOG BOOK","index.php?name=LogApp&file=log_bookalllist","images/new4-0985.gif","images/new4-0985.gif","Log Book","_parent",],
	["-"],
	["CEK LIST","index.php?name=LogApp&file=cek_harianlist","images/cek1.gif","images/cek2.gif","Cek List Harian","_parent",],
	["-"],
	["ECHI","","images/rdp.gif","images/rdp.gif","Echi"],
	["|Cek data Echi","index.php?name=LogApp&file=rekapcall_d2","images/b011.gif","images/b01.gif","Cek Data Echi","_parent",],
	["|Upload Echi","index.php?name=LogApp&file=upload_echi","images/b011.gif","images/b01.gif","Upload rekap echi","_parent",],
	["-"],
	
    ["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
	
];

apy_init();