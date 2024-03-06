<?php
/**
 * Plugin Name:       Geolocalização
 * Plugin URI:        tavolacriativa.com.br
 * Description:       Captura de latitude e longitude do item
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.0.1
 * Author:            Távola Criativa
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       geolocation-block
 * Update URI:        tavolacriativa.com.br/wp/plugins/geo
 *
 * @package           tvl
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function tvl_geolocation_block_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'tvl_geolocation_block_block_init' );
