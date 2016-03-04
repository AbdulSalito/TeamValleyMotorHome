<?php

// ask for the functions from it's file
require_once('Functions.php');

// insert the header
echo makeHeader("Add MotorHome");
// insert the navigation
echo makeMenu();
// insert the content
echo makeMainArea(" "," "," ");


echo "<div id = \"maincontent\">";

// START valdate if the all required fields exicts!
if (isset($_POST['manufactrurerPost']) && isset($_POST['modelPost']) && isset($_POST['enginePost']) && isset($_POST['berthsPost']) && isset($_POST['mileagePost']) && isset($_POST['pricePost']) && isset($_POST['layoutPost']) && isset($_POST['descriptionPost']) ) {

			// filling the fields into a variables
			$manufactrurer = trim($_POST['manufactrurerPost']);
			$model = trim($_POST['modelPost']);
			$year = trim($_POST['yearPost']);
			$engine = trim($_POST['enginePost']);
			$berths = trim($_POST['berthsPost']);
			$mileage = trim($_POST['mileagePost']);
			$price = trim($_POST['pricePost']);
			$layout = trim($_POST['layoutPost']);
			$ownership = trim($_POST['ownershipPost']);
			$description = trim($_POST['descriptionPost']);

			// START valdate if all required fields are not empty
			if ($manufactrurer != "" && $model != "" && $year != "" && $engine != "" && $berths != "" && $mileage != "" && $price != "" && $layout != "" && $ownership != "" && $description != "") {

				// START checking if the mileage or price are actually numbers!
				if (is_numeric($mileage) && is_numeric($price) ) {

					// START checking the lengths of the fields
					  if (strlen($manufactrurer) < 26 && strlen($model) < 31 && strlen($engine) < 16 && strlen($mileage) < 7 && strlen($price) < 7 ) {

					  		// changing the special characters to be inserted safely into database
							$descriptionHtmlSpeChar = htmlspecialchars($description,ENT_QUOTES);

					  		//start connection
							include 'db_conn.php';

					 	 	//inserting the VALID data into databease

							$sql = "INSERT INTO motorhomes (manufacturer, model, year, engine, berths, mileage, price, layout, ownership, description)
							values ('$manufactrurer', '$model', '$year', '$engine', '$berths', '$mileage', '$price', '$layout', '$ownership', '$descriptionHtmlSpeChar')";
							mysql_query($sql) or die (mysql_error());

					  		// displaying the inserted data as a confirmation

							echo "<div id = \"maincontent\">";
							echo "<table class=\"motor\">";
							echo "	<tr class=\"motor\">";
							echo "	<td colspan=\"2\"> The following Motor Home successfully added! </td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Manufactrurer</td>";
							echo "	<td><strong>$manufactrurer</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Model</td>";
							echo "	<td><strong>$model</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Year</td>";
							echo "	<td><strong>$year</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Engine</td>";
							echo "	<td><strong>$engine</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Berths</td>";
							echo "	<td><strong>$berths</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Mileage</td>";
							echo "	<td><strong>$mileage</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Price</td>";
							echo "	<td><strong>$price</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Layout</td>";
							echo "	<td><strong>$layout</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Ownership</td>";
							echo "<td><strong>$ownership</strong></td>";
							echo "	</tr>";
							echo "	<tr>";
							echo "	<td>Description</td>";
							echo "	<td><strong>".nl2br($description)."</strong></td>";
							echo "	</tr>";
							echo "</table>";
							echo "</div>";
					  	// end displaying data

					  	echo "<p><a href=\"addmotorhome.php\">Add more Motor Homes</a></p>";


							mysql_close($conn);
					  	// close database connection
					  }
					else {echo "<p>some Fields are too long</p>\n";}
					// END checking the lengths of the fields

				}
				else{
					echo("<p>Milage or Price is Not an integer</p>\n");
				}
				// END checking if the mileage or price are actually numbers!
			}
			else {
				echo "<p>You have not entered all of the required fields</p>\n";}
			// END valdate if all required fields are not empty
}
else {
	echo "<p>You have to complete the form first!</p>\n";}
// END valdate if the all required fields exicts!

echo "</div>";
echo makeFooter();
?>