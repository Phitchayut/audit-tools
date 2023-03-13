<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Tools</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error {
            color: red;
            font-style: italic;
        }
        .success {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php require_once("./components/header.php") ?>
        <div class="card bg-light">
            <div class="card-body">
                <!--   -->
                <form action="" id="form-insert" method="post">
                    <div class="row">
                        <div class="col-sm-2 mt-3">
                            <label for="title_name" class="form-label">คำนำหน้าชื่อ<span class="text-danger">*</span></label>
                            <input class="form-control" list="datalistOptions" id="title_name" name="title_name" placeholder="คำนำหน้าชื่อ..">
                            <datalist id="datalistOptions">
                                <option value="นาย">
                                <option value="นางสาว">
                                <option value="นาง">
                            </datalist>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <label for="first_name" class="form-label">ชื่อ<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรุณากรอกชื่อ..." require>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <label for="last_name" class="form-label">นามสกุล<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรุณากรอกนามสกุล..." require>
                        </div>
                        <!-- row -->
                        <div class="col-sm-6 mt-3">
                            <label for="company" class="form-label">บริษัท/สังกัดสำนักงาน<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="กรุณากรอกชื่อบริษัท/สังกัดสำนักงาน..." require>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="mobile_phone" class="form-label">เบอร์โทรศัพท์มือถือ<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="กรุณากรอกเบอร์โทรศัพท์มือถือ..." require>
                        </div>
                        <!-- row -->
                        <div class="col-sm-6 mt-3">
                            <label for="email" class="form-label">อีเมล<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="กรุณากรอกอีเมล..." require>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="emailcf" class="form-label">ยืนยันอีเมล<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emailcf" name="emailcf" placeholder="กรุณายืนยันอีเมล..." require>
                        </div>

                        <!-- row -->
                        <div class="col-sm-12 mt-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-2" role="alert">ท่านเป็นผู้ปฏิบัติงานด้านการสอบบัญชีประเภทใด<span class="text-danger">*</span></div>
                                    <label for="career" class="error success"></label>
                                    <div class="form-check">
                                        <input class="form-check-input" id="career1" type="radio" name="career" value="ผู้สอบบัญชีรับอนุญาต" require>
                                        <label class="form-check-label" for="career">
                                            ผู้สอบบัญชีรับอนุญาต
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="career2" type="radio" name="career" value="ผู้ช่วยผู้สอบบัญชี" require>
                                        <label class="form-check-label" for="career">
                                            ผู้ช่วยผู้สอบบัญชี
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="career3" type="radio" name="career" value="อาจารย์ - นักศึกษาในสถาบันการศึกษา" require>
                                        <label class="form-check-label" for="career">
                                            อาจารย์ - นักศึกษาในสถาบันการศึกษา
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="morecheck" type="radio" name="career" require>
                                        <label class="form-check-label" for="career">
                                            อื่นๆ
                                        </label>
                                        <input class="form-control form-control-sm" name="othercareer" type="text" placeholder="ข้อมูลอื่นๆ..." id="morecareer" style="display: none" require>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- row -->
                        <div class="col-sm-12">
                            <div class="form-check mt-3">
                                <label class="form-check-label text-danger" style="font-size: 15px;"><span class="text-danger">*</span> กรุณาอ่านเพิ่มเพื่อให้ความยินยอมเกี่ยวกับข้อมูลส่วนบุคคล
                                    <button id="readmore" class="btn btn-warning btn-sm">อ่านเพิ่ม</button>
                                </label>
                                <label for="check_read" class="error"></label>
                            </div>
                            <div class="col-sm-12">
                                <div id="show_readmore" style="display: none;">
                                    <?php require_once("./components/more_info.php") ?>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 mt-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="readmore_b" name="readmore_b" require>
                                <label class="form-check-label" style="font-size: 15px;"><span class="text-danger">กรุณาอ่านข้อความและยอมรับเงื่อนไขลิขสิทธิ์ ก่อนดาวน์โหลดเอกสาร (ห้ามนำไปจำหน่าย)</span></label>
                            </div>
                            <?php require_once("./components/readmore.php") ?>
                        </div>

                        <!-- row -->

                        <div class="col-sm-12 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h4>เลือกโปรแกรมเพื่อดาวน์โหลด</h4>
                                    <label for="file" class="error success"></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="file1" name="file" value="1">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            โปรแกรมกระดาษทำการอัตโนมัติ (Automated Leadsheet)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="file2" name="file" value="2">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            โปรแกรมเลือกตัวอย่างในการสอบบัญชี (Audit Sampling)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="file3" name="file" value="3">
                                        <label class="form-check-label" for="flexCheckChecked">
                                            ดาวน์โหลดทั้ง 2 โปรแกรม
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <button type="submit" name="submit" class="btn btn-success w-100">บันทึกข้อมูล เพื่อดาวน์โหลดโปรแกรม</button>
                        </div>

                    </div> <!-- row -->
                </form>
            </div> <!-- card-body -->
        </div> <!-- card -->
        <?php require_once("./components/footer.php") ?>
    </div> <!-- container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // validation and insert data
            $("#form-insert").validate({
                submitHandler: function(form) {
                    Swal.fire({
                        title: "ต้องการลงทะเบียนและดาวน์โหลด ใช่หรือไม่?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "ใช่!",
                        cancelButtonText: "ไม่!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "../backend/insert.php",
                                data: $("#form-insert").serialize(),
                                success: function(response) {
                                    Swal.fire({
                                        title: 'สำเร็จ',
                                        text: 'เพิ่มข้อมูลเรียบร้อย',
                                        icon: 'success',
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    $('#form-insert')[0].reset();
                                },
                            });
                        }
                    });
                },
                rules: {
                    title_name: {
                        required: true,
                    },
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    company: {
                        required: true,
                    },
                    mobile_phone: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    emailcf: {
                        required: true,
                        equalTo: "#email",
                    },
                    career: {
                        required: true,
                    },
                    check_read: {
                        required: true,
                    },
                    readmore_b: {
                        required: true,
                    },
                    cf: {
                        required: true,
                    },
                    file: {
                        required: true,
                    },
                },
                messages: {
                    title_name: {
                        required: "กรุณากรอกคำนำหน้าชื่อ",
                    },
                    first_name: {
                        required: "กรุณากรอกชื่อ",
                    },
                    last_name: {
                        required: "กรุณากรอกนามสกุล",
                    },
                    company: {
                        required: "กรุณากรอกชื่อบริษัท",
                    },
                    mobile_phone: {
                        required: "กรุณากรอกเบอร์โทรมือถือ",
                        number: "กรุณากรอกเบอร์โทรมือถือให้ถูกต้อง",
                        minlength: "กรุณากรอกเบอร์โทรมือถือให้ครบ",
                        maxlength: "กรุณากรอกเบอร์โทรมือถือให้ถูกต้อง",
                    },
                    email: {
                        required: "กรุณากรอกอีเมล",
                        email: "กรุณากรอกอีเมลให้ถูกต้อง",
                    },
                    emailcf: {
                        required: "กรุณากรอกยืนยันอีเมล",
                        equalTo: "กรุณากรอกยืนยันอีเมลให้ตรงกับอีเมล",
                    },
                    career: {
                        required: "กรุณาเลือก",
                    },
                    check_read: {
                        required: "กรุณายินยอม*",
                    },
                    readmore_b: {
                        required: "*",
                    },
                    cf: {
                        required: "*",
                    },
                    file: {
                        required: "กรุณาเลือกโปรแกรมที่จะดาวน์โหลด",
                    },
                },
            });
        })
    </script>
    <script src="index.js"></script>
</body>

</html>