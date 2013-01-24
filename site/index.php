<?php	
echo "site";
//
// PHASE: BOOTSTRAP
//
define('QUEST_BASE_PATH', dirname(__FILE__));
define('QUEST_SITE_PATH', QUEST_BASE_PATH . '/site');

require(QUEST_BASE_PATH.'/application/models/Questmvc/bootstrap.php');

$qu = Questmvc::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$qu->FrontControllerRoute();

//
// PHASE: THEME ENGINE RENDER
//
$qu->ThemeEngineRender();


?>