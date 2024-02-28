<?php 


if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     //session_start();

   require_once('sidebar.php'); 
     //require_once('koneksi.php');
     date_default_timezone_set('Asia/Jakarta');
     $tgl=date('Y-m-d');
     $lup=date('Y-m-d h:i:s');

    
            $ids=$id;
          

    
   

 ?>

	<tr>
		<td bordercolor="#60729B" align="center"><font style="font-size:15px" face="Verdana" color="#d8033c"><b>Report Penilaian Bulanan </b></font></td>
	</tr>	
</table>

<table height="150" width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">
	<tr>
		<td bordercolor="#60729B" align="center">
<table width="50%" border="1" >
<tr>
      <td width="114" align="left"><strong>Periode / Bulan </strong></td>
      <td width="310" align="left">:&nbsp; 
	  <select name="mons">
    <option value="01" > JANUARI</option><option value="2" > FEBRUARI</option><option value="3" > MARET</option><option value="4" > APRIL</option><option value="5" > MEI</option><option value="6" > JUNI</option><option value="7" > JULI</option><option value="8" > AGUSTUS</option><option value="9" > SEPTEMBER</option><option value="10" > OKTOBER</option><option value="11" selected> NOVEMBER</option><option value="12" > DESEMBER</option>  </select>
   <select name="years">
    <option value="2015" > 2015 </option><option value="2016" > 2016 </option><option value="2017" > 2017 </option><option value="2018" selected> 2018 </option><option value="2019" > 2019 </option><option value="2020" > 2020 </option><option value="2021" > 2021 </option><option value="2022" > 2022 </option><option value="2023" > 2023 </option><option value="2024" > 2024 </option>  </select>	    
	  </td>
    </tr>
 
<tr>
    <td width="15%" align ="left"><strong>Agent&nbsp;</strong></td>
    <td width="50%" align ="left" >: 
	<select name="agent_id">
	<option value="46853" > ABD KADIR JAILANI | 72922 </option><option value="43206" > ABD. GHOFFAR AMRULLAH | 72389 </option><option value="48276" > ADE CHANDRA S | 76485 </option><option value="48245" > ADLI ARIF ALKHOBIR | 76470 </option><option value="46102" > AGUSTIN DWI KURNIAWATI | 72234 </option><option value="46888" > AGUSTINA NAINGGOLAN | 72554 </option><option value="48380" > ALFRED ANDRIAN | 76548 </option><option value="48486" > AMANDA AGUSTINA | 76573 </option><option value="46855" > AMAS ANINDYA | 75100 </option><option value="48277" > ANA NUR JANNAH | 76486 </option><option value="48345" > ANA ROSYIDAH | 72207 </option><option value="48483" > ANCHA SANTIREGA | 76571 </option><option value="48329" > ANDIANI KRISTANTI | 72180 </option><option value="48346" > ANGGI FAJAR ANDANA | 72208 </option><option value="48314" > ANGGIKA AULIA FITRI Y | 76517 </option><option value="48311" > ANGGRAENY HAMDANA T | 76514 </option><option value="48487" > ANGGUN HERAWATI | 76574 </option><option value="48278" > ANGGUN SINTA M | 76487 </option><option value="48244" > ANINDYA MAHARANI L | 76469 </option><option value="48347" > ANUDIYAN AMIR M | 72209 </option><option value="46590" > APRILAVIANA S.R | 72228 </option><option value="45155" > ARFIVA TRISNAWATI ATMANEGARA | 72842 </option><option value="47732" > ARIENA DYNASTY | 76301 </option><option value="46174" > ARIKA D RESTAMA | 72291 </option><option value="46796" > ARIO SENO WIBOWO | 72516 </option><option value="46856" > ARRI RISKY NOVALIA | 75045 </option><option value="46858" > ASIH HAJARANTI | 75046 </option><option value="48330" > ATOILLAH | 72181 </option><option value="47709" > AULIA AGNI N | 76278 </option><option value="48488" > AULIA KURNIA | 76575 </option><option value="48331" > AWET PRAKASA | 72182 </option><option value="48251" > AYU ARIANDINY | 75005 </option><option value="46892" > AYU MULTIKA SARI | 72405 </option><option value="48303" > AYUNDHA FEBRI SYLVIA RAMADHAN | 76506 </option><option value="48302" > BELLA FEBRIANA | 76505 </option><option value="48371" > BERTHA OCTAVIA YOLANDA | 76539 </option><option value="48305" > BINTI QURROTU AYUNIN NIMAH | 76508 </option><option value="47722" > BRILYAN HAFITYAN RAMADHAN | 76291 </option><option value="46509" > CAHYA MAWARNI | 72484 </option><option value="48238" > CLARISSA FAQUITA A | 76463 </option><option value="48316" > CORNELIA SUKMA | 76519 </option><option value="48279" > DANIYATUL AULIYA | 76488 </option><option value="48308" > DANTY KUSUMAJATI PRAHANA | 76511 </option><option value="47121" > DANY AULIA SAFITRI | 75277 </option><option value="48259" > DANY INDRA LAKSMANA | 76476 </option><option value="46894" > DAVID ADI PUTRA JAYA | 72407 </option><option value="48489" > DEANE PUSPITA A | 76576 </option><option value="48332" > DENI ISAWARA | 72183 </option><option value="46895" > DENNES SERVIANA | 72385 </option><option value="45083" > DENNY PERMANA | 72737 </option><option value="47749" > DESI PUTRI WULANING TIAS | 76176 </option><option value="47697" > DESSY NATALIA K | 76266 </option><option value="46799" > DESSY WULANSARI | 75102 </option><option value="44981" > DETYA GUSSALINDA | 72727 </option><option value="48280" > DEVI MULYANI | 76489 </option><option value="46511" > DEWI AYU RISKY MUSTIKA | 72487 </option><option value="45169" > DEWI CHUMAIROH | 72879 </option><option value="47176" > DEWI JULIANDARI | 75321 </option><option value="44960" > DEWI PUJI | 72706 </option><option value="48348" > DEWI SAKTI P | 72210 </option><option value="46861" > DEWI SUCI LOVITA | 72412 </option><option value="48490" > DEWI UTARI | 76577 </option><option value="48260" > DHELA RAHMATIKA WYDANANTI | 76477 </option><option value="48313" > DIAN AYU ERLIANTI | 76516 </option><option value="48333" > DIAN YUDA | 72185 </option><option value="48349" > DIANITA SARASWATI | 72211 </option><option value="47122" > DINA. M. SILMI | 75278 </option><option value="46862" > DINAR PRASTYOWATI | 75047 </option><option value="48204" > DINDA HEDDYANTI | 76459 </option><option value="48247" > DINDA PUSPITASARI | 76472 </option><option value="48334" > DINI AYU I | 72187 </option><option value="45140" > DITA VIRA R | 72810 </option><option value="46898" > DONI PRASETYO | 72109 </option><option value="48281" > DWI ANDI ALFITRAH | 76490 </option><option value="48249" > DWI OKTAVIANTI | 76474 </option><option value="46138" > DYTA RAHMATINA OCTOVIANI | 72270 </option><option value="48264" > EKY GILANG PRINADI | 76481 </option><option value="46172" > EKY ULINNUHA | 72288 </option><option value="48350" > ELA SULISIANI | 72212 </option><option value="46899" > ELISNA ASRI R | 72542 </option><option value="48258" > ELLA CAHYA YUNITA  | 76475 </option><option value="48351" > ELOK INDAH NARWANTI | 72213 </option><option value="48375" > ELPANDA SUKMA MEGAWATI KENCANA | 76543 </option><option value="48335" > ELVIRA VERDHI L | 72190 </option><option value="48246" > ELVIRA YULIANA SARI | 76471 </option><option value="47310" > EMI YULIASTUTI | 75444 </option><option value="48352" > ENENG DIANA | 72214 </option><option value="46085" > ENY WAHYU PURWANTI | 72354 </option><option value="47125" > ERMI EKAWATI | 75281 </option><option value="47311" > ERVIN YULIANTO | 75445 </option><option value="48248" > EUIS RISMAWATI | 76473 </option><option value="45086" > FADIANA AROFAH | 72740 </option><option value="47705" > FADILA MAYA S | 76274 </option><option value="47167" > FAIKA LINDA N | 72568 </option><option value="48491" > FAISAL NUR FACHRUDIN | 76578 </option><option value="48482" > FARAH DURROTUL NIKMAH | 76570 </option><option value="46865" > FARID ANDHIKA | 72933 </option><option value="47832" > FARIZAL KUSNUL KHOTIMAH | 76335 </option><option value="46866" > FATCHUL ULUM | 72253 </option><option value="47099" > FERRY ADI KURNIAWAN | 75260 </option><option value="48353" > FIDYA AYU FITRI W | 72215 </option><option value="47174" > FIRDAUSI DHULHIJJAHYANI | 75319 </option><option value="47101" > FIRZA HANA NAZAHAH | 75261 </option><option value="48336" > FITRI AMALIA | 72193 </option><option value="48492" > FITRIANSYAH NUR S.M | 76579 </option><option value="48312" > FONITA FEFI  HAVITA DEWI | 76515 </option><option value="47833" > FRENTINA MURTI SUJADI | 76336 </option><option value="48252" > FRIDHA AGUSTINA | 75016 </option><option value="46906" > GALANG ANGGRIAWAN | 72530 </option><option value="48337" > HADITYA DWI N | 72196 </option><option value="44971" > HAVIS ZAKARIA | 72717 </option><option value="46089" > HENDRIK VANDESKA U | 72358 </option><option value="46090" > HENGKY WANAERO AGUSTA | 72359 </option><option value="46868" > HOIRIYA | 75049 </option><option value="47752" > HUDARROHMANA GITA ANDRIANA ISNANDARI | 76270 </option><option value="46807" > IDA ANNAS FIRDAUSI | 72599 </option><option value="46094" > IFTITAH FILDZAH RISTANTI | 72363 </option><option value="48282" > IKA AYU ARDHANI | 76491 </option><option value="46909" > IKA YUNITA | 72544 </option><option value="47440" > IKBAR RASTUJAWI SINGGIH G | 76038 </option><option value="46516" > IMAM NAWAWI | 72493 </option><option value="48240" > INDAH PERMATA S | 76465 </option><option value="46582" > INDRA HARDIYANTO | 72220 </option><option value="47437" > INDRIANA WIDIA AYATI | 76035 </option><option value="47875" > INNAYATUL RUBY | 72364 </option><option value="46081" > INTAN SRI LESTARY | 72350 </option><option value="48304" > IRFAN WALIYURROCHIM | 76507 </option><option value="48239" > IRO BINTI CHAMAMI | 76464 </option><option value="47835" > IRSALINA RISQI MENTARI | 76338 </option><option value="48354" > ISMA LAILATUL AKBAR | 72216 </option><option value="47704" > ISNATUL MAHMUDA | 76273 </option><option value="46833" > JODIK H | 72147 </option><option value="46834" > JOPI TRIYANTO | 72570 </option><option value="47566" > JUWITA NOVITA SARI | 76182 </option><option value="46910" > KARTINI SETYAWATI | 72610 </option><option value="46811" > KHALIMATUL NINNA | 75033 </option><option value="46835" > KHILMATUS SADIYAH | 72974 </option><option value="48283" > KHOIRUN NISA | 76492 </option><option value="48261" > KHURIYATUL WAFIYAH | 76478 </option><option value="46869" > KHUSANAH PUTRI | 75104 </option><option value="46836" > KRISTIAN NUGROHO | 72571 </option><option value="46127" selected> KRISTIANA LINDA | 72259 </option><option value="48355" > LAILATUL MUHAROMAH | 72218 </option><option value="47729" > LARAS ARIPRATIWI | 76298 </option><option value="48206" > LARASATI ROMADHONA | 76461 </option><option value="48493" > LINTANG LUDFINZA P | 76580 </option><option value="48338" > LORENTIA ELSA A | 72201 </option><option value="48356" > LU LU UL MUKARROMAH | 72222 </option><option value="48494" > LULUK NURHAYATI | 76581 </option><option value="46870" > LURINSA | 72272 </option><option value="48357" > LUTHFI AJENG PAKARTI | 72246 </option><option value="48339" > MARA HIDAYATULLAH | 72202 </option><option value="48284" > MARATUS SHOLEHA | 76493 </option><option value="48285" > MARGARETHA G.S.C.A | 76494 </option><option value="48372" > MARIA ELYSABETH | 76540 </option><option value="45103" > MARIA NIKE DWI | 72760 </option><option value="48301" > MARIESTA FIRDHA AULIA | 76504 </option><option value="47438" > MARIYA ULFA | 76036 </option><option value="48495" > MARLINDA D | 76582 </option><option value="48241" > MAUDY GIVA P.P | 76466 </option><option value="48358" > MAULIDIYAH IRHAMI | 72247 </option><option value="48496" > MAYA DWI ANDINI | 76583 </option><option value="48262" > MAYA ULFA | 76479 </option><option value="46141" > MEGA PRATIWI | 72273 </option><option value="48340" > MERRY ANGRAENI | 72203 </option><option value="46872" > MIEKE KUSUMA H | 72423 </option><option value="48286" > MIFTAKHUL ZHUROH | 76495 </option><option value="47085" > MIMING ERVIKA SARI | 75247 </option><option value="46873" > MOCH ALFAN FA | 75054 </option><option value="48381" > MOCHAMAD TAUFIQ ISMAIL | 76549 </option><option value="48341" > MOH SULTON N | 72204 </option><option value="46176" > MOHAMMAD ARDHISAH K.D | 72293 </option><option value="46874" > MOKHAMAD ZAINUDIN | 72939 </option><option value="48342" > MONICE ANGGI L.R | 72205 </option><option value="47568" > MUHAMAD IKHWAN NURDIYANSAH | 76184 </option><option value="46129" > MUHAMMAD GHUFRON | 72261 </option><option value="46876" > MUHAMMAD RIDWAN | 72274 </option><option value="48484" > MUHAMMAD TAUFIQ ISMAILDWI | 76572 </option><option value="48359" > MUHAMMAD UDDY ASRORRY | 72248 </option><option value="48243" > MUHDOR | 76468 </option><option value="47706" > NAFIATUN NUR R | 76275 </option><option value="44963" > NANDA SHILFI A
 | 72709 </option><option value="48306" > NANIK FITRIA | 76509 </option><option value="48379" > NAUFAL ARAMINTA SALASA | 76547 </option><option value="48263" > NIKEN CLUDYA PRATIWI | 76480 </option><option value="46169" > NINIK RAHAYU W | 72285 </option><option value="48287" > NISRINA FITRININGTIAS | 76496 </option><option value="45151" > NISWATUN SAKINAH | 72823 </option><option value="47173" > NOVIA YANIWATI | 75318 </option><option value="48497" > NOVITA INDRIYANI | 76584 </option><option value="48254" > NOVITA ROHMAH | 72979 </option><option value="47681" > NOVIYANTI | 76217 </option><option value="47720" > NUR FADILAH | 76289 </option><option value="48377" > NUR HIKMAH | 76545 </option><option value="46877" > NUR UYUN | 75055 </option><option value="46878" > NURI AFINA R | 75106 </option><option value="48317" > NURKHOLIDA ZUHRIYAH | 76520 </option><option value="48343" > NURUL AKMALIA | 72206 </option><option value="48062" > NUTRI PUSPITA SARI | 72540 </option><option value="48376" > OCTAVIANA ROCHMAYANTI | 76544 </option><option value="48288" > POETRI MAHARANI S.D | 76497 </option><option value="44983" > PUJI PRASTIWI | 72729 </option><option value="46926" > PUTRA PERDANA | 72944 </option><option value="48498" > PUTRI ARUM K | 76585 </option><option value="47866" > PUTRI DEVIYAN NASARI | 72701 </option><option value="48374" > PUTRI FAIZATI ISNIA | 76542 </option><option value="48289" > PUTRI LILIANDARI | 76498 </option><option value="46817" > PUTRI WERDANI S | 72564 </option><option value="48378" > RAKHE YAKUB BAHTIAR | 76546 </option><option value="47104" > RATNA DEWI S | 75267 </option><option value="48499" > RAYSA AMILAH | 76586 </option><option value="47093" > REDITYA ANGGRAINI DWI WIBOWO | 75251 </option><option value="46818" > RENZY ISMI WIJAYANTI | 75035 </option><option value="47837" > REZA ADHITAMA | 76340 </option><option value="48299" > RHADA KRISTIANASYAH | 75032 </option><option value="46220" > RIANJANI N | 72381 </option><option value="48360" > RICHA PURBINAWATI N | 72249 </option><option value="47429" > RIFKY WICAKSONO | 76027 </option><option value="48500" > RINA TIYA L | 76587 </option><option value="46221" > RINDHA TRI A | 72382 </option><option value="47134" > RISKA AYU AJENG P | 75290 </option><option value="46823" > RISKA MAJIDA QHUSNA | 72504 </option><option value="48074" > RITA SEPTIANINGRUM | 76073 </option><option value="48290" > ROBBYNG BIMA | 76499 </option><option value="46187" > ROSIDI | 72369 </option><option value="47761" > RUDIYANTO | 75286 </option><option value="48307" > RULITA AYU PRATIWI | 76510 </option><option value="46846" > SANDRIA NINDY NORMALASARI | 72617 </option><option value="48291" > SERLY RIA DINASTI | 76500 </option><option value="48315" > SHAFIRA KIRANASARI AGUNG | 76518 </option><option value="48203" > SHARFINA NURUL ANGGRAINI | 76458 </option><option value="48267" > SIGIT NUGRAHA | 76484 </option><option value="46826" > SIGIT PUTRA AGUNG | 72936 </option><option value="48242" > SILVIA ANISA K | 76467 </option><option value="48310" > SILVIA PUTRI YULIANTI | 76513 </option><option value="47713" > SINTA DWI RAHAYU | 76282 </option><option value="46929" > SITI AFIYAH DINIATI | 72992 </option><option value="47095" > SITI MUKARRAMAH | 75252 </option><option value="46847" > SITI NUR HIDAYATI | 72191 </option><option value="48373" > SRI RETNO MIA WARDANI | 76541 </option><option value="48501" > SUCI LESTARI | 76588 </option><option value="46930" > SURYA DWI NINGTYAS | 72436 </option><option value="46134" > SURYANING HAPSARI | 72266 </option><option value="47140" > SUSYANA FIRNANDA | 75296 </option><option value="46849" > SUTIK RAHAYU ENDAH SRI | 72526 </option><option value="48361" > SYIFA KIRANA SYAHPUTRI | 72250 </option><option value="48292" > SYLVIANA Q.A | 76501 </option><option value="48293" > TAUFAN HARI PRATAMA | 76502 </option><option value="47755" > TETO PRASETYA | 76297 </option><option value="47170" > TIRTA AQURATA ARJUNNI | 75315 </option><option value="48266" > TRIA SYAFITRI | 76483 </option><option value="47171" > TRIELLA ARI KUSUMA | 75316 </option><option value="48362" > TRINANDHA YUDHA ISMOYO | 72251 </option><option value="47098" > TUTI PURWANINGSIH | 75270 </option><option value="46932" > ULFA NIA | 72545 </option><option value="48309" > VINTA RACHMA ARDYANTI | 76512 </option><option value="48265" > WAHYU | 76482 </option><option value="48205" > WIDA AYU PRAMESTI W.N | 76460 </option><option value="46937" > WIWIN YULIANAH | 72993 </option><option value="46885" > YOGHA SRIWANDHANI | 72352 </option><option value="48294" > YOZEGA LIMAS D.R | 76503 </option><option value="46092" > YUAN ANDIKA | 72361 </option><option value="47431" > YULIANA ERNAWATI | 76029 </option><option value="46098" > YUSNI EFFENDI | 72368 </option><option value="46887" > ZAZAN M | 75019 </option>	</select>
	</td>  
    
</tr>
<tr>
    <td width="15%" align ="left"><strong>Dinilai&nbsp;</strong></td>
    <td width="50%" align ="left" >: 
	<select name="sheet">
	<option value="spv" selected>Supervisor</option><option value="tabber"> Tabber </option>	</select>
	</td>  
    
</tr>
<tr>
    <td colspan ="2" width="15%" align ="center"><input type="submit" name="enter" value="Enter" />
	</td>    
</tr>

</table>
</td></tr></table>

<table width="100%" border="0" cellpadding="4" cellspacing="3" class="bodyline">	
	<tr>
	
		<td bordercolor="#60729B"><font style="font-size:15px" face="Verdana" color="#000000">
		<img src="https://ecc.ft.ugm.ac.id/public/employer_logo/60280/large_1418973458infomedia%20logo.png"> 
		<br><b>FORM PENGUJIAN CALL (TAPPING) AGENT<br>
		<b>LAYANAN CC TELKOM</b></b><br>
		<br>Nama Agent / LOGIN&nbsp;: KRISTIANA LINDA / 72259		<br>Lokasi Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: MALANG
		<br>Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: NOVEMBER 2018		<br>Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Tier 1 Agent Komplain		<br>Data Panggilan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:	

		</font></td>
		
	</tr>	
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="0" class="bodyline">
	<tr>
		<td bordercolor="#60729B" align="center">
<div ><table border=0 width=95% height=80><tr><td width=80 align=center bgcolor=#808080> Tanggal </td>
			<td width=50 align=center bgcolor=#808080> Sample </td>
			<td width=50 align=center bgcolor=#808080> (Informasi/Permintaan/Komplain) </td>
			<td width=80 align=center bgcolor=#808080> RecordId </td>
			<td width=120 align=center bgcolor=#808080> Tgl Record </td>
			<td width=120 align=center bgcolor=#808080> Jam </td>
			<td width=60 align=center bgcolor=#808080> Durasi </td>
			<td align=center bgcolor=#808080> Customer Needs </td>
			<td align=center bgcolor=#808080> Service Technique </td>
			<td align=center bgcolor=#808080> QM </td>
			<td width=150 align=center bgcolor=#808080> Rekomendasi </td></tr><tr><td align=center bgcolor=#f3f3f3>2018-11-04</td>
			<td align=center bgcolor=#f3f3f3>#1</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3>0000-00-00</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#ed1c1c>70</td>
			<td align=center bgcolor=#aaa5a5>30</td>
			<td align=center bgcolor=#666161>100</td>
			<td align=center bgcolor=#f3f3f3> </td>
			
			</tr><tr><td align=center bgcolor=#f3f3f3>2018-11-05</td>
			<td align=center bgcolor=#f3f3f3>#2</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3>0000-00-00</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#ed1c1c>70</td>
			<td align=center bgcolor=#aaa5a5>30</td>
			<td align=center bgcolor=#666161>100</td>
			<td align=center bgcolor=#f3f3f3> </td>
			
			</tr><tr><td align=center bgcolor=#f3f3f3>2018-11-15</td>
			<td align=center bgcolor=#f3f3f3>#3</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3>0000-00-00</td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#f3f3f3></td>
			<td align=center bgcolor=#ed1c1c>70</td>
			<td align=center bgcolor=#aaa5a5>30</td>
			<td align=center bgcolor=#666161>100</td>
			<td align=center bgcolor=#f3f3f3> </td>
			
			</tr><tr><td width=80 align=center bgcolor=#808080> </td>
			<td width=50 align=center bgcolor=#808080>  </td>
			<td width=50 align=center bgcolor=#808080></td>
			<td width=80 align=center bgcolor=#808080> </td>
			<td width=120 align=center bgcolor=#808080></td>
			<td width=120 align=center bgcolor=#808080></td>
			<td width=60 align=center bgcolor=#808080></td>
			<td align=center bgcolor=#808080> </td>
			<td align=center bgcolor=#808080> Total Qm </td>
			<td align=center bgcolor=#000000><font color="#FFFFFF" size="2">  18,75</font> </td>
			<td width=150 align=center bgcolor=#808080> KURANG SEKALI </td></tr></table></div>
<table border="0" width="95%"cellpadding="2" cellspacing="1" style="border-collapse: collapse"  class="bodyline">

<br><br>
<tr>
 <td rowspan="2" width="2%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b> No </font> </b></td>
 <td rowspan="2" width="40%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b> Parameter </b></font>
 <td rowspan="2" width="5%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b> Bobot </b></font>
 <td colspan="3" width="10%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b>  Nilai </b></font>
 <td rowspan="2" width="5%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b> Rata rata </b></font>
 <td rowspan="2" width="5%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"><b> Keterangan </b></font>
</tr>
<tr>
<td  width="2%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"> 1 </font></td><td  width="2%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"> 2 </font></td><td  width="2%" align="center" bgcolor="#808080"><font color="#FFFFFF" size="2"> 3 </font></td></tr><tr>
    <td colspan="8" bgcolor="#FFFFFF" align="left"><font color="#000000" size="2"><b>Customer needs
 </b></font></td>
	</tr>
	<tr>
    <td align="left" bgcolor="#dde6ff"> 1.</td>
    <td align="left" bgcolor="#dde6ff"> a. Menggali kebutuhan / permasalahan pelanggan berdasarkan data (profil pelanggan, history transaksi) pada aplikasi<br>
b. Memberikan SOLUSI / INFORMASI sesuai kebutuhan pelanggan dan SOP yang berlaku<br>c. Melakukan ESKALASI dengan tepat jika diperlukan </td>
	<td align="center" bgcolor="#dde6ff">70 </td>
	
	<td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">70</td><td align="center" bgcolor="#dde6ff"></td>	 
	
</tr>
<tr>
    <td colspan="2" bgcolor="#FF1000" align="center"><font color="#FFFFFF" size="2"><b>TOTAL Customer needs
 </b></font></td>
	<td bgcolor="#FF1000" align="center"><font color="#FFFFFF" size="2"><b>70</b></font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 70</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 70</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 70</font></td><td  width="2%" align="center" bgcolor="##FF1000"><font color="#FFFFFF" size="2"> 13.13</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"></font></td></tr><tr>
    <td colspan="8" bgcolor="#FFFFFF" align="left"><font color="#000000" size="2"><b>Service technique
 </b></font></td>
	</tr>
	<tr>
    <td align="left" bgcolor="#dde6ff"> 2.</td>
    <td align="left" bgcolor="#dde6ff"> Mampu merespon pelanggan dengan komunikasi skill  sesuai etika bertelepon yang baik 
 </td>
	<td align="center" bgcolor="#dde6ff">30 </td>
	
	<td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">1</td><td align="center" bgcolor="#dde6ff">30</td><td align="center" bgcolor="#dde6ff"></td>	 
	
</tr>
<tr>
    <td colspan="2" bgcolor="#FF1000" align="center"><font color="#FFFFFF" size="2">
      <b>TOTAL Service technique</b></font></td>
	<td bgcolor="#FF1000" align="center">
    <font color="#FFFFFF" size="2"><b>30</b>
    </font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 30</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 30</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 30</font></td><td  width="2%" align="center" bgcolor="##FF1000"><font color="#FFFFFF" size="2"> 5.63</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"></font></td></tr><tr>
    <td colspan="8" bgcolor="#FFFFFF" align="left"><font color="#000000" size="2"><b>SOLUSI LAYANAN </b></font></td>
	</tr>
<tr>
    <td colspan="2" bgcolor="#FF1000" align="center"><font color="#FFFFFF" size="2"><b>TOTAL SOLUSI LAYANAN </b></font></td>
	<td bgcolor="#FF1000" align="center"><font color="#FFFFFF" size="2"><b>0</b></font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 0</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 0</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"> 0</font></td><td  width="2%" align="center" bgcolor="##FF1000"><font color="#FFFFFF" size="2"> 0</font></td><td  width="2%" align="center" bgcolor="#FF1000"><font color="#FFFFFF" size="2"></font></td></tr><td  colspan="2" width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"><b> QUALITY MONITORING SCORE </b></font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> 100 </font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> 100 </font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> 100 </font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> 100 </font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> 18,75 </font></td><td  width="2%" align="center" bgcolor="#000000"><font color="#FFFFFF" size="2"> <b>KURANG SEKALI</b> </font></td></div>











</td></tr></table>
<br /><div align="center"></div>
<!-- PLEASE DO NOT TOUCH THE NEXT LINE(s).
YOU CAN ONLY ADD TO IT IF YOU MODIFY THIS THEME :) -->
<br>
<div align="center"><font class="small">
.: Portal Contact Center TELKOM Jatim fully constructed and partially managed by :: IT Contact Center Telkom Surabaya :: &copy; 2007 :.</font></div>
<small>
</small>
</body></html>