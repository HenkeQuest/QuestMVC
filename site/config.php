<?php
/**
* Site configuration, this file is changed by user per site.
*
* @package QuestCore
*/

/*
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);

/*
* Define session name
*/
$qu->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/*
* Define server timezone
*/
$qu->config['timezone'] = 'Europe/Stockholm';

/*
* Define internal character encoding
*/
$qu->config['character_encoding'] = 'UTF-8';

/*
* Define language
*/
$qu->config['language'] = 'en';


/**
 * Define menus.
 *
 * Create hardcoded menus and map them to a theme region through $ly->config['theme'].
 */
$qu->config['menus'] = array(
  'navbar' => array(
    'home'      => array('label'=>'Home', 'url'=>'home'),
    'modules'   => array('label'=>'Modules', 'url'=>'module'),
    'content'   => array('label'=>'Content', 'url'=>'content'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
    'blog'      => array('label'=>'Blog', 'url'=>'blog'),
  ),
  'my-navbar' => array(
    'home'      => array('label'=>'About Me', 'url'=>'my'),
    'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
    'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
  ),
);

/**
* Define the controllers, their classname and enable/disable them.
*
* The array-key is matched against the url, for example: 
* the url 'developer/dump' would instantiate the controller with the key "developer", that is 
* CCDeveloper and call the method "dump" in that class. This process is managed in:
* $qu->FrontControllerRoute();
* which is called in the frontcontroller phase from index.php.
*/
$qu->config['controllers'] = array(
  'index'     => array('enabled' => true, 'class' => 'Index'),
  'developer' => array('enabled' => true,'class' => 'Developer'),
  'guestbook' => array('enabled' => true,'class' => 'Guestbook'),
  'content'   => array('enabled' => true,'class' => 'Content'),
  'blog'      => array('enabled' => true,'class' => 'Blog'),
  'page'      => array('enabled' => true,'class' => 'Page'),  
  'user'      => array('enabled' => true,'class' => 'User'),
  'acp'       => array('enabled' => true,'class' => 'AdminControlPanel'),
  'theme'     => array('enabled' => true,'class' => 'Theme'),
  'module'    => array('enabled' => true,'class' => 'Modules'),
  'my'        => array('enabled' => true,'class' => 'Mycontroller'),
  );

/**
 * Settings for the theme.
 */
$qu->config['theme'] = array(
  'path'            => 'site/themes/mytheme',
  //'path'            => 'themes/grid',
  'parent'          => 'themes/grid',
  'stylesheet'  => 'style.css',   // Main stylesheet to include in template files 
  'template_file'   => 'index.tpl.php',   // Default template file, else use default.tpl.php
  'regions' => array('flash','featured-first','featured-middle','featured-last',
    'primary','sidebar','triptych-first','triptych-middle','triptych-last',
    'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
    'footer',
  ),
    'menu_to_region' => array('my-navbar'=>'navbar'),
  // Add static entries for use in the template file. 
  'data' => array(
    'header' => 'QuestMVC',
    'slogan' => 'A PHP-based MVC-inspired CMF',
    'favicon' => 'logo_80x80.png',
    'logo' => 'logo_80x80.png',
    'logo_width'  => 80,
    'logo_height' => 80,
    'footer' => '<p>Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
  ),
);

/**
* Set a base_url to use another than the default calculated
*/
$qu->config['base_url'] = null;

/**
* What type of urls should be used?
* 
* default      = 0      => index.php/controller/method/arg1/arg2/arg3
* clean        = 1      => controller/method/arg1/arg2/arg3
* querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
*/
$qu->config['url_type'] = 1;

/**
 * Set database(s).
 */
$qu->config['database'][0]['dsn'] = 'sqlite:' . QUEST_SITE_PATH . '/data/sqlite.db';

/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$qu->config['debug']['QuestMVC'] = false;
$ly->config['debug']['session'] = false;
$ly->config['debug']['timer'] = false;
$qu->config['debug']['db-num-queries'] = false;
$qu->config['debug']['db-queries'] = false;

$qu->config['session_key']  = 'QuestMVC';

/**
 * How to hash password of new users, choose from: plain, md5salt, md5, sha1salt, sha1.
 */
$qu->config['hashing_algorithm'] = 'sha1salt';

/**
 * Allow or disallow creation of new user accounts.
 */
$qu->config['create_new_users'] = true;

/**
 * Define a routing table for urls.
 *
 * Route custom urls to a defined controller/method/arguments
 */
$ly->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);
?>