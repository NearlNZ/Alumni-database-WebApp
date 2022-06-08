<div class="d-flex mb-4 mt-3">
    <div class="h4 mt-2 col">แก้ไขรหัสผ่าน</div>
</div>
<div class="card shadow-sm">
    <!-- Regist form-->
    <form id="editForm" class="form" method="POST" action="ajax-updatePassword.php" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row g-2 justify-content-center">  
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-light">
                        <i class="fa-solid fa-id-card me-2"></i>
                        บัญชีผู้ใช้
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center g-2">
                            
                            <?php
                                $sql = sprintf("SELECT * FROM tbl_user WHERE `uID` = %d LIMIT 1;", $userParamID);
                                $result = mysqli_query($alumniDB, $sql);
                                if($result->num_rows>0){
                                    $uData = $result->fetch_assoc();
                                }
                            ?>
                            
                            <div class="col-md-10 mb-2">
                                ชื่อผู้ใช้
                                <input id="username" class="form-control" type="text" name="username" Value="<?php echo $uData['username'];?>"
                                autocomplete="off" readonly maxlength="13">
                            </div>
                            <div class="col-md-10 mb-2">
                                รหัสผ่านใหม่<span class="text-danger"> *</span>
                                <div class="input-group mb-1">
                                    <input id="password" class="form-control" type="password" name="password" Value=""
                                    autocomplete="off" required placeholder="ความยาว 8-12 ตัวอักษร" minlength="8" maxlength="12">
                                    <div class="input-group-append">
                                        <button class="btn btn-default border" type="button" onclick="showPass('password')"><i class="fa-solid fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-2">
                                ยืนยันรหัสผ่านอีกครั้ง<span class="text-danger"> *</span>
                                <div class="input-group mb-1">
                                    <input id="password2" class="form-control" type="password" name="checkPassword" Value=""
                                    autocomplete="off" required placeholder="ความยาว 8-12 ตัวอักษร" minlength="8" maxlength="12">
                                    <div class="input-group-append">
                                        <button class="btn btn-default border" type="button" onclick="showPass('password2')"><i class="fa-solid fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row mt-4">
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
    <!-- END Regist form-->
</div>

<script type="text/javascript">
    function showPass( passTextBox ) {
        var TextBox = document.getElementById(passTextBox);
        TextBox.type === "password" ? TextBox.type = "text" : TextBox.type = "password";
    }

    $('#editForm').submit(function(e){
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
    });
</script>
<?php $alumniDB = null;?>