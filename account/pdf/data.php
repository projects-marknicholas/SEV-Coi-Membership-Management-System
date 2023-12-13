<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print {name} Ledger</title>
	<style type="text/css">
		*{
			font-family: arial;
		}
		.grid-1{
			display: grid;
			grid-template-columns: auto;
		}
		.grid-2{
			display: grid;
			grid-template-columns: auto auto;
		}
		.grid-3{
			display: grid;
			grid-template-columns: auto auto auto;
		}
		.grid-4{
			display: grid;
			grid-template-columns: auto auto auto auto;
		}
		.grid-5{
			display: grid;
			grid-template-columns: auto auto auto auto auto;
		}
		.grid-6{
			display: grid;
			grid-template-columns: auto auto auto auto auto auto;
		}
		.grid-7{
			display: grid;
			grid-template-columns: auto auto auto auto auto auto auto;
		}
		.grid-item{
			box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
			padding: 7px;
		}
		.payment-table}{
			width: 100%;
		}
		.payment-table > table{
			width: 100%;
		}
		.payment-table > table > thead > tr > th{
			box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
			padding: 5px;
		}
		.payment-table > table > tbody > tr  > td{
			box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
			padding: 5px;
			text-align: center;
		}
	</style>
</head>
<body>

	<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Member's Name: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Age: <span style="font-weight: normal;">{text}</span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Birthday: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Address: <span style="font-weight: normal;">{text}</span></p>
					</div>
					<div class="grid-2">
						<div class="grid-item">
							<p class="ledger-title">MOP: <span style="font-weight: normal;">{text}</span></p>
						</div>
						<div class="grid-item">
							<p class="ledger-title">M.FEE: <span style="font-weight: normal;">{text}</span></p>
						</div>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Effectivity: <span style="font-weight: normal;">{text}</span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Terms: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>

				<div class="grid-2">
					<div class="grid-item">
						<p class="ledger-title">Program Type: <span style="font-weight: normal;">{text}</span></p>
					</div>
					<div class="grid-item">
						<p class="ledger-title">Cert No.: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>

				<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Coordinator: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>

				<div class="grid-1">
					<div class="grid-item">
						<p class="ledger-title">Collector: <span style="font-weight: normal;">{text}</span></p>
					</div>
				</div>
			</form>
			<br><br>
			
			<div class="payment-table">
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
					<tbody>
						<tr>
							<td>1</td>
							<td>12345</td>
							<td>June 7, 2004</td>
							<td>10,000</td>
							<td>June</td>
							<td>20,000</td>
							<td>sign</td>
						</tr>
					</tbody>
					<tbody>
						<tr>
							<td>1</td>
							<td>12345</td>
							<td>June 7, 2004</td>
							<td>10,000</td>
							<td>June</td>
							<td>20,000</td>
							<td>sign</td>
						</tr>
					</tbody>
					<tbody>
						<tr>
							<td>1</td>
							<td>12345</td>
							<td>June 7, 2004</td>
							<td>10,000</td>
							<td>June</td>
							<td>20,000</td>
							<td>sign</td>
						</tr>
					</tbody>
				</table>
			</div>

</body>
</html>