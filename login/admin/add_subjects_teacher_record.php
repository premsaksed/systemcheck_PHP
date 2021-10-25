<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$Name = filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_SPECIAL_CHARS);
$notation = filter_input(INPUT_POST, 'notation', FILTER_SANITIZE_SPECIAL_CHARS);
$Day = filter_input(INPUT_POST, 'Day', FILTER_SANITIZE_SPECIAL_CHARS);
$Time_start = filter_input(INPUT_POST, 'Time_start', FILTER_SANITIZE_SPECIAL_CHARS);
//$Time_start_minute = filter_input(INPUT_POST, 'Time_start_minute', FILTER_SANITIZE_SPECIAL_CHARS);
$Time_end = filter_input(INPUT_POST, 'Time_end', FILTER_SANITIZE_SPECIAL_CHARS);
// $Time_end_minute = filter_input(INPUT_POST, 'Time_end_minute', FILTER_SANITIZE_SPECIAL_CHARS);


$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);

$edit = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);
$ID_subjects = filter_input(INPUT_GET, 'ID_subjects', FILTER_SANITIZE_SPECIAL_CHARS);

echo $ID_tr;
echo '<br>';
echo $Name;
echo '<br>';
echo $Subjects_code;
echo '<br>';
echo $Day;
echo '<br>';

// $Time_start_uncover = $Time_start_hour.'-'.$Time_start_minute.'-00';
// $Time_end_uncover = $Time_end_hour.'-'.$Time_end_minute.'-00';
// $Time_start = Time_cover($Time_start_uncover);
// $Time_end = Time_cover($Time_end_uncover);

echo '<br>';


if($edit == '1'){
    $result_subjects = mysqli_query($con, "SELECT ID FROM subjects WHERE Teacher_id='$ID_tr' AND ID='$ID_subjects' ");
    if(mysqli_num_rows($result_subjects) >= '1'){
        $result_insert_to_record = mysqli_query($con, "UPDATE subjects SET  Time_start='$Time_start', Time_end='$Time_end',  Teacher_id='$ID_tr', Name='$Name', Day='$Day',  notation='$notation' WHERE ID='$ID_subjects' AND Teacher_id='$ID_tr' ");
        Header("Location: edit_subjects_new.php?confirm=1&ID_subjects=$ID_subjects&ID_tr=$ID_tr");
    }else{
        Header("Location: edit_subjects_new.php?confirm=0&ID_subjects=$ID_subjects&ID_tr=$ID_tr");
    }

}else{
$result_insert_to_record = mysqli_query($con, "INSERT INTO subjects (Time_start, Time_end, Teacher_id, Name, Day, notation) VALUES ('$Time_start','$Time_end','$ID_tr','$Name','$Day','$notation')");
Header("Location: add_information_subjects.php?confirm=1&ID_tr=$ID_tr");
}