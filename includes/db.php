<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 27.7.2016
 * Time: 12:23
 */
require_once('config.php');


try {

    $conn = new PDO('mysql:host = ' . db_server . ';dbname=' . db_name, db_user, db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}