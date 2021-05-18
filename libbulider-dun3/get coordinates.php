<?php
     // Get lat and long by address         
        $address = 'kitale'; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
        $geocode=file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
        $output= json_decode($geocode);
        $latitude = $output->results[0]->geometry->location->lat;
        $longitude = $output->results[0]->geometry->location->lng;

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
     <script>
      var geocoder;
      var map;
      function initialize() {
        geocoder = new google.maps.Geocoder();
         var latlng = new google.maps.LatLng(50.804400, -1.147250);
        var mapOptions = {
         zoom: 6,
         center: latlng
        }
         map = new google.maps.Map(document.getElementById('map-canvas12'), mapOptions);
        }

       function codeAddress(address,tutorname,url,distance,prise,postcode) {
       var address = address;

        geocoder.geocode( { 'address': address}, function(results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
           var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });

      var infowindow = new google.maps.InfoWindow({
         content: 'Tutor Name: '+tutorname+'<br>Price Guide: '+prise+'<br>Distance: '+distance+' Miles from you('+postcode+')<br> <a href="'+url+'" target="blank">View Tutor profile</a> '
       });
        infowindow.open(map,marker);

          } /*else {
          alert('Geocode was not successful for the following reason: ' + status);
        }*/
       });
     }


      google.maps.event.addDomListener(window, 'load', initialize);

     window.onload = function(){
      initialize();
      // your code here
      <?php foreach($addr as $add) { 

      ?>
      codeAddress('<?php echo $add['address']; ?>','<?php echo $add['tutorname']; ?>','<?php echo $add['url']; ?>','<?php echo $add['distance']; ?>','<?php echo $add['prise']; ?>','<?php echo substr( $postcode1,0,4); ?>');
      <?php } ?>
    };
      </script>

     <div id="map-canvas12"></div>