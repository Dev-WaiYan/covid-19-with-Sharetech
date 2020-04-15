<?php

// Error log
ini_set('display_errors', 1);

// Call DB connection.
require('backend/db_conn.php');

// Site Traffic Tracker
include_once('backend/sitetraffic_tracker.php');


// Get local news details from DB.
$stmt = $conn->prepare("SELECT * FROM local_news WHERE id = :id");

$stmt->bindParam(':id',$id);

$id = $_GET['new_in'];

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
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						News Details
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
			<div id="newsDetailsWrap">
				<h6><b>ပြည်တွင်းသတင်းများ</b></h6>
				<hr>
			</div>
			<br>


			<div class="newsDetailsBox">
				<h6><b><?php echo $result['news_title']; ?></b></h6>
				<img src="<?php echo 'localnews_img/' . $result['img'] ?>" class="card-img" alt="ပုံမရှိပါ!">
				<div class="newsDetailsAlert">
						<div class="newsDetailsInfo">နောက်ဆုံးရ</div>
						<div>
							<b class="newsDetailsDate">
							<!-- News Date and Time -->
								<?php 
									$unixTime = time();
									$createdTime = intval( strtotime($result['created_time']) );
									$diff = $unixTime - $createdTime;
									
									if($diff < 60) {
										echo $diff . " - second ago ";
									} else if($diff >= 60 && $diff < 3600) {
										echo intval($diff/60) . "-min ago ";
									} else if($diff >= 3600 && $diff < 86400) {
										echo intval($diff/3600) . "-hour ago ";
									} else {
										echo $result['recorded_time'] . ' ' . $result['am_pm'] ;
									}
								?>
							<!-- News Date and Time -->
							</b>
							<b> (GMT+6:30)</b>
						</div>
				</div>
				<hr>
				<p>
					<?php echo nl2br($result['news_body']); ?> 		
				</p>
			</div>
			<div id="newsDetailsPreviousPage">
				<a onclick="( function(){ window.history.back(); } ) ();">ရှေ့စာမျက်နှာသို့</a>
			</div>
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						End Of News Details
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
</body>
</html>