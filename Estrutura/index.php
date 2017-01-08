<?php

require_once("Slim/Slim.php");

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app -> run();

?>				