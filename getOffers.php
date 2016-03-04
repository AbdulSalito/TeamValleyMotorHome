<?php
// include the file for the database connection
include ('db_conn.php');

// do a query to find out how many rows in the table
$rsNumberRows = mysql_query('select count(*) as numberRows from motorhomes_specialOffers');
$row = mysql_fetch_assoc($rsNumberRows);
// get the result and cast it as an integer
$maxNumber = (int) $row['numberRows'];

// generate a random number between 1 and the maximum rows in the table
$number = rand(1, $maxNumber);

// store the sql for a special offer with the id matching the random number and wrap things using concat in an html 'wrapper'
$sql = "select concat('<p>&#8220;',motorhome,'&#8221;<br /><span class=\"price\">Price: ',price,'</span></p>') as offer from motorhomes_specialOffers where motorID=$number";
// execute the query
$rsOffer = mysql_query( $sql );

// get the one quotation returned
$offer = mysql_fetch_assoc($rsOffer);
// return the quote
echo $offer['offer'];

?>