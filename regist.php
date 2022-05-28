<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>ลงทะเบียนศิษย์เก่า : Alumni Club</title>
        
        <!-- Include Fonts / Icons -->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredoka One" rel="stylesheet">
        <script src="fontawesome-6.1.1/js/all.min.js"></script>
        <!-- Include CSS / Js -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <!-- Custom Style -->
        <STYLE type="text/css">
            body {
                font-family: "Kanit";
            }
            .login-bg {
                background-position: center;
                background-size: cover;
            }
        </STYLE>
    </head>

    <body style="background-color: #393939;">
        <br><br>
        <div class="container">
            <div class="row justify-content-center p-2">
                <div class="card shadow-lg col-lg-9 col-xl-9">
                    <div class="card-body p-0">
                        <div class="text-center mb-4 mt-5">
                            <a class="h1 text-dark text-decoration-none" href="index.php" role="button" style="font-family:Fredoka One"><i class="fa-solid fa-user-graduate me-2"></i>Alumni Club</a>
                        </div>
                        <!-- Regist form-->
                        <form class="form form-horizontal" method="POST" action="test.php" enctype="multipart/form-data">
                        <div class="col mb-4">
                            <div class="card shadow text-decoration-none">
                                <div class="card-header bg-dark bg-gradient text-light">
                                    <div class="mb-2 mt-2 ms-2">
                                        <i class="fa-solid fa-id-card me-2"></i>
                                        ข้อมูลส่วนตัว
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-2">
                                            ชื่อ<span class="text-danger"> *</span>
                                            <input class="form-control" type="text" name="name" Value=""
                                            autocomplete="off" required maxlength="50">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            นามสกุล<span class="text-danger"> *</span>
                                            <input class="form-control" type="text" name="lastname" Value=""
                                            autocomplete="off" required maxlength="50">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            เพศ<span class="text-danger"> *</span>
                                            <select class="form-select" name="gender" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <option value="ชาย">ชาย</option>
                                                <option value="หญิง">หญิง</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            วัน/เดือน/ปีเกิด<span class="text-danger"> *</span>
                                            <input type="date" class="form-control" name="birthdate" max="<?php echo date('Y-m-d');?>" Value="" required>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            โทรศัพท์<span class="text-danger"> *</span>
                                            <input class="form-control" type="text" name="tel" Value=""
                                            autocomplete="off" required maxlength="10" minlength="10">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            E-mail
                                            <input class="form-control" type="email" name="email" Value=""
                                            autocomplete="off" placeholder="email@example.com" maxlength="50">
                                        </div>
                                        <div class="col-12 mb-2">
                                            ที่อยู่<span class="text-danger"> *</span>
                                            <input class="form-control" type="text" name="address1" Value=""
                                            autocomplete="off" required placeholder="เลขที่ ถนน ซอย" maxlength="50">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            จังหวัด<span class="text-danger"> *</span>
                                            <select class="form-select" name="address4" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            อำเภอ/เขต<span class="text-danger"> *</span>
                                            <select class="form-select" name="address3" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ตำบล/แขวง<span class="text-danger"> *</span>
                                            <select class="form-select" name="address2" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            รหัสไปรษณีย์<span class="text-danger"> *</span>
                                            <input class="form-control" type="text" name="address5" Value=""
                                            autocomplete="off" disabled maxlength="5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card shadow text-decoration-none">
                                <div class="card-header bg-dark bg-gradient text-light">
                                    <div class="mb-2 mt-2 ms-2">
                                        <i class="fa-solid fa-graduation-cap me-2"></i>
                                        ข้อมูลการศึกษา
                                    </div> 
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-2">
                                            ปีที่เข้ารับการศึกษา<span class="text-danger"> *</span>
                                            <select class="form-select" name="std-year" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php
                                                    $thisyear = date("Y")+543;
                                                    $startyear = 2550;
                                                    while($thisyear >= $startyear){ ?>
                                                    <option value="<?=$thisyear?>">ปี <?=$thisyear?></option>
                                                <?php $thisyear--;} ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ปีที่จบการศึกษา<span class="text-danger"> *</span>
                                            <select class="form-select" name="std-endyear" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php
                                                    $thisyear = date("Y")+543;
                                                    $startyear = 2550;
                                                    while($thisyear >= $startyear){ ?>
                                                    <option value="<?=$thisyear?>">ปี <?=$thisyear?></option>
                                                <?php $thisyear--;} ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ระดับการศึกษา<span class="text-danger"> *</span>
                                            <select class="form-select" name="std-education" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <option value="อนุปริญญา">อนุปริญญา</option>
                                                <option value="ปริญญาตรี">ปริญญาตรี</option>
                                                <option value="ปริญญาโท">ปริญญาโท</option>
                                                <option value="ปริญญาเอก">ปริญญาเอก</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            รหัสนักศึกษา<span class="text-danger"> *</span>
                                            <input id="stdID" class="form-control" type="text" name="stdID" Value=""
                                            autocomplete="off" required maxlength="13" onkeyup="syncUsername()">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            คณะ<span class="text-danger"> *</span>
                                            <select id="faculty" class="form-select" name="faculty" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            สาขาวิชา<span class="text-danger"> *</span>
                                            <select id="branch" class="form-select" name="branch" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col mb-4">
                            <div class="card shadow text-decoration-none">
                                <div class="card-header bg-dark bg-gradient text-light">
                                    <div class="mb-2 mt-2 ms-2">
                                        <i class="fa-solid fa-briefcase me-2"></i>
                                        ข้อมูลการทำงาน
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 mb-2">
                                            สถานะการทำงานมีงานทำ<span class="text-danger"> *</span>
                                            <select id="jobstatus" class="form-select" name="jobstatus" required onchange="syncJobForm()">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>   
                                                <option value="ประกอบอาชีพในบริษัท/องค์กร">ประกอบอาชีพในบริษัท/องค์กร</option>
                                                <option value="ประกอบอาชีพส่วนตัว">ประกอบอาชีพส่วนตัว</option>
                                                <option value="ศึกษาต่อ">ศึกษาต่อ</option>
                                                <option value="ว่างงาน">ว่างงาน</option>   
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            อาชีพ/ตำแหน่ง<span class="text-danger"> *</span>
                                            <input id="jobnameInput" class="form-control" type="text" name="jobname" Value=""
                                            autocomplete="off" maxlength="50" disabled>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            บริษัท/องค์กร<span class="text-danger"> *</span>
                                            <input id="companyInput" class="form-control" type="text" name="company" Value=""
                                            autocomplete="off" maxlength="50" disabled>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            โทรศัพท์ บริษัท/องค์กร<span class="text-danger"> *</span>
                                            <input id="c_telInput" class="form-control" type="text" name="c_tel" Value=""
                                            autocomplete="off" maxlength="15" minlength="9" disabled>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            เว็บไซต์ บริษัท/องค์กร
                                            <input id="c_webInput" class="form-control" type="text" name="c_web" Value=""
                                            autocomplete="off" placeholder="www.example.co.th" maxlength="50" disabled>
                                        </div>
                                        <div class="col-12 mb-2">
                                            ที่อยู่ บริษัท/องค์กร<span class="text-danger"> *</span>
                                            <input id="c_address1" class="form-control" type="text" name="c_address1" Value=""
                                            autocomplete="off" placeholder="เลขที่ ถนน ซอย" maxlength="50" disabled>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            จังหวัด<span class="text-danger"> *</span>
                                            <select id="c_address4" class="form-select" name="c_address4" disabled>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            อำเภอ/เขต<span class="text-danger"> *</span>
                                            <select id="c_address3" class="form-select" name="c_address3" disabled>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ตำบล/แขวง<span class="text-danger"> *</span>
                                            <select id="c_address2" class="form-select" name="c_address2" disabled>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            รหัสไปรษณีย์<span class="text-danger"> *</span>
                                            <input id="c_address5" class="form-control" type="text" name="c_address5" Value=""
                                            autocomplete="off" maxlength="5" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="card shadow text-decoration-none">
                                <div class="card-header bg-dark bg-gradient text-light">
                                    <div class="mb-2 mt-2 ms-2">
                                        <i class="fa-solid fa-user me-2"></i>
                                        บัญชีผู้ใช้
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-2">
                                            ชื่อผู้ใช้<span class="text-danger"> *ใช้รหัสนักศึกษา</span>
                                            <input id="username" class="form-control" type="text" name="username" Value=""
                                            autocomplete="off" disabled required maxlength="13">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            รหัสผ่าน<span class="text-danger"> *</span>
                                            <div class="input-group mb-1">
                                                <input id="password" class="form-control" type="password" name="password" Value=""
                                                autocomplete="off" required placeholder="ความยาว 8-12 ตัวอักษร" minlength="8" maxlength="12">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default border" type="button" onclick="showPass()"><i class="fa-solid fa-eye"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-check ms-2 mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" require>
                            <label class="form-check-label" for="flexCheckDefault">
                                ข้าพเจ้าขอยืนยันว่าเป็นผู้กรอกข้อมูลส่วนตัวสำหรับสมัครสมาชิกด้วยตนเอง <u>และขอยืนยันว่าข้อมูลที่ระบุข้างต้นเป็นความจริงทุกประการ</u>
                            </label>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-2">
                                <a class ="btn shadow btn-secondary w-100 p-2 rounded-pill" onclick="history.back()">ย้อนกลับ<i class="fa-solid fa-circle-chevron-left ms-2"></i></a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn shadow btn-success w-100 p-2 rounded-pill" type="submit">ส่งข้อมูล<i class="fa-solid fa-paper-plane ms-2"></i></button>
                            </div>
                        </div>
                        </form>
                        <!-- END Regist form-->
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>

<script>
    //Show password
    function showPass() {
        var passTextBox = document.getElementById("password");
        passTextBox.type === "password" ? passTextBox.type = "text" : passTextBox.type = "password";
    }
    //Set stdID as username
    function syncUsername() {
        var stdID = document.getElementById('stdID');
        var username = document.getElementById('username');
        username.value = stdID.value;
    }
    //Disable-Enable job form input depend on jobstatus
    function syncJobForm() {
        var jobstatus = document.getElementById('jobstatus');
        var jobnameInput = document.getElementById("jobnameInput");
        var companyInput = document.getElementById("companyInput");
        var c_telInput = document.getElementById("c_telInput");
        var c_webInput = document.getElementById("c_webInput");
        var c_address1 = document.getElementById("c_address1");
        var c_address2 = document.getElementById("c_address2");
        var c_address3 = document.getElementById("c_address3");
        var c_address4 = document.getElementById("c_address4");

        if(jobstatus.value == "ว่างงาน" || jobstatus.value == "ศึกษาต่อ" || jobstatus.value == "ประกอบอาชีพส่วนตัว"){
            jobnameInput.disabled = true; jobnameInput.require = false;
            companyInput.disabled = true; companyInput.require = false;
            c_telInput.disabled = true; c_telInput.require = false;
            c_webInput.disabled = true;
            c_address1.disabled = true; c_address1.require = false;
            c_address2.disabled = true; c_address2.require = false;
            c_address3.disabled = true; c_address3.require = false;
            c_address4.disabled = true; c_address4.require = false;
            if(jobstatus.value == "ประกอบอาชีพส่วนตัว"){
                jobnameInput.disabled = false; jobnameInput.require = true;
            }
        }
        else{
            jobnameInput.disabled = false; jobnameInput.require = true;
            companyInput.disabled = false; companyInput.require = true;
            c_telInput.disabled = false; c_telInput.require = true;
            c_webInput.disabled = false;
            c_address1.disabled = false; c_address1.require = true;
            c_address2.disabled = false; c_address2.require = true;
            c_address3.disabled = false; c_address3.require = true;
            c_address4.disabled = false; c_address4.require = true;
        }
    }
</script>