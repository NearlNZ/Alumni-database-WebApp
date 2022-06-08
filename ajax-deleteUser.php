<?php
    require_once("resource/sql/alumniDB-con.php");

    if(isset($_POST)){
        $sql = sprintf("DELETE FROM tbl_user WHERE `uID` = %s", $_POST['uID']);
        mysqli_query($alumniDB, $sql);
        echo "success";   
    }
    $alumniDB = null;
    exit();
?>