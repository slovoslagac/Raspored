<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 14:29
 */


//win DS = "\", Mac/Linux DS = "/"
defined('DS') ? null :define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'.DS.'AppServ'.DS.'www'.DS.'Raspored');
//defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'.DS.'www'.DS.'Raspored');
//defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'.DS.'XAMPP'.DS.'htdocs'.DS.'Raspored');
defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'includes');



/*echo SITE_ROOT;
echo "<br/>";

echo LIB_PATH;*/


require LIB_PATH . DS . 'config.php';
require LIB_PATH . DS . 'db.php';
require LIB_PATH . DS . 'Users.php';
require LIB_PATH . DS . 'Shifts.php';
require LIB_PATH . DS . 'Pause.php';
require LIB_PATH . DS . 'Role.php';
require LIB_PATH . DS . 'functions.php';


