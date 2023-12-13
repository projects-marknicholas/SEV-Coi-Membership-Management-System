<?php

use Dompdf\Dompdf;
require_once 'vendor/autoload.php';
require_once '../../config.php';

if (isset($_GET['viewid'])) {
	$sql = "SELECT * FROM member WHERE branch_code = '".$_GET['viewid']."' ORDER BY id DESC";
	$res = mysqli_query($link, $sql);

	$img = file_get_contents('../img/logo.png');
	$img = base64_encode($img);
	$printer = '';
	$i = 1;

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
			$branch = $result['branch'];

			$printer .= "
				<tbody>
					<tr>
						<td>".$i++."</td>
						<td>".$result['application_no']."</td>
						<td>".$result['firstname']." ".$result['middlename']." ".$result['lastname']."</td>
						<td>".$result['coordinators_code']."</td>
						<td>".$result['coordinator']."</td>
						<td>".$result['branch_code']."</td>
						<td>".$result['branch']."</td>
						<td>".$result['application_status']."</td>
					</tr>
				</tbody>
			";
		}

			$page = "
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>".$branch." Members</title>
				<link rel='icon' type='image/x-icon' href='../img/logo.png'>
				<style type='text/css'>
					@font-face{
						font-family: sans;
						src: url('../font/OpenSans-Regular.ttf');
						font-family: sansBold;
						src: url('../font/OpenSans-Bold.ttf');
					}
					.div > table{
						width: 100%;
						font-family: sans;
						border: 1px solid black;
					}
					.div > table > thead > tr > th{
						font-weight: normal;
						font-family: sansBold;
						font-size: .8em;
					}
					.div > table > thead > tr > th, .div > table > tbody > tr > td{
						padding: 5px;
					}
					.div > table > tbody > tr > td{
						font-size: .8em;
						font-family: sans;
						text-transform: capitalize;
					}
					td{
						text-align: center;
						font-family: sans;
					}
					.top{
						width: 100%;
						font-family: sans;
					}
					.top > table{
						width: 100%;
						border: 1px solid black;
						font-family: sans;
					}
					.top > table > thead > tr > th{
						text-align: left;
						padding: 5px;
						font-weight: normal;
						font-family: sansBold;
						font-size: .8em;
					}
					nav{
						position: relative;
					}
					h3{
						font-weight: normal;
						font-family: sansBold;
						text-align: center;
						font-size: .986em;
						line-height: -1;
					}
					.nav-right > p{
						text-align: center;
						font-family: sans;
						font-size: .8em;
						line-height: -1;
					}
					.logo{
						position: absolute;
						height: 60px;
						width: 80px;
					}
				</style>
			</head>
			<body>

				<nav>
					<img src='data:image;base64,".$img."' class='logo'>
					<div class='nav-left'></div>
					<div class='nav-right'>
						<h3 class='title'>SEV CAREplus Organization Inc.</h3>
						<p>Purok 5 National Highway Brgy. Maahas Los Baños, Laguna</p>
						<p>Tel No.: 049-557-1091 Mobile: 09759310484</p>
					</div>
				</nav><br>

				<div class='div'>
					<table>
						<thead>
							<tr>
								<th>S/N</th>
								<th>APPLICATION NO.</th>
								<th>APPLICANT NAME</th>
								<th>COORDINATOR'S CODE</th>
								<th>COORDINATOR</th>
								<th>BRANCH CODE</th>
								<th>BRANCH</th>
								<th>STATUS</th>
							</tr>
						</thead>
						".$printer."
					</table>
				</div>
			</body>
			</html>
			";

			$document = new Dompdf();

			$document->loadHtml($page);
			$document->setPaper('A4', 'portrait');
			$document->render();
			$document->stream('{name} - SEV Coi Ledger', array('Attachment'=>0));
	}
}
else{
	echo "No handled members";
}

?>