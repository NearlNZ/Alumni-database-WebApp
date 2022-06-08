<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>สัดส่วนการมีงานทำ : Alumni Club</title>
        
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
                        <div class="h4 mt-2 col">สัดส่วนการมีงานทำของศิษย์เก่า</div>
                        <button id="printBtn" class="btn text-white btn-secondary">พิมพ์รายงาน<i class="fa-solid fa-print ms-2"></i></button>
                    </div>
                    
                    <?php
                        $sql = "SELECT ujobstatus, count(*) as userCount FROM tbl_user WHERE level = 'ศิษย์เก่า' GROUP BY ujobstatus";
                        $query = mysqli_query($alumniDB, $sql);
                        $label = array();
                        $data = array();
                        foreach ($query as $value) {
                            array_push($label, $value['ujobstatus']);
                            array_push($data, $value['userCount']);
                        }
                    ?>

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card shadow-sm mt-2">
                                <div class="card-header bg-dark text-light">
                                    สัดส่วนการมีงานทำของศิษย์เก่า
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center p-4">
                                        <?php 
                                            if($query->num_rows==0){
                                                echo"ไม่พบข้อมูลสำหรับออกรายงาน";
                                            }else{
                                        ?>
                                        <div class="col-md-8">
                                            <canvas id="pieChart"></canvas> 
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
                label: 'Dataset 1',
                data: <?php echo json_encode( $data, JSON_UNESCAPED_UNICODE );?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)',
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)'
                ]
            }
        ]
    };
    const config = {
        type: 'pie',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        },
    };
    const myChart = new Chart(
        document.getElementById('pieChart'),
        config
    );
</script>