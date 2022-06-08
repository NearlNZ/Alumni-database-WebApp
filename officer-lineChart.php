<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>สถิติการมีงานทำ : Alumni Club</title>
        
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
        <script src="bootstrap/js/chart.min.js"></script>
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
                        <div class="h4 mt-2 col">สถิติการมีงานทำของศิษย์เก่า</div>
                        <button id="printBtn" class="btn text-white btn-secondary">พิมพ์รายงาน<i class="fa-solid fa-print ms-2"></i></button>
                    </div>
                    
                    <?php
                        $thisYear = date('Y')+543;
                        $startYear = $thisYear-4;
                        $label = array();
                        $data1 = array();
                        $data2 = array(); 
                        $data3 = array(); 
                        $data4 = array();
                        while($startYear <= $thisYear){
                            array_push($label, $startYear);
                            $sql = sprintf  ('SELECT    (SELECT count(*) as countUser FROM tbl_user U INNER JOIN tbl_educational E ON U.uID = E.uID WHERE ujobstatus = "ว่างงาน" and E.eduEnd = %s) As col1,
                                                        (SELECT count(*) as countUser FROM tbl_user U INNER JOIN tbl_educational E ON U.uID = E.uID WHERE ujobstatus = "ศึกษาต่อ" and E.eduEnd = %s) As col2,
                                                        (SELECT count(*) as countUser FROM tbl_user U INNER JOIN tbl_educational E ON U.uID = E.uID WHERE ujobstatus = "ประกอบอาชีพส่วนตัว" and E.eduEnd = %s) As col3,
                                                        (SELECT count(*) as countUser FROM tbl_user U INNER JOIN tbl_educational E ON U.uID = E.uID WHERE ujobstatus = "ประกอบอาชีพในบริษัท/องค์กร" and E.eduEnd = %s) As col4', $startYear, $startYear, $startYear, $startYear
                                            );
                            $query = mysqli_query($alumniDB, $sql);
                            foreach ($query as $value) {
                               array_push($data1, $value['col1']);
                               array_push($data2, $value['col2']);
                               array_push($data3, $value['col3']);
                               array_push($data4, $value['col4']);
                            }
                            $startYear++;
                        }
                    ?>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card shadow-sm mt-2">
                                <div class="card-header bg-dark text-light">
                                    สถิติการมีงานทำของศิษย์เก่า
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center p-4">
                                        <?php 
                                            if($query->num_rows==0){
                                                echo"ไม่พบข้อมูลสำหรับออกรายงาน";
                                            }else{
                                        ?>
                                        <div class="col">
                                            <canvas id="lineChart"></canvas> 
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $('#printBtn').click(function(){
        Swal.fire({
            icon: 'warning',
            text: 'ยังไม่สามารถใช้งานได้ อยู่ระหว่างการพัฒนา',
            showConfirmButton: false,
            timer: 4000             
        })
    });
</script>

<script type="text/javascript">
    const data = {
        labels: <?php echo json_encode( $label, JSON_UNESCAPED_UNICODE );?>,
        datasets: [
            {
                label: 'ว่างงาน',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?php echo json_encode( $data1, JSON_UNESCAPED_UNICODE );?>
            },
            {
                label: 'ศึกษาต่อ',
                backgroundColor: 'rgb(255, 205, 86)',
                borderColor: 'rgb(255, 205, 86)',
                data: <?php echo json_encode( $data2, JSON_UNESCAPED_UNICODE );?>
            },
            {
                label: 'ประกอบอาชีพส่วนตัว',
                backgroundColor: 'rgb(54, 162, 235)',
                borderColor: 'rgb(54, 162, 235)',
                data: <?php echo json_encode( $data3, JSON_UNESCAPED_UNICODE );?>
            },
            {
                label: 'ประกอบอาชีพในบริษัท/องค์กร',
                backgroundColor: 'rgb(75, 192, 192)',
                borderColor: 'rgb(75, 192, 192)',
                data: <?php echo json_encode( $data4, JSON_UNESCAPED_UNICODE );?>
            }   
        ]
    };
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
    const myChart = new Chart(
        document.getElementById('lineChart'),
        config
    );
</script>