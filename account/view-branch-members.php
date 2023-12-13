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
			<?php
				$my_sql = "SELECT * FROM branch WHERE branch_code = '".$_GET['viewid']."' ORDER BY id DESC";
				$my_res = mysqli_query($link, $my_sql);

				if (mysqli_num_rows($my_res) > 0) {
					while ($my_result = mysqli_fetch_assoc($my_res)) {
			?>
			<p class="page-title">You are viewing <span class="view-data">"<?php echo $my_result['branch']?><span style="text-transform: lowercase;">'s</span>"</span> branch members.</p>
			<?php
					}
				}
			?>
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
							<th>application no.</th>
							<th>applicant name</th>
							<th>coordinator's code</th>
							<th>coordinator</th>
							<th>branch code</th>
							<th>branch</th>
							<th>status</th>
						</tr>
					</thead>
					<?php
					if (isset($_GET['viewid'])) {
						$sql = "SELECT * FROM member WHERE branch_code = '".$_GET['viewid']."' ORDER BY id DESC";
						$res = mysqli_query($link, $sql);

						if (mysqli_num_rows($res) > 0) {
							while ($result = mysqli_fetch_assoc($res)) {
					?>
					<tbody>
						<tr>
							<td><?php echo $result['application_no']?></td>
							<td><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?></td>
							<td><?php echo $result['coordinators_code']?></td>
							<td><?php echo $result['coordinator']?></td>
							<td><?php echo $result['branch_code']?></td>
							<td><?php echo $result['branch']?></td>
							<td>
								<div class="<?php echo $result['application_status']?>" style="margin: 0;"><?php echo $result['application_status']?></div>
							</td>
						</tr>
					</tbody>
					<?php
							}
						}
					else{
						echo '<div class="none">No data to show</div>';
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
<?php 
	}
?>