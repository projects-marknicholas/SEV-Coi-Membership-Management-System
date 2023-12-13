<?php

include '../../config.php';

if (isset($_POST['add_member'])) {
	$branch = $_POST['branch'];
	$branch_code = $_POST['branch_code'];
	$coordinator = $_POST['coordinator'];
	$coordinators_code = $_POST['coordinators_code'];
	$application_no = $_POST['application_no'];
	$application_date = $_POST['application_date'];
	$application_status = 'active';
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$residential_address = $_POST['residential_address'];
	$house_no = $_POST['house_no'];
	$street_name = $_POST['street_name'];
	$subdivision = $_POST['subdivision'];
	$barangay = $_POST['barangay'];
	$municipality = $_POST['municipality'];
	$province = $_POST['province'];
	$zip_code = $_POST['zip_code'];
	$birth_place = $_POST['birth_place'];
	$date_of_birth = $_POST['date_of_birth'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$civil_status = $_POST['civil_status'];
	$occupation = $_POST['occupation'];
	$telephone_no = $_POST['telephone_no'];
	$cellphone_no = $_POST['cellphone_no'];
	$email_address = $_POST['email_address'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$name_one = $_POST['name_one'];
	$birthday_one = $_POST['birthday_one'];
	$age_one = $_POST['age_one'];
	$relationship_one = $_POST['relationship_one'];
	$name_two = $_POST['name_two'];
	$birthday_two = $_POST['birthday_two'];
	$age_two = $_POST['age_two'];
	$relationship_two = $_POST['relationship_two'];
	$name_three = $_POST['name_three'];
	$birthday_three = $_POST['birthday_three'];
	$age_three = $_POST['age_three'];
	$relationship_three = $_POST['relationship_three'];
	$sev_package = $_POST['sev_package'];
	$membership_fee = $_POST['membership_fee'];
	$mode_of_payment = $_POST['mode_of_payment'];
	$installment_amount = $_POST['installment_amount'];
	$no_of_installment = $_POST['no_of_installment'];
	$place_of_collection = $_POST['place_of_collection'];

	$sql = "INSERT INTO member (branch, branch_code, coordinator, coordinators_code, application_no, application_date, application_status, firstname, middlename, lastname, residential_address, house_no, street_name, subdivision, barangay, municipality, province, zip_code, birth_place, date_of_birth, sex, age, civil_status, occupation, telephone_no, cellphone_no, email_address, weight, height, name_one, birthday_one, age_one, relationship_one, name_two, birthday_two, age_two, relationship_two, name_three, birthday_three, age_three, relationship_three, sev_package, membership_fee, mode_of_payment, installment_amount, no_of_installment, place_of_collection) VALUES ('$branch', '$branch_code', '$coordinator', '$coordinators_code', '$application_no', '$application_date', '$application_status', '$firstname', '$middlename', '$lastname', '$residential_address', '$house_no', '$street_name', '$subdivision', '$barangay', '$municipality', '$province', '$zip_code', '$birth_place', '$date_of_birth', '$sex', '$age', '$civil_status', '$occupation', '$telephone_no', '$cellphone_no', '$email_address', '$weight', '$height', '$name_one', '$birthday_one', '$age_one', '$relationship_one', '$name_two', '$birthday_two', '$age_two', '$relationship_two', '$name_three', '$birthday_three', '$age_three', '$relationship_three', '$sev_package', '$membership_fee', '$mode_of_payment', '$installment_amount', '$no_of_installment', '$place_of_collection')";
	mysqli_query($link, $sql) or die(mysqli_error($link));;
	header('Location: ../membership.php');
}

?>