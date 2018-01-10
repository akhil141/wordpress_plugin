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
define('DB_NAME', 'titletabplugin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '@PulR{W7!3.Y6DWQV<c#pp{bK{7RF)D6OU*g=Yg>6`vW}FS^n<#J<e9n,o9dk^1`');
define('SECURE_AUTH_KEY',  'E`%g!.~a`|n2RL_CU<#E<O!Dy!RlDP~@cD:}]kH=2N~V13o~DfQb.]:hIX`(qu}:');
define('LOGGED_IN_KEY',    'VVEls^gR{6b 9]]z^)USwWXJA;Z#Q:DYx[W.@n;wj$hyFoUJP*D!?$6R)hFK&(i7');
define('NONCE_KEY',        '1xj[O><esQLRg!d,mKVl4I[I9z8AcD;[i(w>q]DL86{F&8YX?-R:63M;Lx@/wP+8');
define('AUTH_SALT',        'V[JtkNwW,zX5~eM@]b@Dsp&?-q43.VAHT?*rXKKBGS^/g]lIH/heM0t~$::$(tlo');
define('SECURE_AUTH_SALT', 'j e/V*^ *OoDt8Y]L(YMzU;0B`]C<4%|#8DJKMZw%Kc-S8JE4gMkFW8^ku0yo4Ua');
define('LOGGED_IN_SALT',   'w.~m[/*-ge{.[gwNZ7gejjT,0[XJoMO(i.FX6OO`Y2@A>t1;d3=>k- C8KO :t/+');
define('NONCE_SALT',       '#p)yqgQYnQOq<LB73[d[<x+vN|t 115 rj%d=;4[?W;F1k@0&&$X6JIE,p0eE4%n');

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
