<?php
require_once '../config.php';
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}

if (isset($_GET['memberid'])) {
	$sql = "SELECT * FROM member WHERE id = '".$_GET['memberid']."'";
	$res = mysqli_query($link, $sql);

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?>'s Ledger - SEV Coi</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body>

	

	<!-- ==================== Navigation bar ==================== -->
	<nav>
		<div class="nav-left">
			<img src="img/logo.png" class="logo">
		</div>
		<div class="nav-right">
			<a href="../logout.php"><img src="svg/logout.svg" class="logout"></a>
		</div>
	</nav>
	<!-- ==================== Navigation bar end ==================== -->




	<div class="flex-sidebar">
		<!-- ==================== Side bar ==================== -->
		<div class="sidebar">
			<a href="./" class="sidebar-anchor">
				<div class="sidebar-anchor-div">dashboard</div>		
			</a>
			<a href="membership.php" class="sidebar-anchor">
				<div class="sidebar-anchor-div">membership</div>		
			</a>
			<a href="payment.php" class="sidebar-anchor">
				<div class="sidebar-anchor-div">payment</div>		
			</a>
			<a href="coordinator.php" class="sidebar-anchor">
				<div class="sidebar-anchor-div">coordinator</div>		
			</a>
			<a href="branch.php" class="sidebar-anchor">
				<div class="sidebar-anchor-div">branch</div>		
			</a>
			<a href="backup.php" class="sidebar-anchor">
				<div class="sidebar-anchor-div">backup files</div>		
			</a>
		</div>
		<!-- ==================== Side bar end ==================== -->

		<!-- ==================== Main bar ==================== -->
		<main>
			<p class="page-title">You are viewing <span class="view-data">"<?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?><span style="text-transform: lowercase;">'s</span>"</span> payment.</p>

			<?php
				$s_sql = "SELECT* FROM payment WHERE id = '".$_GET['id']."' AND payment_id = '".$_GET['memberid']."'";
				$s_res = mysqli_query($link, $s_sql);

				if (mysqli_num_rows($s_res) > 0) {
					while ($fetch = mysqli_fetch_assoc($s_res)) {
			?>
			<form method="post" action="action/edit-payment.php" class="view-data-form">
				<button class="btn-new" style="margin-top: 15px;" name="save_changes" onclick="showModal();">SAVE CHANGES</button><br><br>
				<div class="grid-6">
					<div class="grid-item">
						<p class="grid-name">OR No.</p>
						<input type="text" name="id" class="grid-int" value="<?php echo $_GET['id']?>" hidden>
						<input type="text" name="memberid" class="grid-int" value="<?php echo $_GET['memberid']?>" hidden>
						<input type="text" name="or_no" class="grid-int" value="<?php echo $fetch['or_no']?>">
					</div>
					<div class="grid-item">
						<p class="grid-name">Date</p>
						<input type="text" name="payment_date" class="grid-int" value="<?php echo $fetch['payment_date']?>">
					</div>
					<div class="grid-item">
						<p class="grid-name">Amount Collected</p>
						<input type="text" name="amount_collected" class="grid-int" value="<?php echo $fetch['amount_collected']?>">
					</div>
					<div class="grid-item">
						<p class="grid-name">Month</p>
						<input type="text" name="payment_month" class="grid-int" value="<?php echo $fetch['payment_month']?>">
					</div>
					<div class="grid-item">
						<p class="grid-name">Running Total</p>
						<input type="text" name="running_total" class="grid-int" value="<?php echo $fetch['running_total']?>">
					</div>
					<div class="grid-item">
						<p class="grid-name">COLL SIGN</p>
						<input type="text" name="coll_sign" class="grid-int" value="<?php echo $fetch['coll_sign']?>">
					</div>
				</div><br>
			</form>
			<?php
					}
				}
			?>
			<br><br>
		
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

	<script src="js/show-modal.js"></script>
</body>
</html>
<?php
			}
		}
	}
?>