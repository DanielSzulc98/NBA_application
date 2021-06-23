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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gabor_wp1' );

/** MySQL database username */
define( 'DB_USER', 'gabor_wp1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'U~VTtoi[3Y23bRB~CG]25(]1' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RYbITYkv7E2WV4bCFQTZPC4QSRTdq6vRQpR4Aa9qOxVXnL475ODi0q4PmOFotI35');
define('SECURE_AUTH_KEY',  '1yYGeQvVA5tUkibK6GXl02X1RljPWCsVlQ3glGZ6gIdstrugJbcDuugZm21Awhne');
define('LOGGED_IN_KEY',    'rL8KmVMJW8xWXTpboxKegB4iKlDKM8ZZOCwTbD3uAZILYSQZNo3doVSVff8GVKuf');
define('NONCE_KEY',        'o3eLTH7jZ98dSNuP4JX58HZOKTtj2pGML2ESTRICxpEcAKdWu0fYIa0Bw8h7copT');
define('AUTH_SALT',        '8AReZLQIoWYiaYJ70IIKb8uznirWMLje6DjAKWcBpEmVUQp8bb0EzWRR0RkBrbRl');
define('SECURE_AUTH_SALT', '1hYMmgHO793iKNOF2Ghur0d6QLx6GcwVM1dyaPGpzob9ce84gCMBlQXmFlc3epUS');
define('LOGGED_IN_SALT',   'fHKWF40DgGjA00cIdjbjHXodvFvxTo8hRDmbdncwr7nzzVrm2TbYX0q3aXfRNbga');
define('NONCE_SALT',       '5Fhv6je6VMFqkqLyPGWibLFlxU8Gt1bNWZWz5h1Vz9QfmBVhIQV9j05wbJkrqdo5');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
