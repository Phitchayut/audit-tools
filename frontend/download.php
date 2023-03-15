<?php 
    if(isset($_GET['file'])){
        $filename = basename($_GET['file']);
        $filepath = '../frontend/file/'.$filename;
        if(!empty($filename) && file_exists($filepath)){
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");

            readfile($filepath);
            exit;
        }else{
            echo "This File Does not Exist.";
        }
    }
?>