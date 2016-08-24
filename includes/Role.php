<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 24.8.2016
 * Time: 14:00
 */
class Role
{
    public function get_all_roles()
    {
        global $conn;
        $sql = $conn->query("select * from role");
        $sql->execute();
        $all_role = $sql->fetchAll(PDO::FETCH_OBJ);
        return $all_role;
    }
}