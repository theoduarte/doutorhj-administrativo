function initialize() {

var input = document.getElementById('searchTextField');
var autocomplete = new google.maps.places.Autocomplete(input);    
var inputTwo = document.getElementById('searchTextFieldTwo')    
var autocomplete = new google.maps.places.Autocomplete(inputTwo);
    
}

google.maps.event.addDomListener(window, 'load', initialize);