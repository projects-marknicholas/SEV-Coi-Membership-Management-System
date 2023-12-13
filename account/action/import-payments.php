<?php

require '../../config.php';
require "excelReader/excel_reader2.php";
require "excelReader/SpreadsheetReader.php";

if (isset($_POST['import_payments'])) {
	$fileName = $_FILES["excel"]["name"];
	$fileExtension = explode('.', $fileName);
	$fileExtension = strtolower(end($fileExtension));

	$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

	$targetDirectory = "uploads/".$newFileName;

	move_uploaded_file($_FILES["excel"]["tmp_name"], $targetDirectory);
	error_reporting(0);
	ini_set('display_errors', 0);

	$reader = new SpreadsheetReader($targetDirectory);
	foreach($reader as $key => $row){
		$payment_id = $row[1];
		$or_no = $row[2];
		$payment_date = $row[3];
		$amount_collected = $row[4];
		$payment_month = $row[5];
		$running_total = $row[6];
		$coll_sign = $row[7];

		$sql = "INSERT INTO payment (payment_id, or_no, payment_date, amount_collected, payment_month, running_total, coll_sign) VALUES ('$payment_id', '$or_no', '$payment_date', '$amount_collected', '$payment_month', '$running_total', '$coll_sign')";
		mysqli_query($link, $sql);
		header('Location: ../payment.php');
		echo "<script>alert('Imported Successfully')</script>";
	}
}

?>