(function() {

document.addEventListener('deviceready', onDeviceReady.bind(this), false);
function onDeviceReady() {

       document.getElementById('barcode').onclick=function(){
cordova.plugins.barcodeScanner.scan(onBarcodeSuccess,onBarcodeFail
,
      
    {
         "preferFrontCamera" : true, // iOS and Android 
         "showFlipCameraButton" : true, // iOS and Android 
         "prompt" : "Place a barcode inside the scan area", // supported on Android only 
         "formats" : "QR_CODE,PDF_417", // default: all but PDF_417 and RSS_EXPANDED 
         "orientation" : "landscape" // Android only (portrait|landscape), default unset so it rotates with the device 
    });
}
document.getElementById("share").onclick = function() {
navigator.contacts.pickContact(function(contact){
       alert('The following contact has been selected:' + JSON.stringify(contact));
       document.getElementById("tel").value=contact.phoneNumbers[0].value;
       alert(contact.phoneNumbers[0].value);
   },function(err){
       alert('Error: ' + err);
   });
}
} ;

function onBarcodeSuccess(result) {
         alert("We got a barcode\n" +
               "Result: " + result.text + "\n" +
               "Format: " + result.format + "\n" +
               "Cancelled: " + result.cancelled);
}

function onBarcodeFail(error) {
         alert("Scanning failed: " + error);
}
})();
