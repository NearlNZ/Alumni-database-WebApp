<div id="layoutSidenav_nav"> 
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">เมนูศิษย์เก่า</div>
                <a class="nav-link" href="alumni-profile.php">
                    <i class="fa-solid fa-user me-2"></i>
                    ข้อมูลบัญชี
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenu1" aria-expanded="false" aria-controls="collapseMenu1">
                    <i class="fa-solid fa-user-pen me-2"></i>
                    แก้ไขข้อมูล
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMenu1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="alumni-editUser.php"><i class="fa-solid fa-id-card me-2"></i>ข้อมูลส่วนตัว</a>
                        <a class="nav-link" href="alumni-editJob.php"><i class="fa-solid fa-briefcase me-2"></i>ข้อมูลการทำงาน</a>
                        <a class="nav-link" href="alumni-editPassword.php"><i class="fa-solid fa-key me-2"></i>เปลี่ยนรหัสผ่าน</a>
                    </nav>
                </div>
                <a class="nav-link" href="404.php">
                    <i class="fa-solid fa-headset me-2"></i>
                    ติดต่อเจ้าหน้าที่
                </a>
                <div class="sb-sidenav-menu-heading">ออกจากระบบ</div>
                <a class="nav-link" onclick="logout()">
                    <i class="fa fa-power-off me-2"></i>
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </nav>
</div>