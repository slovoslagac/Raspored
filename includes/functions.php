<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 29.8.2016
 * Time: 13:08
 */

function calendar_day()
{

    $date = date('N');
    if ($date == 1) {
        $start_date = new DateTime('now');
        return $start_date;
    } elseif ($date > 1) {
        $start_date = new DateTime('now');
        $start_date->sub(new DateInterval('P' . $date . 'D'));
        return $start_date;
    } elseif ($date == 0) {
        $start_date = new DateTime('now');
        $start_date->sub(new DateInterval('P6D'));
        return $start_date;
    }

}

function get_object_by_id($id, $array)
{
    foreach ($array as $el) {
        if ($el->id == $id) {
            return $el;
        }

    }


}

