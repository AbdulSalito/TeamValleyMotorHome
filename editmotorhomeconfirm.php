<?php
require_once('Functions.php');

echo makeHeader("Edit MotorHome");
echo makeMenu();
echo makeMainArea(" "," "," ");

echo "<div id = \"maincontent\">";

		// START valdate if the all required fields exicts!
if (isset($_POST['idPost']) && isset($_POST['manufactrurerPost']) && isset($_POST['modelPost']) && isset($_POST['enginePost']) && isset($_POST['berthsPost']) && isset($_POST['mileagePost']) && isset($_POST['pricePost']) && isset($_POST['layoutPost']) && isset($_POST['descriptionPost']) ) {

	// filling the fields into a variables
		$motorhid = trim($_POST['idPost']);
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
	if ($motorhid != "" && $manufactrurer != "" && $model != "" && $year != "" && $engine != "" && $berths != "" && $mileage != "" && $price != "" && $layout != "" && $ownership != "" && $description != "") {

		// START checking if the mileage or price are actually numbers!
		if (is_numeric($mileage) && is_numeric($price) ) {

			// START checking the lengths of the fields
			if (strlen($manufactrurer) < 26 && strlen($model) < 31 && strlen($engine) < 16 && strlen($mileage) < 7 && strlen($price) < 7 ) {

				// changing the special characters to be inserted safely into database
				$descriptionHtmlSpeChar = htmlspecialchars($description,ENT_QUOTES);

				//start connection
		include 'db_conn.php';
		$sql = "UPDATE motorhomes SET manufacturer='$manufactrurer', model='$model', year='$year', engine='$engine', berths='$berths', mileage='$mileage', price='$price', layout='$layout', ownership='$ownership', description='$descriptionHtmlSpeChar' WHERE motorID= $motorhid";
		mysql_query($sql) or die (mysql_error());

		echo "<p>Motor Home successfully Edited!</p>\n";
		echo "<p><a href=\"eddelmotorhome.php\">Back to Edit and Delete Page</a></p>";

		mysql_close($conn);
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