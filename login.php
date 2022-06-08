<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>เข้าสู่ระบบ : Alumni Club</title>
        
        <!-- Include Fonts / Icons -->
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredoka One" rel="stylesheet">
        <script src="fontawesome-6.1.1/js/all.min.js"></script>
        <!-- Include CSS / Js -->
        <link href="bootstrap/css/styles.css" rel="stylesheet" />
        <link href="bootstrap/css/sb-admin-2.min.css" rel="stylesheet" />
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
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <img id="img" src="resource/pics/login-bg.jpg" class="login-bg" style="width: 450px; height: 520px; object-fit: cover;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-4">
                                        <div class="text-center mb-4 mt-5">
                                            <a class="h1 text-gray-900 text-decoration-none" href="index.php" role="button" style="font-family:Fredoka One"><i class="fa-solid fa-user-graduate me-2"></i>Alumni Club</a>
                                        </div>

                                        <!--Login form-->
                                        <form id="loginForm" class="user" action="ajax-checkLogin.php" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username"
                                                required autofocus autocomplete="off" placeholder="Username"
                                                value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; } ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password" 
                                                required placeholder="Password"
                                                value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; } ?>">
                                            </div>

                                            <div class="form-group mb-4 ms-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" name="remember" <?php if(isset($_COOKIE['username'])) echo "checked"; ?>>
                                                    <label class="form-check-label small ms-1" for="remember">จดจำบัญชีผู้ใช้</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block mb-2">เข้าสู่ระบบ<i class="fa-solid fa-right-to-bracket ms-2"></i></button>
                                            <a class ="btn btn-success btn-user btn-block mb-2" href="regist.php">ลงทะเบียนศิษย์เก่า<i class="fa-solid fa-user-plus ms-2"></i></a>
                                        </form>
                                        <!--End login form-->

                                        <div class="text-center mt-4">
                                            <a class="small" href="resetPassword.php"><i class="fa-solid fa-key me-2"></i>ลืมรหัสผ่าน? รีเซ็ตรหัสผ่านปัจจุบัน</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript">
    $('#loginForm').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type:'post',
            url:actionUrl,
            data:form.serialize(),
            success:function(data) {
                if(data == "success_alumni"){
                    Swal.fire({
                        icon: 'success',
                        title: 'เข้าสู่ระบบสำเร็จ',
                        showConfirmButton: false,
                        timer: 4000
                    }).then((result) => {
                        if (result.dismiss) {
                            window.location.href="alumni-profile.php";
                        }
                    })
                    
                }
                else if(data == "success_officer"){
                    Swal.fire({
                        icon: 'success',
                        title: 'เข้าสู่ระบบสำเร็จ',
                        showConfirmButton: false,
                        timer: 4000
                    }).then((result) => {
                        if (result.dismiss) {
                            window.location.href="officer-profile.php";
                        }
                    }) 
                }
                else if(data == "err_wrongPassword"){
                    Swal.fire({
                        icon: 'error',
                        title: 'เข้าสู่ระบบล้มเหลว',
                        text: 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบรหัสผ่านอีกครั้ง',
                        showConfirmButton: false,
                        timer: 4000
                    })
                }
                else if(data == "err_noAccount"){
                    Swal.fire({
                        icon: 'error',
                        title: 'เข้าสู่ระบบล้มเหลว',
                        text: 'ไม่มีบัญชีผู้ใช้นี้ในระบบ กรุณาลงทะเบียนหรือติดต่อเจ้าหน้าที่',
                        showConfirmButton: false,
                        timer: 4000
                    })
                }
            }
        });
    });
</script>