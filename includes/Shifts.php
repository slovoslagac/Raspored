<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 22.8.2016
 * Time: 15:31
 */
//require('db.php');
require_once('config.php');


class Shift
{
    public $start_time;
    public $end_time;


    public function __construct($st, $et)
    {
        $this->start_time = $st;
        $this->end_time = $et;
    }

    public function get_shift_time()
    {
        $dif = $this->end_time - $this->start_time;
        return "Smena pocinje u $this->start_time, a zavrsava se u $this->end_time i traje $dif sati.";
    }

    public function add_shift()
    {
        $conn = new PDO('mysql:host = ' . db_server . ';dbname=' . db_name, db_user, db_pass);
        $start_time = $this->start_time;
        $end_time = $this->end_time;
        $insert_shift_row = $conn->prepare("insert into raspored (start_time, end_time)
        values(:start_time,:end_time)");
        $insert_shift_row->bindParam(':start_time', $start_time);
        $insert_shift_row->bindParam(':end_time', $end_time);
        $insert_shift_row->execute();
        echo $start_time, $end_time;
    }

}