<?php
/**
 * A form to manage content.
 * 
 * @package LydiaCore
 */
class FormContent extends Form {

  /**
   * Properties
   */
  private $content;

  /**
   * Constructor
   */
  public function __construct($content) {
    parent::__construct();
    $this->content = $content;
    $save 	= isset($content['id']) ? 'save' : 'create';
    $this->AddElement(new FormElementHidden('id', array('value'=>$content['id'])))
         ->AddElement(new FormElementText('title', array('value'=>$content['title'])))
         ->AddElement(new FormElementText('key', array('value'=>$content['key'])))
         ->AddElement(new FormElementTextarea('data', array('label'=>'Content:', 'value'=>$content['data'])))
         ->AddElement(new FormElementText('type', array('value'=>$content['type'])))
         ->AddElement(new FormElementText('filter', array('value'=>$content['filter'])))
         ->AddElement(new FormElementSubmit($save, array('callback'=>array($this, 'DoSave'), 'callback-args'=>array($content))))
         ->AddElement(new FormElementSubmit('delete', array('callback'=>array($this, 'DoDelete'), 'callback-args'=>array($content))));

    $this->SetValidation('title', array('not_empty'))
         ->SetValidation('key', array('not_empty'));
  }
  

  /**
   * Callback to save the form content to database.
   */
  public function DoSave($form, $content) {
    $content['id']    	= $form['id']['value'];
    $content['title'] 	= $form['title']['value'];
    $content['key']   	= $form['key']['value'];
    $content['data']  	= $form['data']['value'];
    $content['type']  	= $form['type']['value'];
	$content['filter'] 	= $form['filter']['value'];
    return $content->Save();
  }
  
   /**
   * Callback to delete the content.
   */
  public function DoDelete($form, $content) {
    $content['id'] = $form['id']['value'];
    $content->Delete();
    Questmvc::Instance()->RedirectTo('content');
  }
 
}