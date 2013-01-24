<?php
/**
 * A model for a guestbok, to show off some basic controller & model-stuff.
 * 
 * @package LydiaCore
 */
class MGuestbook extends Object implements IHasSQL, IModule {




  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
  }

   /**
    * Implementing interface IHasSQL. Encapsulate all SQL used by this class.
    *
    * @param string $key the string that is the key of the wanted SQL-entry in the array.
    */
  public static function SQL($key=null) {
     $queries = array(
        'create table guestbook'  => "CREATE TABLE IF NOT EXISTS Guestbook (id INTEGER PRIMARY KEY, text TEXT, created DATETIME default (datetime('now')));",
        'insert into guestbook'   => 'INSERT INTO Guestbook (text) VALUES (?);',
        'select * from guestbook' => 'SELECT * FROM Guestbook ORDER BY id DESC;',
        'delete from guestbook'   => 'DELETE FROM Guestbook;',
     );
     if(!isset($queries[$key])) {
        throw new Exception("No such SQL query, key '$key' was not found.");
      }
      return $queries[$key];
   }

  /**
   * Save a new entry to database.
   */
  public function Init() {
    try {
      $this->db->ExecuteQuery(self::SQL('create table guestbook'));
      $this->session->AddMessage('notice', 'Successfully created the database tables (or left them untouched if they already existed).');
    } catch(Exception$e) {
      die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
    }
  }
  
  /**
   * Save a new entry to database.
   */
  public function Add($entry) {
    $this->db->ExecuteQuery(self::SQL('insert into guestbook'), array($entry));
	$this->session->AddMessage('success', 'Successfully inserted new message.');
    if($this->db->rowCount() != 1)
      echo 'Failed to insert new guestbook item into database.';
  }
 
  /**
   * Delete all entries from the database.
   */
  public function DeleteAll() {
    $this->db->ExecuteQuery(self::SQL('delete from guestbook'));
	$this->session->AddMessage('info', 'Removed all messages from the database table.');
  }

/**
   * Read all entries from the database.
   */
  public function ReadAll() {
    try {
      $this->db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      return $this->db->ExecuteSelectQueryAndFetchAll(self::SQL('select * from guestbook'));
    } catch(Exception $e) {
      return array();    
    }
  }

  /**
   * Implementing interface IModule. Manage install/update/deinstall and equal actions.
   */
  public function Manage($action=null) {
    switch($action) {
      case 'install': 
        try {
          $this->db->ExecuteQuery(self::SQL('create table guestbook'));
          return array('success', 'Successfully created the database tables (or left them untouched if they already existed).');
        } catch(Exception$e) {
          die("$e<br/>Failed to open database: " . $this->config['database'][0]['dsn']);
        }
      break;
      
      default:
        throw new Exception('Unsupported action for this module.');
      break;
    }
  }
}
?>