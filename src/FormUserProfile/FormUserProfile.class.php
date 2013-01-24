<?php
/**
 * A form for editing the user profile.
 * 
 * @package LydiaCore
 */
class FormUserProfile extends Form {

  /**
   * Constructor
   */
  public function __construct($object, $user) {
    parent::__construct();
    $this->AddElement(new FormElementText('acronym', array('readonly'=>true, 'value'=>$user['acronym'])))
         ->AddElement(new FormElementPassword('password'))
         ->AddElement(new FormElementPassword('password1', array('label'=>'Password again:')))
         ->AddElement(new FormElementSubmit('change_password', array('callback'=>array($object, 'DoChangePassword'))))
         ->AddElement(new FormElementText('name', array('value'=>$user['name'], 'required'=>true)))
         ->AddElement(new FormElementText('email', array('value'=>$user['email'], 'required'=>true)))
         ->AddElement(new FormElementSubmit('save', array('callback'=>array($object, 'DoProfileSave'))));
  }
  
}

?>