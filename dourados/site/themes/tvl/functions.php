<?php

define('TVL_THEME_URL', get_template_directory_uri());
define('TVL_THEME_DIR', get_template_directory());
define('TVL_TEMPLATES_DIR', TVL_THEME_DIR . '/template_parts/');
define('TVL_STYLES_URL', TVL_THEME_URL . '/css/');
define('TVL_IMAGES_URL', TVL_THEME_URL . '/images/');

//metabox para capturar a latitude e longitude
include(TVL_THEME_DIR.'/functions/geolocation-metafield.php');

function add_scripts_to_plugin()
{
     wp_enqueue_script( 'geolocation', get_template_directory_uri() . '/js/geolocation.js');
}
add_action('admin_enqueue_scripts', 'add_scripts_to_plugin');

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
    // Entering the text between the quotes
    echo '<p><strong>Para adicionar link de arquivo da lei:</strong>
    Em "Campos personalizados", no <nome> digite o valor [url_arquivo] (sem os colchetes. No campo <valor> adicione a URL do arquivo.
    </p>';
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
	wp_enqueue_style( 'style_site', get_template_directory_uri() . '/css/style.css'  );
	wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'  );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
    if (is_single()) {
        $style_url = TVL_STYLES_URL . 'single.css';
        wp_enqueue_style('single-style-css', $style_url);
        wp_enqueue_style('leaflet_css','https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
        wp_enqueue_script('leaflet_js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js');
    }
    if (is_page('legislacao')) {
        wp_enqueue_style('single-style-css', TVL_STYLES_URL . 'page-legislacao.css');
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

function wpdocs_my_add_sri( $html, $handle ) : string {
    switch( $handle ) {
        // case 'wpdocs-bootstrap-style':
        //     $html = str_replace( ' />', ' integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />', $html );
        //     break;
 
        case 'leaflet_js':
            $html = str_replace( '></script>', ' integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="anonymous"></script>', $html );
            break;
        
    } 
    return $html;
}

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

//function para implementacao de um custom link ao post
function prefix_filter_news_permalink( $url, $post ) {
    
    
    //Pega campo do custom fields
    $url_file = get_post_meta( $post->ID,'url_arquivo',  true );
    
    // altera o link se existe o metadado
    if ( $url_file ) {
        $url = $url_file;
    }
    // Return the value of the URL
    return $url;
}

// register menu
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Header Menu', 'text_domain' ),
	    	'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}

// Selectbox para carregamento de PDF
add_action("admin_init", "pdf_init");
add_action('save_post', 'save_pdf_link');
function pdf_init(){
    add_meta_box('my-pdf', 'Documento PDF', 'pdf_link', array('post', 'leis', 'page'), 'normal', 'high');
    }
function pdf_link(){
    global $post;
    $custom  = get_post_custom($post->ID);
    $link    = $custom["link"][0];
//     $link    = [];
    $count   = 0;
    echo '<p>Selecione a lei que está relacionado ao item</p>';
    echo '<div class="link_header">';
    $query_pdf_args = array(
        'post_type' => 'attachment',
        'post_mime_type' =>'application/pdf',
        'post_status' => 'inherit',
        'posts_per_page' => -1,
        );
    $query_pdf = new WP_Query( $query_pdf_args );
    $pdf = array();

    
    echo '<select name="link">';
    echo '<option class="pdf_select">SELECIONE o pdf</option>';
    foreach ( $query_pdf->posts as $file) {
        if($link == $pdf[]=$file->guid){
            echo '<option value="'.$pdf[]=$file->guid.'" selected >'.$pdf[]= $file->post_title.'</option>';
        }else{
            echo '<option value="'.$pdf[]=$file->guid.'">'.$pdf[]= $file->post_title.'</option>';
        }
        $count++;
    }
    echo '</select><br /></div>';
    echo '<div class="pdf_count"><span>PDF\'s encontrados:</span> <b>'.$count.'</b></div>';
	echo '<div class="pdf_shortcode"><span>Shortcode para inserir no texto: </span><b>[pdf_embbed]</b></div>';
	
}
function save_pdf_link(){
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){ return $post->ID; }
    update_post_meta($post->ID, "link", $_POST["link"]);
}
add_action( 'admin_head', 'pdf_css' );
function pdf_css() {
    echo '<style type="text/css">
    .pdf_select{
        font-weight:bold;
        background:#e5e5e5;
        }
    .pdf_count{
        font-size:9px;
        color:#0066ff;
        text-transform:uppercase;
        background:#f3f3f3;
        border-top:solid 1px #e5e5e5;
        padding:6px 6px 6px 12px;
        margin:0px -6px -8px -6px;
        -moz-border-radius:0px 0px 6px 6px;
        -webkit-border-radius:0px 0px 6px 6px;
        border-radius:0px 0px 6px 6px;
        }
    .pdf_count span{color:#666;}
	.pdf_shortcode{
		font-size:9px;
        color:#0066ff;
		background:#f3f3f3;
        border-top:solid 1px #e5e5e5;
        padding:6px 6px 6px 12px;
        margin:0px -6px -8px -6px;
        -moz-border-radius:0px 0px 6px 6px;
        -webkit-border-radius:0px 0px 6px 6px;
        border-radius:0px 0px 6px 6px;}
        </style>';
}
function pdf_file_url(){
    global $wp_query;
    $custom = get_post_custom($wp_query->post->ID);
    if($custom['link'][0] != ''){
        echo $custom['link'][0];
    }
}


function pdf_shortcode($atts, $content = null) {
	$pdf = get_post_meta( get_the_ID(), 'link' );
	extract(shortcode_atts(array(
		"id" => 'pdf_embbeded',
		"url" => $pdf[0],
		"width" => '100%',
		"height" => '743px'
	), $atts));
	return '<iframe id="' . $id . '" src="http://docs.google.com/viewer?url=' . $url . '&embedded=true" style="width:' . $width . '; height:' . $height . ';" frameborder="0"></iframe>';
}
add_shortcode('pdf_embbed', 'pdf_shortcode');
?>