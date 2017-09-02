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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'bolinc');

/** MySQL database password */
define('DB_PASSWORD', 'a8336353');

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
define('AUTH_KEY',         'K2]$l<h&J%4Q$-^]ApG]quP2y4iFj1Nw!$j5|}uzImZg+61[/e`9_Q0(6{w%,cAv');
define('SECURE_AUTH_KEY',  'Nz6z< 8B:c<Mc/(X)1?c?~VmIIz<{0*mq2vIgCjAP+aL:zLr|xkZB{!+qArT$0R]');
define('LOGGED_IN_KEY',    '6y/I!Dp{rwqz-=@DJ`W,a0e?K*iu_nsrzAYFjEJ9kdX&L$k]oKrPP@eZ.lvieI&X');
define('NONCE_KEY',        'LIaR}3,Q`D&)7O;eKv,:9cKY,/3dMJ<uUw]F^V5NRu2W;V_ok_oPpWiPqyxr0EYJ');
define('AUTH_SALT',        ' sf+b9-D6;3CQlTu0WR#f,dnb822FAR!JPj[R~1-#5jC(}%%5R?d =f=w5+Bs^:B');
define('SECURE_AUTH_SALT', 'B7>E.>c_>4/uh}%.L4f$Gz:Td2h6r!mi{C5]5}$)@#GO]KO?=ku:uT{fM/>xV}J8');
define('LOGGED_IN_SALT',   'Q}r,h.SpZkA+{cUM8ixM>~}+BGQl?7~WxYOYuEE#:?1D&L}fI5?C4?x^F[*s[tnY');
define('NONCE_SALT',       'N]bglqMKa0hO~G=h@=l#O)<|a;j+..shqUdg&eli+LQSwu(g3QtT6VI h+fQU+w{');

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

