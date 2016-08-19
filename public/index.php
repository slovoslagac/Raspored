<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 15:56
 */
require '../includes/init.php';


$worker = new Users();

echo $worker->GetName();