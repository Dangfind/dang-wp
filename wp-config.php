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
define( 'DB_NAME', 'dang-db' );

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
define( 'WP_HOME', 'http://dang-wp.local' );
define( 'WP_SITEURL', 'http://dang-wp.local' );
define( 'CONCATENATE_SCRIPTS', false );

define( 'AUTH_KEY',         ' #::yaEbmua?^lE 7,=j!@+9ZH`x]wM)DCW8_wey9cv}c^_@AeZt07,pZHCeJQYR' );
define( 'SECURE_AUTH_KEY',  '8_PGfKz8ptUd%cMt%wpzJ~JaFi:-H;2680W-][ob/V<ibCF0%+epBgSpxdG`il]E' );
define( 'LOGGED_IN_KEY',    'DCx}[wBWiRR4&!0|I{$y2/%Vjx#0P)E3%_!%w5g5OG6rb5.M]vf+z~>M(1`}B3is' );
define( 'NONCE_KEY',        '<;vOEwjz=jpZ![8#-4u`kl~3qWh<NvO%4~dClVB7ieH^& g?2n]i*M0bU%=>@T x' );
define( 'AUTH_SALT',        'l!6lf3OhcLzujz!{*WvsH2cEGSefLgc4Dng{6c<u_*o j>_uXtj,DZ?&Rax}DBE ' );
define( 'SECURE_AUTH_SALT', ',cIIZ5d=d6Sh8eBzhM}m[<-alF}/TGwn}ax8->4~RfDHSiTt*_YRk#`Jb^o3]aB[' );
define( 'LOGGED_IN_SALT',   '=QI)/EM^uy*m>/X(g1/w39Gdu=Q9,xs~grQW:gj= GQ;;GP85cJ:-HG| aFuhv? ' );
define( 'NONCE_SALT',       '37O?KQQ48O>mO{=d~f$MOLr>MFZcP=}Z$a1,#Wbzeq@ N,u1_:][V~]@[O@6GIMg' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
