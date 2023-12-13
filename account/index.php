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
	<title>SEV Coi - Membership Management Software</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="img/logo.png">
	<script src="js/chart.js"></script>
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
			<p class="page-title">Dashboard</p>
			<!-- ==================== Dashboard ==================== -->
			<div class="dashboard-grid">
				<div class="item d-bg1">
					<?php
						$member = "SELECT COUNT(*) FROM member";
						$member_res = mysqli_query($link, $member);

						if (mysqli_num_rows($member_res) > 0) {
							while ($member_res_count = mysqli_fetch_assoc($member_res)) {
								if ($member_res_count > 100) {
					?>
					<p class="dash-count"><?php echo number_format($member_res_count['COUNT(*)'], 0)?></p>
					<?php
								}
								else if ($member_res_count < 100){
					?> 
					<p class="dash-count"><?php echo number_format($member_res_count['COUNT(*)'], 2)?></p>
					<?php
								}
							}
						}
					?>
					<p class="dash-title">total members</p>
				</div>
				<div class="item d-bg2">
					<?php
						$branch = "SELECT COUNT(*) FROM branch";
						$branch_query = mysqli_query($link, $branch);

						if (mysqli_num_rows($branch_query) > 0) {
							while ($branch_count = mysqli_fetch_assoc($branch_query)) {
								if ($branch_count > 100) {
					?>
					<p class="dash-count"><?php echo number_format($branch_count['COUNT(*)'], 0)?></p>
					<?php
								}
								else if ($branch_count < 100){
					?> 
					<p class="dash-count"><?php echo number_format($branch_count['COUNT(*)'], 2)?></p>
					<?php
								}
							}
						}
					?>
					<p class="dash-title">total branches</p>
				</div>
				<div class="item d-bg4">
					<?php
						$coordinator = "SELECT COUNT(*) FROM coordinator";
						$coordinator_query = mysqli_query($link, $coordinator);

						if (mysqli_num_rows($coordinator_query) > 0) {
							while ($coordinator_count = mysqli_fetch_assoc($coordinator_query)) {
								if ($branch_count > 100) {
					?>
					<p class="dash-count"><?php echo number_format($coordinator_count['COUNT(*)'], 0)?></p>
					<?php
								}
								else if ($branch_count < 100){
					?> 
					<p class="dash-count"><?php echo number_format($coordinator_count['COUNT(*)'], 0)?></p>
					<?php
								}
							}
						}
					?>
					<p class="dash-title">total coordinators</p>
				</div>
				<div class="item d-bg3">
					<p class="dash-count" id="phtime"></p>
					<p class="dash-title">time clock</p>
				</div>
			</div>

			<div class="data-grid">
				<div class="data-item">
					<canvas id="dataGraph"></canvas>
				</div>
				<div class="data-item">
					<?php
						$member_sql = "SELECT * FROM member ORDER BY id DESC";
						$member_res = mysqli_query($link, $member_sql);

						if (mysqli_num_rows($member_res) > 0) {
							while ($member_result = mysqli_fetch_assoc($member_res)) {
					?>
					<a href="">
						<div class="data-flex">
							<div class="data-name"><?php echo $member_result['firstname']?> <?php echo $member_result['middlename']?> <?php echo $member_result['lastname']?></div>
							<div class="<?php echo $member_result['application_status']?>"><?php echo $member_result['application_status']?></div>
						</div>
					</a>
					<?php
							}
						}
						else{
							echo '<div class="none">No Members Yet</div>';
						}
					?>
				</div>
			</div>
			<!-- ==================== Dashboard end ==================== -->
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>
	
	<script src="js/time-clock.js"></script>
	<?php
		$member_sql = "SELECT branch FROM member GROUP BY branch HAVING COUNT(*) > 0 ORDER BY id DESC";
		$member_query = mysqli_query($link, $member_sql);

		if (mysqli_num_rows($member_query) > 0) {
			while ($member_print = mysqli_fetch_assoc($member_query)) {
				$count_member = $member_print['branch'];
			}
		}
	?>
	<script type="text/javascript">
		const ctx = document.getElementById('dataGraph').getContext('2d');
		const myChart = new Chart(ctx, {
		    type: 'line',
		    data: {
		        labels: [
		        <?php
				$member_sql = "SELECT branch FROM member GROUP BY branch HAVING COUNT(*) > 0 ORDER BY id DESC";
				$member_query = mysqli_query($link, $member_sql);

				if (mysqli_num_rows($member_query) > 0) {
					while ($member_print = mysqli_fetch_assoc($member_query)) {
						$count_member = $member_print['branch'];
				?>
					'<?php echo $count_member;?>',
				<?php
						}
					}
				?>
		        ],
		        datasets: [{
		            label: 'Members per Branch',
		            data: [
		            <?php
					$member_sql_count = "SELECT COUNT(branch) FROM member GROUP BY branch HAVING COUNT(*) > 0 ORDER BY id DESC";
					$member_query_count = mysqli_query($link, $member_sql_count);

					if (mysqli_num_rows($member_query_count) > 0) {
						while ($member_print_count = mysqli_fetch_assoc($member_query_count)) {
							$count_member_count = $member_print_count['COUNT(branch)'];
					?>
						<?php echo $count_member_count;?>,
					<?php
							}
						}
					?>
		            ],
		            borderColor: [
		                '#c0c0c0'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});
	</script>
</body>
</html>