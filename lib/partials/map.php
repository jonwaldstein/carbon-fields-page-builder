<?php
$id = substr( sha1( "Google Map" . time() ), rand( 2, 10 ), rand( 5, 8 ) );
?>
<div class="gmap" id="gmap-<?=$id;?>">
	<?= 
	'<script>
		var map;
      function initMap() {
      	var latLng_'.$id.' = new google.maps.LatLng('.$content_block['crb_company_location'].');
      	var icon = "'.carbon_get_theme_option('gmap_custom_marker').'";
        map_'.$id.' = new google.maps.Map(document.getElementById("gmap-'.$id.'"), {
          center: latLng_'.$id.',
          zoom: 16,
          scrollwheel: false
        });
		var marker_'.$id.' = new google.maps.Marker({
          position: latLng_'.$id.',
          map: map_'.$id.',
          icon: icon,
          title: ""
		});
      }
    </script>';
	?>
</div>