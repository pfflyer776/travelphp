<?php
 
/*
 * Following code will list all the images
 */
 
// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get all images from myimages table
$result = mysql_query("SELECT * FROM myimages order by myseq") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["images"] = array();
 
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $image = array();
        $image["id"] = $row["id"];
        $image["place"] = $row["place"];
        $image["linkimage"] = $row["linkimage"];
        $image["description"] = $row["description"];
 
        // push single image into final response array
        array_push($response["images"], $image);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No images found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>
 
