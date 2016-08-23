<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 23.8.2016
 * Time: 11:05
 */


class Pause
{
    public function get_all_pauses () {
        global $conn;
        $sql = $conn->query("select * from pause start_time");
        $sql->execute();
        $all_pauses = $sql->fetchAll(PDO::FETCH_OBJ);
        return $all_pauses;
    }
}