<?php

include '../../config.php';

if (isset($_POST['edit_changes'])) {
	$branch = $_POST['branch'];
	$branch_code = $_POST['branch_code'];
	$coordinator = $_POST['coordinator'];
	$coordinators_code = $_POST['coordinators_code'];
	$application_no = $_POST['application_no'];
	$application_date = $_POST['application_date'];
	$application_status = $_POST['application_status'];
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

	$sql = "UPDATE member SET branch = '".$branch."', branch_code = '".$branch_code."', coordinator = '".$coordinator."', coordinators_code = '".$coordinators_code."', application_no = '".$application_no."', application_date = '".$application_date."', application_status = '".$application_status."', firstname = '".$firstname."', middlename = '".$middlename."', lastname = '".$lastname."', residential_address = '".$residential_address."', house_no = '".$house_no."', street_name = '".$street_name."', subdivision = '".$subdivision."', barangay = '".$barangay."', municipality = '".$municipality."', province = '".$province."', zip_code = '".$zip_code."', birth_place = '".$birth_place."', date_of_birth = '".$date_of_birth."', sex = '".$sex."', age = '".$age."', civil_status = '".$civil_status."', occupation = '".$occupation."', telephone_no = '".$telephone_no."', cellphone_no = '".$cellphone_no."', email_address = '".$email_address."', weight = '".$weight."', height = '".$height."', name_one = '".$name_one."', birthday_one = '".$birthday_one."', age_one = '".$age_one."', relationship_one = '".$relationship_one."', name_two = '".$name_two."', birthday_two = '".$birthday_two."', age_two = '".$age_two."', relationship_two = '".$relationship_two."', name_three = '".$name_three."', birthday_three = '".$birthday_three."', age_three = '".$age_three."', relationship_three = '".$relationship_three."', sev_package = '".$sev_package."', membership_fee = '".$membership_fee."', mode_of_payment = '".$mode_of_payment."', installment_amount = '".$installment_amount."', no_of_installment = '".$no_of_installment."', place_of_collection = '".$place_of_collection."' WHERE id = '".$_GET['memberid']."'";
	mysqli_query($link, $sql);
	header('Location: ../view-member.php?memberid='.$_GET['memberid'].'&uniqid='.uniqid().' ');
}

?>