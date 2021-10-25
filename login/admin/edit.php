<?php 
include "../../config/connection.php";
$ID = $_POST['ID'];
$Time_start = $_POST['Time_start'];
$Time_end = $_POST['Time_end'];
$Teacher_id = $_POST['Teacher_id'];
$Name = $_POST['Name'];
$Day = $_POST['Day'];
$notation = $_POST['notation'];


 echo $ID.$Time_start.$Time_end .$Teacher_id.$Name.$Day.$notation;

$sql = "UPDATE subjects SET Time_start='$Time_start',Time_end='$Time_end',Teacher_id='$Teacher_id',Name='$Name',Day='$Day',notation='$notation' WHERE ID = '$ID'";

if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
  Header("Location: add_subjects_teacher.php?confirm=3&ID_tr=$Teacher_id");

} else {
  echo "Error updating record: " . $con->error;
}

?>