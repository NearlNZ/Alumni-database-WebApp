<?php
    require_once("resource/sql/addressDB-con.php");

    if (isset($_POST["query"]) && $_POST['query']=="district") {
        $id = $_POST["id"];
        $sql = "SELECT * FROM districts WHERE province_id ='$id' ORDER BY name_in_thai";
        $query = mysqli_query($addressDB, $sql);
        echo '<option value="" selected disabled>--กรุณาเลือก--</option>';
        foreach ($query as $value) {
            printf('<option value="%s" data-id="%s">%s</option>', $value['name_in_thai'], $value['id'], $value['name_in_thai']);
        }
    }
    if (isset($_POST["query"]) && $_POST['query']=="subdistrict") {
        $id = $_POST["id"];
        $sql = "SELECT * FROM subdistricts WHERE district_id ='$id' ORDER BY name_in_thai";
        $query = mysqli_query($addressDB, $sql);
        echo '<option value="" selected disabled>--กรุณาเลือก--</option>';
        foreach ($query as $value) {
            printf('<option value="%s" data-id="%s">%s</option>', $value['name_in_thai'], $value['id'], $value['name_in_thai']);
        }
    }
    if (isset($_POST["query"]) && $_POST['query']=="zipcode") {
        $id = $_POST["id"];
        $sql = "SELECT zip_code FROM subdistricts WHERE id ='$id' ORDER BY name_in_thai";
        $query = mysqli_query($addressDB, $sql);
        $value = $query->fetch_assoc();
        echo $value["zip_code"];
    }
    exit();
?>