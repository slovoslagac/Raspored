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

echo "<br/>";

//$shift = new Shift(7,23);

//$shift->add_shift();
echo "<br/>";
//echo $shift->get_shift_time();

