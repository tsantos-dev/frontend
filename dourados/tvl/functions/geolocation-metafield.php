<?php
/*
Plugin Name: MetaBox: Geolocalizador
Description: Captura a localização atual em latitude e longitude
Version: 0.1
Author: Távola Criativa
Author URI: http://www.tavolacriativa.com.br/
*/
//Register Meta box
add_action( 'add_meta_boxes', function() {
	add_meta_box( 'wpdocs-id', 'Geolocalização', 'wpdocs_field_cb', 'post', 'normal' );
} );

//Meta callback function
function wpdocs_field_cb( $post ) {
	$wpdocs_meta_val = get_post_meta( $post->ID, 'meta-geolocation', true );
?>

    <label for="geolocation">Insira a latitude e longitude.</label>
	<input type="text" name="meta-geolocation" id="geolocation" placeholder="Ex.: -22.2257679,-54.8473893" value="<?php echo esc_attr( $wpdocs_meta_val ) ?>">
    <button onclick="getLocation()"><span class="dashicons dashicons-location"></span>Rastrear</button>


<?php
}

//save meta value with save post hook
add_action( 'save_post', function( $post_id ) {
	if ( isset( $_POST['meta-geolocation'] ) ) {
		update_post_meta( $post_id, 'meta-geolocation', $_POST['meta-geolocation'] );
	}
} );

// // show meta value after post content
// add_filter( 'the_content', function( $content ) {
// 	$meta_val = get_post_meta( get_the_ID(), 'meta-geolocation', true );
// 	return $content . $meta_val;
// } );

?>