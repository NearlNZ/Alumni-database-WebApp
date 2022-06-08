<div class="d-flex mb-4 mt-3">
    <div class="h4 mt-2 col">แก้ไขข้อมูลการทำงาน</div>
</div>
<div class="card shadow-sm">
    <!-- Regist form-->
    <form id="editForm" class="form" method="POST" action="ajax-updateJob.php" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row g-2 justify-content-center">  
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-light">
                        <i class="fa-solid fa-graduation-cap me-2"></i>
                        ข้อมูลการทำงาน
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

                            <input type="hidden" name="uID" value="<?php echo $userParamID;?>">
                            <div class="col-md-12 mb-2">
                                สถานะการมีงานทำ<span class="text-danger"> *</span>
                                <select id="jobstatus" class="form-select" name="jobstatus" required onchange="syncJobForm()">
                                    <option value="ว่างงาน" <?php if($uData['ujobstatus']=="ว่างงาน") echo "selected";?>>ว่างงาน</option>
                                    <option value="ศึกษาต่อ" <?php if($uData['ujobstatus']=="ศึกษาต่อ") echo "selected";?>>ศึกษาต่อ</option>
                                    <option value="ประกอบอาชีพส่วนตัว" <?php if($uData['ujobstatus']=="ประกอบอาชีพส่วนตัว") echo "selected";?>>ประกอบอาชีพส่วนตัว</option>
                                    <option value="ประกอบอาชีพในบริษัท/องค์กร" <?php if($uData['ujobstatus']=="ประกอบอาชีพในบริษัท/องค์กร") echo "selected";?>>ประกอบอาชีพในบริษัท/องค์กร</option>   
                                </select>
                            </div>
                        </div>
                        
                            <?php
                                $sql = sprintf("SELECT * FROM tbl_job WHERE `uID` = %d LIMIT 1;", $userParamID);
                                $result = mysqli_query($alumniDB, $sql);
                                if($result->num_rows>0){
                                    $jobData = $result->fetch_assoc();
                                }
                            ?>

                        <div class="row justify-content-center">
                            <div id="jobnameCol" class="col mb-2" style="display:none;">
                                อาชีพ/ตำแหน่ง<span class="text-danger"> *</span>
                                <input id="jobnameInput" class="form-control" type="text" name="jobname" Value="<?php echo $jobData['jobName'];?>"
                                autocomplete="off" maxlength="100">
                            </div>
                            <div id="companyCol" class="col-md-6 mb-2" style="display:none;">
                                บริษัท/องค์กร<span class="text-danger"> *</span>
                                <input id="companyInput" class="form-control" type="text" name="company" Value="<?php echo $jobData['jobCompany'];?>"
                                autocomplete="off" maxlength="100">
                            </div>
                            <div id="c_telCol" class="col-md-6 mb-2" style="display:none;">
                                โทรศัพท์ บริษัท/องค์กร
                                <input id="c_telInput" class="form-control" type="tel" name="c_tel" Value="<?php echo $jobData['jobTel'];?>"
                                autocomplete="off" placeholder="0xxxxxxxxx" maxlength="15" minlength="9">
                            </div>
                            <div id="c_webCol" class="col-md-6 mb-2" style="display:none;">
                                เว็บไซต์ บริษัท/องค์กร
                                <input id="c_webInput" class="form-control" type="url" name="c_web" Value="<?php echo $jobData['jobWeb'];?>"
                                autocomplete="off" placeholder="http://www.example.co.th" maxlength="100">
                            </div>
                            <div id="c_addressCol" class="col-12 mb-2" style="display:none;">
                                ที่อยู่<span class="text-danger"> *</span>
                                <input id="address2" class="form-control" type="text" name="c_address1" Value="<?php echo $jobData['jobAddress'];?>"
                                autocomplete="off" placeholder="เลขที่ ตึก ถนน ซอย ฯลฯ" maxlength="100">
                            </div>

                            <?php
                                require_once("resource/sql/addressDB-con.php");
                                $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div id="c_provinceCol" class="col-md-6 mb-2" style="display:none;">
                                จังหวัด<span class="text-danger"> *</span>
                                <select id="province2" class="form-select" name="c_address4">
                                    <option value="" selected disabled>--กรุณาเลือก--</option>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($jobData['jobProvince']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <?php
                                $sql_address = "SELECT * FROM districts WHERE province_id = $tempID ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div id="c_districtCol" class="col-md-6 mb-2" style="display:none;">
                                อำเภอ/เขต<span class="text-danger"> *</span>
                                <select id="district2" class="form-select" name="c_address3">
                                    <option value="" selected disabled>--กรุณาเลือก--</option>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($jobData['jobDistrict']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <?php
                                $sql_address = "SELECT * FROM subdistricts WHERE district_id = $tempID ORDER BY name_in_thai";
                                $query_address = mysqli_query($addressDB, $sql_address);
                            ?>

                            <div id="c_subdistrictCol" class="col-md-6 mb-2" style="display:none;">
                                ตำบล/แขวง<span class="text-danger"> *</span>
                                <select id="subdistrict2" class="form-select" name="c_address2">
                                    <option value="" selected disabled>--กรุณาเลือก--</option>
                                    <?php foreach ($query_address as $value) { ?>
                                    <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($jobData['jobSubdistrict']==$value['name_in_thai']) echo "selected";?>><?=$value['name_in_thai']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="c_zipcodeCol" class="col-md-6 mb-2" style="display:none;">
                                รหัสไปรษณีย์<span class="text-danger"> *</span>
                                <input id="zipcode2" class="form-control" type="text" name="c_address5" Value="<?php echo $jobData['jobZipcode'];?>"
                                autocomplete="off" readonly maxlength="5">
                            </div>
                        </div>      
                    </div>
                    <div class="card-footer text-muted small">

                    <?php
                        if($result->num_rows>0){
                            echo "Update : ".date('d/m/Y - h:i A', strtotime($jobData['jobUpdate']));
                        }else{ echo "Update : ไม่พบข้อมูล";}
                    ?>

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
<?php include('components/scripts/jobform-script.php');?>
<?php $addressDB = null; $alumniDB = null;?>