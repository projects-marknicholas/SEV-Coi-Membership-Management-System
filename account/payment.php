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
	<title>Payment - SEV Coi</title>
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
			<p class="page-title">Payment</p>
			<!-- ==================== Table ==================== -->
			<div class="table-div">
				<div class="table-flex">
					<div class="table-flex-right">
						<input type="text" placeholder="Search for members..." class="table-search" id="search" onkeyup="searchMember()">
					</div>
				</div>
				<table id="table">
					<thead>
						<tr>
							<th>certificate no.</th>
							<th>member's name</th>
							<th>MOP</th>
							<th>M.FEE</th>
							<th>effectivity</th>
							<th>program type</th>
							<th>coordinator</th>
							<th>collector</th>
							<th>status</th>
							<th>tools</th>
						</tr>
					</thead>
					<?php
						$sql = "SELECT * FROM member ORDER BY id DESC";
						$res = mysqli_query($link, $sql);

						if (mysqli_num_rows($res) > 0) {
							while($result = mysqli_fetch_assoc($res)){
					?>
					<tbody>
						<tr>
							<td><?php echo $result['application_no']?></td>
							<td><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?></td>
							<td><?php echo $result['mode_of_payment']?></td>
							<td><?php echo $result['membership_fee']?></td>
							<td><?php echo $result['effectivity']?></td>
							<td><?php echo $result['sev_package']?></td>
							<td><?php echo $result['coordinator']?></td>
							<td><?php echo $result['collector']?></td>
							<td class="<?php echo $result['application_status']?>"><?php echo $result['application_status']?></td>
							<td>
								<a href="view-payment.php?memberid=<?php echo $result['id']?>" class="btn-edit">edit</a>
								<a href="#" onclick="window.open('pdf/?memberid=<?php echo $result['id']?>')" class="btn-view">print</a>
							</td>
						</tr>
					</tbody>
					<?php
							}
						}
						else{
							echo '<div class="none">No payments to show</div>';
						}
					?>
				</table>
			</div>
			<!-- ==================== Table end ==================== -->
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

	<script src="js/search-filter.js"></script>
</body>
</html>