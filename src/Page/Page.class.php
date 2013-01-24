<?php
/**
 * A page controller to display a page, for example an about-page, displays content labelled as "page".
 * 
 * @package LydiaCore
 */
class Page extends Object implements IController {


  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }


  /**
   * Display an empty page.
   */
  public function Index() {
    $content = new MContent();
    $this->views->SetTitle('Page');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
                  'content' => null,
                ));
  }


  /**
   * Display a page.
   *
   * @param $id integer the id of the page.
   */
  public function View($id=null) {
    $content = new MContent($id);
    $this->views->SetTitle('Page: '.htmlEnt($content['title']));
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
                  'content' => $content,
                ));
  }


} 