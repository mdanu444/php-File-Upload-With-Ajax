<?php 

if(!empty($_GET['filename'])){
$filename = basename($_GET['filename']);
$filepath = "uploads/" . $filename;
$extention = pathinfo($filename, PATHINFO_EXTENSION);


if (file_exists($filepath)) {

    #echo $fullPath;

    // setting headers
    header('Content-Description: File Transfer');
    header('Cache-Control: public'); # needed for IE
    header('Content-Type: '.$extention.'');
    header('Content-Disposition: attachment; filename='. $filename);
    // header('content-transfer-encoding: binary');
    readfile($filepath)or die('error!');
} else {
    die('File does not exist');
}

}

?>