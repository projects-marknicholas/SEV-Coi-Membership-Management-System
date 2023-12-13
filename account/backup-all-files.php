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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		th, td{
			padding: 5px;
		}
	</style>
</head>
<body>

		<?php
			$sql = "SELECT * FROM member ORDER BY id DESC";
			$res = mysqli_query($link, $sql);

			if (mysqli_num_rows($res) > 0) {
				while ($result = mysqli_fetch_assoc($res)) {
		?>
<?php
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=SEV-Coi Members.xls');
?>
	<table>
		<tbody>
			<tr>
				<td><?php echo $result['id']?></td>
				<td><?php echo $result['branch']?></td>
				<td><?php echo $result['branch_code']?></td>
				<td><?php echo $result['coordinator']?></td>
				<td><?php echo $result['coordinators_code']?></td>
				<td><?php echo $result['application_no']?></td>
				<td><?php echo $result['application_date']?></td>
				<td><?php echo $result['application_status']?></td>
				<td><?php echo $result['firstname']?></td>
				<td><?php echo $result['middlename']?></td>
				<td><?php echo $result['lastname']?></td>
				<td><?php echo $result['residential_address']?></td>
				<td><?php echo $result['house_no']?></td>
				<td><?php echo $result['street_name']?></td>
				<td><?php echo $result['subdivision']?></td>
				<td><?php echo $result['barangay']?></td>
				<td><?php echo $result['municipality']?></td>
				<td><?php echo $result['province']?></td>
				<td><?php echo $result['zip_code']?></td>
				<td><?php echo $result['birth_place']?></td>
				<td><?php echo $result['date_of_birth']?></td>
				<td><?php echo $result['sex']?></td>
				<td><?php echo $result['age']?></td>
				<td><?php echo $result['civil_status']?></td>
				<td><?php echo $result['occupation']?></td>
				<td><?php echo $result['telephone_no']?></td>
				<td><?php echo $result['cellphone_no']?></td>
				<td><?php echo $result['email_address']?></td>
				<td><?php echo $result['weight']?></td>
				<td><?php echo $result['height']?></td>
				<td><?php echo $result['name_one']?></td>
				<td><?php echo $result['birthday_one']?></td>
				<td><?php echo $result['age_one']?></td>
				<td><?php echo $result['relationship_one']?></td>
				<td><?php echo $result['name_two']?></td>
				<td><?php echo $result['birthday_two']?></td>
				<td><?php echo $result['age_two']?></td>
				<td><?php echo $result['relationship_two']?></td>
				<td><?php echo $result['name_three']?></td>
				<td><?php echo $result['birthday_three']?></td>
				<td><?php echo $result['age_three']?></td>
				<td><?php echo $result['relationship_three']?></td>
				<td><?php echo $result['sev_package']?></td>
				<td><?php echo $result['membership_fee']?></td>
				<td><?php echo $result['mode_of_payment']?></td>
				<td><?php echo $result['installment_amount']?></td>
				<td><?php echo $result['no_of_installment']?></td>
				<td><?php echo $result['place_of_collection']?></td>
				<td><?php echo $result['effectivity']?></td>
				<td><?php echo $result['collector']?></td>
				<td><?php echo $result['terms']?></td>
			</tr>
		</tbody>
	</table>
		<?php
				}
			}
		?>



</body>
</html>