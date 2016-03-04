<?php
require_once('Functions.php');

echo makeHeader("Home");
echo makeMenu();
echo makeMainArea(" ","Motor Homes details","Brief details of all the Motor Homes! For full details just press the title of each motor home");

echo makeDisplayAll();

echo makeFooter();
?>