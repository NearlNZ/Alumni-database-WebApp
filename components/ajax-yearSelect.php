<?php
    if (isset($_POST['startYear'])) {
        $startYear = $_POST['startYear'];
        $year = date("Y")+543;
        echo '<option value="" selected disabled>--กรุณาเลือก--</option>';
        for($year ; $year > $startYear; $year--){
             echo '<option value="'.$year.'">'."ปี ".$year.'</option>';
        }
    }       
    exit();
?>