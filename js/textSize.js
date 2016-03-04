// start the font size codes
// variable to set the text size on (em) messure
 var textsize = 1;
 // start of the function using 2 parameters
function Font_Size(id,addition){
// check if the addition was bigger or smaller
  if(addition == 'bigger' && textsize < 2.25){
// add a quarter em to the existing text size
   textsize = parseFloat(textsize)+0.25;
  }
  else if(addition == 'smaller' && textsize > 0.25){
// subtract a quarter em from the text size
   textsize = parseFloat(textsize)-0.25;
  }
// change the font size on the giving id
 document.getElementById(id).style.fontSize = textsize + 'em';
}
// end the size code