<?php 
include "../../config/connection.php";
$ID = $_GET['ID_tr'];

date_default_timezone_set("Asia/Bangkok");
echo "The time is " . date("Y-m-d h:i:sa");
$date2 = date("Y-m-d h:i:sa");
 echo $ID;

$sql = "UPDATE subjects SET time = '$date2' WHERE ID = '$ID'";

if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
  echo 'window.alert("sometext")';
  Header("Location: subjects.php?confirm=3");


} else {
  echo "Error updating record: " . $con->error;
}

?>