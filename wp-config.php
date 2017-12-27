<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'senzix15_senzitae');

/** MySQL database username */
define('DB_USER', 'senzix15_admin');

/** MySQL database password */
define('DB_PASSWORD', 'senzit123$%^');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'jXyoy|yTTG`WYtG%/e!AeJ~2fPsl()qH|#L0L.%t|EG4o(@|31;?((D|l|A4$G<@');
define('SECURE_AUTH_KEY',  'X s+,+iOi$$Vw_Um1@Q{|$aIRzL7Y@~bCS<rZX/`K^6/(c!PgH7|8:ZEA~p:fqrV');
define('LOGGED_IN_KEY',    'tI&_a~])}D|^LP%4dds^sAYCj/4z4/er|9oAT +bHP9f[3+HOeFj02(UU9_~E,o~');
define('NONCE_KEY',        'aY+.I}|>Wi@(h06+ng)|h:i%n>6}`!%?K5/%Hq-2:~Nr?H!];g2PW6?-3 Yq~IE@');
define('AUTH_SALT',        'P2X9v.-Fe.aC|13y?_cnTDdT:bWL7J?9}3H>e+6+-%tFSsU|W&zA6K;`]/AsQK|{');
define('SECURE_AUTH_SALT', '}XdqFJ .Ia(EA?SdzaJh<;qB|HyAZ2QSasKm4r<V_.*tVV;5by(J[k)uaj6M7yzK');
define('LOGGED_IN_SALT',   'O$4Wmn&CLvE7k^!& 9tG`W==qR@5ac{?DiCn?tN+DNV5W 5[e.c?Iy7W*+5hkoAI');
define('NONCE_SALT',       'P.^(#q 5&_zK1J,C8{:[O]#e8QN;4&?ETIq:c|F%>]cHV/g|U$-R@F) oE36~~he');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define ('WPCF7_LOAD_CSS', false); // Added to disable CSS loading