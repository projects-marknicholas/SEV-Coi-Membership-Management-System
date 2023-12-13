<?php
require_once '../../config.php';

if (isset($_POST['save_changes'])) {
	$or_no = $_POST['or_no'];
	$payment_date = $_POST['payment_date'];
	$amount_collected = $_POST['amount_collected'];
	$payment_month = $_POST['payment_month'];
	$running_total = $_POST['running_total'];
	$coll_sign = $_POST['coll_sign'];

	$sql = "UPDATE payment SET or_no = '".$or_no."', payment_date = '".$payment_date."', amount_collected = '".$amount_collected."', payment_month = '".$payment_month."', running_total = '".$running_total."', coll_sign = '".$coll_sign."' WHERE id = '".$_POST['id']."'";
	mysqli_query($link, $sql);
	header('Location: ../view-payment.php?memberid='.$_POST['memberid'].'');
}
?>