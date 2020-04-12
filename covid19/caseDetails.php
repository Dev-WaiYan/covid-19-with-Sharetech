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
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="fix" id="emergencyPhoneWrap">
				<header id="emergencyPhoneTitle"><b>အရေးပေါ်ဆက်သွယ်ရန်ဖုန်းနံပါတ်များ</b></header>

				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
				</div>
				<div class="phones">
					<header><b>ရန်ကုန်ပြည်သူ့ဆေးရုံကြီး</b></header>
					<div>၀၉-၁၂၃၄၅၆၇၈၉</div>
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
		<a href="cases.html">ဖြစ်ရပ်များ</a>
	</div>
	<div class="navigationItems">
		<a href="localNews.html">ပြည်တွင်းသတင်းများ</a>
	</div>
	<div class="navigationItems">
		<a href="globalNews.html">ပြည်ပသတင်းများ</a>
	</div>
	<div class="navigationItems">
		<a href="avoidableThings.html">ဆောင်ရန် နှင့် ရှောင်ရန်များ</a>
	</div>
	<div class="navigationItems">
		<a href="aboutUs.html">Sharetech အကြောင်း</a>
	</div>
</nav>

<div id="smallNavigation">
	<div class="smallNavigationItems">
		<a href="cases.html">ဖြစ်ရပ်များ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="localNews.html">ပြည်တွင်းသတင်းများ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="globalNews.html">ပြည်ပသတင်းများ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="avoidableThings.html">ဆောင်ရန် နှင့် ရှောင်ရန်များ</a>
	</div>
	<div class="smallNavigationItems">
		<a href="aboutUs.html">Sharetech အကြောင်း</a>
	</div>
	<div class="smallNavigationItems">
		<a href="emergencyPhone.html">အရေးပေါ်ဖုန်းနံပါတ်များ</a>
	</div>
	<div id="smallNavigationCancel" class="smallNavigationItems">
		Cancel
	</div>
</div>

<div id="navigationMenu">
	Menu
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