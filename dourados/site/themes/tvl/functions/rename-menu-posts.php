<?php

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