<?php
    require_once("resource/sql/alumniDB-con.php");

    if(isset($_POST)){
        $sql = "SELECT * FROM tbl_user WHERE username = ?";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        //Check dubplicate username
        if($result->num_rows>0){
            echo "ชื่อผู้ใช้นี้ได้ทำการลงทะเบียนไปแล้ว";
        }
        else{
            date_default_timezone_set('asia/bangkok');
            $timestamp = date('Y-m-d - H:i:s');

            //Insert tbl_user
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
            $ujobstatus = $_POST['jobstatus'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $level = $_POST['level'];
            
            $sql = "INSERT INTO tbl_user (`uName`, `uLastname`, `uGender`, `uBirthdate`, `uTel`, `uEmail`, `uAddress`, `uSubdistrict`, `uDistrict`, `uProvince`, `uZipcode`, `ujobstatus`, `username`, `password`, `level`, `uUpdate`)
                                VALUES   (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $alumniDB->prepare($sql);
            $stmt->bind_param('ssssssssssssssss', $uName, $uLastname, $uGender, $uBirthdate, $uTel, $uEmail, $uAddress, $uSubdistrict, $uDistrict, $uProvince, $uZipcode, $ujobstatus, $username, $password, $level, $timestamp);
            $stmt->execute();
            

            if($level == "ศิษย์เก่า"){
                $uID = mysqli_insert_id($alumniDB);

                //Insert tbl_educational
                $eduStart = $_POST['stdYear'];
                $eduEnd = $_POST['stdEndyear'];
                $eduLevel = $_POST['stdEducation'];
                $eduStuID = $_POST['stdID'];
                $brID = $_POST['brance'];

                $sql = "INSERT INTO tbl_educational (`uID`, `eduStart`, `eduEnd`, `eduLevel`, `eduStuID`, `brID`, `eduUpdate`) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?);";
                $stmt = $alumniDB->prepare($sql);
                $stmt->bind_param('iiissis', $uID, $eduStart, $eduEnd, $eduLevel, $eduStuID, $brID, $timestamp);
                $stmt->execute();

                //Insert tbl_job
                $jobName = $_POST['jobname'];
                $jobCompany = $_POST['company'];
                $jobTel = $_POST['c_tel'];
                $jobWeb = $_POST['c_web'];
                $jobAddress = $_POST['c_address1'];
                if(isset($_POST['c_address2'])){ $jobSubdistrict = $_POST['c_address2'];} else{ $jobSubdistrict = "";}
                if(isset($_POST['c_address3'])){ $jobDistrict = $_POST['c_address3'];} else{ $jobDistrict = "";}
                if(isset($_POST['c_address4'])){ $jobProvince = $_POST['c_address4'];} else{ $jobProvince = "";}
                $jobZipcode = $_POST['c_address5'];

                $sql = "INSERT INTO tbl_job (`uID`, `jobName`, `jobCompany`, `jobTel`, `jobWeb`, `jobAddress`, `jobSubdistrict`, `jobDistrict`, `jobProvince`, `jobZipcode`, `jobUpdate`)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = $alumniDB->prepare($sql);
                $stmt->bind_param('issssssssss', $uID, $jobName, $jobCompany, $jobTel, $jobWeb, $jobAddress, $jobSubdistrict, $jobDistrict, $jobProvince, $jobZipcode, $timestamp);
                $stmt->execute();
            }
            echo "success";
        }   
    }
    $alumniDB = null;
    exit();
?>