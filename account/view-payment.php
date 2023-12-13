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

	<!-- ==================== Modal ==================== -->
	<form id="modal" method="post" action="action/add-payment.php?memberid=<?php echo $result['id']?>&setid=<?php echo $result['application_no']?>">
		<div class="modal-box">
			<button type="button" class="exit-btn" onclick="showModal();">✖</button>
			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-name">Terms</p>
					<input type="text" name="terms" class="grid-int" value="<?php echo $result['terms']?>">
				</div>
				<div class="grid-item">
					<p class="grid-name">Effectivity</p>
					<input type="text" name="effectivity" class="grid-int" value="<?php echo $result['effectivity']?>">
				</div>
				<div class="grid-item">
					<p class="grid-name">Collector</p>
					<input type="text" name="collector" class="grid-int" value="<?php echo $result['collector']?>">
				</div>
			</div>
			<div class="grid-6">
				<div class="grid-item">
					<p class="grid-name">OR No.</p>
					<input type="text" name="or_no" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Date</p>
					<input type="text" name="payment_date" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Amount Collected</p>
					<input type="text" name="amount_collected" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Month</p>
					<input type="text" name="payment_month" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Running Total</p>
					<input type="text" name="running_total" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">COLL SIGN</p>
					<input type="text" name="coll_sign" class="grid-int">
				</div>
			</div><br>
			<button class="btn-new" name="add_payment">ADD PAYMENT</button>
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
			<p class="page-title">You are viewing <span class="view-data">"<?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?><span style="text-transform: lowercase;">'s</span>"</span> ledger.</p>
			<div class="<?php echo $result['application_status']?>"><?php echo $result['application_status']?></div>
			<button class="btn-new" style="margin-top: 15px;" onclick="showModal();">+ NEW</button>
			<button class="btn-new" style="margin-top: 15px;" onclick="window.open('pdf/?memberid=<?php echo $result['id']?>')">PRINT</button>

			<form method="post" action="" class="view-data-form">
				<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Member's Name: <span style="font-weight: normal;"><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?></span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Age: <span style="font-weight: normal;"><?php echo $result['age']?></span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Birthday: <span style="font-weight: normal;"><?php echo $result['date_of_birth']?></span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Address: <span style="font-weight: normal;"><?php echo $result['residential_address']?></span></p>
					</div>
					<div class="grid-2">
						<div class="grid-item">
							<p class="ledger-title">MOP: <span style="font-weight: normal;"><?php echo $result['mode_of_payment']?></span></p>
						</div>
						<div class="grid-item">
							<p class="ledger-title">M.FEE: <span style="font-weight: normal;"><?php echo $result['membership_fee']?></span></p>
						</div>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Effectivity: <span style="font-weight: normal;"><?php echo $result['effectivity']?></span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Terms: <span style="font-weight: normal;"><?php echo $result['terms']?></span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Program Type: <span style="font-weight: normal;"><?php echo $result['sev_package']?></span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Cert No.: <span style="font-weight: normal;"><?php echo $result['application_no']?></span></p>
					</div>
				</div>

				<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Coordinator: <span style="font-weight: normal;"><?php echo $result['coordinator']?></span></p>
					</div>
				</div>

				<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Collector: <span style="font-weight: normal;"><?php echo $result['collector']?></span></p>
					</div>
				</div>
			</form>
			<br><br>
			
			<div class="payment-table">
				<table>
					<thead>
						<tr>
							<th>S/N</th>
							<th>OR No.</th>
							<th>DATE</th>
							<th>AMOUNT COLLECTED</th>
							<th>MONTH</th>
							<th>RUNNING TOTAL</th>
							<th>COLL SIGN</th>
							<th>ACTION</th>
						</tr>
					</thead>
					<?php
						$select_sql = "SELECT * FROM payment WHERE payment_id = '".$result['id']."'";
						$select_res = mysqli_query($link, $select_sql);
						$i = 1;

						if (mysqli_num_rows($select_res) > 0) {
							while($fetch = mysqli_fetch_assoc($select_res)){
					?>
					<tbody>
						<tr>
							<td><?php echo $i++?></td>
							<td><?php echo $fetch['or_no']?></td>
							<td><?php echo $fetch['payment_date']?></td>
							<td><?php echo $fetch['amount_collected']?></td>
							<td><?php echo $fetch['payment_month']?></td>
							<td><?php echo $fetch['running_total']?></td>
							<td><?php echo $fetch['coll_sign']?></td>
							<td><a href="edit-payment.php?id=<?php echo $fetch['id']?>&memberid=<?php echo $fetch['payment_id']?>" class="btn-add">Edit</a></td>
						</tr>
					</tbody>
					<?php
							}
						}
					?>
				</table>
			</div>
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