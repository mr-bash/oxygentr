<?php

ob_start();
session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../interfaces/interface-database.php';

spl_autoload_register(function ($name) {
  require_once __DIR__ ."/../classes/{$name}.class.php";
});




?>