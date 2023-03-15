<?php
require_once("../backend/config/dbcon.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Audit Tools</title>
    <link rel="stylesheet" href="style.css">
    <?php require_once("./components/cssBootstrap.php") ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
    <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once("./components/header.php") ?>
        <div class="card bg-light border-0">
            <div class="card-body">
                <div class="row mt-3 justify-content-md-center">
                    <div class="col-sm-3">
                        <div class="card shadow bg-body rounded border-0 mt-2" style="width: 100%; height: 150px">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT COUNT(*) FROM tbl_users";
                                $stmt = $conn->query($sql);
                                $countall = $stmt->fetchColumn();
                                ?>
                                <p class="">จำนวนการดาวน์โหลดโปรแกรมทั้งหมด</p>
                                <p class="fw-bold fs-2 text-end"><?= $countall ?> ครั้ง</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow bg-body rounded border-0 mt-2" style="width: 100%; height: 150px">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT COUNT(*) FROM tbl_users WHERE status_download = 1";
                                $stmt = $conn->query($sql);
                                $countfile1 = $stmt->fetchColumn();
                                ?>
                                <p class="align-top">Automated Leadsheet</p>
                                <p class="fw-bold fs-2 text-end"><?= $countfile1 ?> ครั้ง</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow bg-body rounded border-0 mt-2" style="width: 100%; height: 150px">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT COUNT(*) FROM tbl_users WHERE status_download = 2";
                                $stmt = $conn->query($sql);
                                $countfile2 = $stmt->fetchColumn();
                                ?>
                                <p class="">Audit Sampling</p>
                                <p class="fw-bold fs-2 text-end"><?= $countfile2 ?> ครั้ง</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card shadow bg-body rounded border-0 mt-2" style="width: 100%; height: 150px">
                            <div class="card-body">
                                <?php
                                $sql = "SELECT COUNT(*) FROM tbl_users WHERE status_download = 3";
                                $stmt = $conn->query($sql);
                                $countfileall = $stmt->fetchColumn();
                                ?>
                                <p class="">ดาวน์โหลดทั้ง 2 โปรแกรม</p>
                                <p class="fw-bold fs-2 text-end"><?= $countfileall ?> ครั้ง</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <!-- filter -->
                    <div class="row mb-3">
                        <div class="col-md-3 text-end">
                            <a href="export.php" target="_blank"><button class="btn btn-success" id="export" name="export">Export <i class="fa fa-download"></i></button></a>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="from_date" id="from_date" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="to_date" id="to_date" class="form-control" />
                        </div>
                        <div class="col-md-3">
                            <a href="#" name="filter" id="filter" value="ค้นหา" class="btn btn-warning"><i class="fa fa-search" style="color: white;"></i></a>
                        </div>
                    </div>

                    <div class="table-responsive mt-3" id="dataTbl">
                        <table class="table table table-bordered table-striped text-center" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%" scope="col">ลำดับ</th>
                                    <th class="text-center" style="width: 20%" scope="col">ชื่อ-สกุล</th>
                                    <th class="text-center" style="width: 20%" scope="col">บริษัท</th>
                                    <th class="text-center" style="width: 10%" scope="col">เบอร์โทรศัพท์</th>
                                    <th class="text-center" style="width: 10%"  scope="col">อีเมล</th>
                                    <th class="text-center" style="width: 15%" scope="col">อาชีพ</th>
                                    <th class="text-center" style="width: 10%" scope="col">โปรแกรม</th>
                                    <th class="text-center" style="width: 10%" scope="col">จำนวนการดาวน์โหลด</th>
                                    <th class="text-center" style="width: 10%" scope="col">วันที่ดาวน์โหลด</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 15px;">
                                <?php
                                $stmt = $conn->prepare("SELECT *, COUNT(*) as count FROM tbl_users,tbl_program WHERE tbl_users.status_download = tbl_program.status_download GROUP BY email");
                                $stmt->execute();
                                $result = $stmt->fetchAll();
                                $i = 0;
                                foreach ($result as $row) {
                                    $timestamp = $row['created_at'];
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td class="text-start"><?= $row['title_name'] . $row['first_name'] . ' ' . $row['last_name'] ?></td>
                                        <td class="text-start"><?= $row['company'] ?></td>
                                        <td><?= $row['mobile_phone'] ?></td>
                                        <td class="text-start"><?= $row['email'] ?></td>
                                        <td><?= $row['career_id'] ?></td>
                                        <td><?= $row['status_name'] ?></td>
                                        <td><?= $row['count'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($timestamp)) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once("./components/footer.php") ?>
    </div>



 <?php require_once("./components/jsBootstrap.php") ?>

    <!-- datatable -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>