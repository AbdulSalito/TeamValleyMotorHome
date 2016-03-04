<?php
// ask for the functions from it's file
require_once('Functions.php');

// insert the header
echo makeHeader("Credits");
// insert the navigation
echo makeMenu();
// insert the content student information
echo makeMainArea(" ","Credits","Name: <strong>Abdulrahman A. Ababtain</strong> <br> Student ID: <strong>07025409</strong> <br> Email: <a href=\"mailto:abdulrahman.ababtain@northumbria.ac.uk\">abdulrahman.ababtain@northumbria.ac.uk</a>");
// insert the content the references and credits
echo makeMainArea(" ","References","motorhome picture : <a href=\"http://www.petergreenberg.com/\">http://www.petergreenberg.com/</a><br>JavaScript and AJAX Tutorial : <a href=\"http://www.numyspace.co.uk/~unn_isrd1/new/index.php?pid=29e&cid=js1\">The Wheel</a><br>Additional CSS, JavaScript and AJAX information: <a href=\"http://www.w3schools.com/js/default.asp\">w3Schools</a>");

echo makeMainArea(" ","","Other designs and styles are made by the student <strong>Abdulrahman Ababtain</strong>");

// insert the footer
echo makeFooter();

?>