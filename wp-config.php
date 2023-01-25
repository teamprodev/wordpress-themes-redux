<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '93v9`^^^7D}EIxwDh EDV3FA xM5FhT+DtuI5`iE SyO//i}R F,eZ_RMAP])n`]' );
define( 'SECURE_AUTH_KEY',  '$MX^MoVp<3+cor~fAqy=vN7C=]C8K0|<oatQ$ob}X+JSe^@BC^OvG*_fU6Sbs@C8' );
define( 'LOGGED_IN_KEY',    'k9qRDK%JN>[iZ1~dx:pMHn,RMz+wg}r$=ZJyB95<:io8R+6&W`=5tf$#08WGMXv.' );
define( 'NONCE_KEY',        ':^$-X,5,[(;v#oSy1;wMUD,=JA<oZhM#1b4@>nTt6kYLw<cr(E&Tu<.(HqfEjo56' );
define( 'AUTH_SALT',        'Hn/Ph2XJB%uR(:WV9_,]2vNH!&xB5U_qYm:h#~fP#%rPVgQE9x}61o6Fl]RrZXHX' );
define( 'SECURE_AUTH_SALT', 'EWu.{Y)3L]LNPWikmxN/X0TPA:B;{}aSt;EplV!xq&Q78Ie~.?lc_xF;o nFzUvZ' );
define( 'LOGGED_IN_SALT',   '9V<AJ<;ZscB%@PgdG8*vrr^k2#w!6?g9D;p|v@Mo5FxcK>RvlA4sf;S_p!N_fogt' );
define( 'NONCE_SALT',       'v}$9s2eg6QWlH/.k-`1B-vC5f.jyV&B)>l9TJBzkRayfx<H}m#<0suiZzl|>)4Q_' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
