<?php

require_once '../../config.php';
if (isset($_POST['add_payment']) && isset($_GET['memberid']) && isset($_GET['setid'])) {
	$payment_id = $_GET['memberid'];
	$setid = $_GET['setid'];
	$terms = $_POST['terms'];
	$effectivity = $_POST['effectivity'];
	$collector = $_POST['collector'];
	$or_no = $_POST['or_no'];
	$payment_date = $_POST['payment_date'];
	$amount_collected = $_POST['amount_collected'];
	$payment_month = $_POST['payment_month'];
	$running_total = $_POST['running_total'];
	$coll_sign = $_POST['coll_sign'];

	$update = "UPDATE member SET terms = '".$terms."', effectivity = '".$effectivity."', collector = '".$collector."' WHERE id = '".$payment_id."' ";
	mysqli_query($link, $update);

	$sql = "INSERT INTO payment (payment_id, or_no, payment_date, amount_collected, payment_month, running_total, coll_sign) VALUES ('$payment_id', '$or_no', '$payment_date', '$amount_collected', '$payment_month', '$running_total', '$coll_sign')";
	mysqli_query($link, $sql);
}
header('Location: ../view-payment.php?memberid='.$_GET['memberid'].'');

?>