<?php require_once("../backend/config/dbcon.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานข้อมูล</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

</head>

<body>

    <div class="container">
        <?php require_once("./components/header.php") ?>
        <h3 class="text-center mt-5">Export To Excel</h3>
        <table class="table table table-bordered table-striped text-center" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center" style="width: 5%" scope="col">ลำดับ</th>
                    <th class="text-center" style="width: 20%" scope="col">ชื่อ-สกุล</th>
                    <th class="text-center" style="width: 20%" scope="col">บริษัท</th>
                    <th class="text-center" style="width: 10%" scope="col">เบอร์โทรศัพท์</th>
                    <th class="text-center" style="width: 10%" scope="col">อีเมล</th>
                    <th class="text-center" style="width: 15%" scope="col">อาชีพ</th>
                    <th class="text-center" style="width: 10%" scope="col">โปรแกรม</th>
                    <th class="text-center" style="width: 10%" scope="col">วันที่ดาวน์โหลด</th>
                </tr>
            </thead>
            <tbody style="font-size: 15px;">
                <?php
                $stmt = $conn->prepare("SELECT * FROM tbl_users,tbl_program WHERE tbl_users.status_download = tbl_program.status_download");
                $stmt->execute();
                $result = $stmt->fetchAll();
                $i = 0;
                foreach ($result as $row) {
                    $i++;
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['title_name'] . $row['first_name'] . ' ' . $row['last_name'] ?></td>
                        <td><?= $row['company'] ?></td>
                        <td><?= $row['mobile_phone'] ?></td>
                        <td class="text-start"><?= $row['email'] ?></td>
                        <td><?= $row['career_id'] ?></td>
                        <td><?= $row['status_name'] ?></td>
                        <td><?= $row['created_at'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 mb-5 text-center">
                <a href="report.php" class="btn btn-danger btn-lg mt-5">Back</a>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                "dom": "<'row'<'col-sm-6 mt-1'B><'col-sm-6 text-end'>>" + "<'row'<'col-sm-6 mt-1'l><'col-sm-6 mt-1 text-end'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [{
                    extend: 'excel',
                    text: 'ดาวน์โหลดข้อมูล',
                    className: 'btn-success'
                }]
            });
            table.buttons().container()
                .appendTo('#dataTbl_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>