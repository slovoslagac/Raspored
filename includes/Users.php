<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 15:49
 */
class Users
{
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $role_id;
    private $password;
    private $code;

    public function __construct($us = "", $fn = "", $ln = "", $ri = 3, $em = "", $pw = "", $co = "")
    {
        $this->username = $us;
        $this->firstname = $fn;
        $this->lastname = $ln;
        $this->email = $em;
        $this->role_id = $ri;
        $this->password = $pw;
        $this->code = $co;
    }

    public function add_user()
    {

        global $conn;
        $us = $this->username;
        $fn = $this->firstname;
        $ln = $this->lastname;
        $em = $this->email;
        $ri = $this->role_id;
        $pw = $this->password;
        $co = $this->code;
        $insert_shift_row = $conn->prepare("insert into users (username,firstname,lastname,email,role_id,password,mzcode) values(:us, :fn, :ln, :em, :ri, :pw, :co)");
        $insert_shift_row->bindParam(':us', $us);
        $insert_shift_row->bindParam(':fn', $fn);
        $insert_shift_row->bindParam(':ln', $ln);
        $insert_shift_row->bindParam(':em', $em);
        $insert_shift_row->bindParam(':ri', $ri);
        $insert_shift_row->bindParam(':pw', $pw);
        $insert_shift_row->bindParam(':co', $co);
        $insert_shift_row->execute();

    }

    public function get_all_users(){
        global $conn;
        $sql = $conn->query("select u.id, u.firstname, u.lastname, u.username, u.mzcode, u.email, r.name from users u, role r where r.id = u.role_id order by firstname, lastname");
        $sql->execute();
        $all_users = $sql->fetchAll(PDO::FETCH_OBJ);
        return $all_users;
    }


    public function print_user()
    {
        return "$this->username - $this->firstname $this->lastname <br/> $this->role_id";
    }

    public function check_username() {
        global $conn;
        $un = $this->username;
        $sql = ("select * from users where username = '$un'");
        $get_data = $conn->prepare($sql);
        $get_data->execute();
        if ($get_data->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_user_by_id($id)
    {
        global $conn;
        $sql = "delete from users where id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

    }



}