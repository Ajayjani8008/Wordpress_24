<?php
define( 'WP_CACHE', false ); // By Speed Optimizer by SiteGround

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
define( 'DB_NAME', 'mytheme' );

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
define( 'AUTH_KEY',         'KJ5@]8C)xloUnfQvjZy.,86_FV{{QmWoB@1<+ [z2eNH=k!>z2Z@J:~uMJ+=%9;i' );
define( 'SECURE_AUTH_KEY',  ':<fgzeMnn}Yi1(u462=|F{[()yzQCiQfN8]wrD>@;L>DP9O E5u w85lqW[2P6)S' );
define( 'LOGGED_IN_KEY',    '0DH t2(WGi6k}`&c>:v>k9mx[C%w$V6]%_>lGGiTax{KuS4b!G(z=UMvw4CRs?w`' );
define( 'NONCE_KEY',        'FS6hSvF$~R),c(D NTkb#P.1AE!B?-MELF+KS,tIw0/rC*2qTlftq]!w*XK{)<5_' );
define( 'AUTH_SALT',        'mDp@.dr!s`}bOjj6IG0m1-%?.y}`4<7Ul/N^{L-&eld^eBJU+t]W=vCF,JIz*<;y' );
define( 'SECURE_AUTH_SALT', 't;A2(aW@Md/H EK*7w,;QOT)1.JQx0[tI/1DScy5`n(Ym~gr<`A/aL@oIM5 o!yt' );
define( 'LOGGED_IN_SALT',   'M=D(sQ!+WP5l>Z)&[ZvnKEI%M2}Fam.Q_!r5Du6D7h|p;gX=XMMwXN}Lo9*oR0K`' );
define( 'NONCE_SALT',       '<5G*ncy9iN6RB6NmQEv,-r`Ak:R+H&%vzNW;xZO@0 HMl3nT(cz+WA7g><{bO-6(' );

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
