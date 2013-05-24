<?php
define('ABSPATH', __DIR__);
define('VIEW_PATH', ABSPATH . '/views');
define('INCLUDESPATH', ABSPATH . '/ui');
define('CONTROLLER_PATH', ABSPATH . '/Controllers');
define('SITE_PATH', trim(preg_replace('/index\.[a-z]+/i', '', $_SERVER['SCRIPT_NAME']), '/'));