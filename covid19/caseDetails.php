<!DOCTYPE html>
<html>
<head>
	<title>COVID-19 Cases</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/library/bootstrap/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>

<div id="overlay"></div>

<div class="container">
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<!-- ------------------------------------------------------------
-----------------------------------------------------------------
						Detail Case
-----------------------------------------------------------------
------------------------------------------------------------- -->
<div id="detailCase">
				<input type="hidden" id="list_id" value=""></span>
				<h6 id="detailCaseTitle"><b> <span id="detail_country_name"></span> တွင် ဖြစ်ရပ်ပေါင်း ( <span id="country_total_cases"></span> ) ဖြစ်ရပ် ရှိနေပြီဖြစ်သည်။</b></h6>

				<table border="0">
					<tr>
						<td>ဖြစ်ရပ်အသစ်များ</td>
						<td id="detail_new_cases"> - </td>
					</tr>
					<tr>
						<td>လတ်တလောဖြစ်ရပ်များ</td>
						<td id="detail_active_cases"></td>
					</tr>
					<tr>
						<td>စိုးရမ်ရသောလူနာများ</td>
						<td id="detail_serious_cases"></td>
					</tr>
					<tr>
						<td>ဖြစ်ပွားပြီး + ဖြစ်ပွားဆဲ စုစုပေါင်း</td>
						<td id="detail_total_cases"></td>
					</tr>
					<tr>
						<td>သေဆုံးမှုများ</td>
						<td id="detail_total_deaths"></td>
					</tr>
					<tr>
						<td>ပြန်လည်ကောင်းမွန်မှုများ</td>
						<td id="detail_total_recovered"></td>
					</tr>
				</table>

				<br>
				<div id="caseDetailsPreviousPage">
					<a onclick="hideDetails()">ရှေ့စာမျက်နှာသို့</a>
				</div>
			</div>
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						End of Detail Case
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
		</div>





<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						Emergency Phone Numbers
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
		<div class="col-md-3">
			<div class="fix" id="emergencyPhoneWrap">
				<header id="emergencyPhoneTitle"><b>အရေးပေါ်ဆက်သွယ်ရန်ဖုန်းနံပါတ်များ</b></header>

				<div class="phones">
					<header><b>ပြည်သူ့ကျန်းများရေး အရေးပေါ်တုန့်ပြန်ရေးဌာန</b></header>
					<div>၀၆၇ ၃၄၂၀၂၆၈</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်တိုင်းဒေသကြီး ပြည်သူ့ကျန်းမားရေး ဦးစီးဌာန</b></header>
					<div>၀၉ ၄၄၉၀၀၁၂၆၁၊ ၀၉ ၇၉၄၅၁၀၀၅၇</div>
				</div>
				<div class="phones">
					<header><b>မန္တလေးတိုင်းဒေသကြီး ပြည်သူ့ကျန်းမားရေး ဦးစီးဌာန</b></header>
					<div>၀၉ ၂၀၀၀၃၄၄၊ ၀၉ ၄၃၀၉၉၅၂၆</div>
				</div>
				<div class="phones">
					<header><b>Yangon Airport Health Quarantine Unit</b></header>
					<div>၀၉ ၇၉၉၉၈၃၈၃၃</div>
				</div>
				<div id="sharetech"><b>Powered by Sharetech</b></div>
			</div>
		</div>

<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
					End of Emergency Phone Numbers
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
	</div>
</div>






<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
							Navigation Bar
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->

<nav id="navigation">
	<div class="navigationItems">
		<a href="cases.php">ဖြစ်ရပ်များ</a>
	</div>
	<div class="navigationItems">
		<a href="localNews.php">ပြည်တွင်းသတင်းများ</a>
	</div>
	<div class="navigationItems">
		<a href="globalNews.php">ပြည်ပသတင်းများ</a>
	</div>
	<div class="navigationItems">
		<a href="avoidableThings.php">ဆောင်ရန် နှင့် ရှောင်ရန်များ</a>
	</div>
	<div class="navigationItems">
		<a href="aboutUs.php">Sharetech အကြောင်း</a>
	</div>
</nav>

<div id="smallNavigation">
	<div class="smallNavigationItems">
		<a href="cases.php">ဖြစ်ရပ်များ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="localNews.php">ပြည်တွင်းသတင်းများ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="globalNews.php">ပြည်ပသတင်းများ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="avoidableThings.php">ဆောင်ရန် နှင့် ရှောင်ရန်များ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="aboutUs.php">Sharetech အကြောင်း</a>
	</div>
	<div class="smallNavigationItems">
		<a href="emergencyPhone.php">အရေးပေါ်ဖုန်းနံပါတ်များ</a>
	</div>
	<div id="smallNavigationCancel" class="smallNavigationItems">
		Cancel
	</div>
</div>

<div id="navigationMenu">
	<div class="text-left"><b>Powered by Sharetech</b></div>
	<div class="text-right">Menu</div>
</div>
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						End of Navigation Bar
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->




<!-- jQuery JS -->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<!-- Custom JS -->
<script type="text/javascript" src="assets/js/custom.js"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="assets/library/bootstrap/js/bootstrap.min.js"></script>
<!-- Popper JS -->
<script type="text/javascript" src="assets/library/bootstrap/js/popper.min.js"></script>


<!-- Backend JS -->
<script src="backend/js/cases_details.js"></script>

<script>
    // Helper function to show details.
    showDetails(<?php echo $_GET['lis']; ?>);
</script>

</body>
</html>