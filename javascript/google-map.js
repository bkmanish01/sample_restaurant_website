/* Google map for development propose only */
function init() {
  var mapOptions = {                 // Set up the map options
    zoom: 18 ,                          
    center: new google.maps.LatLng(Latitude, Longitude),
    
    mapTypeControl: true,
    mapTypeControlOptions: {
      mapTypeId: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE],
      style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
      position: google.maps.ControlPosition.TOP_LEFT
    }
  };

  var venueMap;                                      // Map() draws a map
  venueMap = new google.maps.Map(document.getElementById('map'), mapOptions);

  new google.maps.Marker({                    // add marker
      position: new google.maps.LatLng(Latitude, Longitude5),
      map: venueMap,
    });

}

function loadScript() {
  var script = document.createElement('script');     // Create <script> element
  script.src = 'http://maps.googleapis.com/maps/api/js?sensor=false&callback=init';
  document.body.appendChild(script);                 // Add element to page
}

window.onload = loadScript;                          // on load call loadScript()
