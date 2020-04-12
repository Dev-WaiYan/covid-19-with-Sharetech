<?php
// Error log
ini_set('display_errors', 1);

// Call DB connection.
require('backend/db_conn.php');

// Get Myanmar record from DB.
$stmt = $conn->prepare("SELECT * FROM country_myanmar WHERE id = ( SELECT MAX(id) from country_myanmar )");
$stmt->execute();
$result = $stmt->fetch();

?>


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
						Myanmar Case
-----------------------------------------------------------------
------------------------------------------------------------- -->
<div id="myanmarCase">
				<h6 id="myanmarCaseTitle"><b>မြန်မာနိုင်ငံတွင် ဖြစ်ရပ်ပေါင်း ( <?php echo $result['total_case'] ?> ) ဖြစ်ရပ် ရှိနေပြီဖြစ်သည်။</b></h6>

				<table border="0">
					<tr>
						<td>ဖြစ်ရပ်အသစ်များ</td>
						<td> - <?php echo $result['new_case'] ?></td>
					</tr>
					<tr>
						<td>လတ်တလောဖြစ်ရပ်များ</td>
						<td> - <?php echo $result['active_case'] ?></td>
					</tr>
					<tr>
						<td>စိုးရမ်ရသောလူနာများ</td>
						<td> - <?php echo $result['serious_case'] ?></td>
					</tr>
					<tr>
						<td>ဖြစ်ပွားပြီး + ဖြစ်ပွားဆဲ စုစုပေါင်း</td>
						<td> - <?php echo $result['total_case'] ?></td>
					</tr>
					<tr>
						<td>သေဆုံးမှုများ</td>
						<td> - <?php echo $result['total_death'] ?></td>
					</tr>
					<tr>
						<td>ပြန်လည်ကောင်းမွန်မှုများ</td>
						<td> - <?php echo $result['total_recovered'] ?></td>
					</tr>
				</table>
			</div>
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						End of Myanmar Case
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->


<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
							Global Case
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
			<div id="globalCase">
				<h6 id="globalCaseTitle"><b>ကမ္ဘာတစ်ဝှမ်းဖြစ်ရပ်များ</b></h6>

				<div id="globalCaseTableTitle">
					<span class="globalCaseTableTitleNum"><b>စဉ်</b></span>
					<span class="globalCaseTableTitleCountry"><b>နိုင်ငံအမည်</b></span>
					<span class="globalCaseTableTitleTotal"><b>စုစုပေါင်းဖြစ်ရပ်များ</b></span>
					<span class="globalCaseTableTitleDeath"><b>သေဆုံးမှုများ</b></span>
				</div>

				<!-- Country contents are here. -->
			</div>
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						End of Global Case
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
<script src="backend/js/cases_by_country.js"></script>

</body>
</html>