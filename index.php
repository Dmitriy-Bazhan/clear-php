<?php
ini_set('display_errors', TRUE);
error_reporting(E_ALL);

const DS = DIRECTORY_SEPARATOR;
const SHOW_DEBUG = true;
require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';
require_once __DIR__ . DS . 'app' . DS . 'tools' . DS . 'Tools.php';

$app = new Core\Application();
$app->run();





