<?php
/**
 * A guestbook controller as an example to show off some basic controller and model-stuff.
 * 
 * @package LydiaCore
 */
class Guestbook extends Object implements IController {

  

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
	$this->guestbookModel = new MGuestbook();
  }
  
  /**
   * Implementing interface IController. All controllers must have an index action.
   */
  public function Index() {	
    $this->views->SetTitle("Gästboken");
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
      'entries'=>$this->guestbookModel->ReadAll(), 
      'formAction'=>$this->request->CreateUrl('guestbook/handler')
    ));
  }
  


  /**
   * Handle posts from the form and take appropriate action.
   */
  public function Handler() {
    if(isset($_POST['doAdd'])) {
      $this->guestbookModel->Add(strip_tags($_POST['newEntry']));
    }
    elseif(isset($_POST['doClear'])) {
      $this->guestbookModel->DeleteAll();
    }            
    elseif(isset($_POST['doCreate'])) {
      $this->guestbookModel->Init();
    }            
    $this->RedirectTo($this->request->CreateUrl($this->request->controller));
  }  
} 
