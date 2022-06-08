<div class="d-flex mb-4 mt-3">
    <div class="h4 mt-2 col">รายชื่อศิษย์เก่า</div>
    <button id="printBtn" class="btn text-white btn-secondary">พิมพ์รายงาน<i class="fa-solid fa-print ms-2"></i></button>
</div>

<?php
    $sql = "SELECT * FROM tbl_user U INNER JOIN tbl_educational E ON U.uID = E.uID INNER JOIN tbl_brance B ON E.brID = B.brID INNER JOIN tbl_faculty F ON B.faID = F.faID;";
    $result = mysqli_query($alumniDB, $sql);
?>   
<a class="btn btn-success mb-2" href="officer-alumniAdd.php">เพิ่มข้อมูลศิษย์เก่า<i class="fa-solid fa-user-plus ms-2"></i></a>
<div class="card shadow-sm">
    <div class="card-body">
        <div class="card shadow-sm mt-2">
            <div class="card-header bg-dark text-light">
                รายชื่อศิษย์เก่า
            </div>
            <div class="card-body">
                <div class="row justify-content-center g-2">

                    <?php
                    if($result->num_rows<=0){
                        printf('<div class="text-center">ไม่พบข้อมูลศิษย์เก่า</div>');
                    }else{
                    ?>

                    <table id="datatable" class="table table-striped table-hover table-bordered border">
                        <thead>
                            <tr>
                                <th></th>
                                <th>รหัสนักศึกษา</th>
                                <th>ชื่อ-สกุล</th>
                                <th>ปีการศึกษา</th>
                                <th>แผนการเรียน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while($data=$result->fetch_assoc()){
                            ?>

                            <tr>
                                <td class="text-center align-middle"><img class="rounded-circle shadow me-1" width="50px" src="resource/profiles/default-profile.jpg"></td>
                                <td class="align-middle"><?php echo $data['eduStuID'];?></td>
                                <td class="align-middle"><?php echo $data['uName']."  ".$data['uLastname'];?></td>
                                <td class="align-middle"><?php echo $data['eduStart'];?></td>
                                <td class="align-middle"><?php printf('%s<br>%s<br>%s', $data['eduLevel'], $data['faName'], $data['brName']);?></td>
                                <td class="text-center align-middle"><a onclick="showDetail(<?php echo $data['uID'];?>)" class="btn btn-dark">รายละเอียด</a></td>
                            </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
    function showDetail(id){
        $('<form action="officer-userDetail.php" method="post"><input type="hidden" name="id" value="'+id+'"></input></form>').appendTo('body').submit().remove();
    };
    $('#printBtn').click(function(){
        Swal.fire({
            icon: 'warning',
            text: 'ยังไม่สามารถใช้งานได้ อยู่ระหว่างการพัฒนา',
            showConfirmButton: false,
            timer: 4000             
        })
    });
</script>