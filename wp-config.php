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
define('DB_NAME', 'peakclimbing');

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
define('AUTH_KEY',         'tuBkdw6hs-)I(&}[t`/pE:ZU6[e@myhM8;(|j|:2Qyy#uo1b]Bd[CTn@oESPkT_r');
define('SECURE_AUTH_KEY',  'v]aNBagMv]9 S?AIqQk9+xzC%-4bgld4}J(F*lYWnjgw8uJ%=tRq}l}ia<8o>pl`');
define('LOGGED_IN_KEY',    'Ve;c4U=9QE7qlgNsVAwbJu#$]6+C^uwM3{|T R.M$u 7rVY:]aUk+0[Yg?9Iq!O)');
define('NONCE_KEY',        'E@571:|,Aa^IvGW./..?,_$dLqGKkfFoAZ#6+%xlu}xuU 3TmbXonzWV5H[Tm7&w');
define('AUTH_SALT',        '@u(aM.V5&2vg|Rhh=i=2<>w5,k VM>v,ChJQQn9PrLg247WY@QqTH,RjFx%6-@$C');
define('SECURE_AUTH_SALT', 'XE[.?mk/+il/>w!E5yKoNl:e@0;MsG)u*4<cA%-`[_{ mY6v0lZrR#~]o*1D5{r^');
define('LOGGED_IN_SALT',   '<ApT%syq8-+H{9R(%`Z40I_!!/*lM1%q5j@Gi eO#/&AA@=x|/<&C8a&5ZWRF#~V');
define('NONCE_SALT',       'MKNld]E@U0FTvvRDvfTm9,5;WM,o]d~*WrvURwwcX^b-sr)|H@goAR>UfWJnG6Uz');

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
