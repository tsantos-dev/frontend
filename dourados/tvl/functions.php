<?php

define('TVL_THEME_URL', get_template_directory_uri());
define('TVL_THEME_DIR', get_template_directory());
define('TVL_TEMPLATES_DIR', TVL_THEME_DIR . '/template_parts/');
define('TVL_STYLES_URL', TVL_THEME_URL . '/css/');
define('TVL_IMAGES_URL', TVL_THEME_URL . '/images/');

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
    // Entering the text between the quotes
    echo "<p>
    Aqui você pode inserir a informação que desejar incluindo tags HTML.
    </p>";
}
function wpc_add_dashboard_widgets() {
    wp_add_dashboard_widget('wp_dashboard_widget', 'Edição do site - lembretes', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

// include(get_template_directory_uri() . '/functions/add_dashboard_widget.php');
function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Items';
    $submenu['edit.php'][5][0] = 'Items';
    $submenu['edit.php'][10][0] = 'Adicionar Item';
    $submenu['edit.php'][16][0] = 'Tags';
    echo '';
}
function change_post_object() {
    global $wp_post_types;
    $labels = $wp_post_types['post']->labels;
    $labels->name = 'Items';
    $labels->singular_name = 'Item';
    $labels->add_new = 'Adicionar Item';
    $labels->add_new_item = 'Adicionar Item';
    $labels->edit_item = 'Editar Item';
    $labels->new_item = 'Item';
    $labels->view_item = 'Ver Item';
    $labels->search_items = 'Buscar Itens';
    $labels->not_found = 'Nenhum Item encontrado';
    $labels->not_found_in_trash = 'Nenhum Item encontrado no Lixo';
    $labels->all_items = 'Todos Itens';
    $labels->menu_name = 'Itens';
    $labels->name_admin_bar = 'Itens';
}

add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );
// include(get_template_directory_uri() . '/functions/rename-menu-posts.php');

function wpdocs_theme_name_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri()  );
	wp_enqueue_style( 'style_site', get_template_directory_uri() . '/css/style.min.css'  );
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'  );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
    if (is_single()) {
        $style_url = TVL_STYLES_URL . 'single.css';
        wp_enqueue_style('single-style-css', $style_url);
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

if (function_exists('add_theme_support')) {
    // adicionamos ao tema o suporte a "thumbnails"
    add_theme_support('post-thumbnails');
    // se a função 'add_image_size' também estiver disponível
    if (function_exists('add_image_size')) {
        // cadastramos os tamanhos de thumbnails que o wordpress terá que gerar
        add_image_size('thumb_695x475', 695, 475, true);
        // add_image_size('thumb_480x279', 480, 279, true);
        // add_image_size('thumb_480x277', 480, 277, true);
        // add_image_size('thumb_480x241', 480, 241, true);
        // add_image_size('thumb_655x380', 655, 380, true);
        // add_image_size('thumb_480x292', 480, 292, true);
        // add_image_size('thumb_65x65', 65, 65, true);
    }
}



?>