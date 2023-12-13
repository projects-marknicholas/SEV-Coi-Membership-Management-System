<?php
require_once '../config.php';
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../");
    exit;
}

if (isset($_GET['memberid']) && isset($_GET['uniqid'])) {
	$sql = "SELECT * FROM member WHERE id = '".$_GET['memberid']."'";
	$res = mysqli_query($link, $sql);

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View <?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?> - SEV Coi</title>
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
			<p class="page-title">You are viewing <span class="view-data">"<?php echo $result['firstname']?> <?php echo $result['middlename']?> <?php echo $result['lastname']?><span style="text-transform: lowercase;">'s</span>"</span> data.</p>

			<button class="btn-new" style="margin-left: 10px; margin-top: 20px;" type="button" onclick="window.open('pdf/certificate-blue.php?memberid=<?php echo $result['id']?>')">PRINT JUNIOR CERTIFICATE</button>
			<button class="btn-new" style="margin-left: 10px; margin-top: 20px;" type="button" onclick="window.open('pdf/certificate-yellow.php?memberid=<?php echo $result['id']?>')">PRINT SENIOR CERTIFICATE</button>

			<form method="post" action="action/update-member.php?memberid=<?php echo $result['id']?>" class="view-data-form">
				<div class="modal-box" style="width: calc(100% - 20px)">
					<!-- ==================== ==================== -->

					<div class="form-title">membership application form</div>

					<div class="grid-1">
						<div class="grid-item">
							<p class="grid-name">Status</p>
							<select name="application_status" class="select-tag">
								<option><?php echo $result['application_status']?></option>
								<option value="active">Active</option>
								<option value="offline">Offline</option>
								<option value="deceased">Deceased</option>
							</select>
						</div>
					</div>

					<div class="grid-3">
						<div class="grid-item">
							<p class="grid-name">Branch</p>
							<input type="text" name="branch" class="grid-int" value="<?php if($result['branch'] == null){ echo 'N/A'; } else{ echo $result['branch']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Branch Code</p>
							<input type="text" name="branch_code" class="grid-int" value="<?php if($result['branch_code'] == null){ echo 'N/A'; } else{ echo $result['branch_code']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Application No.</p>
							<input type="text" name="application_no" class="grid-int" value="<?php if($result['application_no'] == null){ echo 'N/A'; } else{ echo $result['application_no']; } ?>">
						</div>
					</div>

					<div class="grid-3">
						<div class="grid-item">
							<p class="grid-name">Name of Coordinator</p>
							<input type="text" name="coordinator" class="grid-int" value="<?php if($result['coordinator'] == null){ echo 'N/A'; } else{ echo $result['coordinator']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Coordinator's Code</p>
							<input type="text" name="coordinators_code" class="grid-int" value="<?php if($result['coordinators_code'] == null){ echo 'N/A'; } else{ echo $result['coordinators_code']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Date</p>
							<input type="text" name="application_date" class="grid-int" value="<?php if($result['application_date'] == null){ echo 'N/A'; } else{ echo $result['application_date']; } ?>">
						</div>
					</div>

					<!-- ==================== ==================== -->

					<div class="form-title-left">applicant personal information</div>

					<div class="grid-3">
						<div class="grid-item">
							<p class="grid-name">First Name</p>
							<input type="text" name="firstname" class="grid-int" value="<?php if($result['firstname'] == null){ echo 'N/A'; } else{ echo $result['firstname']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Middle Name</p>
							<input type="text" name="middlename" class="grid-int" value="<?php if($result['middlename'] == null){ echo 'N/A'; } else{ echo $result['middlename']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Last Name</p>
							<input type="text" name="lastname" class="grid-int" value="<?php if($result['lastname'] == null){ echo 'N/A'; } else{ echo $result['lastname']; } ?>">
						</div>
					</div>

					<div class="grid-1">
						<div class="grid-item">
							<p class="grid-name">Residential Address</p>
							<input type="text" name="residential_address" class="grid-int" value="<?php if($result['residential_address'] == null){ echo 'N/A'; } else{ echo $result['residential_address']; } ?>">
						</div>
					</div>

					<div class="grid-3">
						<div class="grid-item">
							<p class="grid-name">Block/Lot/House No.</p>
							<input type="text" name="house_no" class="grid-int" value="<?php if($result['house_no'] == null){ echo 'N/A'; } else{ echo $result['house_no']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Street Name</p>
							<input type="text" name="street_name" class="grid-int" value="<?php if($result['street_name'] == null){ echo 'N/A'; } else{ echo $result['street_name']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Subdivision/Sitio</p>
							<input type="text" name="subdivision" class="grid-int" value="<?php if($result['subdivision'] == null){ echo 'N/A'; } else{ echo $result['subdivision']; } ?>">
						</div>
					</div>

					<div class="grid-4">
						<div class="grid-item">
							<p class="grid-name">Barangay</p>
							<input type="text" name="barangay" class="grid-int" value="<?php if($result['barangay'] == null){ echo 'N/A'; } else{ echo $result['barangay']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Municipality/City</p>
							<input type="text" name="municipality" class="grid-int" value="<?php if($result['municipality'] == null){ echo 'N/A'; } else{ echo $result['municipality']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Province</p>
							<input type="text" name="province" class="grid-int" value="<?php if($result['province'] == null){ echo 'N/A'; } else{ echo $result['province']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Zip Code</p>
							<input type="text" name="zip_code" class="grid-int" value="<?php if($result['zip_code'] == null){ echo 'N/A'; } else{ echo $result['zip_code']; } ?>">
						</div>
					</div>

					<div class="grid-5">
						<div class="grid-item">
							<p class="grid-name">Birth Place</p>
							<input type="text" name="birth_place" class="grid-int" value="<?php if($result['birth_place'] == null){ echo 'N/A'; } else{ echo $result['birth_place']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Date of Birth</p>
							<input type="text" name="date_of_birth" class="grid-int" value="<?php if($result['date_of_birth'] == null){ echo 'N/A'; } else{ echo $result['date_of_birth']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Sex</p>
							<input type="text" name="sex" class="grid-int" value="<?php if($result['sex'] == null){ echo 'N/A'; } else{ echo $result['sex']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Age</p>
							<input type="text" name="age" class="grid-int" value="<?php if($result['age'] == null){ echo 'N/A'; } else{ echo $result['age']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Civil Status</p>
							<input type="text" name="civil_status" class="grid-int" value="<?php if($result['civil_status'] == null){ echo 'N/A'; } else{ echo $result['civil_status']; } ?>">
						</div>
					</div>

					<div class="grid-6">
						<div class="grid-item">
							<p class="grid-name">Occupation</p>
							<input type="text" name="occupation" class="grid-int" value="<?php if($result['occupation'] == null){ echo 'N/A'; } else{ echo $result['occupation']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Telephone No.</p>
							<input type="text" name="telephone_no" class="grid-int" value="<?php if($result['telephone_no'] == null){ echo 'N/A'; } else{ echo $result['telephone_no']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Cellphone No.</p>
							<input type="text" name="cellphone_no" class="grid-int" value="<?php if($result['cellphone_no'] == null){ echo 'N/A'; } else{ echo $result['cellphone_no']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">E-mail Address</p>
							<input type="text" name="email_address" class="grid-int" value="<?php if($result['email_address'] == null){ echo 'N/A'; } else{ echo $result['email_address']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Weight</p>
							<input type="text" name="weight" class="grid-int" value="<?php if($result['weight'] == null){ echo 'N/A'; } else{ echo $result['weight']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Height</p>
							<input type="text" name="height" class="grid-int" value="<?php if($result['height'] == null){ echo 'N/A'; } else{ echo $result['height']; } ?>">
						</div>
					</div>

					<!-- ==================== ==================== -->

					<div class="form-title-left">dependent's beneficiaries</div>

					<div class="grid-4">
						<div class="grid-item">
							<p class="grid-name">Name</p>
							<input type="text" name="name_one" class="grid-int" value="<?php if($result['name_one'] == null){ echo 'N/A'; } else{ echo $result['name_one']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Birthday</p>
							<input type="text" name="birthday_one" class="grid-int" value="<?php if($result['birthday_one'] == null){ echo 'N/A'; } else{ echo $result['birthday_one']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Age</p>
							<input type="text" name="age_one" class="grid-int" value="<?php if($result['age_one'] == null){ echo 'N/A'; } else{ echo $result['age_one']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Relationship</p>
							<input type="text" name="relationship_one" class="grid-int" value="<?php if($result['relationship_one'] == null){ echo 'N/A'; } else{ echo $result['relationship_one']; } ?>">
						</div>
					</div>
					<div class="grid-4">
						<div class="grid-item">
							<p class="grid-name">Name</p>
							<input type="text" name="name_two" class="grid-int" value="<?php if($result['name_two'] == null){ echo 'N/A'; } else{ echo $result['name_two']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Birthday</p>
							<input type="text" name="birthday_two" class="grid-int" value="<?php if($result['birthday_two'] == null){ echo 'N/A'; } else{ echo $result['birthday_two']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Age</p>
							<input type="text" name="age_two" class="grid-int" value="<?php if($result['age_two'] == null){ echo 'N/A'; } else{ echo $result['age_two']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Relationship</p>
							<input type="text" name="relationship_two" class="grid-int" value="<?php if($result['relationship_two'] == null){ echo 'N/A'; } else{ echo $result['relationship_two']; } ?>">
						</div>
					</div>
					<div class="grid-4">
						<div class="grid-item">
							<p class="grid-name">Name</p>
							<input type="text" name="name_three" class="grid-int" value="<?php if($result['name_three'] == null){ echo 'N/A'; } else{ echo $result['name_three']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Birthday</p>
							<input type="text" name="birthday_three" class="grid-int" value="<?php if($result['birthday_three'] == null){ echo 'N/A'; } else{ echo $result['birthday_three']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Age</p>
							<input type="text" name="age_three" class="grid-int" value="<?php if($result['age_three'] == null){ echo 'N/A'; } else{ echo $result['age_three']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Relationship</p>
							<input type="text" name="relationship_three" class="grid-int" value="<?php if($result['relationship_three'] == null){ echo 'N/A'; } else{ echo $result['relationship_three']; } ?>">
						</div>
					</div>

					<!-- ==================== ==================== -->

					<div class="form-title-left">membership information</div>

					<div class="grid-1">
						<div class="grid-item">
							<p class="grid-name">Type of Program</p>
							<input type="text" name="sev_package" class="grid-int" value="<?php if($result['sev_package'] == null){ echo 'N/A'; } else{ echo $result['sev_package']; } ?>">
						</div>
					</div>

					<div class="grid-4">
						<div class="grid-item">
							<p class="grid-name">Membership Fee</p>
							<input type="text" name="membership_fee" class="grid-int" value="<?php if($result['membership_fee'] == null){ echo 'N/A'; } else{ echo $result['membership_fee']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Mode  of Payment</p>
							<input type="text" name="mode_of_payment"  class="grid-int" value="<?php if($result['mode_of_payment'] == null){ echo 'N/A'; } else{ echo $result['mode_of_payment']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">Installment Amount</p>
							<input type="text" name="installment_amount" class="grid-int" value="<?php if($result['installment_amount'] == null){ echo 'N/A'; } else{ echo $result['installment_amount']; } ?>">
						</div>
						<div class="grid-item">
							<p class="grid-name">No. of Installment</p>
							<input type="text" name="no_of_installment" class="grid-int" value="<?php if($result['no_of_installment'] == null){ echo 'N/A'; } else{ echo $result['no_of_installment']; } ?>">
						</div>
					</div>

					<div class="grid-1">
						<div class="grid-item">
							<p class="grid-name">Place of Collection</p>
							<input type="text" name="place_of_collection" class="grid-int" value="<?php if($result['place_of_collection'] == null){ echo 'N/A'; } else{ echo $result['place_of_collection']; } ?>">
						</div>
					</div>
				</div>
				<button class="btn-new" style="margin-left: 10px;" name="edit_changes">EDIT CHANGES</button>
			</form>
		</main>
		<!-- ==================== Main bar end ==================== -->
	</div>

</body>
</html>
<?php
		}
	}
}
else{
	echo 'There is a problem fetching your data! contact the developer <a href="mailto:razonmarknicholas.cdlb@gmail.com">click to contact</a>';
}
?>