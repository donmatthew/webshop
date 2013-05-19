<?php
/**
 *
 *
 *
 * @package WordPress
 */

define('DB_NAME', 'webshop');

define('DB_USER', 'webshop');

define('DB_PASSWORD', 'UtQ1CSq78nu');

/** MySQL-server */
define('DB_HOST', 'localhost');

define('DB_CHARSET', 'utf8');

define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'H?K+XAvL7.+|o{^w:m!T^7r}yIEY2YGU};]nF.=3O5kL_3Os,XnR?N*< ]Rh,U7]');
define('SECURE_AUTH_KEY',  '(%&Fu)Tq|a%S-:fn7GOD>K4mK7b*t9!-trT:.]].EfPe`8PoZa{lzk({/FXM1t:f');
define('LOGGED_IN_KEY',    '8Hx>J=LBocZYHJIIg^zK4tc)EDdGxDhFuz1W3hmMXSMeKQ3eY#[] VW&<4@ .Xe<');
define('NONCE_KEY',        'rXFshbQ#HaLZT0ym!AcEElos$=cb1$)|SKD>!Oq!D*T m^MpQIGg%&w$X#NfaZpL');
define('AUTH_SALT',        '??echwdY5%,Om)Plf(F=@6/Z 8!`-iRUVS@C-i,Kl%9x9>/##996P%tLHry[]@R~');
define('SECURE_AUTH_SALT', 'SDB5y`^;w3aoL.>mrM#So~(7k`hjpW&[p7Q`Z[lLFK(CopMxn!le 7AsO3K_x(rg');
define('LOGGED_IN_SALT',   'ScF@$?[pO_Vmv6p8&OB;_>}tHBqq^uJ^U4bCk5_TZ*]RX-+P=Gi8V#1!9hU[@A5f');
define('NONCE_SALT',       'BeCJ{N[YL6dC> XmYWIrYDgPLaJUh`f`G,];.I^<1)fy7~HUCpoI+PJznPY;Fkw4');

/**#@-*/

/**
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 */
$table_prefix  = 'wp_';

/**
 *
 */
define('WPLANG', 'sv_SE');

/** 
 * 
 */ 
define('WP_DEBUG', false);


if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');