<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link http://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von
 * wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'blogonly1');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'root');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', '');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         'guG`f{{Pn.+l((IT_ySfP%l|7]})Y4wH[S|KU .%zs_:A=F*2ngygbOv.`+/v2|Q');
define('SECURE_AUTH_KEY',  'TueVH|c=V _;/52.y{Btj#Cx*6C4,Ttv0gQbM]q-7N7,{B($KQ,$Q7bI;DjmNOxV');
define('LOGGED_IN_KEY',    'O8LV)N=8If+g#Znq_Pps|$-ly*bn+c.7|9!OYt)Co|2[qj6/c)hWp-Y7^@Ph&b~;');
define('NONCE_KEY',        'ZTTF+BM|rmW1|zyrtzl274zj<*_-^4E^IJbdSrUh[j!8?[o7&FyL|TlpwV:1~8XE');
define('AUTH_SALT',        '+0P8oC@auLX#5BEO?B#b8Bim@h>7Zxws@eVKnNa_U77?pXZ`>UXLN|xEMJsH -[V');
define('SECURE_AUTH_SALT', 'V-MtyO=7[/8TEP_3P,Z4qf{Ktrd;+Q.X.;$R6y;~UG{NRWs;A<xrQ7nG.r+nQxj|');
define('LOGGED_IN_SALT',   'CNg6r57>9B!I=1t[`t0$|kfN^VJ.f6{5/^c^v+o]BjDkK;[2+4 syLdB5O:Yp?>i');
define('NONCE_SALT',       '4y%WEI-t6dM1a(ym/F~[-vD93hIo(>wHk<+|vjS]-x&x{_)p!_@U{Il~:|Wz7^a`');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'blog_';

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
