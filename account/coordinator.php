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
	<title>Coordinator - SEV Coi</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body>

	<!-- ==================== Modal ==================== -->
	<form id="modal" method="post" action="action/add-coordinator.php">
		<div class="modal-box">
			<button type="button" class="exit-btn" onclick="showModal();">✖</button>
			<div class="grid-2">
				<div class="grid-item">
					<p class="grid-name">Coordinator's Code</p>
					<input type="text" name="coordinators_code" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Coordinator</p>
					<input type="text" name="coordinator" class="grid-int">
				</div>
			</div><br>
			<button class="btn-new" name="add_coordinator">ADD COORDINATOR</button>
		</div>
	</form>
	<!-- ==================== Navigation bar end ==================== -->

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
			<p class="page-title">Coordinator</p>
			<!-- ==================== Table ==================== -->
			<div class="table-div">
				<div class="table-flex">
					<div class="table-flex-left">
						<button class="btn-new" onclick="showModal();">+ NEW</button>
					</div>
					<div class="table-flex-right">
						<input type="text" placeholder="Search for coordinator..." class="table-search" id="search" onkeyup="searchMember()">
					</div>
				</div>
				<table id="table">
					<thead>
						<tr>
							<th>coordinator's code</th>
							<th>coordinator</th>
							<th>Tools</th>
						</tr>
					</thead>
					<?php 
						$sql = "SELECT * FROM coordinator ORDER BY id DESC";
						$res = mysqli_query($link, $sql);

						if (mysqli_num_rows($res) == 0) {
							echo "<div class='none'>No Coordinators to show<div>";
						}
						else{
							while ($result = mysqli_fetch_assoc($res)) {
					?>
					<tbody>
						<tr>
							<td><?php echo $result['coordinators_code']?></td>
							<td><?php echo $result['coordinator']?></td>
							<td>
								<a href="view-handled-members.php?viewid=<?php echo $result['coordinators_code']?>" class="btn-edit">view handled members</a>
								<a href="#" onclick="window.open('pdf/coordinator.php?viewid=<?php echo $result['coordinators_code']?>')" class="btn-view">print data</a>
								<a href="action/delete-coordinator.php?viewid=<?php echo $result['id']?>" class="btn-delete">delete</a>
							</td>
						</tr>
					</tbody>
					<?php
							}
						}
					?>
				</table>
			</div>
			<!-- ==================== Table end ==================== -->
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

	<script src="js/search-filter.js"></script>
	<script src="js/show-modal.js"></script>
</body>
</html>