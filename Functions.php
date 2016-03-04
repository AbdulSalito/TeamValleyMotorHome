<?php
function makeHeader($title) {

$headContent = <<<HEAD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
<title>Team Valley Motor Homes - $title </title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/main.css" id="styles"/>
</head>
<body>
<div id="outerarea">
<div id="innerarea">
<div id = "header">
</div>
HEAD;
	$headContent .="\n";
	return $headContent;
}

function makeMenu() {
	$menuContent = <<<MENU
	<div id = "navigation">

<table class="links">
	<tr>
		<td class="links"><a class="nav" href = "index.html">Home </a></td>
		<td class="links"><a class="nav" href = "motorhomes.php">Motor homes </a></td>
		<td class="links"><a class="nav" href = "search.php">Search </a></td>
		<td class="links"><a class="nav" href = "admin.php">Administrator </a></td>
		<td class="links"><a class="nav" href = "orderMotor.html">Quote</a></td>
		<td class="links"><a class="nav" href = "credits.php">Credits</a></td>
		<td class="links"><a class="nav" href = "siteMap.html">Site Map</a></td>
	</tr>
</table>
<a href="#" style="color: #457746;" onclick="document.getElementById('styles').href='css/main.css'">green</a>
<a href="#" style="color: #0033CC;" onclick="document.getElementById('styles').href='css/blue.css'">blue</a>
<table class="textsize">
	<tr>
		<td class="textsize" onclick="javascript:Font_Size('innerarea','bigger');">+</td>
		<td class="textsize" onclick="javascript:Font_Size('innerarea','smaller');">-</td>
	</tr>
</table>

</div>
MENU;
	$menuContent .= "\n";
	return $menuContent;
}

function makeMainArea($mainHeading, $subtitle, $contentText ) {
$mainContent = <<<MAINAREA
<div id = "maincontent">
<h2>$mainHeading </h2>
<h3>$subtitle </h3>
<p>$contentText </p>
</div>
MAINAREA;
	$mainContent .= "\n";
	return $mainContent;
}

function makeDisplayAll(){

	include 'db_conn.php';

	$sql = "SELECT * FROM motorhomes";
$queryresult = mysql_query($sql)
or die(mysql_error());

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

	echo "	<tr class=\"motor\">";
	echo "	<td colspan=\"4\"><a class=\"nav\" href=\"motorhomesdetails.php?motorID=$id\">$year $manufacturer</a> </td>";
	echo "	</tr>";
	echo "	<tr>";
	echo "	<td>Manufactrurer</td>";
	echo "	<td><strong>$manufacturer</strong></td>";
	echo "	<td>Model</td>";
	echo "	<td><strong>$model</strong></td>";
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
	echo "	<td colspan=\"4\"><hr></td>";
	echo "	</tr>";

}
	echo "</table>";
	echo "</div>";


	mysql_free_result($queryresult);
	mysql_close($conn);

}

function makeDetailedTable(){
	// get the motor ID and put it into a variable
	$motorhomeid = $_GET['motorID'];
	// start the db connection
	include 'db_conn.php';
	// do the sql statment
	$sql = "SELECT * FROM motorhomes WHERE motorID='$motorhomeid'";
	$queryresult = mysql_query($sql)
		or die(mysql_error());

	// start the table
	echo "<div id = \"maincontent\">";
	echo "<table class=\"motor\">";

	// fill the table
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
	// valdate the input with showing it without the special characters and with the breaks
	echo "	<td colspan=\"3\"><strong>".nl2br(htmlspecialchars_decode($description,ENT_QUOTES))."</strong></td>";
	echo "	</tr>";

}
	echo "</table>";
	echo "</div>";
	// close the table

	// close the db connection
	mysql_free_result($queryresult);
	mysql_close($conn);

}

function makeListYears($listName,$yearSelected,$addAny) {
	$yearStart=1980;
	$yearNow= Date("Y");
	// start the select box to add options
		$output = "<select name = \"$listName\" id =\"$listName\">";
	// check if the option was for search or for adding and editing
		if ($addAny=="addAny") {
			$output .= "<option selected=\"true\" value=\"any\">ANY</option>";
		}
	// foreach to fill the option list with the years range
		foreach (range($yearNow,$yearStart) as $YearAdd) {
	// check which one would be the selected option
		if ($yearSelected == $YearAdd) {
			$output .= "<option selected=\"true\" value=\"$YearAdd\">$YearAdd</option>\n";
		}
		else{
	// add the options
			$output .= "<option value=\"$YearAdd\">$YearAdd</option>\n";
		}
	}
	// close the select box
	$output .="</select>";
	echo $output;
}

function makeListBerths($listName,$berthsSelected,$addAny) {
	$berthsStart=1;
	$berhtsEnd=9;
	// start the select box to add options
	$output = "<select name = \"$listName\" id =\"$listName\">";
	// check if the option was for search or for adding and editing
	if ($addAny=="addAny") {
		$output .= "<option selected=\"true\" value=\"any\">ANY</option>";
	}
	// foreach to fill the option list with the years range
	foreach (range($berthsStart,$berhtsEnd) as $berthsAdd) {
	// check which one would be the selected option
		if ($berthsSelected == $berthsAdd) {
			$output .= "<option selected=\"true\" value=\"$berthsAdd\">$berthsAdd</option>\n";
		}
		else{
	// add the options
			$output .= "<option value=\"$berthsAdd\">$berthsAdd</option>\n";
		}
	}
	// close the select box
	$output .="</select>";
	echo $output;
}

function makeList($listName, $listOptions, $selectOption ,$addAny) {
	// start the select box to add options
	$output = "<select name = \"$listName\" id =\"$listName\">\n";
	// check if the option was for search or for adding and editing
	if ($addAny=="addAny") {
		$output .= "<option selected=\"true\" value=\"any\">ANY</option>";
	}
	// foreach statment to fill the options with the value and the text
	foreach ($listOptions as $key=>$value) {
		if ($selectOption == $value) {
	// check wich choice would be selected
			$output .= "<option selected=\"true\" value=\"$key\">$value</option>\n";
		}
		else{
	// add options
			$output .= "<option value=\"$key\">$value</option>\n";
		}
	}
	// close the select box
	$output .= "</select>\n";
	echo $output;
}

function makeFooter() {
	$footContent = <<< FOOT
	<div id = "footer">
	<p>All content copyright Team Valley Motor Homes</p>
	</div>
	</div>
	</div>
<script type="text/javascript" src="js/textSize.js"></script>
	</body>
	</html>
FOOT;
	return $footContent;
}

?>