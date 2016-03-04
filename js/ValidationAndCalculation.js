// start the change on the terms and condition  check box in the button and the font 
// start the function using 3 parameters to insert the appropriet ID's 
function CheckTerms(boxID, buttonID , termID) {
// make 3 variables to store the id's in
   var checkBox = document.getElementById(boxID);
   var submitButton = document.getElementById(buttonID);
   var termsPargraph= document.getElementById(termID);
// detect whenever the check box is checked
   if ( checkBox.checked ) {
// change the color, the font weight and the button disablity
     termsPargraph.style.color='#000000'; 
     termsPargraph.style.fontWeight='normal';
     submitButton.disabled = false;
   }
// if its unchecked change it back to the previous statement
   else {
     termsPargraph.style.color='#FF0000'; 
     termsPargraph.style.fontWeight='bold';
     submitButton.disabled = true;
   }
}
// end the change on terms and condition check box function


// start the clint-side valdation using function with 1 paramater (the form id)
function checksubmition(id){
// variable to make life esier to take the form id to use in the whole function
   var formsub = document.getElementById( id );
   
// check if the user haven't choose a motorhome
	if (formsub.Cheyenne635.checked == false && formsub.Pace.checked == false && formsub.Stardream.checked == false ) {

// alert (show a pop up message) to let the user knows that he didn't choose a motorhome
    alert( 'Please select one motor home at least' );
// focus on the first motorhome
      formsub.Cheyenne635.focus();
// don't submit because there is something missing!
    return false;
   }
// check if the user has typed a firstname!
	if (formsub.forename.value.length  == 0) {
      alert( 'Please put your Fore Name' );
      formsub.forename.focus();
      return false;
   }
// check if the user has typed a surename!
	if (formsub.surname.value.length  == 0) {
      alert( 'Please put your Sure Name' );
      formsub.surname.focus();
      return false;
   }
// check if the user chose a delifery type
   	if (formsub.deliveryType[0].checked == false && formsub.deliveryType[1].checked == false ) {
      alert( 'Please select the delivery type' );
      formsub.deliveryType[1].focus();
      return false;
   }
// submit because if you reach here then everything was fine :)
   return true;
}
// end of the clint-side valdation function .. esier life 


// start the calculation function using 1 parameter again it's the form id!
function totalCost(id) {
// vriables to make life esier plus a variable for the total cost
	var cost = document.getElementById( id );
	var totalAmount = 0;
// check what motorhome has been checked and take its value 
	if (cost.Cheyenne635.checked == true) {
		totalAmount += parseFloat(cost.Cheyenne635.value);
	}
	if (cost.Pace.checked == true ) {
		totalAmount += parseFloat(cost.Pace.value);
	}
	if (cost.Stardream.checked == true ) {
		totalAmount += parseFloat(cost.Stardream.value);
	}
// check which delivery type has been checked to add its value (using the title of the radio button!
		if (cost.deliveryType[0].checked == true){
			totalAmount += parseFloat(cost.deliveryType[0].title);
		}
		if (cost.deliveryType[1].checked == true){
			totalAmount += parseFloat(cost.deliveryType[1].title);
		}

// print the total cost into its appropriet place :)
		cost.total.value = parseFloat(totalAmount);
}
// end of the calculation function good job .. well done!