<?php 
include 'ayar.php';
include 'locations_model.php';
session_start();
?>
<?php 
		if(isset($_POST["submitt"])){
			$dosya = $_FILES["resim_ekleme"]["tmp_name"];
			$username=$_SESSION['username'];
			$aciklama =htmlspecialchars($_POST["aciklama"]);
			$resim_boyut = getimagesize($_FILES["resim_ekleme"]["tmp_name"]);
			$long = $_POST["lng"];
			$lat = $_POST["lat"];
			if( empty($aciklama) ||  empty($dosya) || $resim_boyut == FALSE){
				echo "boş bırakmayın";
			}else {
			$resim = file_get_contents($_FILES["resim_ekleme"]["tmp_name"]);
			$veriekle = $db->prepare("INSERT INTO yazilar SET user_name=?,yazilar_aciklama=?,yazilar_resim=?,yazilar_long=?,yazilar_lat=?");
			$veriekle ->execute([$username,$aciklama,$resim,$long,$lat]);
			if($veriekle){
				echo "başarılı";
				header("REFRESH:2; URL=logined_page.php");
			}else{
				echo "başarısız";
				header("REFRESH:2; URL=postadder.php");
			}
				
			}
		}
		
	?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9a5d0d0ceb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="post_adder.css">
    <title>aCaNature | Post Adder</title>
</head>
<body>

    <header>
        <img id="logo" src="logo-white.svg" style="width: 15%;" alt="aCaNaturelogo">
    </header>

    <div class="container">
        <section>
            <img id="section_pp" src="./new-logo.svg" alt="aCaNature Profil Picture">
            <p id="name_surname" style="margin-bottom: 30px; font-size: x-large;">Fatih Kürekçi</p>
            
            <div class="section_lists">
                <ul class="lists">
                    <li><a id="sections_a" href="#">MY PROFILE</a></li>
                    <li><a id="sections_a" href="#">FRIENDS</a></li>
                    <li><a id="sections_a" href="#">MESSAGE</a></li>
                    <li><a id="sections_a" href="#">ACTIVITIES</a></li>
                    <li><a id="sections_a" href="#">SAVEDS</a></li>
                </ul>
            </div>
            <div id="log-out">
                <div class="logout"> 
                    <a id="logout_link" href="#">
                        <img id="logout_img" src="logout-svgrepo-red.svg" alt="aCa logout image">
                        <p id="logout_text">LOG OUT</p>
                    </a>
                </div>
            </div>
        </section>
        
        <div class="post_area">

            <div class="new_post_alert">
                <p id="new_post_text">New Post!</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="add_description">
                <p id="add_description_text">Add Description</p>
                <hr id="add_description_text_hr">
                <textarea id="add_description_text_area" name="aciklama" cols="50" rows="10"> </textarea>
            </div>  
        
            <div class="add_photo">
                <p id="add_photo_text">Add Photo</p>
                <hr id="add_photo_text_hr">
                <input id="add_photo_input" type="file" name="resim_ekleme">
            </div>

            <div class="add_location">
                <p id="add_location_text">Add Location</p>
                <hr id="add_location_text_hr">
            </div>
			
			<input type="text" id="lat" name="lat" placeholder="Your lat..">
			<label for="lng">lng</label>
			<input type="text" id="lng" name="lng" placeholder="Your lng..">
<!-- Add Location HTML codes has to start here -->
<style>

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        #map {bottom:0px;height:400px ;width:700px; }
        .geocoder {
           
        }
    </style>


    <div class="geocoder">
        <div id="geocoder" ></div>
    </div>

    <div id="map"></div>


    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
    <style>
    </style>

    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />

    <script>

        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [35.2433,38.9637];
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
        });
        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var marker ;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            addMarker(user_location,'load');
            add_markers(saved_markers);

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function (e) {
            marker.remove();
            addMarker(e.lngLat,'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        function addMarker(ltlng,event) {

            if(event === 'click'){
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }
        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function (marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submitt(function(event){
            event.preventDefault();
            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data){
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    </script>

<!-- Add Location HTML codes has to end here -->

            <div class="add_post_submit_button">
                <input id="add_post_submit_button" type="submit" value="Share!" name="submitt">
            </div>
        </form>
        </div>
    </div>
</body>
</html>