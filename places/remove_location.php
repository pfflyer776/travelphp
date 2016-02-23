<?php
 
/*
 * Following code will create a new location row
 * All location details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['id'])){
 
    $id = $_POST['id'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql delete a row
    $result = mysql_query("DELETE FROM myimages where id = CAST('$id' as unsigned integer)");
    $result = mysql_query("DELETE FROM myplaces where id = CAST('$id' as unsigned integer)");
 
    // check if row deleted or not
    if ($result) {
        // successfully removed from database
        $response["success"] = 1;
        $response["message"] = "Location successfully deleted.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to remove row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
