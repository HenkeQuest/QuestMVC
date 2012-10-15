<?php
/**
* Main class for Lydia, holds everything.
*
* @package LydiaCore
*/
class QuestMVC implements ISingleton {

   private static $instance = null;

   /**
    * Singleton pattern. Get the instance of the latest created object or create a new one. 
    * @return CLydia The instance of this class.
    */
   public static function Instance() {
      if(self::$instance == null) {
         self::$instance = new QuestMVC();
      }
      return self::$instance;
   }
   
   /**
    * Constructor
    */
   protected function __construct() {
      // include the site specific config.php and create a ref to $ly to be used by config.php
      $qu = &$this;
      require(QUEST_SITE_PATH.'/config.php');
   }

  /**
   * Frontcontroller, check url and route to controllers.
   */
  public function FrontControllerRoute() {
    // Take current url and divide it in controller, method and parameters
    $this->request = new CRequest();
    $this->request->Init();
    $controller = $this->request->controller;
    $method     = $this->request->method;
    $arguments  = $this->request->arguments;
  }

   /**
    * Theme Engine Render, renders the views using the selected theme.
    */
  public function ThemeEngineRender() {
    echo "<h1>I'm CLydia::ThemeEngineRender</h1><p>You are most welcome. Nothing to render at the moment</p>";
    echo "<pre>", print_r($this->data, true) . "</pre>";
  }


}
?>