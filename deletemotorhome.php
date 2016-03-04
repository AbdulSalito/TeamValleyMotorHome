<?php
	require_once('Functions.php');

echo makeHeader("Home");
echo makeMenu();
echo makeMainArea(" ","Are you sure you want to delete this motor home?"," ");

$motorhomeid = $_GET['motorID'];

		include 'db_conn.php';

		$sql = "SELECT * FROM motorhomes WHERE motorID='$motorhomeid'";
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
		echo "	</tr>";
		echo "	<tr class=\"delete\">";
		echo "	<td colspan=\"4\"><a class=\"warning\" href=\"deletemotorhomeconfirm.php?motorID=$id\">Yes Delete this motor home!</a></td>";
		echo "	</tr>";

}
echo "</table>";
echo "</div>";

mysql_free_result($queryresult);
mysql_close($conn);


echo makeFooter();

?>