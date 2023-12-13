<?php

require '../../config.php';
require "excelReader/excel_reader2.php";
require "excelReader/SpreadsheetReader.php";

if (isset($_POST['import_members'])) {
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
		$id = $row[0];
		$branch = $row[1];
		$branch_code = $row[2];
		$coordinator = $row[3];
		$coordinators_code = $row[4];
		$application_no = $row[5];
		$application_date = $row[6];
		$application_status = $row[7];
		$firstname = $row[8];
		$middlename = $row[9];
		$lastname = $row[10];
		$residential_address = $row[11];
		$house_no = $row[12];
		$street_name = $row[13];
		$subdivision = $row[14];
		$barangay = $row[15];
		$municipality = $row[16];
		$province = $row[17];
		$zip_code = $row[18];
		$birth_place = $row[19];
		$date_of_birth = $row[20];
		$sex = $row[21];
		$age = $row[22];
		$civil_status = $row[23]; 
		$occupation = $row[24];
		$telephone_no = $row[25];
		$cellphone_no = $row[26];
		$email_address = $row[27];
		$weight = $row[28];
		$height = $row[29];
		$name_one = $row[30];
		$birthday_one = $row[31];
		$age_one = $row[32];
		$relationship_one = $row[33]; 
		$name_two = $row[34];
		$birthday_two = $row[35];
		$age_two = $row[36];
		$relationship_two = $row[37]; 
		$name_three = $row[38];
		$birthday_three = $row[39];
		$age_three = $row[40];
		$relationship_three = $row[41]; 
		$sev_package = $row[42];
		$membership_fee = $row[43];
		$mode_of_payment = $row[44];
		$installment_amount = $row[45];
		$no_of_installment = $row[46];
		$place_of_collection = $row[47];
		$collector = $row[48];
		$effectivity = $row[49];
		$terms = $row[50];

		$sql = "INSERT INTO member (branch, branch_code, coordinator, coordinators_code, application_no, application_date, application_status, firstname, middlename, lastname, residential_address, house_no, street_name, subdivision, barangay, municipality, province, zip_code, birth_place, date_of_birth, sex, age, civil_status, occupation, telephone_no, cellphone_no, email_address, weight, height, name_one, birthday_one, age_one, relationship_one, name_two, birthday_two, age_two, relationship_two, name_three, birthday_three, age_three, relationship_three, sev_package, membership_fee, mode_of_payment, installment_amount, no_of_installment, place_of_collection, collector, effectivity, terms) VALUES ('$branch', '$branch_code', '$coordinator', '$coordinators_code', '$application_no', '$application_date', '$application_status', '$firstname', '$middlename', '$lastname', '$residential_address', '$house_no', '$street_name', '$subdivision', '$barangay', '$municipality', '$province', '$zip_code', '$birth_place', '$date_of_birth', '$sex', '$age', '$civil_status', '$occupation', '$telephone_no', '$cellphone_no', '$email_address', '$weight', '$height', '$name_one', '$birthday_one', '$age_one', '$relationship_one', '$name_two', '$birthday_two', '$age_two', '$relationship_two', '$name_three', '$birthday_three', '$age_three', '$relationship_three', '$sev_package', '$membership_fee', '$mode_of_payment', '$installment_amount', '$no_of_installment', '$place_of_collection', '$collector', '$effectivity', '$terms')";
		mysqli_query($link, $sql);
		header('Location: ../membership.php');
		echo "<script>alert('Imported Successfully')</script>";
	}
}

?>