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
	<title>Membership - SEV Coi</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body>

	<!-- ==================== Modal ==================== -->
	<form id="modal" method="post" action="action/add-member.php">
		<div class="modal-box">
		<button type="button" class="exit-btn" onclick="showModal();">✖</button>

			<!-- ==================== ==================== -->

			<div class="form-title">membership application form</div>

			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-name">Branch</p>
					<input type="text" name="branch" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Branch Code</p>
					<input type="text" name="branch_code" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Application No.</p>
					<input type="text" name="application_no" class="grid-int">
				</div>
			</div>

			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-name">Name of Coordinator</p>
					<input type="text" name="coordinator" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Coordinator's Code</p>
					<input type="text" name="coordinators_code" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Date</p>
					<input type="text" name="application_date" class="grid-int">
				</div>
			</div>

			<!-- ==================== ==================== -->

			<div class="form-title-left">applicant personal information</div>

			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-name">First Name</p>
					<input type="text" name="firstname" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Middle Name</p>
					<input type="text" name="middlename" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Last Name</p>
					<input type="text" name="lastname" class="grid-int">
				</div>
			</div>

			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-name">Residential Address</p>
					<input type="text" name="residential_address" class="grid-int">
				</div>
			</div>

			<div class="grid-3">
				<div class="grid-item">
					<p class="grid-name">Block/Lot/House No.</p>
					<input type="text" name="house_no" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Street Name</p>
					<input type="text" name="street_name" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Subdivision/Sitio</p>
					<input type="text" name="subdivision" class="grid-int">
				</div>
			</div>

			<div class="grid-4">
				<div class="grid-item">
					<p class="grid-name">Barangay</p>
					<input type="text" name="barangay" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Municipality/City</p>
					<input type="text" name="municipality" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Province</p>
					<input type="text" name="province" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Zip Code</p>
					<input type="text" name="zip_code" class="grid-int">
				</div>
			</div>

			<div class="grid-5">
				<div class="grid-item">
					<p class="grid-name">Birth Place</p>
					<input type="text" name="birth_place" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Date of Birth</p>
					<input type="text" name="date_of_birth" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Sex</p>
					<input type="text" name="sex" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Age</p>
					<input type="text" name="age" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Civil Status</p>
					<input type="text" name="civil_status" class="grid-int">
				</div>
			</div>

			<div class="grid-6">
				<div class="grid-item">
					<p class="grid-name">Occupation</p>
					<input type="text" name="occupation" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Telephone No.</p>
					<input type="text" name="telephone_no" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Cellphone No.</p>
					<input type="text" name="cellphone_no" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">E-mail Address</p>
					<input type="text" name="email_address" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Weight</p>
					<input type="text" name="weight" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Height</p>
					<input type="text" name="height" class="grid-int">
				</div>
			</div>

			<!-- ==================== ==================== -->

			<div class="form-title-left">dependent's beneficiaries</div>

			<div class="grid-4">
				<div class="grid-item">
					<p class="grid-name">Name</p>
					<input type="text" name="name_one" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Birthday</p>
					<input type="text" name="birthday_one" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Age</p>
					<input type="text" name="age_one" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Relationship</p>
					<input type="text" name="relationship_one" class="grid-int">
				</div>
			</div>
			<div class="grid-4">
				<div class="grid-item">
					<p class="grid-name">Name</p>
					<input type="text" name="name_two" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Birthday</p>
					<input type="text" name="birthday_two" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Age</p>
					<input type="text" name="age_two" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Relationship</p>
					<input type="text" name="relationship_two" class="grid-int">
				</div>
			</div>
			<div class="grid-4">
				<div class="grid-item">
					<p class="grid-name">Name</p>
					<input type="text" name="name_three" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Birthday</p>
					<input type="text" name="birthday_three" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Age</p>
					<input type="text" name="age_three" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Relationship</p>
					<input type="text" name="relationship_three" class="grid-int">
				</div>
			</div>

			<!-- ==================== ==================== -->

			<div class="form-title-left">membership information</div>

			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-name">Type of Program</p>
					<label>
						<input type="radio" name="sev_package" value="CARE 1">
						Care 1
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 2">
						Care 2
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 3">
						Care 3
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 4">
						Care 4
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 5">
						Care 5
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 6">
						Care 6
					</label>
					<label>
						<input type="radio" name="sev_package" value="CARE 7">
						Care 7
					</label><br>
					<label>
						<input type="radio" name="sev_package" value="SEV 1">
						Sev 1
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 2">
						Sev 2
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 3">
						Sev 3
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 4">
						Sev 4
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 5">
						Sev 5
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 6">
						Sev 6
					</label>
					<label>
						<input type="radio" name="sev_package" value="SEV 7">
						Sev 7
					</label>
				</div>
			</div>

			<div class="grid-4">
				<div class="grid-item">
					<p class="grid-name">Membership Fee</p>
					<input type="text" name="membership_fee" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">Mode  of Payment</p>
					<select class="select-tag" name="mode_of_payment">
						<option value="monthly">M</option>
						<option value="quarterly">Q</option>
						<option value="semi-annual">SA</option>
						<option value="annual">A</option>
						<option value="lumpsum">L</option>
					</select>
				</div>
				<div class="grid-item">
					<p class="grid-name">Installment Amount</p>
					<input type="text" name="installment_amount" class="grid-int">
				</div>
				<div class="grid-item">
					<p class="grid-name">No. of Installment</p>
					<input type="text" name="no_of_installment" class="grid-int">
				</div>
			</div>

			<div class="grid-1">
				<div class="grid-item">
					<p class="grid-name">Place of Collection</p>
					<input type="text" name="place_of_collection" class="grid-int">
				</div>
			</div>

			<button class="btn-new" name="add_member" style="margin-top: 10px;">ADD MEMBER</button>
		</div>
	</form>
	<!-- ==================== Modal end ==================== -->

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
			<p class="page-title">Membership</p>
			<!-- ==================== Table ==================== -->
			<div class="table-div">
				<div class="table-flex">
					<div class="table-flex-left">
						<button class="btn-new" onclick="showModal();">+ NEW</button>
					</div>
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
							<th>tools</th>
						</tr>
					</thead>
					<?php
						$sql = "SELECT * FROM member ORDER BY application_date DESC";
						$res = mysqli_query($link, $sql);

						if (mysqli_num_rows($res) > 0) {
							while($result = mysqli_fetch_assoc($res)){
					?>
					<tbody>
						<tr>
							<td><?php echo $result['application_no']?></td>
							<td><?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?></td>
							<td><?php echo $result['coordinators_code']?></td>
							<td><?php echo $result['coordinator']?></td>
							<td><?php echo $result['branch']?></td>
							<td><?php echo $result['branch_code']?></td>
							<td>
								<div class="<?php echo $result['application_status']?>" style="margin: 0;"><?php echo $result['application_status']?></div>
							</td>
							<td>
								<a href="view-member.php?memberid=<?php echo $result['id']?>&uniqid=<?php echo uniqid();?>" class="btn-edit">edit</a>
								<a href="view-payment.php?memberid=<?php echo $result['id']?>" class="btn-view">view ledger</a>
								<a href="action/delete-member.php?memberid=<?php echo $result['id']?>&uniqid=<?php echo uniqid();?>" class="btn-delete">delete</a>
							</td>
						</tr>
					</tbody>
					<?php
							}
						}
						else{
							echo '<div class="none">No Members to show</div>';
						}
					?>
				</table>
			</div>
			<!-- ==================== Table end ==================== -->
			<p id="table-message"></p>
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

	<script src="js/search-filter.js"></script>
	<script src="js/show-modal.js"></script>
</body>
</html>