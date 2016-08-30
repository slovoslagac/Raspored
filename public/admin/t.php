<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 30.8.2016
 * Time: 8:35
 */


require '../../includes/init.php';
$shift = new Shift();
$all_shifts = $shift->get_all_shifts_with_pause();

foreach ($all_shifts as $as) {
    $pause = $as->pst;
    echo "$pause <br/>";
    echo date_format($pause,'Y-m-d H:i:s');

}