<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 22.8.2016
 * Time: 15:31
 */
require('db.php');
require_once('config.php');


class Shift
{
    public $start_time;
    public $end_time;



    public function __construct($st=8, $et=16)
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
        if($this->start_time != null && $this->end_time != null) {
            if($this->check_record($this->start_time, $this->end_time) == true) {
                echo "Uneta smena vec postoji";
            }  else {
            global $conn;
            $start_time = $this->start_time;
            $end_time = $this->end_time;
            $insert_shift_row = $conn->prepare("insert into smena (start_time, end_time) values(:start_time,:end_time)");
            $insert_shift_row->bindParam(':start_time', $start_time);
            $insert_shift_row->bindParam(':end_time', $end_time);
            $insert_shift_row->execute();
            echo $start_time, $end_time;
        }} else {
            echo "Niste uneli sve potrebne parametre za kreiranje smene !";
        }
    }

    public function check_record($st,$et){
        global $conn;
        $sql=("select * from smena where start_time = $st and end_time=$et");
        $get_data=$conn->query($sql);
        if($get_data->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

}