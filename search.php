<?php
// ask for the functions from it's folder
	require_once('Functions.php');
// insert the header
echo makeHeader("Search MotorHome");
// insert the navigation
echo makeMenu();
// insert the the content
echo makeMainArea(" ","Search for your MotorHome! "," ");


// open datebase connection
include 'db_conn.php';

// start a form to modify the search
	echo "<div id = \"maincontent\">";
	echo "<form id = \"EditMotorHome\" action = \"searchresult.php\" method = \"get\">";
	echo "<table class=\"motor\">";
	echo "	<tr class=\"motor\">";
	echo "	<td colspan=\"2\"> </td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Manufacturer</td>";
	echo "	<td><select name = \"manufacturerGet\" id = \"manufacturerGet\">";
	echo "<option value = \"any\" selected=\"true\">ANY</option>";
	// make a database query to add the manufacturer with no duplicate into a list with an alphabet order
	$sql = "SELECT DISTINCT manufacturer FROM motorhomes order by manufacturer ASC";
	$queryresult = mysql_query($sql)
		or die(mysql_error());
	while ($row = mysql_fetch_assoc($queryresult)) {
		$manufacturer = $row['manufacturer'];
		echo "<option value =\"$manufacturer\">$manufacturer</option>";
	}
	// finish adding the option to the list
	echo "</select></td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "	<td>Model</td>";
	echo "	<td><select name = \"modelGet\" id = \"modelGet\">";
	echo "<option value = \"any\" selected=\"true\">ANY</option>";

	// make a database query to add the models with no duplicate into a list with an alphabet order
	$sql = "SELECT DISTINCT model FROM motorhomes order by model ASC";
	$queryresult = mysql_query($sql)
		or die(mysql_error());
	while ($row = mysql_fetch_assoc($queryresult)) {
		$model = $row['model'];
		echo "<option value = \"$model\">$model</option>";
	}
	//finis adding the option to the list
	echo "</select></td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "	<td>Year</td>";
	echo "	<td>";
	// make years list that called from functions
	echo makeListYears("yearGet","","addAny");

	echo "</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Engine</td>";
	echo "<td><select name = \"engineGet\" id = \"engineGet\">";
	echo "<option value = \"any\" selected=\"true\">ANY</option>";

	// make a database query to add the engines with no duplicate into a list with an alphabet order
	$sql = "SELECT DISTINCT engine FROM motorhomes order by engine ASC";
	$queryresult = mysql_query($sql)
	or die(mysql_error());
	while ($row = mysql_fetch_assoc($queryresult)) {
		$engine = $row['engine'];
	echo "<option value = \"$engine\">$engine</option>";
	}
	// finish adding the options
	echo "</select></td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "	<td>Berths</td>";
	echo "<td>";

	// START adding berths
	echo makeListBerths("berthsGet","","addAny");
	// END adding berths
	echo "</td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "	<td>Mileage</td>";
	echo "<td><select name = \"mileageGet\" id = \"mileageGet\">";
	echo "<option value = \"any\" selected=\"true\">ANY</option>";

	// make a database query to add the mileage with no duplicate into a list with an numric order
		$sql = "SELECT DISTINCT mileage FROM motorhomes order by mileage ASC";
		$queryresult = mysql_query($sql)
			or die(mysql_error());
		while ($row = mysql_fetch_assoc($queryresult)) {
			$mileage = $row['mileage'];
			echo "<option value = \"$mileage\">$mileage</option>";
		}
		// finish adding options
	echo "</select></td>";
	echo "	</tr>";

	echo "	<tr>";
	echo "	<td>Price</td>";
	echo "<td>";
		// START make list of priceRange using array
		$priceArray = array ("lt30" => "less than 30000", "30to40" => "30000-40000", "mt40" => "more than 40000" );
		echo makeList("priceGet",$priceArray,"any","addAny");
		// FINISH make list of priceRange by array
	echo "</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Layout</td>";
	echo "<td>";
		// START make list of Layout by array
		$LayoutArray = array ("Front Lounge" => "Front Lounge", "Rear Lounge" => "Rear Lounge", "Seatbelts" => "Seatbelts");
		echo makeList("layoutGet",$LayoutArray,"any","addAny");
		// END make list of Layout by array
	echo "</select></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Ownership</td>";
	echo "<td>";
		// START make list of ownership by array
		$optionsArray = array ("new" => "new", "preowned" => "preowned");
		echo makeList("ownershipGet",$optionsArray,"any","addAny");
		// FINISH make list of ownership by array
	echo "</td></tr>";
	echo "	<tr>";
	echo "	<td>Description</td>";
	echo "	<td><input type=\"text\" name=\"descriptionGet\" id=\"descriptionGet\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td colspan=\"2\"><input type=\"submit\" value=\"Search\"></td>";
	echo "	</tr>";
	echo "</table>";
	echo "</form>";
	echo "</div>";
// End of the form

// close the database connection
mysql_free_result($queryresult);
mysql_close($conn);

// making footer
echo makeFooter();

?>