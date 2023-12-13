<?php

include '../../config.php';

if (isset($_GET['viewid'])) {
	$sql = "DELETE FROM branch WHERE id = '".$_GET['viewid']."'";
	mysqli_query($link, $sql);
	header('Location: ../branch.php');
}
else{
	echo 'There is a problem deleting branch';
}
?>