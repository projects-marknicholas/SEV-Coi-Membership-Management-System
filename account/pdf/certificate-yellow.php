<?php

use Dompdf\Dompdf;
require_once 'vendor/autoload.php';
require_once '../../config.php';

if (isset($_GET['memberid'])) {
	$sql = "SELECT * FROM member WHERE id = '".$_GET['memberid']."' ORDER BY id DESC";
	$res = mysqli_query($link, $sql);

	$img = file_get_contents('../img/logo.png');
	$img = base64_encode($img);
	$fimg = file_get_contents('../img/cert-b-fry.png');
	$fimg = base64_encode($fimg);
	$limg = file_get_contents('../img/c-logo.png');
	$limg = base64_encode($limg);
	$signature = file_get_contents('../img/signature.png');
	$signature = base64_encode($signature);
	$printer = '';
	$i = 1;

	if (mysqli_num_rows($res) > 0) {
		while ($result = mysqli_fetch_assoc($res)) {
			$member = $result['firstname']." ".$result['middlename']." ".$result['lastname'];
			$branch = $result['branch'];
			$certificate_no = $result['application_no'];
			$sev_package = $result['sev_package'];
			$terms = $result['terms'];

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
				<title>".$member." - Certificate</title>
				<link rel='icon' type='image/x-icon' href='../img/logo.png'>
				<style type='text/css'>
					*{
						padding: 0;
						margin: 0;
						font-family: sans-serif;
					}
					.frame{
						position: relative;
						height: 45.5%;
						width: 100%;
						background: url(data:image;base64,".$fimg.");
						background-size: cover;
						background-repeat: no-repeat;
						background-position: center;
						margin-top: 20px;
						z-index: 100;
					}
					.frame2{
						position: relative;
						height: 45.5%;
						width: 100%;
						margin-top: 20px;
						z-index: 100;
						border-top: 1px solid rgba(0,0,0,0.2);
						border-bottom: 1px solid rgba(0,0,0,0.2);
					}
					.frame-body{
						position: absolute;
						top: 60px;
						left: 80px;
						width: 80%;
						margin: auto;
						display: block;
						background: url(data:image;base64,".$limg.");
						background-size: 350px 300px;
						background-repeat: no-repeat;
						background-position: center;
					}
					h1{
						text-align: center;
						font-size: 1.2em;
					}
					h2{
						text-align: center;
						font-size: 1em;
					}
					.name{
						text-align: center;
						margin-top: 10px;
						font-weight: bolder;
						font-size: 1.5em;
					}
					.p{
						text-align: center;
						font-size: .8em;
					}
					nav{
						position: relative;
					}
					.logo{
						position: absolute;
						height: 60px;
						width: 80px;
					}
					h3, .nav-right > p, .f-title{
						text-align: center;
					}
					.nav-right > h3{
						font-size: 1.8em;
						font-style: italic;
						font-weight: normal;
					}
					.pp, .ppp{
						font-size: .7em;
					}
					.ppp{
						margin-top: 7px;
					}
					.signature{
						position: absolute;
						top: 280px;
						right: 130px
					}
					.f-title{
						font-weight: bolder;
						font-size: 1.3em;
						margin-top: 20px;
					}
					.frame2-left{
						width: 45%;
						margin-left: 3%;
						font-size: .7em;
						margin-top: 10px;
					}
					.frame2-right{
						position: absolute;
						top: 46px;
						right: 3%;
						width: 45%;
						margin-left: 3%;
						font-size: .7em;
						margin-top: 10px;
					}
				</style>
			</head>
			<body>


			<div class='frame'>
				<div class='frame-body'>

				<nav>
					<img src='data:image;base64,".$img."' class='logo'>
					<div class='nav-left'></div>
					<div class='nav-right'>
						<h3 class='title'>SEV CAREplus Organization Inc.</h3>
						<p class='pp'>SEV-Funeral home-Headquarter 5239 APT -B National Road Brgy. Maahas<br> Los Baños Laguna-4030Tel No. 049 557 1091</p>
					</div>
				</nav><br>
					<h1>Membership Certificate</h1>
					<h2>This is to certify</h2>
					<p class='name'>".$member."</p>
					<p class='p'>is a provisionary member of</p>
					<p class='p' style='text-align: justify;'>
						<strong>SEV-CAREplus Organization Inc.</strong>, a non stock/non profit corporation incorporated under the laws of the 
						Republic of the Philippines and is entitled to the full benefits and provileges of such membership, subject to duties and obligations, as more fully set forth in the Rules and Regulations of CAREplus Program. <strong>In witness Where of,</strong> the Corporation has caused this Certificate to be executed by its duly authorized officers this ".date('d')." of ".date('M, Y').", and its corporate seal to be here unto affixed.
					</p><br>
					<p class='ppp'>Membership Type: <strong><span style='text-transform: uppercase;'>".$sev_package."</span></strong></p>
					<p class='ppp'>Membership Term: <strong>".$terms."</strong></p>
					<p class='ppp'>Certificate No.: <strong>".$certificate_no."</strong></p>
					<p class='ppp'>Branch: <strong>".$branch."</strong></p>

					<div class='signature'>
						<img src='data:image;base64,".$signature."'>
					</div>
				</div>
			</div>

			<div class='frame2'>
				<p class='f-title'>SENIOR CITIZEN - DISCLAIMER</p>

				<div class='frame2-left'>
					1.) <strong>LAYUNIN</strong> - pagbuklurin ang bawat Pamilya at Miyembro na magtulungan sa oras ng pangangailangan lalu't higil sa panahon ng kagipitan ng paghahanda at pagdadamayan ng bawat isa.<br>
					2.) <strong>PAGSAPI</strong> - (Membership) ang SEV-COI ay bukas sa sinumang Pilipino na nasa wastong isip, edad na hindi bababa sa labing walong taong gulang (18 years old) na hindi lalampas sa limampot siyam (59 years old) may kakayahang gumanap ng tungkulin bilang kaanib at naninirahan sa lugar kung saan mayroong operasyon ang Organisasyon.<br>
					3.) <strong>PAGPAPAREHISTRO</strong> - (Registration) Ang sinumang kasapi at dapat magparehistro bilang kasapi sa pamamagitan ng pagsu-sumite ng aplikasyon ng nilalaman ng mga personal na hinihingi ng Organisasyon lakip ang kanyang lagda ng patakaran ng programang ito at bayaran ang 1-time registration fee na nagkakahalaga ng isan-daang piso (100).<br>
					4.) <strong>KONTRIBUSYON SA PAGSAPI</strong> - (Membership Fee) Ang lahat ng miyembro ng samahan ay kinakailangang magbayad ng tuloy tuloy. Ang Membership Fee ay <strong>HINDI REFUNDABLE</strong> Bagkus, Habang Buhay <strong>(LIFETIME)</strong> at <strong>TRANSFERABLE</strong> na pwedeng ipagamit sinumang piliin ng Miyembro.<br>
					5.) <strong> Sa panahon na hindi nakabayad ng 3-buwan o, hindi To Date/UPDATE (OFFLINE) at inabot ng pagpanaw, ang Organisasyon ay magdadag-dag ng 10% mula sa kabuuang halaga ng Membership Fee</strong> (Contracted Price) Special Provision (SPL).
				</div>

				<div class='frame2-right'>
					<strong style='text-align: center;'>'OBLIGASYON AT TUNGKULIN NG BAWAT KASAPI'</strong><br>
					<strong>(A.) Aktibong makilahok</strong> sa lahat ng gawain; programa na may kaugnayansa Organisasyon<br>
					<strong>(B.) Regular na pagbabayad</strong> ng bawat kasapi.<br>
					<strong>(C.) Pangalagaan </strong>ang karangalan, adhikain at layunin ng programa.<br>
					<strong>(D.) Paghusaying lubos</strong> ang pag ganap ng tungkulin ng bawat isang kasapi upang matiyak ang katuparan ng Layunin, Misyon, Bisyon ng kabuuang programa.<br><br>

					<strong style='text-align: center;'>'KUNDISYON AT TULONG SA PAGPANAW'</strong><br>
					<strong>(i.) Ang pinansyal na tulong</strong> at libreng serbisyong burial ay pagkakaloob kung ang kaanib at <strong>up to date</strong> na nagbabayad ng kanyang membership fee at naka miyembro ng hindi bababa sa 1-taong (atleast 1 year) diretsong paghuhulog mula sa araw ng kanyang pagsali (Natural Death) atleast 3-mos. kung Accidental Death.<br>
					<strong>(ii.) sa sandaling hindi umabot </strong> sa itinakdang pamantayang araw bilang kasapi, babayaran ng pamilya ng pumanaw ang kakulangan sa membership fee bilang balanse, at nasabing karagdagang pursiyento bago ito ipalibing.<br>
					<strong>(iii.)Walang pananagutan</strong> ang Organisasyon kung ibang funeraria na hindi official service provider ng Organisasyon ang pinili ng pamilya. Bagkus ang Membership ay agad ililipat sa pinakamalapit na kaanak (Transfer) Dapat agad na isumite ng Pamilya ang mga sumusunod na dokumento (Certificate/Policy, Ledger, OR, at Death certificate).
				</div>
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