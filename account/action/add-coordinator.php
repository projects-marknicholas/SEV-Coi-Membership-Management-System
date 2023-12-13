<?php

include '../../config.php';

if (isset($_POST['add_coordinator'])) {
	$coordinators_code = $_POST['coordinators_code'];
	$coordinator = $_POST['coordinator'];

	$sql = "INSERT INTO coordinator (coordinators_code, coordinator) VALUES ('$coordinators_code', '$coordinator')";
	mysqli_query($link, $sql);
	header('Location: ../coordinator.php');
}
else{
	echo 'There is a problem creating new coordinator';
}
?>