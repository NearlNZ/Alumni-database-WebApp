<?php
    require_once("resource/sql/alumniDB-con.php");

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "SELECT * FROM tbl_brance WHERE faID='$id' ORDER BY brName";
        $query = mysqli_query($alumniDB, $sql);
        echo '<option value="" selected disabled>--กรุณาเลือก--</option>';
        foreach ($query as $value) {
            echo '<option value="'.$value['brID'].'">'.$value['brName'].'</option>';
        }
    }
    $alumniDB = null;
    exit();
?>