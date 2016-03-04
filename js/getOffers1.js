var OffersExFile = function() { // get the external PHP offers file
// call get request function and pass the parameters (external PHP file and the call back function DisplayOffers)
	getRequest("http://www.alhilalclub.com/vb/forumdisplay.php?f=2" , DisplayOffers);
} // end of the OffersExFile function

var DisplayOffers = function(data){ // taking the data from the call back function
// adding the received data to the chosen div
		document.getElementById("outerarea").innerHTML = data;
} // end of the Display function

// set a specific time (in milliseconds) to call the function again
//window.setInterval("OffersExFile()", 200 );