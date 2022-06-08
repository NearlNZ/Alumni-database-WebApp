<?php
    $dbserver="localhost";
    $username="root";
    $password="lu25233333";
    $dbname="address_ajax";
    $addressDB = new mysqli($dbserver, $username, $password, $dbname);
    if($addressDB->connect_error) die("Can't connect to Database!".$addressDB->connect_error);
?>