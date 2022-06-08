<?php
    require_once("resource/sql/alumniDB-con.php");

    if(isset($_POST)){
        $sql = "SELECT `username`, `uTel` FROM tbl_user WHERE `username` = ?";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();

        //Check user is exis?
        if($result->num_rows==0){
            echo "ไม่มีบัญชีผู้ใช้นี้ในระบบ กรุณาตรวจสอบชื่อผู้ใช้อีกครั้ง";
            $alumniDB = null;
            exit();
        }
            
        $username = $_POST['username'];
        $password = $_POST['password'];
        $checkPassword = $_POST['checkPassword'];
        
        //Check Tel is correct
        if(isset($_POST['tel'])){
            $uData = $result->fetch_assoc();
            if($uData['uTel'] != $_POST['tel']){
                echo "หมายเลขโทรศัพท์ไม่ถูกต้อง ไม่สามารถยืนยันตัวตนได้";
                $alumniDB = null;
                exit();
            }
        }

        //Check password match?
        if($password != $checkPassword){
            echo "รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบรหัสผ่านอีกครั้ง";
            $alumniDB = null;
            exit();
        }

        //Update tbl_user
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE tbl_user SET     `password` = ?
                                    WHERE   `username` = ?;";
        $stmt = $alumniDB->prepare($sql);
        $stmt->bind_param('ss', $password, $username);
        $stmt->execute();
        
        echo "success";
    }   
    $alumniDB = null;
    exit();
?>