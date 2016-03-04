<?php
require_once('Functions.php');

echo makeHeader("Home");
echo makeMenu();
echo makeMainArea(" "," "," ");

echo "<div id = \"maincontent\">";

$motorhomeid = $_GET['motorID'];

include 'db_conn.php';

$sql = "DELETE FROM motorhomes WHERE motorID='$motorhomeid'";
$queryresult = mysql_query($sql)
	or die(mysql_error());

echo "<p>Motor Home successfully DELETED!</p>\n";
echo "<p><a href=\"eddelmotorhome.php\">Back to Edit and Delete Page</a></p>";
mysql_close($conn);



echo "</div>";
echo makeFooter();

?>