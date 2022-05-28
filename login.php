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
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/sb-admin-2.min.css" rel="stylesheet" />
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
                                        <form class="user" method="POST" action="post-test.php">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username"
                                                required autofocus autocomplete="off" placeholder="Username"
                                                value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; } ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="password" name="password" 
                                                required placeholder="Password"
                                                value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; } ?>">
                                            </div>
                                            <!-- Login error-->
                                            <h6 id="err-message" class="text-danger text-center">* ชื่อผู้ใช้ หรือรหัสผ่านไม่ถูกต้อง</h6>

                                            <div class="form-group mb-3 ms-2">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php if(isset($_COOKIE['userpid'])) { ?> checked <?php } ?>>
                                                    <label class="custom-control-label" for="remember">จดจำบัญชีผู้ใช้</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block mb-2">เข้าสู่ระบบ<i class="fa-solid fa-right-to-bracket ms-2"></i></button>
                                            <a class ="btn btn-success btn-user btn-block mb-2" href="regist.php">ลงทะเบียนศิษย์เก่า<i class="fa-solid fa-user-plus ms-2"></i></a>
                                        </form>
                                        <!--End login form-->

                                        <div class="text-center mb-3">
                                            <a class="small" href="404.php"><i class="fa-solid fa-key me-2"></i>ลืมรหัสผ่าน? รีเซ็ตรหัสผ่านปัจจุบัน</a>
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