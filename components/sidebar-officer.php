<div id="layoutSidenav_nav"> 
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">เมนูเจ้าหน้าที่</div>
                <a class="nav-link" href="officer-profile.php">
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
                        <a class="nav-link" href="officer-editUser.php"><i class="fa-solid fa-id-card me-2"></i>ข้อมูลส่วนตัว</a>
                        <a class="nav-link" href="officer-editPassword.php"><i class="fa-solid fa-key me-2"></i>เปลี่ยนรหัสผ่าน</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenu2" aria-expanded="false" aria-controls="collapseMenu1">
                    <i class="fa-solid fa-chart-bar me-2"></i>
                    ข้อมูล/รายงาน
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMenu2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="officer-alumniList.php"><i class="fa-solid fa-user-graduate me-2"></i>รายชื่อศิษย์เก่า</a>
                        <a class="nav-link" href="officer-officerList.php"><i class="fa-solid fa-user-tie me-2"></i>รายชื่อเจ้าหน้าที่</a>
                        <a class="nav-link" href="officer-lineChart.php"><i class="fa-solid fa-chart-line me-2"></i>สถิติการมีงานทำ</a>
                        <a class="nav-link" href="officer-pieChart.php"><i class="fa-solid fa-chart-pie me-2"></i>สัดส่วนการมีงานทำ</a>
                        <a class="nav-link" href="404.php"><i class="fa-solid fa-rectangle-list me-2"></i>ข้อมูลคณะ-สาขา</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMenu3" aria-expanded="false" aria-controls="collapseMenu1">
                    <i class="fa-solid fa-pager me-2"></i>
                    จัดการข้อมูลหน้าเว็บ
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMenu3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="404.php"><i class="fa-solid fa-users me-2"></i>ทำเนียบศิษย์เก่า</a>
                        <a class="nav-link" href="404.php"><i class="fa-solid fa-comment-dots me-2"></i>ข่าวประชาสัมพันธ์</a>
                        <a class="nav-link" href="404.php"><i class="fa-solid fa-star-half-stroke me-2"></i>กิจกรรมศิษย์เก่า</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">ออกจากระบบ</div>
                <a class="nav-link" onclick="logout()">
                    <i class="fa fa-power-off me-2"></i>
                    ออกจากระบบ
                </a>
            </div>
        </div>
    </nav>
</div>