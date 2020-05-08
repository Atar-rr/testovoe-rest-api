<?php

require_once 'vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);

require_once __DIR__ . '/App/routes.php';

$app->run();
