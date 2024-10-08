<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '101' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Gy)C/wue3S%[nd}*Vq%F|2S@oD!t451T=<*9B.A63reKx`q^S`JP>^Vbmm&uBq;:' );
define( 'SECURE_AUTH_KEY',  '#<><At+Xh?P!34E{UZzaL6SuoSA&PB[JzcX-y:)G:MUW%.LGJ|!g5nC]`qT[6e{~' );
define( 'LOGGED_IN_KEY',    'Z~ {],;%gAEzSH]CUHV|x{5EE5C?A_^%UQLG&L&@FE%M=D=Q&@MCG@U4@K2nchh>' );
define( 'NONCE_KEY',        '}OjIti)UHb^~:Zab8PK@Il{w)DQF0Y,z@Xs?ps(V^;680[^UM%^A(J/h~GRFFR|V' );
define( 'AUTH_SALT',        '[5. tb$@w,}f&nK+/6CF4]<P.A9z/:drLOxG<45WGz5v1Z!mM?Ffm78RkN;BkQp4' );
define( 'SECURE_AUTH_SALT', ')Q4_?iKxd81u(S[e5jXw]N_c=UKL)NwTBr?. 9+o}v,H=|uf(Qu6SL)3f2#gFR/g' );
define( 'LOGGED_IN_SALT',   'b6|ca;71YhCbcb+*S=r$fof#LW;>09eRecCfJs:|Fm3hTwO;q/+Jc>hX;BKSGH57' );
define( 'NONCE_SALT',       'T#EQy;Eh7ZhBR00$uqGp^~Gll1S8I&mw#Lhl0pw_Ec,$0q4Rka{6xs,r,!Q_CL{(' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
