<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 14:29
 */


//win DS = "\", Mac/Linux DS = "/"
defined('DS') ? null :define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT','C:'.DS.'AppServ'.DS.'www'.DS.'wwwkurs'.DS.'OOP'.DS.'gallery');

defined('LIB_PATH') ? null : define('LIB_PATH',SITE_ROOT.DS.'includes');

/*
echo SITE_ROOT;
echo "<br/>";

echo LIB_PATH;*/

