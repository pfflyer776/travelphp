<?php
    $file_path = __DIR__;

    $message = 'Error uploading file';
    switch( $_FILES['uploaded_file']['error'] ) {
        case UPLOAD_ERR_OK:
            $message = false;
            break;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            //$message .= ' - file too large (limit of '.get_max_upload().' bytes).';
            $message .= ' - file too large';
            break;
        case UPLOAD_ERR_PARTIAL:
            $message .= ' - file upload was not completed.';
            break;
        case UPLOAD_ERR_NO_FILE:
            $message .= ' - zero-length file uploaded.';
            break;
        default:
            $message .= ' - internal error #'.$_FILES['uploaded_file']['error'];
            break;
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    //$finfo = new finfo(FILEINFO_MIME_TYPE);
    //if (false === $ext = array_search(
    //    $finfo->file($_FILES['uploaded_file']['tmp_name']),
    //    array(
    //        'jpg' => 'image/jpeg',
    //        'png' => 'image/png',
    //        'gif' => 'image/gif',
    //    ),
    //    true
    //)) {
    //    $message .= 'Invalid file format.';
    //}

    //file_put_contents( __DIR__ . "/Grand Canyon/debug1.txt", print_r($_POST, true));
    $mId = 0;
    $mPlace = "";
    $mDescript = "";
    if(isset($_POST['param1'])) {
       $mId = $_POST['param1']; 
    }
    if(isset($_POST['param2'])) {
       $mPlace = $_POST['param2'];
    }
    if(isset($_POST['param3'])) {
       $mDescript = $_POST['param3'];
    }

$file_path = $file_path . "/" . $mPlace . "/images/";

if (!file_exists($file_path)) {
   mkdir($file_path, 0777, true);
}

//file_put_contents( __DIR__ . "/Grand Canyon/debug2.txt", print_r($file_path, true));

//echo "<pre>";
//print_r ($_FILES);
//echo "</pre>";

    // each file uploaded is put in $_FILES superglobal array, tmp_name is name php gives to file
    $file_path = $file_path . basename($_FILES['uploaded_file']['name']);

    $file = "http://www.webalcove.com/places/" . $mPlace . "/images/" . $_FILES['uploaded_file']['name'];
    $tmpfile = $_FILES['uploaded_file']['tmp_name'];

    // move uploaded file to $file_path
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
    } else {
        echo "fail";
    }

    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
    $query = "INSERT INTO myimages (id, place, linkimage,description) values ('$mId','$mPlace','$file','$mDescript')";
    mysql_query($query) or die(mysql_error());
 ?>
}