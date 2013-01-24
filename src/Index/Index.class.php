<?php
/**
* Standard controller layout.
* 
* @package QuestCore
*/
class Index extends Object implements IController {

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }
  
   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
       $modules = new MModules();
	   $controllers = $modules->AvailableControllers();
	   $this->views->SetTitle('Index');
       $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(), 'primary');
       $this->views->AddInclude(__DIR__ . '/sidebar.tpl.php', array('controllers'=>$controllers), 'sidebar');

   }
} 

?>