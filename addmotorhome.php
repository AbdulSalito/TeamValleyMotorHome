<?php
// ask for the functions from it's file
	require_once('Functions.php');
// insert the header
echo makeHeader("Add MotorHome");
// insert the navigation
echo makeMenu();
// insert the the content
echo makeMainArea(" "," "," ");


// start the form with an empty text box to insert the new data
	echo "<div id = \"maincontent\">";
	echo "<form id = \"AddMotorHome\" action = \"addmotorhomeconfirm.php\" method = \"post\">";
	echo "<table class=\"motor\">";
	echo "	<tr class=\"motor\">";
	echo "	<td colspan=\"2\"> Add new motor home </td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Manufactrurer</td>";
	echo "	<td><input type=\"text\" name=\"manufactrurerPost\" id=\"manufactrurerPost\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Model</td>";
	echo "	<td><input type=\"text\" name=\"modelPost\" id=\"modelPost\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Year</td>";
	echo "	<td>";
	// Start adding Years List
	echo makeListYears("yearPost",0,"");
	// End adding years list
	echo "</td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Engine</td>";
	echo "	<td><input type=\"text\" name=\"enginePost\" id=\"enginePost\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Berths</td>";
	echo "	<td>";
		// START adding berths
		echo makeListBerths("berthsPost","","");
		// END adding berths
	echo "</td>	</tr>";
	echo "	<tr>";
	echo "	<td>Mileage</td>";
	echo "	<td><input type=\"text\" name=\"mileagePost\" id=\"mileagePost\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Price</td>";
	echo "	<td><input type=\"text\" name=\"pricePost\" id=\"pricePost\"></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Layout</td>";
	echo "	<td>";
		// START make list of Layout by array
		$LayoutArray = array ("Front Lounge" => "Front Lounge", "Rear Lounge" => "Rear Lounge", "Seatbelts" => "Seatbelts");
		echo makeList("layoutPost",$LayoutArray,"","");
		// END make list of Layout by array
	echo "	</td></tr>";
	echo "	<tr>";
	echo "	<td>Ownership</td>";
	echo "<td>";
		// START make list of ownership by array
		$ownershipArray = array ("new" => "new", "preowned" => "preowned");
		echo makeList("ownershipPost",$ownershipArray,"","");
		// END make list of ownership by array
	echo "	</td></tr>";
	echo "	<tr>";
	echo "	<td>Description</td>";
	echo "	<td><textarea rows=\"5\" type=\"text\" name=\"descriptionPost\" id=\"descriptionPost\"></textarea></td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td colspan=\"2\"><input type=\"submit\" value=\"Add New Motor Home\"></td>";
	echo "	</tr>";
	echo "</table>";
	echo "</form>";
	echo "</div>";
	// end the form

// making footer
echo makeFooter();

?>