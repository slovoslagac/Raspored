<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 22.8.2016
 * Time: 15:31
 */
//require('db.php');


class Shift
{
    private $start_time;
    private $end_time;
    private $pause_id;
    private $shift_name;


    public function __construct($st = "", $et = "", $pid = "", $name = "")
    {
        $this->start_time = $st;
        $this->end_time = $et;
        $this->pause_id = $pid;
        $this->shift_name = $name;
    }


    public function get_shift_time()
    {
        $dif = $this->end_time - $this->start_time;
        return "Smena pocinje u $this->start_time, a zavrsava se u $this->end_time i traje $dif sati.";
    }

    public function add_shift()
    {
        if ($this->start_time != null && $this->end_time != null && $this->pause_id != null or $this->shift_name != null) {
            if ($this->check_record() == true) {
                echo "Uneta smena vec postoji";
            } else {
                global $conn;
                $start_time = $this->start_time;
                $end_time = $this->end_time;
                $pause_id = $this->pause_id;
                $shift_name = $this->shift_name;
                $insert_shift_row = $conn->prepare("insert into shifts (start_time, end_time, pause_id, shift_name) values(:start_time,:end_time, :pause_id, :shift_name)");
                $insert_shift_row->bindParam(':start_time', $start_time);
                $insert_shift_row->bindParam(':end_time', $end_time);
                $insert_shift_row->bindParam(':pause_id', $pause_id);
                $insert_shift_row->bindParam(':shift_name', $shift_name);
                $insert_shift_row->execute();
                unset($this->start_time, $this->end_time);
            }
        } else {
            echo "Niste uneli sve potrebne parametre za kreiranje smene !";
        }
    }

    public function check_record()
    {
        global $conn;
        $st = $this->start_time;
        $et = $this->end_time;
        $pid = $this->pause_id;
        $name = $this->shift_name;
        if ($st != "" and $et != "" and $pid != "") {
            $sql = ("select * from shifts where start_time = '$st' and end_time= '$et' and pause_id = '$pid' ");
        } else {
            $sql = ("select * from shifts where  shift_name ='$name'");
        }
        $get_data = $conn->prepare($sql);
        $get_data->execute();
        if ($get_data->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function get_all_shifts_with_pause()
    {
        global $conn;
        $sql = $conn->query("select s.shift_name as name, s.id as id, time_format(s.start_time, '%H:%i') as sst, time_format(s.end_time, '%H:%i') as sset, time_format(p.start_time, '%H:%i') as pst, p.end_time as pet, s.id as id from shifts s left join pause p on s.pause_id = p.id order by s.start_time");
        $sql->execute();
        $all_shifts = $sql->fetchAll(PDO::FETCH_OBJ);
        return $all_shifts;
    }

    public function delete_shift_by_id($id)
    {
        global $conn;
        $sql = "delete from shifts where id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

    }

}