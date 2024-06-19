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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'construction' );

/** Database username */
define( 'DB_USER', 'construction' );

/** Database password */
define( 'DB_PASSWORD', 'K5D[@GKzRa/POgyX' );

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
define( 'AUTH_KEY',         'sqQ{]f6 waYwBQ3+LGI~/.6,Oxji*5c~q*>IzYD}<0Urle^n&{E0Yxd@{zXI,Vii' );
define( 'SECURE_AUTH_KEY',  'Ow[G7,:4V*8ChP+@/=P#zUG:t]!qA-Vzi5ay@1vV*ajl?0>lw]B66,==iORmwxc5' );
define( 'LOGGED_IN_KEY',    '$$7pZIt~[Xz*uB8~fv;|OIoY0TUy?onQF`T:(kqP(XV^z8b:agnxJ<O#&iE>:V3f' );
define( 'NONCE_KEY',        '4LJCi|JH0vFt P0UF>.kmY2G`RU:*j JOb37}@rR+k`$>ijj>u.+Nw/b&udUeXf%' );
define( 'AUTH_SALT',        '0H+D^^Y/P9I~8s2SQ M[QViaf>L9@KBpEW7y[Gl:~<O9O05zz89sTbsY]&pjqfVk' );
define( 'SECURE_AUTH_SALT', 'e:WCrLnHPDX}ze--W2%)W*xc}PXu#XWI_}g;t(V:5pUF>r$`HZu>k]Pq>RX3m@Ft' );
define( 'LOGGED_IN_SALT',   'p4t`dF{[&;B}+M$D^nj0yA8MLO1hzoNH8{MxqT~1>di),U/h^[+e%KVfPfD[8wu=' );
define( 'NONCE_SALT',       '||yVL*~8!Q1e}V-n[e#&Sq+6ueQl87*lS+LJ3MEbul7`=~%~D{lU3*D$Jqt4qg@%' );

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
