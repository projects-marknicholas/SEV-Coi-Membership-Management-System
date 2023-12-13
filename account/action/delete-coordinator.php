<?php

include '../../config.php';

if (isset($_GET['viewid'])) {
	$sql = "DELETE FROM coordinator WHERE id = '".$_GET['viewid']."'";
	mysqli_query($link, $sql);
	header('Location: ../coordinator.php');
}
else{
	echo 'There is a problem deleting coordinator';
}
?>