var weekend = [6];
var weekendColor = "#e0e0e0";
var fontface = "Verdana";
var fontsize = 2;

var gNow = new Date();
var ggWinCal;
//var range_min = 55;
//var range_max = 0;
isNav = (navigator.appName.indexOf("Netscape") != -1) ? true : false;
isIE = (navigator.appName.indexOf("Microsoft") != -1) ? true : false;

Calendar.Months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
"Juli", "Agustus", "September", "Oktober", "November", "Desember"];

// Non-Leap year Month days..
Calendar.DOMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
// Leap year Month days..
Calendar.lDOMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

function Calendar(p_item, p_WinCal, p_day, p_month, p_year, p_old, p_format) {
	if ((p_month == null) && (p_year == null))	return;

	if (p_WinCal == null)
		this.gWinCal = ggWinCal;
	else
		this.gWinCal = p_WinCal;
	
	if (p_month == null) {
		this.gMonthName = null;
		this.gMonth = null;
		this.gYearly = true;
	} else {
		this.gMonthName = Calendar.get_month(p_month);
		this.gMonth = new Number(p_month);
		this.gYearly = false;
	}

	this.gDay = p_day;
	this.gYear = p_year;
	this.gFormat = p_format;
	this.gOldDate = p_old;
	this.gBGColor = "white";
	this.gFGColor = "black";
	this.gTextColor = "black";
	this.gHeaderColor = "black";
	this.gReturnItem = p_item;
}

Calendar.get_month = Calendar_get_month;
Calendar.get_daysofmonth = Calendar_get_daysofmonth;
//Calendar.calc_month_year = Calendar_calc_month_year;
//Calendar.print = Calendar_print;

function Calendar_get_month(monthNo) {
	return Calendar.Months[monthNo];
}

function Calendar_get_daysofmonth(monthNo, p_year) {
	if ((p_year % 4) == 0) {
		if ((p_year % 100) == 0 && (p_year % 400) != 0)
			return Calendar.DOMonth[monthNo];
	
		return Calendar.lDOMonth[monthNo];
	} else
		return Calendar.DOMonth[monthNo];
}

// This is for compatibility with Navigator 3, we have to create and discard one object before the prototype object exists.
new Calendar();

Calendar.prototype.getMonthlyCalendarCode = function() {
	var vCode = "";
	var vHeader_Code = "";
	var vData_Code = "";
	
	// Begin Table Drawing code here..
	vCode = vCode + "<TABLE BORDER=\"1\" cellpadding=\"2\" BGCOLOR=\"" + this.gBGColor + "\">";
	
	vHeader_Code = this.cal_header();
	vData_Code = this.cal_data();
	vCode = vCode + vHeader_Code + vData_Code;
	
	vCode = vCode + "</TABLE>";
	
	return vCode;
}

Calendar.prototype.show = function() {
	var vCode = "";
	var bln = Calendar.Months[this.gMonth];
	
	this.gWinCal.document.open();

	// Setup the page...
	this.wwrite("<html>");
	this.wwrite("<head><title>Kalender " + bln + ", " + this.gYear + "</title>");
	this.wwrite("<style type=\"text/css\">");
	this.wwrite("<!--");
	this.wwrite("select {");
	this.wwrite("font-family: Verdana;");
	this.wwrite("font-size: 12px;");
	this.wwrite("}");
	this.wwrite("TD {");
	this.wwrite("font-family: Verdana;");
	this.wwrite("font-size: 12px;");
	this.wwrite("}");
	this.wwrite("-->");
	this.wwrite("</style>");
	this.wwrite("</head>");

	this.wwrite("<body " + 
		"link=\"" + this.gLinkColor + "\" " + 
		"vlink=\"" + this.gLinkColor + "\" " +
		"alink=\"" + this.gLinkColor + "\" " +
		"text=\"" + this.gTextColor + "\" " + 
		"onload=\"window.focus()\">");
	strOptMonth = strOptYear = "";
	for(i=0;i<Calendar.Months.length;i++)
	{
		strOptMonth += "<option value=\""+i+"\"";
		if(i==this.gMonth) strOptMonth += " selected";
		strOptMonth += ">"+Calendar.Months[i]+"</option>";
	}
	
	for(i=0;i<6;i++)
	{
		new_val = parseInt(this.gYear) + (i-6);
		strOptYear += "<option value=\"" + new_val + "\">";
		if(!i) strOptYear += "--Prev--";
		else strOptYear += new_val;
		strOptYear += "</option>";
	}
	strOptYear += "<option value=\"" + this.gYear + "\" selected>" + this.gYear + "</option>";
	for(i=5;i>=0;i--)
	{
		new_val = parseInt(this.gYear) + (6-i);
		strOptYear += "<option value=\""+new_val+"\">";
		if(!i) strOptYear += "--Next--";
		else strOptYear += new_val;
		strOptYear += "</option>";
	}
	this.wwrite("<select onchange=\""+
	"window.opener.Build(" + "'" + this.gReturnItem + 
	"','1',this.value,'" + this.gYear + "','" + this.gOldDate + "','" + this.gFormat +
	"'" + ");\">"+ strOptMonth+"</select>");
	this.wwrite("<select onchange=\""+
	"window.opener.Build(" + "'" + this.gReturnItem + 
	"','1','" + this.gMonth +"',this.value,'" + this.gOldDate + "','" + this.gFormat +
	"'" + ");\">"+ strOptYear+"</select>");
	
	// Get the complete calendar code for the month..
	vCode = this.getMonthlyCalendarCode();
	this.wwrite(vCode);
	this.wwrite("<center><font face=\"Verdana\" size=\"2\" color=\"#0000ff\"><b>");
	this.wwrite("<a href=\""+"javascript:window.opener.Build('"+this.gReturnItem+"','"+gNow.getDate()+"','"+gNow.getMonth()
	+"','"+gNow.getFullYear()+"','"+this.gOldDate+"','"+this.gFormat+"');"+"\">Today</a>");
	this.wwrite(" | ");
	str = this.gOldDate;
	arr_str = str.split("-");
	old_day = arr_str[0];
	old_month = arr_str[1]-1;
	old_year = arr_str[2];
	this.wwrite("<a href=\""+"javascript:window.opener.Build('"+this.gReturnItem+"','"+old_day+"','"+old_month
	+"','"+old_year+"','"+this.gOldDate+"','"+this.gFormat+"');"+"\">Back</a>");
	this.wwrite("</b></font></center>");
	this.wwrite("</body></html>");
	this.gWinCal.document.close();
}

Calendar.prototype.wwrite = function(wtext) {
	this.gWinCal.document.writeln(wtext);
}

Calendar.prototype.wwriteA = function(wtext) {
	this.gWinCal.document.write(wtext);
}

Calendar.prototype.cal_header = function() {
	var vCode = "";
	
	vCode = vCode + "<TR>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Sen</B></FONT></TD>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Sel</B></FONT></TD>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Rab</B></FONT></TD>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Kam</B></FONT></TD>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Jum</B></FONT></TD>";
	vCode = vCode + "<TD nowrap><FONT COLOR='" + this.gHeaderColor + "'><B>Sab</B></FONT></TD>";
	vCode = vCode + "<TD norwrap><FONT COLOR='" + this.gHeaderColor + "'><B>Min</B></FONT></TD>";
	vCode = vCode + "</TR>";
	
	return vCode;
}

Calendar.prototype.cal_data = function() {
	var vDate = new Date();
	vDate.setDate(1);
	vDate.setMonth(this.gMonth);
	vDate.setFullYear(this.gYear);

	var vFirstDay=vDate.getDay();
	var vDay=1;
	var vLastDay=Calendar.get_daysofmonth(this.gMonth, this.gYear);
	var vOnLastDay=0;
	var vCode = "";

	/*
	Get day for the 1st of the requested month/year..
	Place as many blank cells before the 1st day of the month as necessary. 
	*/

	vCode = vCode + "<TR align=\"center\">";
	if(vFirstDay==0) vFirstDay=7;
	limit = vFirstDay - 1;
	if(limit)	vCode += "<TD nowrap colspan=\""+limit+"\">&nbsp;</TD>"

	// Write rest of the 1st week
	for (j=vFirstDay-1; j<7; j++) {
		vCode = vCode + "<TD nowrap" + this.write_weekend_string(j) + "><FONT SIZE='2' FACE='" + fontface + "'>" + 
			"<A HREF='#' " + 
				"onClick=\"self.opener.document." + this.gReturnItem + ".value='" + 
				this.format_data(vDay) + 
				"';window.close();\">" + 
				this.format_day(vDay) + 
			"</A>" + 
			"</FONT></TD>";
		vDay=vDay + 1;
	}
	vCode = vCode + "</TR>";

	// Write the rest of the weeks
	for (k=2; k<7; k++) {
		vCode = vCode + "<TR align=\"center\">";

		for (j=0; j<7; j++) {
			vCode = vCode + "<TD nowrap" + this.write_weekend_string(j) + "><FONT SIZE='2' FACE='" + fontface + "'>" + 
				"<A HREF='#' " + 
					"onClick=\"self.opener.document." + this.gReturnItem + ".value='" + 
					this.format_data(vDay) + 
					"';window.close();\">" + 
				this.format_day(vDay) + 
				"</A>" + 
				"</FONT></TD>";
			vDay=vDay + 1;

			if (vDay > vLastDay) {
				vOnLastDay = 1;
				break;
			}
		}

		if (j == 6)
			vCode = vCode + "</TR>";
		if (vOnLastDay == 1)
			break;
	}
	
	// Fill up the rest of last week with proper blanks, so that we get proper square blocks
	rest = 7-j;
	if(rest) vCode += "<td nowrap colspan=\""+rest+"\">&nbsp;</td></TR>";
	return vCode;
}

Calendar.prototype.format_day = function(vday) {
	var vNowDay = gNow.getDate();
	var vNowMonth = gNow.getMonth();
	var vNowYear = gNow.getFullYear();
	var OldDate = new String(this.gOldDate);
	arr_str = OldDate.split("-");
	vOldDay = arr_str[0];
	vOldMonth = arr_str[1] - 1;
	vOldYear = arr_str[2];

	if (vday == vNowDay && this.gMonth == vNowMonth && this.gYear == vNowYear)
		return ("<FONT COLOR=\"RED\"><B>" + vday + "</B></FONT>");
	else
	{
		if (vday == vOldDay && this.gMonth == vOldMonth && this.gYear == vOldYear)
			return ("<FONT COLOR=\"#6633cc\"><B>" + vday + "</B></FONT>");
		else return (vday);
	}
}

Calendar.prototype.write_weekend_string = function(vday) {
	var i;

	// Return special formatting for the weekend day.
	for (i=0; i<weekend.length; i++) {
		if (vday == weekend[i])
			return (" BGCOLOR=\"" + weekendColor + "\"");
	}
	
	return "";
}

Calendar.prototype.format_data = function(p_day) {
	var vData;
	var vMonth = this.gMonth + 1;
	vMonth = (vMonth.toString().length < 2) ? "0" + vMonth : vMonth;
	var vY4 = new String(this.gYear);
	var vY2 = new String(this.gYear.substr(2,2));
	var vDD = (p_day.toString().length < 2) ? "0" + p_day : p_day;

	switch (this.gFormat) {
		case "MM\/DD\/YYYY" :
			vData = vMonth + "\/" + vDD + "\/" + vY4;
			break;
		case "MM\/DD\/YY" :
			vData = vMonth + "\/" + vDD + "\/" + vY2;
			break;
		case "MM-DD-YYYY" :
			vData = vMonth + "-" + vDD + "-" + vY4;
			break;
		case "MM-DD-YY" :
			vData = vMonth + "-" + vDD + "-" + vY2;
			break;

		case "DD\/MON\/YYYY" :
			vData = vDD + "\/" + vMon + "\/" + vY4;
			break;
		case "DD\/MON\/YY" :
			vData = vDD + "\/" + vMon + "\/" + vY2;
			break;
		case "DD-MON-YYYY" :
			vData = vDD + "-" + vMon + "-" + vY4;
			break;
		case "DD-MON-YY" :
			vData = vDD + "-" + vMon + "-" + vY2;
			break;

		case "DD\/MONTH\/YYYY" :
			vData = vDD + "\/" + vFMon + "\/" + vY4;
			break;
		case "DD\/MONTH\/YY" :
			vData = vDD + "\/" + vFMon + "\/" + vY2;
			break;
		case "DD-MONTH-YYYY" :
			vData = vDD + "-" + vFMon + "-" + vY4;
			break;
		case "DD-MONTH-YY" :
			vData = vDD + "-" + vFMon + "-" + vY2;
			break;

		case "DD\/MM\/YYYY" :
			vData = vDD + "\/" + vMonth + "\/" + vY4;
			break;
		case "DD\/MM\/YY" :
			vData = vDD + "\/" + vMonth + "\/" + vY2;
			break;
		case "DD-MM-YYYY" :
			vData = vDD + "-" + vMonth + "-" + vY4;
			break;
		case "DD-MM-YY" :
			vData = vDD + "-" + vMonth + "-" + vY2;
			break;

		default :
			vData = vMonth + "\/" + vDD + "\/" + vY4;
	}

	return vData;
}

function Build(p_item, p_day, p_month, p_year, p_old, p_format) {
	var p_WinCal = ggWinCal;
	gCal = new Calendar(p_item, p_WinCal, p_day, p_month, p_year, p_old, p_format);

	// Customize your Calendar here..
	gCal.gBGColor="white";
	gCal.gLinkColor="black";
	gCal.gTextColor="black";
	gCal.gHeaderColor="darkgreen";

	// Choose appropriate show function
	gCal.show();
}

function show_calendar() {
	p_item = arguments[0];
	p_format = "DD-MM-YYYY";
	if (arguments[1] == "" || arguments[1] == null)
	{
		p_day = new String(gNow.getDate());
		p_month = new String(gNow.getMonth());
		p_year = new String(gNow.getFullYear().toString());
	}
	else
	{
		str = arguments[1];
		arr_str = str.split("-");
		p_day = new String(arr_str[0]);
		p_month = new String(arr_str[1])-1;
		p_year = new String(arr_str[2]);
		if(p_month=='undefined' || isNaN(p_month) || parseInt(p_month)>11) p_month = "0";
		if(p_year=='undefined' || isNaN(p_year)) p_year = new String(gNow.getFullYear().toString());
	}
	
	if (arguments[2] == "" || arguments[2] == null) old_date = gNow.getDate() + "-" + (gNow.getMonth()+1) + "-" + gNow.getFullYear();
	else
	{
		str = arguments[2];
		arr_str = str.split("-");
		if(arr_str.length==3 && str.length<=10 && parseInt(arr_str[1])<13 && parseInt(arr_str[0])<32) old_date = new String(arguments[2]);
		else old_date = "1-1-"+gNow.getFullYear();
	}
	
	vWinCal = window.open("", "Calendar","width=270,height=250,status=no,resizable=no,top=200,left=200");
	vWinCal.opener = self;
	ggWinCal = vWinCal;
	Build(p_item, p_day, p_month, p_year, old_date, p_format);
}
