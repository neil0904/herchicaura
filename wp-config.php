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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce' );

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
define( 'AUTH_KEY',         'vX{0!&AjiasdEW%0^~n|9%P]D>FfoGeB&SD0Naf;9Z/;id_`R0LOM~OSl)t6i#Y,' );
define( 'SECURE_AUTH_KEY',  'N[NUtfV&]X &mBX[pQOZrch*8 j.e:%b3V_A_4c}qGgtfR&9dx&IV5%ZDt{ske%W' );
define( 'LOGGED_IN_KEY',    '1RPw9]m>?.=m4ahAeg9Y$iMk3VVlcZ:?3nvGY>*^D0;[]m23Fms9zpee#vnMGGSf' );
define( 'NONCE_KEY',        '9(OnF6a_6g51O)GUZeQI ?S!b-}cz=_9VUu{u?vCX+` 3YefTr3R~_oFGK&[d~_[' );
define( 'AUTH_SALT',        '1yg2?*C}wF:P}mGAY ;h?.T4 .M{OvW!S#j Wju9jn4HB1uQ9A-5N@T;0uMrm/Lk' );
define( 'SECURE_AUTH_SALT', 'UP:L/Q9(o{pdkbM=3P?bdA5q6bIXN#GaMdp/Gl7trXn.auOwLwe)/[cFQvSc2cG1' );
define( 'LOGGED_IN_SALT',   '-}eRsh(V3kA-p+eHcTKJ8<#tX{+5pm/<8IyK|d07gs`J&~yIoJ8@Lq2A+?o0@!>5' );
define( 'NONCE_SALT',       '9S FT#wsXwXzW2VJ5av[qz6Ikd3e&TjULStf%C|.QHu^v$TYyhw7Er8:/Bpa-H51' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
