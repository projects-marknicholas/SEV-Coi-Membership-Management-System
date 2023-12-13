<?php

include '../../config.php';

if (isset($_GET['memberid']) && isset($_GET['uniqid'])) {
	$sql = "DELETE FROM member WHERE id = '".$_GET['memberid']."'";
	mysqli_query($link, $sql);
	$sqli = "DELETE FROM payment WHERE payment_id = '".$_GET['memberid']."'";
	mysqli_query($link, $sqli);
	header('Location: ../membership.php');
}
else{
	echo 'There is a problem deleting member';
}
?>