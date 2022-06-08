<?php
    require_once("resource/sql/alumniDB-con.php");
    $sql_faculty = "SELECT * FROM tbl_faculty ORDER BY faName";
    $query_faculty = mysqli_query($alumniDB, $sql_faculty);

    require_once("resource/sql/addressDB-con.php");
    $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
    $query_address = mysqli_query($addressDB, $sql_address);
?>

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
        <link href="bootstrap/css/styles.css" rel="stylesheet" />
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="bootstrap/js/scripts.js"></script>
        <script src="bootstrap/js/jquery-3.6.0.min.js"></script>
        <script src="components/scripts/sweetalert2.all.min.js"></script>
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
                        <form id="registForm" class="form" method="POST" action="ajax-addUser.php" enctype="multipart/form-data">
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
                                        <div class="col-12 mt-1 mb-3 d-flex justify-content-center p-4">
                                            <img class="rounded-circle shadow align-self-center me-1" width="200px" src="resource/profiles/default-profile.jpg">
                                        </div>
                                        <input type="hidden" name="level" Value="ศิษย์เก่า">
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
                                            <input class="form-control" type="tel" name="tel" Value=""
                                            autocomplete="off" placeholder="0xxxxxxxxx" required maxlength="10" minlength="10">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            E-mail
                                            <input class="form-control" type="email" name="email" Value=""
                                            autocomplete="off" placeholder="email@example.com" maxlength="50">
                                        </div>
                                        <div class="col-12 mb-2">
                                            ที่อยู่<span class="text-danger"> *</span>
                                            <input id="address" class="form-control" type="text" name="address1" Value=""
                                            autocomplete="off" required placeholder="เลขที่ ตึก ถนน ซอย ฯลฯ" maxlength="100">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            จังหวัด<span class="text-danger"> *</span>
                                            <select id="province" class="form-select" name="address4" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php foreach ($query_address as $value) { ?>
                                                <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>"><?=$value['name_in_thai']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            อำเภอ/เขต<span class="text-danger"> *</span>
                                            <select id="district" class="form-select" name="address3" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ตำบล/แขวง<span class="text-danger"> *</span>
                                            <select id="subdistrict" class="form-select" name="address2" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            รหัสไปรษณีย์<span class="text-danger"> *</span>
                                            <input id="zipcode" class="form-control" type="text" name="address5" Value=""
                                            autocomplete="off" readonly maxlength="5">
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
                                            <select id="stdYear" class="form-select" name="stdYear" required onchange="syncStdEndYear()">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php
                                                    $thisyear = date("Y")+542;
                                                    $startyear = 2550;
                                                    while($thisyear >= $startyear){ ?>
                                                    <option value="<?=$thisyear?>">ปี <?=$thisyear?></option>
                                                <?php $thisyear--;} ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ปีที่จบการศึกษา<span class="text-danger"> *</span>
                                            <select id="stdEndyear" class="form-select" name="stdEndyear" required>
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            ระดับการศึกษา<span class="text-danger"> *</span>
                                            <select class="form-select" name="stdEducation" required>
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
                                            <select id="faculty" class="form-select" name="faculty">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php foreach ($query_faculty as $value) { ?>
                                                <option value="<?=$value['faID']?>"><?=$value['faName']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            สาขาวิชา<span class="text-danger"> *</span>
                                            <select id="brance" class="form-select" name="brance">
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
                                            สถานะการมีงานทำ<span class="text-danger"> *</span>
                                            <select id="jobstatus" class="form-select" name="jobstatus" required onchange="syncJobForm()">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <option value="ว่างงาน">ว่างงาน</option>
                                                <option value="ศึกษาต่อ">ศึกษาต่อ</option>
                                                <option value="ประกอบอาชีพส่วนตัว">ประกอบอาชีพส่วนตัว</option>
                                                <option value="ประกอบอาชีพในบริษัท/องค์กร">ประกอบอาชีพในบริษัท/องค์กร</option>   
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div id="jobnameCol" class="col mb-2" style="display:none;">
                                            อาชีพ/ตำแหน่ง<span class="text-danger"> *</span>
                                            <input id="jobnameInput" class="form-control" type="text" name="jobname" Value=""
                                            autocomplete="off" maxlength="100">
                                        </div>
                                        <div id="companyCol" class="col-md-6 mb-2" style="display:none;">
                                            บริษัท/องค์กร<span class="text-danger"> *</span>
                                            <input id="companyInput" class="form-control" type="text" name="company" Value=""
                                            autocomplete="off" maxlength="100">
                                        </div>
                                        <div id="c_telCol" class="col-md-6 mb-2" style="display:none;">
                                            โทรศัพท์ บริษัท/องค์กร
                                            <input id="c_telInput" class="form-control" type="tel" name="c_tel" Value=""
                                            autocomplete="off" placeholder="0xxxxxxxxx" maxlength="15" minlength="9">
                                        </div>
                                        <div id="c_webCol" class="col-md-6 mb-2" style="display:none;">
                                            เว็บไซต์ บริษัท/องค์กร
                                            <input id="c_webInput" class="form-control" type="url" name="c_web" Value=""
                                            autocomplete="off" placeholder="http://www.example.co.th" maxlength="100">
                                        </div>
                                        <div id="c_addressCol" class="col-12 mb-2" style="display:none;">
                                            ที่อยู่<span class="text-danger"> *</span>
                                            <input id="address2" class="form-control" type="text" name="c_address1" Value=""
                                            autocomplete="off" placeholder="เลขที่ ตึก ถนน ซอย ฯลฯ" maxlength="100">
                                        </div>
                                        <div id="c_provinceCol" class="col-md-6 mb-2" style="display:none;">
                                            จังหวัด<span class="text-danger"> *</span>
                                            <select id="province2" class="form-select" name="c_address4">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                                <?php foreach ($query_address as $value) { ?>
                                                <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>"><?=$value['name_in_thai']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="c_districtCol" class="col-md-6 mb-2" style="display:none;">
                                            อำเภอ/เขต<span class="text-danger"> *</span>
                                            <select id="district2" class="form-select" name="c_address3">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div id="c_subdistrictCol" class="col-md-6 mb-2" style="display:none;">
                                            ตำบล/แขวง<span class="text-danger"> *</span>
                                            <select id="subdistrict2" class="form-select" name="c_address2">
                                                <option value="" selected disabled>--กรุณาเลือก--</option>
                                            </select>
                                        </div>
                                        <div id="c_zipcodeCol" class="col-md-6 mb-2" style="display:none;">
                                            รหัสไปรษณีย์<span class="text-danger"> *</span>
                                            <input id="zipcode2" class="form-control" type="text" name="c_address5" Value=""
                                            autocomplete="off" readonly maxlength="5">
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
                                            autocomplete="off" readonly required maxlength="13">
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
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
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

<script type="text/javascript">
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
    //Creat job detail form
    $('#jobstatus').change(function() {
         var status = $(this).val();
        $.ajax({
            type: "POST",
            url: "ajax-jobform.php",
            data: {status:status},
            success: function(data){
                $('#jobform').html(data);
            }
        });
    });
    //Insert record
    $('#registForm').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type:'post',
            url:actionUrl,
            data:form.serialize(),
            success:function(data) {
                if(data == "success"){
                    Swal.fire({
                        icon: 'success',
                        title: 'ลงทะเบียนศิษย์เก่าสำเร็จ',
                        showConfirmButton: false,
                        timer: 4000
                    }).then((result) => {
                        if (result.dismiss) {
                            window.location.href="login.php";
                        }
                    })
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: "ไม่สามารถลงทะเบียนได้",
                        text: data,
                        showConfirmButton: false,
                        timer: 4000
                    })
                }
            }
        });
    });
</script>

<?php include('components/scripts/ajax-facultySelect-script.php');?>
<?php include('components/scripts/ajax-yearSelect-script.php');?>
<?php include('components/scripts/ajax-addressSelect-script.php');?>
<?php include('components/scripts/jobform-script.php');?>

<?php $addressDB = null; $alumniDB = null;?>