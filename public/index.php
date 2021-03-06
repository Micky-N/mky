<?php

use MkyCore\App;
use GuzzleHttp\Psr7\ServerRequest;


require dirname(__DIR__).'/vendor/autoload.php';


defined('BASE_ULR') or define('BASE_ULR', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/');
defined('ROOT') or define('ROOT', dirname($_SERVER['DOCUMENT_ROOT']));

if(php_sapi_name() !== 'cli'){
    App::run(ServerRequest::fromGlobals());
}