<?php
// Error log
ini_set('display_errors', 1);

// Site Traffic Tracker
include_once('backend/sitetraffic_tracker.php');

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

				<table class="table col-12">
					<thead id="caseHead">
						<tr>
							<th>စဉ်</th>
							<th>နိုင်ငံအမည်</th>
							<th>စုစုပေါင်းဖြစ်ရပ်များ</th>
							<th>သေဆုံးမှုများ</th>
							<th></th>
						</tr>
					</thead>
					

					<tbody id="caseBody">
						
					</tbody>
					

				</table>

				<!-- End of country contents. -->

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
		<div class="col-md-3">
			<div class="fix" id="emergencyPhoneWrap">
				<header id="emergencyPhoneTitle"><b>အရေးပေါ်ဆက်သွယ်ရန်ဖုန်းနံပါတ်များ</b></header>

				<div class="phones">
					<header><b>ပြည်သူ့ကျန်းများရေး အရေးပေါ်တုန့်ပြန်ရေးဌာန</b></header>
					<div>၀၆၇ ၃၄၂၀၂၆၈</div>
<<<<<<< HEAD
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
=======
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
>>>>>>> fe02a51cfff30b6e0b1506681494cf8b28762bfd
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
<script src="backend/js/cases_by_country.js"></script>

</body>
</html>