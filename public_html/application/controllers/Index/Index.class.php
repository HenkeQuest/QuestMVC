<?php
/**
* Standard controller layout.
* 
* @package QuestCore
*/
class Index implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $qu;
      $qu->data['title'] = "The Index Controller";
   }

} 

?>