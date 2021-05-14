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
define( 'DB_NAME', 'formative' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Bq>59sXHr@vy}R}-.ir*1mF;GXt0@yiD+RX.YBZHGP%UJNQbvN@#V[k1U{!VXhGg' );
define( 'SECURE_AUTH_KEY',  'RYTa8P!ja-sVqB^-j8vwo&)^km&@IlUbpV9w?).U:q.&CSHq*N1C.w,IKkl+f2!6' );
define( 'LOGGED_IN_KEY',    'G+W#$bqK-=`V,Ep]MZ/qin>xkfNtl25iW<Ag(QE)[1v<2OzLx(VDcoc%k,InhvN#' );
define( 'NONCE_KEY',        '@gnhYUw=<b<F.bto&q,9!HL7ZN$NB0OE}(fRxx.5uv$9BlXJK&@9kcUl%%C+}=TO' );
define( 'AUTH_SALT',        'JJcQ*:f+zSKdnt8KJSd8w5jJm{K+L8s}p(+-STq3&b1;tNMk?<hFx)2g*@~mfTpU' );
define( 'SECURE_AUTH_SALT', 'Pm}k.EmNC>9Nfx+{<ryQG{6oh-KHWB&^E#92?Xx(oG4bCuK*fcYk678ILbO`Y`N:' );
define( 'LOGGED_IN_SALT',   'C@.3UYyi{vVw-AS4d|r()/8fw:jFRtg] :3D_~$3fY_w<s5wh1e12^,}rHH *PMw' );
define( 'NONCE_SALT',       'w:Vb7:UUabu1}L)=c)dp-O:*6)ARA,h3f0}f{x4<v&:2-Ny#QwDANp(fTJY5J)%5' );

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
