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

            //Update tbl_job
            $uID = $_POST['uID'];
            $jobName = $_POST['jobname'];
            $jobCompany = $_POST['company'];
            $jobTel = $_POST['c_tel'];
            $jobWeb = $_POST['c_web'];
            $jobAddress = $_POST['c_address1'];
            if(isset($_POST['c_address2'])){ $jobSubdistrict = $_POST['c_address2'];} else{ $jobSubdistrict = "";}
            if(isset($_POST['c_address3'])){ $jobDistrict = $_POST['c_address3'];} else{ $jobDistrict = "";}
            if(isset($_POST['c_address4'])){ $jobProvince = $_POST['c_address4'];} else{ $jobProvince = "";}
            $jobZipcode = $_POST['c_address5'];
            $jobstatus = $_POST['jobstatus'];

            $sql = "UPDATE tbl_job  SET     `jobName` = ?, `jobCompany` = ?, `jobTel` = ?, `jobWeb` = ?, `jobAddress` = ?,
                                            `jobSubdistrict` = ?, `jobDistrict` = ?, `jobProvince` = ?, `jobZipcode` = ?, `jobUpdate` = ?
                                    WHERE   `uID` = ?;";
            $stmt = $alumniDB->prepare($sql);
            $stmt->bind_param('sssssssssss', $jobName, $jobCompany, $jobTel, $jobWeb, $jobAddress, $jobSubdistrict, $jobDistrict, $jobProvince, $jobZipcode, $timestamp, $uID);
            $stmt->execute();
            
            //Update tbl_user
            $sql = "UPDATE tbl_user SET     ujobstatus = ?, uUpdate = ?
                                    WHERE   `uID` = ?;";
            $stmt = $alumniDB->prepare($sql);
            $stmt->bind_param('sss', $jobstatus, $timestamp, $uID);
            $stmt->execute();
            echo "success";
        }   
    }
    $alumniDB = null;
    exit();
?>