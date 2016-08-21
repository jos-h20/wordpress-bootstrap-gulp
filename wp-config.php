<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bootstrap4');

/** MySQL database username */
define('DB_USER', 'admin-bootstrap4');

/** MySQL database password */
define('DB_PASSWORD', 'bovagabond4u');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~dx+cD_D@{Xz#5cTv0o$ZZXSTx!_)~(`5JcN$@RE+NYwTK<9~6~CwPu+  U$mQ?1');
define('SECURE_AUTH_KEY',  'xuf}?U]9#%^kp0%$00`+H|L0EU*x|Cj3ACV}a3LcFmBuZkC 8U<#r+JT>2-qo3rl');
define('LOGGED_IN_KEY',    ' !8>FLy DZT>U/pt,/6S2+BWik.#=NZ}Y#ysuk2S>((cAN3NEZfuMlYOMP62Pa:P');
define('NONCE_KEY',        'eXt$n5uIQ{(=KSxn_-hHjR~S,AmIQ3;!>]R!c(t:ngpt4/R1v~lC6hQ35nt0zOvB');
define('AUTH_SALT',        '%.I>,*~4bj)}WoMRxrhR+oEOhqiObt*S#`Aeu(+[}rb@9K-=Ys>QD56JS{>ukDc8');
define('SECURE_AUTH_SALT', ',-vm6p&u<;O4u~P;Ksq+=QY DBoi({/f{5F}+Q71!cD;i)wN-]A*I<[n*p$x9AF/');
define('LOGGED_IN_SALT',   '?Q.^Sc,tfpM~=Y0xGT/m#?jxX|;IJ;~=bQp+o15v&A+[-e_M5Y Qlk|bw~|R`(J6');
define('NONCE_SALT',       'B@:<$iiUAd%9x7ItN:yAFv9a5F*8bUKz=oFYZn[<YN7v%7M$l>-Q|f{:UCk*vNph');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
