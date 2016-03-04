<?php

// ask for the functions from it's file
require_once('Functions.php');

// insert the header
echo makeHeader("Home");
// insert the navigation
echo makeMenu();
// insert the content with the links to add, edit or delete!
echo makeMainArea(" ","Administrator Page","<p><a href=\"addmotorhome.php\">Add New Motor Home</a></p><p><a href=\"eddelmotorhome.php\">Edit/Delete New Motor Home</a></p> ");

// making footer
echo makeFooter();
?>