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
	["Home","index.php?name=ccm","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
	["Entry Data","index.php?name=ccm&file=entry","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	["-"],
	["Status Approve","index.php?name=ccm&file=approve","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	["-"],
	["Verifikasi","index.php?name=ccm&file=verifikasi","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
    ["-"],
	/*["Report","","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
     ["|Coaching","index.php?name=ccm&file=approve","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	 ["|Konseling","index.php?name=ccm&file=approve","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	 ["|BATL","index.php?name=ccm&file=approve","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	 ["|SP","index.php?name=ccm&file=approve","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	["-"],
*/	["Rekap","","images/new1-08.gif","images/new1-08.gif","Rekap Teguran","_parent"],
	 ["|Rekap Teguran ","index.php?name=ccm&file=rekapteguran","images/new1-08.gif","images/new1-08.gif","Rekap Teguran Agent","_parent"],
	 ["|Teguran Aktif","index.php?name=ccm&file=rekapteguranaktif","images/new1-08.gif","images/new1-08.gif","List Teguran Aktif","_parent"],
	 ["|Teguran Aktif By SPV","index.php?name=ccm&file=rekapteguranaktifspv","images/new1-08.gif","images/new1-08.gif","List Teguran Aktif","_parent"],
	 ["|Monitoring Agent Aprove","index.php?name=ccm&file=mon_aprv","images/new1-08.gif","images/new1-08.gif","Monitoring Agent Approve","_parent"],
	["-"],
	["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];

apy_init();