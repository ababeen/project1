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
define('DB_NAME', 'moktarul_wp7');

/** MySQL database username */
define('DB_USER', 'moktarul_wp7');

/** MySQL database password */
define('DB_PASSWORD', 'M(^NwjkJyK3]1z@STA]28*^5');

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
define('AUTH_KEY',         'fwwAEY02xq3hnNdlxJQECWuy4welzXJ6JH9p6ih3lL5ESWYvoPXZvgTd9lnFTI3b');
define('SECURE_AUTH_KEY',  'Abq6VCPR85GCxs7jnQlPwWFpwmafcVURdD49dy1A0qTzTyi7l3ZBE3fT6OHYDx9S');
define('LOGGED_IN_KEY',    'jZ0NaxKA7EbXT6dHInatKeIqtn4tUpaNki91siLP8JiZOqqdLOKeXRS529PVtrxl');
define('NONCE_KEY',        'sjx9aSUx4kKv4a6b356FeHMUh3FBMyfvtfo6zooMMvtYBG7v1NrLNBuWfu8QYnCL');
define('AUTH_SALT',        'rRsbql9KyzF09mErrlZRnZ3RfsLWWUbEqx0ml7IpiO1XWat9imQNdHTsE8QW9xNK');
define('SECURE_AUTH_SALT', 'ZQzjLp8exzHadHnIYYRWiKj0ydzW9lwoWMXQfUkU7v3pmMOTGiPt0Y1KwZeJPLQw');
define('LOGGED_IN_SALT',   'u6upQwaXShsDucAyY8jV66XP1EpMSbqgo289uIkoo4RwbnEw0f3SBOtZqCW9C5H5');
define('NONCE_SALT',       'bph3KQOuIETZRCSSrAvehQZugdrcrOrctyrQslBXgO901xYyptywCJNgRDO9oxKk');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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
