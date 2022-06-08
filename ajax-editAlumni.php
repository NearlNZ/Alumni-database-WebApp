<?php
    require_once("resource/sql/alumniDB-con.php");

    if(isset($_POST)){
        $sql = "SELECT `uID`, `username` FROM tbl_user WHERE `uID` = ?";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('s', $_POST['uID']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $Data = $result->fetch_assoc();
        }

        //Check user is exis?
        if($result->num_rows==0){
            echo "ไม่มีบัญชีผู้ใช้นี้ในระบบ บัญชีอาจถูกลบโดยเจ้าหน้าที่";
            $alumniDB = null;
            exit();
        }

        //Check dubplicate username
        if($_POST['username'] != $Data['username']){
            $sql = "SELECT `username` FROM tbl_user WHERE `username` = ?";
            $stmt = $alumniDB->prepare($sql);
            $stmt->bind_param('s', $_POST['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows>0){
                echo "ชื่อผู้ใช้นี้ได้ทำการลงทะเบียนไปแล้วโดยบัญชีอื่น";
                $alumniDB = null;
                exit();
            }
        }
        
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
        $jobstatus = $_POST['jobstatus'];
        $username = $_POST['username'];
            
        $sql = "UPDATE tbl_user SET     `uName` = ?, `uLastname` = ?, `uGender` = ?, `uBirthdate` = ?, `uTel` = ?, `uEmail` = ?,
                                        `uAddress` = ?, `uSubdistrict` = ?, `uDistrict` = ?, `uProvince` = ?, `uZipcode` = ?, ujobstatus = ?, username = ?, `uUpdate` = ?
                                WHERE   `uID` = ?;";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('sssssssssssssss', $uName, $uLastname, $uGender, $uBirthdate, $uTel, $uEmail, $uAddress, $uSubdistrict, $uDistrict, $uProvince, $uZipcode, $jobstatus, $username, $timestamp, $uID);
        $stmt->execute();

        //Update tbl_educational
        $eduStart = $_POST['stdYear'];
        $eduEnd = $_POST['stdEndyear'];
        $eduLevel = $_POST['stdEducation'];
        $eduStuID = $_POST['stdID'];
        $brID = $_POST['brance'];

        $sql = "UPDATE tbl_educational  SET     `eduStart` = ?, `eduEnd` = ?, `eduLevel` = ?, `eduStuID` = ?, `brID` = ?, eduUpdate = ?
                                        WHERE   `uID` = ?;";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('sssssss', $eduStart, $eduEnd, $eduLevel, $eduStuID, $brID, $timestamp, $uID);
        $stmt->execute();                          

        //Update tbl_job
        $jobName = $_POST['jobname'];
        $jobCompany = $_POST['company'];
        $jobTel = $_POST['c_tel'];
        $jobWeb = $_POST['c_web'];
        $jobAddress = $_POST['c_address1'];
        if(isset($_POST['c_address2'])){ $jobSubdistrict = $_POST['c_address2'];} else{ $jobSubdistrict = "";}
        if(isset($_POST['c_address3'])){ $jobDistrict = $_POST['c_address3'];} else{ $jobDistrict = "";}
        if(isset($_POST['c_address4'])){ $jobProvince = $_POST['c_address4'];} else{ $jobProvince = "";}
        $jobZipcode = $_POST['c_address5'];

        $sql = "UPDATE tbl_job  SET     `jobName` = ?, `jobCompany` = ?, `jobTel` = ?, `jobWeb` = ?, `jobAddress` = ?,
                                        `jobSubdistrict` = ?, `jobDistrict` = ?, `jobProvince` = ?, `jobZipcode` = ?, `jobUpdate` = ?
                                WHERE   `uID` = ?;";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('sssssssssss', $jobName, $jobCompany, $jobTel, $jobWeb, $jobAddress, $jobSubdistrict, $jobDistrict, $jobProvince, $jobZipcode, $timestamp, $uID);
        $stmt->execute();

        echo "success";
    }
    $alumniDB = null;
    exit();
?>