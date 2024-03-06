<?php

// include('functions/rename-menu-posts.php');
// include('functions/add_dashboard_widget.php');

function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() . '/style.css'  );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
?>