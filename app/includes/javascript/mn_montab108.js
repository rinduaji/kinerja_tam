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
	["Home","index.php?name=Mon_call","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
	["Input","","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["|Penilaian Agent","","images/b011.gif","images/b01.gif","Penilaian Agent","_parent",],
	["||Agent 108","index.php?name=Mon_call&file=list_penilaian&agent=Agent 108","images/b011.gif","images/b01.gif","Penilaian Agent 108","_parent",],
	["||Agent Citilink","index.php?name=Mon_call&file=list_penilaian&agent=Agent Citilink","images/b011.gif","images/b01.gif","Penilaian Agent Citilink","_parent",],
	["||Agent Jatim","index.php?name=Mon_call&file=list_penilaian&agent=Agent Jatim","images/b011.gif","images/b01.gif","Penilaian Agent Jatim","_parent",],
//	["||Agent BAF","index.php?name=Mon_call&file=list_penilaian&agent=Agent BAF","images/b011.gif","images/b01.gif","Penilaian Agent BAF","_parent",],
//	["||Agent KPI","index.php?name=Mon_call&file=list_penilaian&agent=Agent KPI","images/b011.gif","images/b01.gif","Penilaian Agent KPI","_parent",],
	
	["||Cigna ","index.php?name=Mon_call&file=list_penilaian&agent=Agent Cigna","images/b011.gif","images/b01.gif","penilaian Agent Cigna","_parent",],
	["|Penilaian susulan","","images/b011.gif","images/b01.gif","Penilaian Susulan","_parent",],
	["||Agent 108","index.php?name=Mon_call&file=list_susulan&agent=Agent 108","images/b011.gif","images/b01.gif","Penilaian Susulan Agent 108","_parent",],
	["||Agent Citilink","index.php?name=Mon_call&file=list_susulan&agent=Agent citilink","images/b011.gif","images/b01.gif","Penilaian Susulan Agent citilink","_parent",],
	["||Agent jatim","index.php?name=Mon_call&file=list_susulan&agent=Agent jatim","images/b011.gif","images/b01.gif","Penilaian Susulan Agent jatim","_parent",],
//	["||Agent BAF","index.php?name=Mon_call&file=list_susulan&agent=Agent BAF","images/b011.gif","images/b01.gif","Penilaian Susulan Agent baf","_parent",],
//	["||Agent KPI","index.php?name=Mon_call&file=list_susulan&agent=Agent KPI","images/b011.gif","images/b01.gif","Penilaian Susulan Agent 108","_parent",],
	
	
	["||Cigna ","index.php?name=Mon_call&file=list_susulan&agent=Agent Cigna","images/b011.gif","images/b01.gif","penilaian susulan Agent Cigna","_parent",],
	["-"],
	[" Proses Taping","index.php?name=Mon_call&file=send_penilai","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["-"],
	["Report","","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["|Rekp Pengujian Call","index.php?name=Mon_call&file=report_tapping","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Rekp Pengujian Call Old","index.php?name=Mon_call&file=report_tapping_old","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Report Detail","index.php?name=Mon_call&file=report_detail","images/b011.gif","images/b01.gif","Report Detail Penilaian Agent","_parent",],
	["|Tapping by Penilai ","index.php?name=Mon_call&file=report_tabspv","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|History Approval Kinerja","index.php?name=Mon_call&file=report_taptbr","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|History Approval Bina","index.php?name=Mon_call&file=report_tapbina","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Tapping by Agent ","index.php?name=Mon_call&file=report_agent","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Rekap Perkategori","index.php?name=Mon_call&file=rkp_nilai_kat","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Prioritas penilaian Agent","index.php?name=Mon_call&file=prioritas_kinerja_ag","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|QM Score","index.php?name=Mon_call&file=total_penilaian","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|| Daily","index.php?name=Mon_call&file=QMscore_d","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|| Daily1","index.php?name=Mon_call&file=QMscore_d1","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|| Monthly","index.php?name=Mon_call&file=QMscore_m","images/b011.gif","images/b01.gif","Report Penilaian Agent","_parent",],
	["|Ketidaksesuaian Tapping","index.php?name=Mon_call&file=rekap_ts","images/b011.gif","images/b01.gif","Report Ketidaksesuaian Tapping","_parent",],
	["|Tindak lanjut tapping ","index.php?name=Mon_call&file=rekap_bina","images/b011.gif","images/b01.gif","Report Tindak lanjut tapping ","_parent",],
	["|Report Feedback ","index.php?name=Mon_call&file=keluhan","images/b011.gif","images/b01.gif","Report Feedback ","_parent",],
	["|Summary Feedback ","index.php?name=Mon_call&file=summary_keluhan","images/b011.gif","images/b01.gif","Summary Feedback ","_parent",],
	["-"],
	["Approve","","images/new1-08.gif","images/new1-08.gif","input","_parent"],
	["|Ketidaksesuaian by SPV","index.php?name=Mon_call&file=list_ts&status=list","images/b011.gif","images/b01.gif","Ketidaksesuaian Penilaian Tapping","_parent",],
   ["-"],
    ["Exit ","index.php","images/new4-098.gif","images/new4-098.gif","","_parent",],
	["-"]
];

apy_init();