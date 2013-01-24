<?php
/**
 * Holding a instance of CLydia to enable use of $this in subclasses.
 *
 * @package LydiaCore
 */
class Object {

   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;
   protected $user;

   /**
    * Constructor
    */
   protected function __construct($qu=null) {
    if(!$qu) {
		$qu = Questmvc::Instance();
    } 
	$this->qu       = &$qu;
    $this->config   = &$qu->config;
    $this->request  = &$qu->request;
    $this->data     = &$qu->data;
	$this->db		= &$qu->db;
	$this->views	= &$qu->views;
	$this->session	= &$qu->session;
	$this->user     = &$qu->user;
  }

	/**
	 * Wrapper for same method in CLydia. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->qu->RedirectTo($urlOrController, $method, $arguments);
  }




	/**
	 * Wrapper for same method in CLydia. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->qu->RedirectToController($method, $arguments);
  }




	/**
	 * Wrapper for same method in CLydia. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->qu->RedirectToControllerMethod($controller, $method, $arguments);
  }




	/**
	 * Wrapper for same method in CLydia. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->qu->AddMessage($type, $message, $alternative);
  }




	/**
	 * Wrapper for same method in CLydia. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->qu->CreateUrl($urlOrController, $method, $arguments);
  }  
}
?>