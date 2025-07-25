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
define( 'DB_NAME', 'panther_hvac' );

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
define( 'AUTH_KEY',         '[)wt)|mJsPp`+HG0E=77mP0GxCUqs&f.ECk:F6eP!!A&m05tV2r3$;Sn=<924#Bw' );
define( 'SECURE_AUTH_KEY',  'm6q:<2ha;$BZlGC|gXqQc??x5@cc;MncW))t)xE9UwoPC??yG{!2EsMTSO)U1{3/' );
define( 'LOGGED_IN_KEY',    '-]&Rbid!I?O9.U@x@gxj.R#~Oa#pv2z98(wgTs({?$P,Bi>V%h}j0 V((Rh*=DWK' );
define( 'NONCE_KEY',        'd,1q+BpoY/=b=6CJf?-{WvMz.oFi-fh,]RbVdYD}P+_W6S?3$kUxJz}1,LnR&Kx@' );
define( 'AUTH_SALT',        'h*w]Vd}Q`4;A |Q_^1E2$A9+WzpUlbC5C;QfUb;*E8:.3yc4$(Ic2ug};rosHSMh' );
define( 'SECURE_AUTH_SALT', '6<vvaQ7>uE%1.$;@<Z$[xvO7$Vw3omh>av9GN922)p&DJ!rRkU8l5}s&SgKZ>82@' );
define( 'LOGGED_IN_SALT',   '0OucfgZgCzn8+|o@.NQ]f0H5&c<zg3:8X.rMpq$HUn>.F+Rf}@9xo ccy?TEjf~G' );
define( 'NONCE_SALT',       '8oh ]#{xyj+;myT]W=7*%TpjFd%TzfL~L a*9$1l<9Y.Y+fn-MqXC1@bg*~crz(q' );

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
