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
                                        <div class="text-center mb-4 mt-2">
                                            <a class="h1 text-gray-900 text-decoration-none" href="index.php" role="button" style="font-family:Fredoka One"><i class="fa-solid fa-user-graduate me-2"></i>Alumni Club</a>
                                        </div>

                                        <!--Login form-->
                                        <form id="resetForm" class="user" action="ajax-updatePassword.php" method="POST">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="username"
                                                required autofocus autocomplete="off" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" name="tel"
                                                required autofocus autocomplete="off" placeholder="Tel.">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="password" 
                                                required placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" name="checkPassword" 
                                                required placeholder="Confirm Password">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-user btn-block mt-4">รีเซ็ตรหัสผ่าน<i class="fa-solid fa-right-to-bracket ms-2"></i></button>
                                            <a class ="btn btn-secondary btn-user btn-block mb-2" href="login.php">ย้อนกลับ<i class="fa-solid fa-circle-chevron-left ms-2"></i></a>
                                        </form>
                                        <!--End login form-->
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
    $('#resetForm').submit(function(e){
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        Swal.fire({
            icon: 'warning',
            title: 'ยืนยันการแก้ไขข้อมูล',
            text: "ต้องการแก้ไขข้อมูลบัญชีผู้ใช้ปัจจุบันหรือไม่ ?",
            showCancelButton: true,
            confirmButtonColor: '#088132',
            confirmButtonText: 'ยืนยันการแก้ไข',
            cancelButtonText: 'ยกเลิกการแก้ไข',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'post',
                    url:actionUrl,
                    data:form.serialize(),
                    success:function(data) {
                        if(data == "success"){
                            Swal.fire({
                                icon: 'success',
                                title: 'แก้ไขข้อมูลสำเร็จ',
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
                                title: "เกิดข้อผิดพลาด",
                                text: data,
                                showConfirmButton: false,
                                timer: 4000
                            })
                        }
                    }
                });
            }
        })
    });
</script>