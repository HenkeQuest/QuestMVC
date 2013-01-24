<?php
/**
 * A form to login the user profile.
 * 
 * @package LydiaCore
 */
class FormUserLogin extends Form {


  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->AddElement(new FormElementText('acronym'))
         ->AddElement(new FormElementPassword('password'))
         ->AddElement(new FormElementSubmit('login', array('callback'=>array($object, 'DoLogin'))));

    $this->SetValidation('acronym', array('not_empty'))
         ->SetValidation('password', array('not_empty'));
  }
  
}
