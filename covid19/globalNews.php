<?php

// Error log
ini_set('display_errors', 1);

// Call DB connection.
require('backend/db_conn.php');

// Site Traffic Tracker
include_once('backend/sitetraffic_tracker.php');


// Get global news list from DB.
$stmt = $conn->prepare("SELECT * FROM global_news ORDER BY id DESC");
$stmt->execute();
$result = $stmt->fetchAll();

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
		<div class="col-lg-9 col-md-9 offset-md-0 col-sm-10 offset-sm-1 col-12">
<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
								News
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
			<div id="newsDetailsWrap">
				<h6><b>ပြည်ပသတင်းများ</b></h6>
				<hr>
			</div>
			<br>


<?php foreach($result as $row) { ?>
<!-- -------------------newBox--------------------- -->

			<div class="newsBoxes card">
				  <div class="row no-gutters">
				  	<!-- newsBox Image -->
				    <div class="col-md-4">
					<img src="<?php echo 'globalnews_img/' . $row['img'] ?>" class="card-img" alt="ပုံမရှိပါ!">
				    </div>
				  	<!-- End of newsBox Image -->

				    <div class="col-md-8 newsBoxText">
				      <div class="card-body">
				      	<!-- newsBox date and time -->
				      	<div class="localNewsDetailsAlert">
							<div class="newsDetailsInfo">
								နောက်ဆုံးရ
							</div>
							<div>
								<b class="newsDetailsDate">
								<!-- News Date and Time -->
								<?php 
									$unixTime = time();
									$createdTime = intval( strtotime($row['created_time']) );
									$diff = $unixTime - $createdTime;
									
									if($diff < 60) {
										echo $diff . " - second ago ";
									} else if($diff >= 60 && $diff < 3600) {
										echo intval($diff/60) . "-min ago ";
									} else if($diff >= 3600 && $diff < 86400) {
										echo intval($diff/3600) . "-hour ago ";
									} else {
										echo $row['recorded_time'] . ' ' . $row['am_pm'] ;
									}
								?>
								<!-- News Date and Time -->
								</b>
								<b> (GMT+6:30)</b>
							</div>
						</div>
				      	<!-- End of newsBox date and time -->

				        <header class="newsBoxTitle card-title">
							<b><?php echo $row['news_title']; ?></b>
				        </header>

				        <!-- newsBox text -->
				        <div class="newsText">
				        	<p class="card-text">
								<?php echo substr($row['news_body'],0,555) . ' ...'; ?>
							</p>
				        </div>
				        
				        <!-- End of newsBox text -->

				        <div class="newsReadmore">
							<a href="<?php echo 'globalNewsdetails.php?new_in=' . $row['id'] ?>">ဆက်လက်ဖတ်ရှုရန်</a>
				        </div>
				      </div>
				    </div>
				  </div>
			</div>
<!-- --------------End of newBox--------------------- -->
<?php } ?>


<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
							End Of News
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
		</div>




<!-- --------------------------------------------------------------------
-------------------------------------------------------------------------
						Emergency Phone Numbers
-------------------------------------------------------------------------
--------------------------------------------------------------------- -->
		<div class="col-md-3 col-sm-3">
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
</body>
</html>