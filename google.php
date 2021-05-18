<script type="text/javascript">

This is the view with the form. field_27 is the Latitude/Logitude location field
$(document).on('knack-view-render.view_xxx', function(event, view, data) {
    $("#kn-input-field_27").prepend('<div id="map_canvas" style="width: 100%; height: 300px;"></div>');
}); 

// This is the scene that contains the above view
$(document).on('knack-scene-render.scene_xyz', function(event, view, records) {
  var geocoder;
  var map, infoWindow;
  var marker;

  function initMap() {
    var map = new google.maps.Map(
      document.getElementById("map_canvas"), {
        center: new google.maps.LatLng(45.4773, 9.1815), 
        zoom: 13,
        streetViewControl: false,

      }
    );
    infoWindow = new google.maps.InfoWindow;

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('You are here:<br>Lat: '+pos.lat+'<br>Long: '+pos.lng);
      marker = new google.maps.Marker({
        position: pos, 
        map: map
      });
      infoWindow.open(map,marker);
      map.setCenter(pos);
      $("#latitude").val(pos.lat); // The latitude form input (it actually has an ID)
      $('input[name=longitude]').val(pos.lng); // The longitude input (No id LOL)
       
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
    } else {
      // Browser doesn't support Geolocation
       handleLocationError(false, infoWindow, map.getCenter());
    }
    google.maps.event.addListener(map, "click", function(e) {
      latLng = e.latLng;
      $("#latitude").val(e.latLng.lat());
      $('input[name=longitude]').val(e.latLng.lng());
         
      // if marker exists and has a .setMap method, hide it
      if (marker && marker.setMap) {
      marker.setMap(null);
    }
      marker = new google.maps.Marker({
        position: latLng,
        map: map
      });
      infoWindow.setPosition(latLng);
      infoWindow.setContent('You have selected:<br>Lat: '+ e.latLng.lat() +'<br>Long: '+e.latLng.lng());
      infoWindow.open(map,marker);
      });
  }
 function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
      'Error: The Geolocation service failed.' :
      'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
  }
    
  // Thanks lazyLoad but this is the only way I can make this work                                  
  $.getScript('https://maps.googleapis.com/maps/api/js?key=MY_GOOGLE_API_KEY').done(function() {
    initMap();
  });

});
</script>