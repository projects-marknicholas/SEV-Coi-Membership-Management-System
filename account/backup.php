<?php
require_once '../config.php';
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Branch - SEV Coi</title>
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
			<p class="page-title">Backup</p>
			<!-- ==================== Table ==================== -->
			<div class="table-div">
				<div class="table-flex">
					<div class="table-flex-left">
						<button class="btn-new" onclick="window.location.href = 'backup-all-files.php';">EXPORT MEMBERS DATA</button>
					</div>
				</div>
			</div>
			<div class="table-div">
				<div class="table-flex">
					<div class="table-flex-left">
						<button class="btn-new" onclick="window.location.href = 'backup-all-payments.php';">EXPORT PAYMENTS DATA</button>
					</div>
				</div>
			</div>
			<!-- ==================== Table end ==================== -->

			<!-- ==================== Table ==================== -->
			<form method="post" action="action/import-members.php" enctype="multipart/form-data" class="table-div" style="width: calc(100% - 20px); padding: 10px;">
				<label>
					<input type="file" name="excel" required value="">
				</label><br><br>
				<button type="submit" name="import_members" class="btn-new">IMPORT MEMBERS DATA</button>
			</form>
			<form method="post" action="action/import-payments.php" enctype="multipart/form-data" class="table-div" style="width: calc(100% - 20px); padding: 10px;">
				<label>
					<input type="file" name="excel" required value="">
				</label><br><br>
				<button type="submit" name="import_payments" class="btn-new">IMPORT PAYMENTS DATA</button>
			</form>
			<!-- ==================== Table end ==================== -->
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

</body>
</html>