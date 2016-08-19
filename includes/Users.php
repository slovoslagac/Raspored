<?php

/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 15:49
 */
class Users
{
    public $name = 'Ime radnika';
    public $lastname;
    public $code;

    public function GetName(){
        return $this->name;
    }
}