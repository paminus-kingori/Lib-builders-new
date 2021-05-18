  <div id='geo_results'></div>
    <script type='text/javascript' charset='utf-8'>
        window.onload=function(){

            navigator.geolocation.getCurrentPosition( geo_success, geo_failure );

            function geo_success(pos){
                var lat=pos.coords.latitude;
                var lng=pos.coords.longitude;

                var xhr=new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if( xhr.readyState==4 && xhr.status==200 ){
                        geo_callback.call( this, xhr.responseText );
                    }
                }
                xhr.open( 'GET', '/fetch.php?lat='+lat+'&lng='+lng, true );
                xhr.send( null );
            }
            function geo_failure(){
                alert('failed');
            }

            function geo_callback(r){
                var json=JSON.parse(r);
                /* process json data according to needs */
                document.getElementById('geo_results').innerHTML=json.results[0].formatted_address;
                console.info('Address: %s',json.results[0].formatted_address);

            }
        }
    </script>