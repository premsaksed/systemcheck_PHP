<?php 
include "../../config/connection.php";
$ID = $_GET['ID_tr'];
$Teacher_id = $_GET['Teacher_id'];
echo $Teacher_id;
$sql = "DELETE FROM subjects WHERE ID='$ID'";

if ($con->query($sql) === TRUE) {
  echo "Record delete successfully";
  echo $ID;
  Header("Location: add_subjects_teacher.php?confirm=1&ID_tr=$Teacher_id");

} else {
  echo "Error updating record: " . $con->error;
}

?>