<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>ข้อมูลบัญชี : Alumni Club</title>
        
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
                    <?php 
                        if(isset($_POST)) $userParamID = $_POST['id'];
                        require_once("components/page-profile.php");
                    ?>
                </main>

                <?php require_once("components/footer.php");?>
            </div>
            <!-- End Content -->

        </div>
        <!--End Page -->
    </body>
</html>

<script type="text/javascript">
    function deleteUser(id){
        Swal.fire({
            icon: 'warning',
            title: 'ยืนยันการลบบัญชีผู้ใช้',
            text: "ต้องการลบข้อมูลบัญชีผู้ใช้ปัจจุบันหรือไม่ ?",
            showCancelButton: true,
            confirmButtonColor: '#930907',
            confirmButtonText: 'ยืนยันการลบบัญชีผู้ใช้',
            cancelButtonText: 'ยกเลิกการลบบัญชีผู้ใช้',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type:'post',
                    url:'ajax-deleteUser.php',
                    data:{uID:id},
                    success:function(data) {
                        if(data == "success"){
                            Swal.fire({
                                icon: 'success',
                                title: 'ลบบัญชีผู้ใช้สำเร็จ',
                                showConfirmButton: false,
                                timer: 4000
                            }).then((result) => {
                                if (result.dismiss) {
                                   history.back();
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
    }

    function editAlumni(id){
        $('<form action="officer-alumniEdit.php" method="post"><input type="hidden" name="id" value="'+id+'"></input></form>').appendTo('body').submit().remove();
    }
</script>