<?php

include '../../config.php';

if (isset($_POST['add_branch'])) {
	$branch_code = $_POST['branch_code'];
	$branch = $_POST['branch'];

	$sql = "INSERT INTO branch (branch_code, branch) VALUES ('$branch_code', '$branch')";
	mysqli_query($link, $sql);
	header('Location: ../branch.php');
}
else{
	echo 'There is a problem creating new branch';
}
?>