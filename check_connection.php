<!DOCTYPE html>
<html>
	<head>
		<title>Check Connection</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
	</head>
	<body>
		<h1>Check Connection</h1> 	
		<p>
			<?php 
				include "data_handler.php";

				$dh = new DataHandler();
				$results = $dh->sp_get_service_by_id('1'); // using your new function
				
				echo "<table class='fullborder'>
				<tr>
					<th>Service ID</th>
					<th>Service Name</th>
					<th>Category</th>
					<th>Service Price</th>
					<th>Service Type</th>
					<th>Description</th>
				</tr>
				<tr>";
				echo "<td>".$results['Service_ID']."</td>";
				echo "<td>".$results['Service_Name']."</td>";
				echo "<td>".$results['Category']."</td>";
				echo "<td>".$results['Service_Price']."</td>";
				echo "<td>".$results['Service_Type']."</td>";
				echo "<td>".$results['Description']."</td>";
				echo "</tr></table>";
			?> 
		</p>
	</body>
</html>
