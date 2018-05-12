<?php
require_once("../config.php");

$today=$_GET['today'];
$driverId=$_GET['driverId']; 

$sql = 'SELECT * 
		FROM dispatches';

if((isset($today)&& $today !='') && (isset($driverId)&& $driverId !='')){
	$sql .= " WHERE dispatches.date >= DATE(CURRENT_DATE)  AND driver_id LIKE " .$driverId;
} else if(isset($today)&& $today !=''){
	$sql .= " WHERE dispatches.date >= DATE(CURRENT_DATE) ";
} else if(isset($driverId)&& $driverId !=''){
	$sql .= " WHERE driver_id LIKE " .$driverId;
}
//echo '<script type="text/javascript">alert("'.$sql.'");'</script>';
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>
<?php echo file_get_contents("../html/header1.html"); ?>
<title>Displaying Dispatches Table</title>
<?php echo file_get_contents("../html/header2.html"); ?>


	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>All Dispatches</h1>
	<table class="data-table">
		<caption class="title">Hoffman Trucking Dispatches</caption>
		<thead>
			<tr>
				<th>ID</th>
				<th>INVOICE</th>
				<th>TRUCK</th>
				<th>PO NUMBER</th>
				<th>SALES PERSON</th>
				<th>DELIVERY</th>
				<th>CUSTOMER ID</th>
				<th>CUSTOMER NAME</th>
				<th>CUSTOMER NUMBER</th>
				<th>DROPOFF LOCATION</th>
				<th>MATERIALS</th>
				<th>DATE</th>
				<th>DROPOFF TIMESLOT</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query))
		{
			//$amount  = $row['amount'] == 0 ? '' : number_format($row['amount']);
			echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['invoice'].'</td>
					<td>'.$row['truck'].'</td>
					<td>'.$row['po_number'].'</td>
					<td>'.$row['sales_initials'].'</td>
					<td>'.$row['delivery_number'].'</td>
					<td>'.$row['customer_number'].'</td>
					<td>'.$row['customer'].'</td>
					<td>'.$row['customer_phone'].'</td>
					<td>'.$row['location_dropoff'].'</td>
					<td>'.$row['materials'].'</td>
					<td>'. date('F d, Y', strtotime($row['date'])) . '</td>
					<td>'.$row['timeslot'].'</td>
				</tr>';
			$total += $row['id'];
			$no++;
		}?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">TOTAL DISPATCHES</th>
				<th><?=number_format($no-1)?></th>
			</tr>
		</tfoot>
	</table>

<?php echo file_get_contents("../html/header3.html"); ?>
