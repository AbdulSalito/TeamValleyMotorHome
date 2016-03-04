<?php
require_once('Functions.php');

echo makeHeader("Edit MotorHome");
echo makeMenu();
echo makeMainArea(" "," "," ");


$motorhomeid = $_GET['motorID'];

	include 'db_conn.php';

	$sql = "SELECT * FROM motorhomes WHERE motorID='$motorhomeid'";
	$queryresult = mysql_query($sql)
	or die(mysql_error());

		echo "<div id = \"maincontent\">";

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


		echo "<form id = \"EditMotorHome\" action = \"editmotorhomeconfirm.php\" method = \"post\">";
		echo "<table class=\"motor\">";
		echo "	<tr class=\"motor\">";
		echo "	<td colspan=\"2\"> Edit motor home </td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>MotorHome ID</td>";
		echo "	<td><input type=\"text\" name=\"idPost\" id=\"idPost\" value=\"$id\" readonly=\"true\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Manufactrurer</td>";
		echo "	<td><input type=\"text\" name=\"manufactrurerPost\" id=\"manufactrurerPost\" value=\"$manufacturer\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Model</td>";
		echo "	<td><input type=\"text\" name=\"modelPost\" id=\"modelPost\" value=\"$model\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Year</td>";
		echo "	<td>";
		// start making the years list
		echo makeListYears("yearPost",$year,"");
		echo "</td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Engine</td>";
		echo "	<td><input type=\"text\" name=\"enginePost\" id=\"enginePost\" value=\"$engine\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Berths</td>";
		echo "	<td>";
		// start making the berths list
		echo makeListBerths("berthsPost",$berths,"");
		echo "	</td></tr>";
		echo "	<tr>";
		echo "	<td>Mileage</td>";
		echo "	<td><input type=\"text\" name=\"mileagePost\" id=\"mileagePost\" value=\"$mileage\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Price</td>";
		echo "	<td><input type=\"text\" name=\"pricePost\" id=\"pricePost\" value=\"$price\"></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td>Layout</td>";
		echo "	<td>";
		// START make list of Layout by array
		$LayoutArray = array ("Front Lounge" => "Front Lounge", "Rear Lounge" => "Rear Lounge", "Seatbelts" => "Seatbelts");
		echo makeList("layoutPost",$LayoutArray,$layout,"");
		// END make list of Layout by array
		echo "	</td></tr>";
		echo "	<tr>";
		echo "	<td>Ownership</td>";
		echo "<td>";
		// START make list of ownership by array
		$ownershipArray = array ("new" => "new", "preowned" => "preowned");
		echo makeList("ownershipPost",$ownershipArray,$ownership,"");
		// FINISH make list of ownership by array

		echo "</td></tr>";
		echo "	<tr>";
		echo "	<td>Description</td>";
		echo "	<td><textarea rows=\"5\" type=\"text\" name=\"descriptionPost\" id=\"descriptionPost\"> ".htmlspecialchars_decode($description,ENT_QUOTES)."</textarea></td>";
		echo "	</tr>";
		echo "	<tr>";
		echo "	<td colspan=\"2\"><input type=\"submit\" value=\"update Motor Home\"></td>";
		echo "	</tr>";
		echo "</table>";
		echo "</form>";
		echo "</div>";
	}

echo makeFooter();

?>