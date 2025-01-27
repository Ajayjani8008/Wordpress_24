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
define( 'DB_NAME', 'ajay' );

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
define( 'AUTH_KEY',         's8*T=;bhCU#1Qd6?dfpP69R6iw%p9_3+g:IC4|3KV}Kf?EkS(fp/x&e^fi@w/|{6' );
define( 'SECURE_AUTH_KEY',  'PSU$~p2y<xd p:B.*uybs-RS;bIupO13)Vkg~=VQkzMQ<vM|`xNpkdvInV3{D5$ ' );
define( 'LOGGED_IN_KEY',    'tiES2e`t0?uqP~l=nv@@=2fa08g%CU9o#^[efgDH_kCc>sg/wG;@S7@GO0L(Yg90' );
define( 'NONCE_KEY',        '2po:Rgrw7a#`kg 7MzOD.<k[ED[sN@fvYnJyi$Eq*vf02z5mv.)Km*a8y}Z/i!3#' );
define( 'AUTH_SALT',        'iiGuYLh9C|pLo[K|H-V8Mh4CcIT}l !s%~6:w13%=u<= uP3j_@WJu(-q&T!VFq,' );
define( 'SECURE_AUTH_SALT', 'gs<kcTVZeeD.%DsawUcbK+}i):^2^PRc!bz]Af^/bhky-Cf%H,8F(_sYtDg(K<-C' );
define( 'LOGGED_IN_SALT',   '/?GW$?3z(vS/Cv0@k8Sqt`0x1j^L(Nabs!2o281-8fkovbO8=1%27nl+e9gzT{Kd' );
define( 'NONCE_SALT',       'D<5L=AgDt>Y/O]tNr^<-db?WHRo+($[x+PPkaK^JREkWxM+2?xp6@10U_|lZt}9R' );

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
