<?php
    $dbserver="localhost";
    $username="root";
    $password="lu25233333";
    $dbname="alumni_db";
    $alumniDB = new mysqli($dbserver, $username, $password, $dbname);
    if($alumniDB->connect_error) die("Can't connect to Database!".$alumniDB->connect_error);
?>