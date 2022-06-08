<div class="d-flex mb-4 mt-3">
    <div class="h4 mt-2 col">ข้อมูลบัญชี</div>
    <button id="printBtn" class="btn text-white btn-secondary">พิมพ์รายงาน<i class="fa-solid fa-print ms-2"></i></button>
</div>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-md-4 mt-4 mb-4 d-flex justify-content-center">
                <img class="rounded-circle shadow align-self-center me-1" width="200px" src="resource/profiles/default-profile.jpg">
            </div>
            <div class="col-md-8">
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

                            <div class="col-md-6">
                                ชื่อ - สกุล
                                <input type="text" class="form-control" value="<?php printf('%s  %s', $uData['uName'], $uData['uLastname']);?>" readonly>
                            </div>
                            <div class="col-md-6">
                                เพศ
                                <input type="text" class="form-control" value="<?php echo $uData['uGender'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                วัน/เดือน/ปีเกิด
                                <input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($uData['uBirthdate']));?>" readonly>
                            </div>
                            <div class="col-md-6">
                                อายุ
                                <input type="text" class="form-control" value="<?php echo $uData['uAge']." ปี";?>" readonly>
                            </div>
                            <div class="col-md-6">
                                โทรศัพท์
                                <input type="text" class="form-control" value="<?php echo $uData['uTel'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                E-mail
                                <input type="text" class="form-control" value="<?php echo $uData['uEmail'];?>" readonly>
                            </div>
                            <div class="col-md-12">
                                ที่อยู่
                                <textarea style="resize: none;" rows="3" class="form-control" readonly><?php printf('%s  %s  %s  %s  %s', $uData['uAddress'], $uData['uSubdistrict'], $uData['uDistrict'], $uData['uProvince'], $uData['uZipcode']);?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted small">
                        Update : <?php echo date('d/m/Y - h:i A', strtotime($uData['uUpdate']));?>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if($uData['level'] == "ศิษย์เก่า"){
        ?>

        <div class="card shadow-sm mt-2">
            <div class="card-header bg-dark text-light">
                <i class="fa-solid fa-graduation-cap me-2"></i>
                ข้อมูลการศึกษา
            </div>
            <div class="card-body">
                <div class="row justify-content-center g-2">

                    <?php 
                        $sql = sprintf("SELECT * FROM tbl_educational E INNER JOIN tbl_brance B ON E.brID = B.brID INNER JOIN tbl_faculty F ON B.faID = F.faID WHERE E.uID = %s", $userParamID);
                        $result = mysqli_query($alumniDB, $sql);
                        if($result->num_rows>0){
                            $eduData = $result->fetch_assoc();
                    ?>
                                        
                    <div class="col-md-5">
                        รหัสนักศึกษา
                        <input type="text" class="form-control" value="<?php echo $eduData['eduStuID'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        ปีที่เข้ารับการศึกษา
                        <input type="text" class="form-control" value="<?php echo "ปี ".$eduData['eduStart'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        ปีที่จบการศึกษา
                        <input type="text" class="form-control" value="<?php echo "ปี ".$eduData['eduEnd'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        ระดับการศึกษา
                        <input type="text" class="form-control" value="<?php echo $eduData['eduLevel'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        คณะ
                        <input type="text" class="form-control" value="<?php echo $eduData['faName'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        สาขา/หลักสูตร
                        <input type="text" class="form-control" value="<?php echo $eduData['brName'];?>" readonly>
                    </div>

                    <?php 
                        }else{ echo " --- ไม่พบข้อมูล --- "; }
                    ?>

                </div>
            </div>
            <div class="card-footer text-muted small">
                <?php
                    if($result->num_rows>0){
                        echo "Update : ".date('d/m/Y - h:i A', strtotime($eduData['eduUpdate']));
                    }else{ echo "Update : ไม่พบข้อมูล";}
                ?>
            </div>
        </div>
        <div class="card shadow-sm mt-2">
            <div class="card-header bg-dark text-light">
                <i class="fa-solid fa-briefcase me-2"></i>
                ข้อมูลการทำงาน
            </div>
            <div class="card-body">
                <div class="row justify-content-center g-2">
                    <div class="col-md-10">
                        สถานะการมีงานทำ
                        <input type="text" class="form-control" value="<?php echo $uData['ujobstatus'];?>" readonly>
                    </div>

                    <?php 
                        $sql = sprintf("SELECT * FROM tbl_job J WHERE J.uID = %s", $userParamID );
                        $result = mysqli_query($alumniDB, $sql);
                        if($result->num_rows>0){
                            $jobData = $result->fetch_assoc();
                            if($uData['ujobstatus'] == "ประกอบอาชีพส่วนตัว"){
                    ?>

                    <div class="col-md-10">
                        อาชีพ/ตำแหน่ง
                        <input type="text" class="form-control" value="<?php echo $jobData['jobName'];?>" readonly>
                    </div>

                    <?php   
                            } else if($uData['ujobstatus'] == "ประกอบอาชีพในบริษัท/องค์กร"){
                    ?>

                    <div class="col-md-5">
                        อาชีพ/ตำแหน่ง
                        <input type="text" class="form-control" value="<?php echo $jobData['jobName'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        บริษัท/องค์กร
                        <input type="text" class="form-control" value="<?php echo $jobData['jobCompany'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        โทรศัพท์ บริษัท/องค์กร
                        <input type="text" class="form-control" value="<?php echo $jobData['jobTel'];?>" readonly>
                    </div>
                    <div class="col-md-5">
                        เว็บไซต์ บริษัท/องค์กร
                        <input type="text" class="form-control" value="<?php echo $jobData['jobWeb'];?>" readonly>
                    </div>
                    <div class="col-md-10">
                        ที่อยู่
                        <textarea style="resize: none;" rows="3" class="form-control" readonly><?php printf('%s  %s  %s  %s  %s', $jobData['jobAddress'], $jobData['jobSubdistrict'], $jobData['jobDistrict'], $jobData['jobProvince'], $jobData['jobZipcode']);?></textarea>
                    </div>

                    <?php   
                            }
                        }
                    ?>

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
        <?php }
        if(isset($_POST['id'])){
        ?>
        <div class="row mt-4 justify-content-center">
            <div class="col mb-2">
                <a class ="btn shadow btn-secondary w-100 p-2 rounded-pill" onclick="history.back()">ย้อนกลับ<i class="fa-solid fa-circle-chevron-left ms-2"></i></a>
            </div>
            <?php
                if(isset($_POST['id']) && $uData['level']=="ศิษย์เก่า"){
            ?>
            <div class="col-md-4">
                <a class="btn shadow btn-warning w-100 p-2 rounded-pill text-white" onclick="editAlumni(<?php echo $userParamID;?>)">แก้ไขข้อมูล<i class="fa-solid fa-user-pen ms-2"></i></a>
            </div>
            <div class="col-md-4 mb-2">
                <a class ="btn shadow btn-danger w-100 p-2 rounded-pill" onclick="deleteUser(<?php echo $userParamID;?>)">ลบบัญชีผู้ใช้<i class="fa-solid fa-trash-can ms-2"></i></a>
            </div>
            <?php
                }
            ?>
        </div> 
        <?php } ?>

    </div>
</div>

<script type="text/javascript">
    $('#printBtn').click(function(){
        Swal.fire({
            icon: 'warning',
            text: 'ยังไม่สามารถใช้งานได้ อยู่ระหว่างการพัฒนา',
            showConfirmButton: false,
            timer: 4000             
        })
    })
</script>