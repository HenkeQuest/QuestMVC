<?php
/**
 * Sample controller for a site builder.
 */
class Mycontroller extends Object implements IController {

  /**
   * Constructor
   */
  public function __construct() { parent::__construct(); }
  

  /**
   * The page about me
   */
  public function Index() {
    $content = new MContent(5);
    $this->views->SetTitle('About me'.htmlEnt($content['title']));
    $this->views->AddInclude(__DIR__ . '/page.tpl.php', array(
                  'content' => $content,
                ));
  }


  /**
   * The blog.
   */
  public function Blog() {
    $content = new MContent();
    $this->views->SetTitle('My blog');
    $this->views->AddInclude(__DIR__ . '/blog.tpl.php', array(
                  'contents' => $content->ListAll(array('type'=>'post', 'order-by'=>'title', 'order-order'=>'DESC')),
                ));
  }


  /**
   * The guestbook.
   */
  public function Guestbook() {
    $guestbook = new MGuestbook();
    $form = new FormMyGuestbook($guestbook);
    $status = $form->Check();
    if($status === false) {
      $this->AddMessage('notice', 'The form could not be processed.');
      $this->RedirectToControllerMethod();
    } else if($status === true) {
      $this->RedirectToControllerMethod();
    }
    
    $this->views->SetTitle('My Guestbook');
    $this->views->AddInclude(__DIR__ . '/guestbook.tpl.php', array(
            'entries'=>$guestbook->ReadAll(), 
            'form'=>$form,
         ));
  }
  

} 


/**
 * Form for the guestbook
 */
class FormMyGuestbook extends Form {

  /**
   * Properties
   */
  private $object;

  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->objecyt = $object;
    $this->AddElement(new FormElementTextarea('data', array('label'=>'Add entry:')))
         ->AddElement(new FormElementSubmit('add', array('callback'=>array($this, 'DoAdd'), 'callback-args'=>array($object))));
    $this->SetValidation('data', array('not_empty'));
  }
  

  /**
   * Callback to add the form content to database.
   */
  public function DoAdd($form, $object) {
    return $object->Add(strip_tags($form['data']['value']));
  }


}