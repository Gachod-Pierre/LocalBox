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
define( 'AUTH_KEY',          's(c[SS[O+3JvbwP&`Rd8)#WrUV>O6]U!h.d.g*lVf~rI(!YcDH+X}$a{U6AV,vK^' );
define( 'SECURE_AUTH_KEY',   'JG!U5/0_XXL(t=}iDZStC?MK$V}ou<9nTvwvKa:z|B7VO$vE6s,20dr$sLFX,U?P' );
define( 'LOGGED_IN_KEY',     't|]0)mm&CubS4@L+F&DkpF2E}<ke{[Q mG;^agfAYgiod}[0u}dMP,%A#7dQY0nt' );
define( 'NONCE_KEY',         'CLyT):w>a%6Zd$f.UHf@wxGf[L3N!%KLI0*&VTc/~8ygrSnBId]/>tJs}%M:nUg?' );
define( 'AUTH_SALT',         'P` @8zb#o6J2Y}0R5n4Zxm<vVh^R8dEsx(UuzRy9GGr`D{Z!}zI~7 |6;v Sg8>N' );
define( 'SECURE_AUTH_SALT',  'Ik_:G%E#~.Cx:JG<F74RG}<J-zwJn3htvavRwcm%??5XN^XeQRcryo|XE75KxTBR' );
define( 'LOGGED_IN_SALT',    '@MiCppp2Hkq+wf*j<88Z<#yG`R(Ku?.3T7Cvg-soV?f$ QXRC$0Vm%kX~Rorg:EL' );
define( 'NONCE_SALT',        'G<$[j3nFjRY%i)M@{`fVkg1V25k9[?h)MCMBC0R)Gtof59+&5 rk#qK}O;l.KXhV' );
define( 'WP_CACHE_KEY_SALT', 'r`-}yA?&C6Aj=Zy%l[|et JOdo79Is_Y.Pm6x@ i8`R1:>bi)$.fyQ-wA-<#r4#j' );


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
