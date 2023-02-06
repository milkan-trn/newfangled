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
define( 'DB_NAME', 'seniorwptest' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'y9Q66z79CGQiZid3' );

/** Database hostname */
define( 'DB_HOST', 'devkinsta_db' );

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
define( 'AUTH_KEY',          'i7$pzAf~l/RIqG$)LJT[?LnWH_MQ5/9-+k;Vc^EOTi2Z-1F5:+]Z{~Vmf)|!|I,j' );
define( 'SECURE_AUTH_KEY',   'bG@7v9d_?XnV/ -r4/|iDqP&5}{K${c0tZcWR~a>!#J,oxw{w(Nx cJi5m;9w~:~' );
define( 'LOGGED_IN_KEY',     ':A|1-!V-;))M6,<XDAlio0xCx/!b&{[^?gmkBH]vaXGz>cfr|Zu.$O:)Sh]Yz`y(' );
define( 'NONCE_KEY',         '(XwJI&F1k8FApMqW6Yi [uC,VNE<_syT&eB8,p)WPc9gp!-!y%U)1uDhn<5OXZ#+' );
define( 'AUTH_SALT',         '/=~9bikN:-s[Ml1twC>+jvp1W;BMYv>`5hxp7h8%@+dg|^$WghTBMq$S64SAKzCj' );
define( 'SECURE_AUTH_SALT',  'lc#9LfFo.gGx(I9KO1s6Zi>_$lb`a7+DERYSQfyvaRY/#*>G!:%hnK3zms?8-gG+' );
define( 'LOGGED_IN_SALT',    '_Ty>l_YRK!8w7p!t_V^Y&R31;@hXlY39mZU5yV3IGm{P*;F) dO;LYzoPW8F)AgX' );
define( 'NONCE_SALT',        'rg0hGZm(CEo,g,aw>%YJpt!<n)RF#oPo)<;03M*n;Ci;*,J|_oReDy-O_P_E2::h' );
define( 'WP_CACHE_KEY_SALT', 'g:;9Y%`[c.U(Y[o&#ROYFpL_v$8@EuxAZ]h;8JV9^Vz%&60a|y?fNv65AXS<8z&v' );


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
	define( 'WP_DEBUG', true );
}

define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
