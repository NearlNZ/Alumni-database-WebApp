<?php
    //Check login session & userlevel
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION["userID"]) or !isset($_SESSION["userLevel"])){
        header("Location: login.php");
        exit();
    }
    if($_SESSION["userLevel"] != "เจ้าหน้าที่"){
        header("Location: login.php");
        exit();
    }

    //Database
    require_once("resource/sql/alumniDB-con.php");

    //Current user name
    $sql = sprintf("SELECT `uName`, `uLastname` FROM tbl_user WHERE `uID` = %d LIMIT 1;", $_SESSION['userID']);
    $result = mysqli_query($alumniDB, $sql);
    if($result->num_rows>0){
        $thisUser = $result->fetch_assoc();
    } 
?>

<nav class="sb-topnav navbar navbar-expand navbar-light bg-light shadow">
    <button class="btn btn-link btn-sm ms-2" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <a class="navbar-brand ms-2" style="font-family:Fredoka One"><i class="fa-solid fa-user-graduate me-2"></i>Alumni Club</a>
    <ul class="navbar-nav ms-auto me-2 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle me-1" src="resource/profiles/default-profile.jpg" width="33px">
                <span class="d-none d-lg-inline"><?php printf("%s  %s", $thisUser['uName'], $thisUser['uLastname']);?><i class="fa-solid fa-caret-down ms-2"></i></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="officer-profile.php"><i class="fa fa-user me-2"></i>ข้อมูลบัญชี</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" onclick="logout()"><i class="fa fa-power-off me-2"></i>ออกจากระบบ</a></li>
            </ul>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    function logout(){
        Swal.fire({
            title: 'ออกจากระบบ',
            text: "ต้องการออกจากระบบบัญชีผู้ใช้ปัจจุบันหรือไม่ ?",
            showCancelButton: true,
            confirmButtonColor: '#088132',
            confirmButtonText: 'ยืนยันการออกจากระบบ',
            cancelButtonText: 'ยกเลิกการออกจากระบบ',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="logout.php";
            }
        })
    }
</script>