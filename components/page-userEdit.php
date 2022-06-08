<div class="d-flex mb-4 mt-3">
    <div class="h4 mt-2 col">แก้ไขข้อมูลส่วนตัว</div>
</div>
<div class="card shadow-sm">
    <!-- Regist form-->
    <form id="editForm" class="form" method="POST" action="ajax-updateUser.php" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row g-2 justify-content-center">  
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-light">
                        <i class="fa-solid fa-id-card me-2"></i>
                        ข้อมูลส่วนตัว
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center g-2">
                            
                            <?php
                                $sql = sprintf("SELECT *, YEAR(FROM_DAYS(DATEDIFF(NOW(),uBirthdate))) as uAge FROM tbl_user WHERE `uID` = %d LIMIT 1;", $userParamID);
                                $result = mysqli_query($alumniDB, $sql);
                                if($result->num_rows>0){
                                    $uData = $result->fetch_assoc();
                                }
                            ?>
                            <div class="col-md-10 mt-4 mb-5 d-flex justify-content-center">
                                <img class="rounded-circle shadow align-self-center me-1" width="200px" src="resource/profiles/default-profile.jpg">
                            </div>
                            <input type="hidden" name="uID" value="<?php echo $userParamID;?>">
                            <input type="hidden" name="level" value="<?php echo $uData['level'];?>">
                            <div class="col-md-6">
                                ชื่อ<span class="text-danger"> *</span>
                                <input class="form-control" type="text" name="name" Value="<?php echo $uData['uName'];?>"
                                autocomplete="off" required maxlength="50">
                            </div>
                            <div class="col-md-6">
                                นามสกุล<span class="text-danger"> *</span>
                                <input class="form-control" type="text" name="lastname" Value="<?php echo $uData['uLastname'];?>"
                                autocomplete="off" required maxlength="50">
                            </div>
                            <div class="col-md-6">
                                เพศ<span class="text-danger"> *</span>
                                <select class="form-select" name="gender" required>
                                    <option value="ชาย" <?php if($uData['uGender']=="ชาย") echo "selected";?>>ชาย</option>
                                    <option value="หญิง" <?php if($uData['uGender']=="หญิง") echo "selected";?>>หญิง</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                วัน/เดือน/ปีเกิด<span class="text-danger"> *</span>
                                <input type="date" class="form-control" name="birthdate" max="<?php echo date('Y-m-d');?>" Value="<?php echo $uData['uBirthdate'];?>" required>
                            </div>
                            <div class="col-md-6">
                                โทรศัพท์<span class="text-danger"> *</span>
                                <input class="form-control" type="tel" name="tel" Value="<?php echo $uData['uTel'];?>"
                                autocomplete="off" placeholder="0xxxxxxxxx" required maxlength="10" minlength="10">
                            </div>
                            <div class="col-md-6">
                                E-mail <?php if($uData['level'] == 'เจ้าหน้าที่') echo'<span class="text-danger"> *</span>';?>
                                <input class="form-control" type="email" name="email" Value="<?php echo $uData['uEmail'];?>"
                                autocomplete="off" placeholder="email@example.com" maxlength="50"
                                <?php if($uData['level'] == 'เจ้าหน้าที่') echo'required';?>>
                            </div>
                            <div class="col-12">
                                ที่อยู่<span class="text-danger"> *</span>
                                <input id="address" class="form-control" type="text" name="address1" Value="<?php echo $uData['uAddress'];?>"
                                autocomplete="off" required placeholder="เลขที่ ตึก ถนน ซอย ฯลฯ" maxlength="100">
                            </div>
                            
                            <?php
                                require_once("resource/sql/addressDB-con.php");
                                $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div class="col-md-6">
                                จังหวัด<span class="text-danger"> *</span>
                                <select id="province" class="form-select" name="address4" required>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uProvince']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <?php
                                $sql_address = "SELECT * FROM districts WHERE province_id = $tempID ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div class="col-md-6">
                                อำเภอ/เขต<span class="text-danger"> *</span>
                                <select id="district" class="form-select" name="address3" required>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uDistrict']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <?php
                                $sql_address = "SELECT * FROM subdistricts WHERE district_id = $tempID ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div class="col-md-6">
                                ตำบล/แขวง<span class="text-danger"> *</span>
                                <select id="subdistrict" class="form-select" name="address2" required>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uSubdistrict']==$value['name_in_thai']) echo "selected";?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                รหัสไปรษณีย์<span class="text-danger"> *</span>
                                <input id="zipcode" class="form-control" type="text" name="address5" Value="<?php echo $uData['uZipcode'];?>"
                                autocomplete="off" readonly maxlength="5">
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-muted small">
                        Update : <?php echo date('d/m/Y - h:i A', strtotime($uData['uUpdate']));?>
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
<?php include('components/scripts/ajax-addressSelect-script.php');?>
<?php $addressDB = null; $alumniDB = null;?>