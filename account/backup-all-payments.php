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

	<table>
		<?php
			$sql = "SELECT * FROM payment ORDER BY id DESC";
			$res = mysqli_query($link, $sql);

			if (mysqli_num_rows($res) > 0) {
				while ($result = mysqli_fetch_assoc($res)) {
		?>
		<tbody>
			<tr>
				<td><?php echo $result['id']?></td>
				<td><?php echo $result['payment_id']?></td>
				<td><?php echo $result['or_no']?></td>
				<td><?php echo $result['payment_date']?></td>
				<td><?php echo $result['amount_collected']?></td>
				<td><?php echo $result['payment_month']?></td>
				<td><?php echo $result['running_total']?></td>
				<td><?php echo $result['coll_sign']?></td>
			</tr>
		</tbody>
		<?php
				}
			}
		?>
	</table>
<?php
	header('Content-Type:application/xls');
	header('Content-Disposition:attachment;filename=SEV-Coi Payments.xls');
?>


</body>
</html>