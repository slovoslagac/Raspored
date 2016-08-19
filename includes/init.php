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

defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'includes');

require LIB_PATH.DS.'config.php';
require LIB_PATH.DS.'db.php';
require LIB_PATH.DS.'Users.php';

/*echo SITE_ROOT;
echo "<br/>";

echo LIB_PATH;*/


