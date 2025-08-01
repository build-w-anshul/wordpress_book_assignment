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
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '|!LtoeA{]50W][ro8TY`}H_8q{L<Kp!_b7ad,n0PzC904:33g1~ZyX@a8lFo0bY!' );
define( 'SECURE_AUTH_KEY',   'tw]haLz9Gtg :K/,lM`OS4CdNPLu@~ 6E6S0h6QYjIK2wt2>D6KzZM%s?im<.p!`' );
define( 'LOGGED_IN_KEY',     'Fw{-stT30e,#o{VyTjuw)DXJ$o-kbZBnJlrduenta.KC-=2VSEys<~4{YJ*L;Wk4' );
define( 'NONCE_KEY',         'CD-u=0-ANEyE#ikUxQ[,M7|K8+{98?yd8fuXdh|L1Z08M7l~2A@DZEKio=S1X+cd' );
define( 'AUTH_SALT',         'Z[D^P!=J{^}U=z |KXG=|/j4RASs<w4EJKj*ZiE)-9H{0HoEp g2K=Gz[l|-0f=t' );
define( 'SECURE_AUTH_SALT',  'b/VL0U!tU+8Z1SxuuJwwK)_V<`Sa@n1R2t59y^~%Dz{I#T^t)SfK6oMAR*K9n@^M' );
define( 'LOGGED_IN_SALT',    '-7WBLX,e9#oE|3}T/=y>&4h6qZ,`UY}zo/;TDCwuBa2t*#FNYaQeE.b4!]z=d[?l' );
define( 'NONCE_SALT',        'EYokyM?=DthSO$sU Mq1fF-ls:2BjO-,|B^tfL%L8<GohT/vaX5[[/YUzZvE~{ie' );
define( 'WP_CACHE_KEY_SALT', '#7#}#eO2E?I8K_ @T|1Q=b/=bfS!n*K=@`azYIWyqyzsg0Kg?W (Gn65Yd~pNY8n' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
