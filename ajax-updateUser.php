<?php
    require_once("resource/sql/alumniDB-con.php");

    if(isset($_POST)){
        $sql = "SELECT `uID` FROM tbl_user WHERE `uID` = ?";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('s', $_POST['uID']);
        $stmt->execute();
        $result = $stmt->get_result();

        //Check user is exis?
        if($result->num_rows==0){
            echo "ไม่มีบัญชีผู้ใช้นี้ในระบบ บัญชีอาจถูกลบโดยเจ้าหน้าที่";
        }
        else{
            date_default_timezone_set('asia/bangkok');
            $timestamp = date('Y-m-d - H:i:s');

            //Update tbl_user
            $uID = $_POST['uID'];
            $level = $_POST['level'];
            $uName = $_POST['name'];
            $uLastname = $_POST['lastname'];
            $uGender = $_POST['gender'];
            $uBirthdate = $_POST['birthdate'];
            $uTel = $_POST['tel'];
            $uEmail = $_POST['email'];
            $uAddress = $_POST['address1'];
            $uSubdistrict = $_POST['address2'];
            $uDistrict = $_POST['address3'];
            $uProvince = $_POST['address4'];
            $uZipcode = $_POST['address5'];
            
            $sql = "UPDATE tbl_user SET     `uName` = ?, `uLastname` = ?, `uGender` = ?, `uBirthdate` = ?, `uTel` = ?, `uEmail` = ?,
                                            `uAddress` = ?, `uSubdistrict` = ?, `uDistrict` = ?, `uProvince` = ?, `uZipcode` = ?, `uUpdate` = ?
                                    WHERE   `uID` = ?;";
            $stmt = $alumniDB->prepare($sql);
            $stmt->bind_param('sssssssssssss', $uName, $uLastname, $uGender, $uBirthdate, $uTel, $uEmail, $uAddress, $uSubdistrict, $uDistrict, $uProvince, $uZipcode, $timestamp, $uID);
            $stmt->execute();
            
            if($level == "เจ้าหน้าที่"){
                $sql = "UPDATE tbl_user SET `username` = ? WHERE `uID` = ?;";
                $stmt = $alumniDB->prepare($sql);
                $stmt->bind_param('ss', $uEmail, $uID);
                $stmt->execute();
            }
            echo "success";
        }   
    }
    $alumniDB = null;
    exit();
?>