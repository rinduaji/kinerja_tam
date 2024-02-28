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
	["Home","index.php?name=Info_Produk&file=index","images/new1-05.gif","images/new1-05.gif","Halaman Depan","_parent",],
	["-"],
	["Registrasi","","images/new1-08.gif","images/new1-08.gif","Registrasi ","_parent"],
	["|Flexi","","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["||Classy","","images/b011.gif","images/b01.gif","Classy","_parent",],
	["|||Syarat dan ketentuan","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=1&sub_kat1=1&sub_kat2=1","images/b011.gif","images/b01.gif","Syarat dan ketentuan","_parent",],
	["|||Cara","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=1&sub_kat1=1&sub_kat2=2","images/b011.gif","images/b01.gif","Cara","_parent",],
	["||Trendy","","images/b011.gif","images/b01.gif","Trendy","_parent",],
	["|||Syarat dan ketentuan","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=1&sub_kat1=2&sub_kat2=3","images/b011.gif","images/b01.gif","Syarat dan ketentuan","_parent",],
	["|||Cara","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=1&sub_kat1=2&sub_kat2=4","images/b011.gif","images/b01.gif","Cara","_parent",],
	["|POTS","","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Resident","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=2&sub_kat1=3&sub_kat2=","images/b011.gif","images/b01.gif","Resident","_parent",],
	["||Bisnis","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=2&sub_kat1=4&sub_kat2=","images/b011.gif","images/b01.gif","Bisnis","_parent",],
	["|Speedy","","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||PSB","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=3&sub_kat1=5&sub_kat2=","images/b011.gif","images/b01.gif","PSB","_parent",],
	["||Migrasi","","images/b011.gif","images/b01.gif","Migrasi","_parent",],	
	["|||Up Grade","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=3&sub_kat1=6&sub_kat2=5","images/b011.gif","images/b01.gif","Up Grade","_parent",],
	["|||Down Grade","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=3&sub_kat1=6&sub_kat2=6","images/b011.gif","images/b01.gif","Down Grade","_parent",],
	["|Permata / Tecon","index.php?name=Info_Produk&file=index&page=1&info=1&kategori=4&sub_kat1=&sub_kat2=","images/b011.gif","images/b01.gif","Permata / Tecon","_parent",],
	["-"],
	["Informasi","","images/new1-08.gif","images/new1-08.gif","Informasi ","_parent"],
	["|Flexi","","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=5&sub_kat1=7&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=5&sub_kat1=8&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=5&sub_kat1=9&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|POTS","","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=6&sub_kat1=10&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=6&sub_kat1=11&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=6&sub_kat1=12&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|Speedy","","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=7&sub_kat1=13&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=7&sub_kat1=14&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=7&sub_kat1=15&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|Permata","","images/b011.gif","images/b01.gif","Permata","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=8&sub_kat1=16&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=8&sub_kat1=17&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=8&sub_kat1=18&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|Usee TV / Grovia","","images/b011.gif","images/b01.gif","Usee TV / Grovia","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=9&sub_kat1=19&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=9&sub_kat1=20&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=9&sub_kat1=21&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|Telvis","","images/b011.gif","images/b01.gif","Telvis","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=10&sub_kat1=22&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=10&sub_kat1=23&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=10&sub_kat1=24&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|DELIMA","","images/b011.gif","images/b01.gif","DELIMA","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=11&sub_kat1=25&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=11&sub_kat1=26&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=11&sub_kat1=27&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|Wifi","","images/b011.gif","images/b01.gif","Wifi","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=12&sub_kat1=28&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=12&sub_kat1=29&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=12&sub_kat1=30&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["|CONTENT","","images/b011.gif","images/b01.gif","CONTENT","_parent",],
	["||Promo","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=13&sub_kat1=31&sub_kat2=","images/b011.gif","images/b01.gif","Promo","_parent",],
	["||Produk","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=13&sub_kat1=32&sub_kat2=","images/b011.gif","images/b01.gif","Produk","_parent",],
	["||Tarif","index.php?name=Info_Produk&file=index&page=1&info=2&kategori=13&sub_kat1=33&sub_kat2=","images/b011.gif","images/b01.gif","Tarif","_parent",],
	["-"],
	["Komplain","","images/new1-08.gif","images/new1-08.gif","Komplain ","_parent"],
	["|Buka Blokir","","images/b011.gif","images/b01.gif","Buka Blokir","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=14&sub_kat1=34&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=14&sub_kat1=35&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=14&sub_kat1=36&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Charge Pembayaran Diluar plasa telkom","","images/b011.gif","images/b01.gif","Charge Pembayaran Diluar plasa telkom","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=15&sub_kat1=37&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=15&sub_kat1=38&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=15&sub_kat1=39&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Gangguan Berulang","","images/b011.gif","images/b01.gif","Gangguan Berulang","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=16&sub_kat1=40&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=16&sub_kat1=41&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=16&sub_kat1=42&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Keluhan jumlah Tagihan","","images/b011.gif","images/b01.gif","Keluhan jumlah Tagihan","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=17&sub_kat1=43&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=17&sub_kat1=44&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=17&sub_kat1=45&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Komplain Migrasi/PSB","","images/b011.gif","images/b01.gif","Komplain Migrasi/PSB","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=18&sub_kat1=46&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=18&sub_kat1=47&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=18&sub_kat1=48&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Pasang Kembali","","images/b011.gif","images/b01.gif","Pasang Kembali","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=19&sub_kat1=49&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=19&sub_kat1=50&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=19&sub_kat1=51&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|PSB belum aktif","","images/b011.gif","images/b01.gif","PSB belum aktif","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=20&sub_kat1=52&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=20&sub_kat1=53&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=20&sub_kat1=54&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Terkait Promo","","images/b011.gif","images/b01.gif","Terkait Promo","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=21&sub_kat1=55&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=21&sub_kat1=56&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=21&sub_kat1=57&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|Gangguan SPIN","","images/b011.gif","images/b01.gif","Gangguan SPIN","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=22&sub_kat1=58&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=22&sub_kat1=59&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["|Karena Gamas","","images/b011.gif","images/b01.gif","Karena Gamas","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=23&sub_kat1=60&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=23&sub_kat1=61&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["|Fitur/conten","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=23&sub_kat1=63&sub_kat2=","images/b011.gif","images/b01.gif","Fitur/conten","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=24&sub_kat1=62&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["||Speedy","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=24&sub_kat1=63&sub_kat2=","images/b011.gif","images/b01.gif","Speedy","_parent",],
	["||Flexi","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=24&sub_kat1=64&sub_kat2=","images/b011.gif","images/b01.gif","Flexi","_parent",],
	["|EBS / Evergreen","","images/b011.gif","images/b01.gif","Fitur/conten","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=25&sub_kat1=65&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["|Kabel Lepas / Putus","","images/b011.gif","images/b01.gif","Kabel Lepas / Putus","_parent",],
	["||POTS","index.php?name=Info_Produk&file=index&page=1&info=3&kategori=26&sub_kat1=66&sub_kat2=","images/b011.gif","images/b01.gif","POTS","_parent",],
	["-"],
	["Exit","index.php","images/new1-08.gif","images/new1-08.gif","Input","_parent"],
	["-"],
];

apy_init();