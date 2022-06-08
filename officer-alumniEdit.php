<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>แก้ไขข้อมูลศิษย์เก่า : Alumni Club</title>
        
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
                        <div class="h4 mt-2 col">แก้ไขข้อมูลศิษย์เก่า</div>
                    </div>

                    <?php
                        if(isset($_POST)) $userParamID = $_POST['id'];
                        $sql = sprintf("SELECT *, YEAR(FROM_DAYS(DATEDIFF(NOW(),uBirthdate))) as uAge FROM tbl_user WHERE `uID` = %d LIMIT 1;", $userParamID);
                        $result = mysqli_query($alumniDB, $sql);
                        if($result->num_rows>0){
                            $uData = $result->fetch_assoc();
                        }
                    ?>   

                    <div class="card shadow-sm">
                        <form id="editForm" class="form" method="POST" action="ajax-editAlumni.php" enctype="multipart/form-data">
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
                                                    <input type="hidden" name="level" Value="ศิษย์เก่า">
                                                    <input type="hidden" name="uID" value="<?php echo $userParamID;?>">
                                                    <div class="col-md-6 mb-2">
                                                        ชื่อ<span class="text-danger"> *</span>
                                                        <input class="form-control" type="text" name="name" Value="<?php echo $uData['uName'];?>"
                                                        autocomplete="off" required maxlength="50">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        นามสกุล<span class="text-danger"> *</span>
                                                        <input class="form-control" type="text" name="lastname" Value="<?php echo $uData['uLastname'];?>"
                                                        autocomplete="off" required maxlength="50">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        เพศ<span class="text-danger"> *</span>
                                                        <select class="form-select" name="gender" required>
                                                            <option value="" disabled>--กรุณาเลือก--</option>
                                                            <option value="ชาย" <?php if($uData['uGender']=="ชาย") echo "selected";?>>ชาย</option>
                                                            <option value="หญิง" <?php if($uData['uGender']=="หญิง") echo "selected";?>>หญิง</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        วัน/เดือน/ปีเกิด<span class="text-danger"> *</span>
                                                        <input type="date" class="form-control" name="birthdate" max="<?php echo date('Y-m-d');?>" Value="<?php echo $uData['uBirthdate'];?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        โทรศัพท์<span class="text-danger"> *</span>
                                                        <input class="form-control" type="tel" name="tel" Value="<?php echo $uData['uTel'];?>"
                                                        autocomplete="off" placeholder="0xxxxxxxxx" required maxlength="10" minlength="10">
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        E-mail
                                                        <input class="form-control" type="email" name="email" Value="<?php echo $uData['uEmail'];?>"
                                                        autocomplete="off" placeholder="email@example.com" maxlength="50">
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        ที่อยู่<span class="text-danger"> *</span>
                                                        <input id="address" class="form-control" type="text" name="address1" Value="<?php echo $uData['uAddress'];?>"
                                                        autocomplete="off" required placeholder="เลขที่ ตึก ถนน ซอย ฯลฯ" maxlength="100">
                                                    </div>

                                                    <?php
                                                        require_once("resource/sql/addressDB-con.php");
                                                        $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
                                                        $query_province = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        จังหวัด<span class="text-danger"> *</span>
                                                        <select id="province" class="form-select" name="address4" required>
                                                            <option value="" disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_province as $value) { ?>
                                                            <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uProvince']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php
                                                        $sql_address = "SELECT * FROM districts WHERE province_id = $tempID ORDER BY name_in_thai";
                                                        $query_district = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        อำเภอ/เขต<span class="text-danger"> *</span>
                                                        <select id="district" class="form-select" name="address3" required>
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_district as $value) { ?>
                                                            <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uDistrict']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php
                                                        $sql_address = "SELECT * FROM subdistricts WHERE district_id = $tempID ORDER BY name_in_thai";
                                                        $query_subdistrict = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        ตำบล/แขวง<span class="text-danger"> *</span>
                                                        <select id="subdistrict" class="form-select" name="address2" required>
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_subdistrict as $value) { ?>
                                                            <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($uData['uSubdistrict']==$value['name_in_thai']) echo "selected";?>><?=$value['name_in_thai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        รหัสไปรษณีย์<span class="text-danger"> *</span>
                                                        <input id="zipcode" class="form-control" type="text" name="address5" Value="<?php echo $uData['uZipcode'];?>"
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
                                                    <i class="fa-solid fa-graduation-cap me-2"></i>
                                                    ข้อมูลการศึกษา
                                                </div> 
                                            </div>
                                            <div class="card-body">
                                                <div class="row justify-content-center">

                                                    <?php
                                                        $sql = sprintf("SELECT * FROM tbl_educational WHERE `uID` = %d LIMIT 1;", $userParamID);
                                                        $result = mysqli_query($alumniDB, $sql);
                                                        if($result->num_rows>0){
                                                            $eduData = $result->fetch_assoc();
                                                        }
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        ปีที่เข้ารับการศึกษา<span class="text-danger"> *</span>
                                                        <select id="stdYear" class="form-select" name="stdYear" required onchange="syncStdEndYear()">
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php
                                                                $thisyear = date("Y")+542;
                                                                $startyear = 2550;
                                                                while($thisyear >= $startyear){ ?>
                                                                <option value="<?=$thisyear?>" <?php if($eduData['eduStart']==$thisyear) echo'selected';?>>ปี <?=$thisyear?></option>
                                                            <?php $thisyear--;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        ปีที่จบการศึกษา<span class="text-danger"> *</span>
                                                        <select id="stdEndyear" class="form-select" name="stdEndyear" required>
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php
                                                                $thisyear = date("Y")+543;
                                                                $startyear = $eduData['eduStart'];
                                                                while($thisyear > $startyear){ ?>
                                                                <option value="<?=$thisyear?>" <?php if($eduData['eduEnd']==$thisyear) echo'selected';?>>ปี <?=$thisyear?></option>
                                                            <?php $thisyear--;} ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        ระดับการศึกษา<span class="text-danger"> *</span>
                                                        <select class="form-select" name="stdEducation" required>
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <option value="อนุปริญญา" <?php if($eduData['eduLevel']=="อนุปริญญา") echo'selected';?>>อนุปริญญา</option>
                                                            <option value="ปริญญาตรี" <?php if($eduData['eduLevel']=="ปริญญาตรี") echo'selected';?>>ปริญญาตรี</option>
                                                            <option value="ปริญญาโท" <?php if($eduData['eduLevel']=="ปริญญาโท") echo'selected';?>>ปริญญาโท</option>
                                                            <option value="ปริญญาเอก" <?php if($eduData['eduLevel']=="ปริญญาเอก") echo'selected';?>>ปริญญาเอก</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        รหัสนักศึกษา<span class="text-danger"> *</span>
                                                        <input id="stdID" class="form-control" type="text" name="stdID" Value="<?php echo $eduData['eduStuID'];?>"
                                                        autocomplete="off" required maxlength="13" onkeyup="syncUsername()">
                                                    </div>

                                                    <?php
                                                        $brID = $eduData['brID'];
                                                        $sql = "SELECT faID FROM tbl_brance WHERE brID = $brID;";
                                                        $result = mysqli_query($alumniDB, $sql);
                                                        $data = $result->fetch_assoc();
                                                        $faID = $data['faID'];

                                                        $sql_faculty = "SELECT * FROM tbl_faculty ORDER BY faName";
                                                        $query_faculty = mysqli_query($alumniDB, $sql_faculty);
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        คณะ<span class="text-danger"> *</span>
                                                        <select id="faculty" class="form-select" name="faculty">
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_faculty as $value) { ?>
                                                            <option value="<?=$value['faID']?>" <?php if($faID == $value['faID']) echo"selected";?>><?=$value['faName']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php
                                                        $sql_brance = "SELECT * FROM tbl_brance WHERE faID = $faID ORDER BY brName;";
                                                        $query_brance = mysqli_query($alumniDB, $sql_brance);
                                                    ?>

                                                    <div class="col-md-6 mb-2">
                                                        สาขาวิชา<span class="text-danger"> *</span>
                                                        <select id="brance" class="form-select" name="brance">
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_brance as $value) { ?>
                                                            <option value="<?=$value['brID']?>" <?php if($brID == $value['brID']) echo"selected";?>><?=$value['brName']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-10 mb-4">
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
                                                        $sql_address = "SELECT * FROM provinces ORDER BY name_in_thai";
                                                        $query_province = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div id="c_provinceCol" class="col-md-6 mb-2" style="display:none;">
                                                        จังหวัด<span class="text-danger"> *</span>
                                                        <select id="province2" class="form-select" name="c_address4">
                                                        <option value="" selected disabled>--กรุณาเลือก--</option>
                                                        <?php foreach ($query_province as $value) { ?>
                                                        <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($jobData['jobProvince']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php
                                                        $sql_address = "SELECT * FROM districts WHERE province_id = $tempID ORDER BY name_in_thai";
                                                        $query_district = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div id="c_districtCol" class="col-md-6 mb-2" style="display:none;">
                                                        อำเภอ/เขต<span class="text-danger"> *</span>
                                                        <select id="district2" class="form-select" name="c_address3">
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_district as $value) { ?>
                                                            <option value="<?=$value['name_in_thai']?>" data-id="<?=$value['id']?>" <?php if($jobData['jobDistrict']==$value['name_in_thai']) {echo "selected"; $tempID = $value['id'];}?>><?=$value['name_in_thai']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <?php
                                                        $sql_address = "SELECT * FROM subdistricts WHERE district_id = $tempID ORDER BY name_in_thai";
                                                        $query_subdistrict = mysqli_query($addressDB, $sql_address);
                                                    ?>

                                                    <div id="c_subdistrictCol" class="col-md-6 mb-2" style="display:none;">
                                                        ตำบล/แขวง<span class="text-danger"> *</span>
                                                        <select id="subdistrict2" class="form-select" name="c_address2">
                                                            <option value="" selected disabled>--กรุณาเลือก--</option>
                                                            <?php foreach ($query_subdistrict as $value) { ?>
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
                                                    <div class="col mb-2">
                                                        ชื่อผู้ใช้<span class="text-danger"> *ใช้รหัสนักศึกษา</span>
                                                        <input id="username" class="form-control" type="text" name="username" Value="<?php echo $uData['username'];?>"
                                                        autocomplete="off" readonly required maxlength="13">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-2">
                                                <a class ="btn shadow btn-secondary w-100 p-2 rounded-pill" href="officer-alumniList.php">ย้อนกลับ<i class="fa-solid fa-circle-chevron-left ms-2"></i></a>
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

    //Edit record
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
                                    window.location.href="officer-alumniList.php";
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
        });
    });
</script>

<?php include('components/scripts/ajax-facultySelect-script.php');?>
<?php include('components/scripts/ajax-yearSelect-script.php');?>
<?php include('components/scripts/ajax-addressSelect-script.php');?>
<?php include('components/scripts/jobform-script.php');?>

<?php $addressDB = null; $alumniDB = null;?>