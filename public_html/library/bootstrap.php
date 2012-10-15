<?php
/**
* Enable auto-load of class declarations.
*/
function autoload($aClassName) {
  $classFile = "/application/model/{$aClassName}/{$aClassName}.class.php";
   $file1 = QUEST_BASE_PATH . $classFile;
   $file2 = QUEST_SITE_PATH . $classFile;
   if(is_file($file1)) {
      require_once($file1);
   } elseif(is_file($file2)) {
      require_once($file2);
   }
}
spl_autoload_register('autoload');
?>