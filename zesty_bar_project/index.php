<?php


$uri = $_SERVER['REQUEST_URI'];
$parse = parse_url($uri, PHP_URL_QUERY);
@$page = strtok($parse, '&') ?? '';

require_once __DIR__.'/inc/functions.php';
require_once __DIR__.'/inc/header.php';



$templateFile =  __DIR__.'/pages/'   .urldecode($page).    '.php';

if(file_exists($templateFile)) {
  require_once $templateFile;
}
else {
  require_once __DIR__.'/pages/home.php';
}


require_once __DIR__.'/inc/footer.php'; 


