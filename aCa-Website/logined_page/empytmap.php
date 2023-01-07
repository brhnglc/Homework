<?php
include_once 'header.php';
include 'locations_model.php';
//get_unconfirmed_locations();exit;
?>
    <style>
        #map { position:absolute;left: 350px; top:350px; bottom:0px;height:550px ;width:660px; }
        .geocoder {
            position:absolute;left: 350px; top:290px;
        }
    </style>



    <div class="geocoder">
        <div id="geocoder" ></div>
    </div>

    <div  id="map"></div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />


	<?php 
	$url = $_SERVER['REQUEST_URI'];
	$url = parse_url($url);
	#print_r($url);
	$url['sections'] = explode('&', $url['query']);
	#print_r($url['sections'][0]);
	?>
    <script>
		
         var marker ;
        var user_location = [<?php echo $url['sections'][0]; ?>,<?php echo $url['sections'][1]; ?>];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 12
        });
		
		 marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
        //  geocoder here
		




    </script>



<?php
include_once 'footer.php';

?>