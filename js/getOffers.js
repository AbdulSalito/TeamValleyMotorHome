var OffersExFile = function() { // get the external PHP offers file
// call get request function and pass the parameters (external PHP file and the call back function DisplayOffers)
	getRequest("getOffers.php" , DisplayOffers);
} // end of the OffersExFile function

var DisplayOffers = function(data){ // taking the data from the call back function
// adding the received data to the chosen div
		document.getElementById("specialOffer").innerHTML = "<h3>Special Offers!</h3>"+data;
} // end of the Display function

// set a specific time (in milliseconds) to call the function again
window.setInterval("OffersExFile()", 20000 );