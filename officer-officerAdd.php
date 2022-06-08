<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>เพิ่มข้อมูลเจ้าหน้าที่ : Alumni Club</title>
        
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
        </STYLE>
    </head>

    <body class="sb-nav-fixed">
        <!-- Topbar -->
        <?php require_once("components/topbar-officer.php");?>
        <!-- End Topbar -->

        <!-- Page -->
        <div id="layoutSidenav" style="background-color: #EAEAEA;">
            <!-- Sidebar -->
            <?php require_once("components/sidebar-officer.php");?>
            <!-- End Sidebar -->

            <!-- Content -->
            <div id="layoutSidenav_content">
                <main class="p-2 mb-2">
                    <div class="d-flex mb-4 mt-3">
                        <div class="h4 mt-2 col">เพิ่มข้อมูลเจ้าหน้าที่</div>
                    </div>

                    <?php
                        require_once("resource/sql/addressDB-con.php");
                        $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
                        $query_address = mysqli_query($addressDB, $sql_address);
                    ?>   

                    <div class="card shadow-sm">
                        <form id="registForm" class="form" method="POST" action="ajax-addUser.php" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row g-2 justify-content-center"> 
                                    <div class="col-md-10 mb-4">
                                        <div class="card shadow text-decoration-none">
                                            <div class="card-header bg-dark bg-gradient text-light">
                                                <i class="fa-solid fa-id-card me-2"></i>
                                                ข้อมูลส่วนตัว
                                            </div>
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-12 mt-1 mb-3 d-flex justify-content-center p-4">
                                                        <img class="rounded-circle shadow align-self-center me-1" width="200px" src="resource/profiles/default-profile.jpg">
                                                    </div>
                                                    <input type="hidden" name="level" Value="เจ้าหน้าที่">
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
                                                        E-mail<span class="text-danger"> *</span>
                                                        <input id="email" class="form-control" type="email" name="email" Value=""
                                                        autocomplete="off" placeholder="email@example.com" required maxlength="50" onkeyup="syncUsername()">
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
                                    <div class="col-md-10 mb-4">
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
                                                        ชื่อผู้ใช้<span class="text-danger"> *ใช้ E-mail ที่ลงทะเบียน</span>
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
                                    <div class="col-md-10">
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-2">
                                                <a class ="btn shadow btn-secondary w-100 p-2 rounded-pill" onclick="history.back()">ย้อนกลับ<i class="fa-solid fa-circle-chevron-left ms-2"></i></a>
                                            </div>
                                            <div class="col-md-6">
                                                <button class="btn shadow btn-success w-100 p-2 rounded-pill" type="submit">ส่งข้อมูล<i class="fa-solid fa-paper-plane ms-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>

                <?php require_once("components/footer.php");?>
            </div>
            <!-- End Content -->

        </div>
        <!--End Page -->
    </body>
</html>

<script type="text/javascript">
    //Show password
    function showPass() {
        var passTextBox = document.getElementById("password");
        passTextBox.type === "password" ? passTextBox.type = "text" : passTextBox.type = "password";
    }
    //Set email as username
    function syncUsername() {
        var email = document.getElementById('email');
        var username = document.getElementById('username');
        username.value = email.value;
    }
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
                        title: 'เพิ่มข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 4000
                    }).then((result) => {
                        if (result.dismiss) {
                            window.location.href="officer-officerList.php";
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

<?php include('components/scripts/ajax-addressSelect-script.php');?>

<?php $addressDB = null; $alumniDB = null;?>