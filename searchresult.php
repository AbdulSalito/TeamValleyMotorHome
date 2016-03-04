<?php

require_once('Functions.php');

echo makeHeader("Search MotorHome");
echo makeMenu();
echo makeMainArea(" ","Search for your MotorHome! "," ");


// get the search fields from the search page and insert them into variables
$manufacturerGet = trim($_GET['manufacturerGet']);
$modelGet = trim($_GET['modelGet']);
$yearGet = trim($_GET['yearGet']);
$engineGet = trim($_GET['engineGet']);
$berthsGet = trim($_GET['berthsGet']);
$mileageGet = trim($_GET['mileageGet']);
$priceGet = trim($_GET['priceGet']);
$layoutGet = trim($_GET['layoutGet']);
$ownershipGet = trim($_GET['ownershipGet']);
$descriptionGet = trim($_GET['descriptionGet']);

// start a new variable to be able to do the where clause in the database efficintelly
$whereClause = "";

// start checking if the user didn't modify any field!
if ($descriptionGet == "" && $manufacturerGet== "any" && $modelGet=="any" && $yearGet=="any" && $engineGet=="any" && $berthsGet=="any" && $mileageGet=="any" && $priceGet=="any" && $layoutGet=="any" && $ownershipGet=="any" ) {
	$whereClause = "";
}
// end checking if the user didn't modify any field!

// Start checking if the user have chosen an option from manufacturer list and all the other fields
elseif ($manufacturerGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE manufacturer='$manufacturerGet'";
	if ($modelGet!= "any") {
		$whereClause .= " AND model='$modelGet'";
	}
	if ($yearGet!= "any") {
		$whereClause .= " AND year='$yearGet'";
	}
	if($engineGet!="any"){
		$whereClause .= " AND engine='$engineGet'";
	}
	if($berthsGet!="any"){
		$whereClause .= " AND berths='$berthsGet'";
	}
	if($mileageGet!="any"){
		$whereClause .= " AND mileage='$mileageGet'";
	}
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// END checking if the user have chosen an option from manufacturer list

// Start checking if the user have chosen an option from MODEL list and all the other fields except manufacturer
elseif ($modelGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE model='$modelGet'";
	if ($yearGet!= "any") {
		$whereClause .= " AND year='$yearGet'";
	}
	if($engineGet!="any"){
		$whereClause .= " AND engine='$engineGet'";
	}
	if($berthsGet!="any"){
		$whereClause .= " AND berths='$berthsGet'";
	}
	if($mileageGet!="any"){
		$whereClause .= " AND mileage='$mileageGet'";
	}
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// END checking if the user have chosen an option from MODEL list

// Start checking if the user have chosen an option from YEAR list and all the other fields except manufacturer and model!
elseif ($yearGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE year='$yearGet'";
	if($engineGet!="any"){
		$whereClause .= " AND engine='$engineGet'";
	}
	if($berthsGet!="any"){
		$whereClause .= " AND berths='$berthsGet'";
	}
	if($mileageGet!="any"){
		$whereClause .= " AND mileage='$mileageGet'";
	}
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// end checking if the user have chosen an option from YEAR list


// Start checking if the user have chosen an option from ENGINE list and all the other fields except manufacturer, model and year!
elseif ($engineGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE engine='$engineGet'";
	if($berthsGet!="any"){
		$whereClause .= " AND berths='$berthsGet'";
	}
	if($mileageGet!="any"){
		$whereClause .= " AND mileage='$mileageGet'";
	}
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// END checking if the user have chosen an option from ENGINE list

// Start checking if the user have chosen an option from BERTHS list and all the other fields except manufacturer, model, year and engine!
elseif ($berthsGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE berths='$berthsGet'";
	if($mileageGet!="any"){
		$whereClause .= " AND mileage='$mileageGet'";
	}
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// END checking if the user have chosen an option from BERTHS list

// Start checking if the user have chosen an option from MILEAGE list and the rest fields
elseif ($mileageGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE mileage='$mileageGet'";
	if($priceGet!="any"){
		if ($priceGet == "lt30") {
			$whereClause .= " AND price<30000";
		}
		elseif ($priceGet == "30to40"){
			$whereClause .= " AND price>30000 AND price<=40000 ";
		}
		elseif ($priceGet == "mt40") {
			$whereClause .= " AND price>40000";
		}
	}
	if($layoutGet!="any"){
		$whereClause .= " AND layout='$layoutGet'";
	}
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// END checking if the user have chosen an option from MILEAGE list

// Start checking if the user have chosen a range from PRICE list and the rest fields
elseif ($priceGet!= "any" && $whereClause =="") {
		// Start if the user have chosen less than 30,000
		if ($priceGet == "lt30") {
			$whereClause .= "WHERE price<30000";
			if($layoutGet!="any"){
				$whereClause .= " AND layout='$layoutGet'";
			}
			if($ownershipGet!="any"){
				$whereClause .= " AND ownership='$ownershipGet'";
			}
			if($descriptionGet!=""){
				$whereClause .= " AND description LIKE '%$descriptionGet%'";
			}
		}
	// End if the user have chosen less than 30,000

	// Start if the user have chosen between 30,000 and 40,000
		elseif ($priceGet == "30to40"){
			$whereClause .= "WHERE (price>30000 AND price<=40000) ";
			if($layoutGet!="any"){
				$whereClause .= " AND layout='$layoutGet'";
			}
			if($ownershipGet!="any"){
				$whereClause .= " AND ownership='$ownershipGet'";
			}
			if($descriptionGet!=""){
				$whereClause .= " AND description LIKE '%$descriptionGet%'";
			}
		}
	// End if the user have chosen between 30,000 and 40,000

	// Start if the user have chosen more than 40,000
		elseif ($priceGet == "mt40") {
			$whereClause .= "WHERE price>40000";
			if($layoutGet!="any"){
				$whereClause .= " AND layout='$layoutGet'";
			}
			if($ownershipGet!="any"){
				$whereClause .= " AND ownership='$ownershipGet'";
			}
			if($descriptionGet!=""){
				$whereClause .= " AND description LIKE '%$descriptionGet%'";
			}
		}
	// End if the user have chosen more than 40,000
}
// END checking if the user have chosen a range from PRICE list


// Start checking if the user have chosen a range from Layout list and the fields ownership and description
elseif ($layoutGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE layout='$layoutGet'";
	if($ownershipGet!="any"){
		$whereClause .= " AND ownership='$ownershipGet'";
	}
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// End checking if the user have chosen a range from Layout list

// Start checking if the user have chosen a range from Ownership list and description
elseif ($ownershipGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE ownership='$ownershipGet'";
	if($descriptionGet!=""){
		$whereClause .= " AND description LIKE '%$descriptionGet%'";
	}
}
// End checking if the user have chosen a range from Ownership list


// Start checking if the user have type anything description
elseif ($descriptionGet!= "any" && $whereClause =="") {
	$whereClause = "WHERE description LIKE '%$descriptionGet%'";
}
// End checking if the user have type anything description

// start the database connection
include 'db_conn.php';

// sql select with the variable where clause that might be modefied!
$sql = "SELECT * FROM motorhomes $whereClause";
$queryresult = mysql_query($sql)
			or die(mysql_error());
//echo "$sql";
if (mysql_num_rows($queryresult) > 0) {

// if there is any returned record it'll be display now!
echo "<div id = \"maincontent\">";
echo "<table class=\"motor\">";

while ($row = mysql_fetch_assoc($queryresult)) {
	$id = $row['motorID'];
	$manufacturer = $row['manufacturer'];
	$model = $row['model'];
	$year = $row['year'];
	$engine = $row['engine'];
	$berths = $row['berths'];
	$mileage = $row['mileage'];
	$price = $row['price'];
	$layout = $row['layout'];
	$ownership = $row['ownership'];
	$description = $row['description'];

	echo "	<tr class=\"motor\">";
	echo "	<td colspan=\"4\">$year $manufacturer </td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Motor ID</td>";
	echo "	<td><strong>$id</strong></td>";
	echo "	<td>Manufactrurer</td>";
	echo "	<td><strong>$manufacturer</strong></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Model</td>";
	echo "	<td><strong>$model</strong></td>";
	echo "	<td>Year</td>";
	echo "	<td><strong>$year</strong></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Engine</td>";
	echo "	<td><strong>$engine</strong></td>";
	echo "	<td>Berths</td>";
	echo "	<td><strong>$berths</strong></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Milage</td>";
	echo "	<td><strong>$mileage</strong></td>";
	echo "	<td>Price</td>";
	echo "	<td><strong>£$price</strong></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Layout</td>";
	echo "	<td><strong>$layout</strong></td>";
	echo "	<td>Ownership</td>";
	echo "	<td><strong>$ownership</strong></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Description</td>";
	echo "	<td colspan=\"3\"><strong>$description</strong></td>";
	echo "	</tr>";
}
echo "</table>";
echo "</div>";
// end the display

// close the database connection
mysql_free_result($queryresult);
mysql_close($conn);

}
else {
	// if there are no records match the search
	echo "<p>Sorry no Motor Homes found! Please search again!</p>";
}

// make the footer
echo makeFooter();

?>