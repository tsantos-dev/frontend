<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u836582709_SmmMX' );

/** Database username */
define( 'DB_USER', 'u836582709_1gR9g' );

/** Database password */
define( 'DB_PASSWORD', 'ukixKNnK8O' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'x|CYvatAzDgDP^<rGbD#;9imxIF=XRL9:ee3qVuzwcJT2J5`ggK,6&_M2MIE*bTH' );
define( 'SECURE_AUTH_KEY',   'j/z?QJtULP(8RIWzhq!L~:KnFMNO1,w3?!ui8(t6MM24W-;sOHs:[^omlJ`Hkh6H' );
define( 'LOGGED_IN_KEY',     '`BYut_K&XrVz^`KF>Bg*kzrHOiDx1G(?4+<4CBXQ=8g=Wyf(.l!$*E>7+SpT0^JR' );
define( 'NONCE_KEY',         'QqE;/8?a*TyFQ`5s?d5SE:Nc4^*1i+&pen1W;ay,C1<:M76)z. (7r{!QZG>__ {' );
define( 'AUTH_SALT',         '3b`s`71J`1-a*~O%~A/j`bk.8qtujV0w, *JU}kj:9@}H&$we|(l]7K:o,28ZDaU' );
define( 'SECURE_AUTH_SALT',  'A:{$WEJ})&$)mf5^fXkEi:9:yF|0ss6jMi`44Ju]h).C`wg84+:yhxVdB7jG~k2|' );
define( 'LOGGED_IN_SALT',    'jDJ,40te?$9F?W.=vsKt_8[H`uo/seu|lZ30E&B}ojhnPb}*5/<~]@MIp#R:xK&O' );
define( 'NONCE_SALT',        '4wW=lzd~X~zKUJR>RTQY.IE`S2Dzp&=6Z{bnX[C|CI`gw1kX}F.#DC!T@qi~miLY' );
define( 'WP_CACHE_KEY_SALT', '. ah?V`7@IIWU6#2WE@*447[b(AK.i`PpU2$jvA`pdw*uDR?%847k,NU=HvOwvs ' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
