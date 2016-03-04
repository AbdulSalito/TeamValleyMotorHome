var getRequest = function( url, callbackFunction ) {
  var httpRequest;

  if (window.XMLHttpRequest) { // check if the browser is mozilla, chrome etc
    httpRequest = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) { // or if it's internet explorer 6 or less
    try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e) {
        try { // or if it's internet explorer 7 or above
            httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {}
    }
  }

  if (!httpRequest) { // if it didn't relise the browser type!
    alert('Giving up :( Cannot create an XMLHTTP instance');
    return false;
  }
 // open the request by passing the parameter
  httpRequest.open('get', url, true);
// assigning an anonymous function!
  httpRequest.onreadystatechange = function() {
    var completed = 4, successful = 200;
    // check if the request is ready and complete
    if (httpRequest.readyState == completed) {
    // check if the request is seccessful
      if (httpRequest.status == successful) {
      // call the call back  function which has a parameter of the out come of the request
         callbackFunction(httpRequest.responseText);
      } else {
      // alert if there is  a problem
         alert('There was a problem with the request.');
      }
    }
  }
  httpRequest.send(null);
}  // end of function getRequest