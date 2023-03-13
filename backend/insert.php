<?php
require_once("./config/dbcon.php");
$tname = $_POST['title_name'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$company = $_POST['company'];
$mphone = $_POST['mobile_phone'];
$email = $_POST['email'];
if (isset($_POST['othercareer']) && $_POST['othercareer'] != "") {
    $career = $_POST['othercareer'];
} else {
    $career = $_POST['career'];
}
$file = $_POST['file'];
// if($file == 1){
//     $filename = basename($_POST['file']);
//     $filepath = '../frontend/file/file1.xlsx';
//         header("Cache-Control: public");
//         header("Content-Description: File Transfer");
//         header("Content-Disposition: attachment; filename=$filename");
//         header("Content-Type: application/zip");
//         header("Content-Transfer-Emcoding: binary");
//         readfile($filepath);
//         exit;
// }
$stmt = $conn->prepare("INSERT INTO tbl_users(title_name,first_name,last_name,company,mobile_phone,email,career_id,status_download)
    VALUES(:title_name, :first_name, :last_name, :company, :mobile_phone, :email, :career_id, :status_download)");
$stmt->bindParam(":title_name", $tname);
$stmt->bindParam(":first_name", $fname);
$stmt->bindParam(":last_name", $lname);
$stmt->bindParam(":company", $company);
$stmt->bindParam(":mobile_phone", $mphone);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":career_id", $career);
$stmt->bindParam(":status_download", $file);
$stmt->execute();

if ($stmt) {
    echo "success";
} else {
    echo "Fail";
}
