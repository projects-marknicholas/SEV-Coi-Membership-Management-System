<?php

use Dompdf\Dompdf;
require_once 'vendor/autoload.php';
require_once '../../config.php';


if (isset($_GET['memberid'])) {

	$sql = "SELECT * FROM member WHERE id = '".$_GET['memberid']."' ";
	$res = mysqli_query($link, $sql);

	$img = file_get_contents('../img/logo.png');
	$img = base64_encode($img);
	$printer = '';

	if (mysqli_num_rows($res) > 0) {
		while($result = mysqli_fetch_assoc($res)){

			$my_sql = "SELECT * FROM payment WHERE payment_id = '".$_GET['memberid']."'";
			$my_res = mysqli_query($link, $my_sql);
			$i = 1;

			if (mysqli_num_rows($my_res) > 0) {
			while ($fetch = mysqli_fetch_assoc($my_res)){
				$printer .= "
					<tbody>
						<tr>
							<td>".$i++."</td>
							<td>".$fetch['or_no']."</td>
							<td>".$fetch['payment_date']."</td>
							<td>".$fetch['amount_collected']."</td>
							<td>".$fetch['payment_month']."</td>
							<td>".$fetch['running_total']."</td>
							<td>".$fetch['coll_sign']."</td>
						</tr>
					</tbody>
				";
				}
			}

			$page = "
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset='utf-8'>
				<title>Print ".$result['firstname']." ".$result['middlename']." ".$result['lastname']." Ledger</title>
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
						text-transform: capitalize;
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

				<div class='top'>
					<table>
						<thead>
							<tr>
								<th>Member's Name: ".$result['firstname']." ".$result['middlename']." ".$result['lastname']."</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>Age: ".$result['age']."</th>
								<th>Birthday: ".$result['date_of_birth']."</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>Address: ".$result['residential_address']."</th>
								<th>MOP: ".$result['mode_of_payment']."</th>
								<th>M.FEE: ".$result['membership_fee']."</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>Effectivity: ".$result['effectivity']."</th>
								<th>Terms: ".$result['terms']."</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>Program Type: ".$result['sev_package']."</th>
								<th>Cert No.: ".$result['application_no']."</th>
							</tr>
						</thead>
						<thead>
							<tr>
								<th>Collector: ".$result['collector']."</th>
							</tr>
						</thead>
					</table>
				</div>

				<br>

				<div class='div'>
					<table>
						<thead>
							<tr>
								<th>S/N</th>
								<th>OR No.</th>
								<th>DATE</th>
								<th>AMOUNT COLLECTED</th>
								<th>MONTH</th>
								<th>RUNNING TOTAL</th>
								<th>COLL SIGN</th>
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
			$document->stream(''.$result['firstname'].' '.$result['lastname'].' - SEV Coi Ledger', array('Attachment'=>0));
		}
	}
}

?>