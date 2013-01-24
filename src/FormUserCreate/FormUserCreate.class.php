<?php
/**
 * A form for creating a new user.
 * 
 * @package LydiaCore
 */
class FormUserCreate extends Form {

  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->AddElement(new FormElementText('acronym', array('required'=>true)))
         ->AddElement(new FormElementPassword('password', array('required'=>true)))
         ->AddElement(new FormElementPassword('password1', array('required'=>true, 'label'=>'Password again:')))
         ->AddElement(new FormElementText('name', array('required'=>true)))
         ->AddElement(new FormElementText('email', array('required'=>true)))
         ->AddElement(new FormElementSubmit('create', array('callback'=>array($object, 'DoCreate'))));
         
    $this->SetValidation('acronym', array('not_empty'))
         ->SetValidation('password', array('not_empty'))
         ->SetValidation('password1', array('not_empty'))
         ->SetValidation('name', array('not_empty'))
         ->SetValidation('email', array('not_empty'));
  }
  
}