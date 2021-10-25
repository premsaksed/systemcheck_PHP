<?php
require_once("header.php");
$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);
$ID_subjects = filter_input(INPUT_GET, 'ID_subjects', FILTER_SANITIZE_SPECIAL_CHARS);


$sql_result_tr = mysqli_query($con, "SELECT Firstname,Lastname FROM user WHERE ID='$ID_tr' ");
while($rows_sql_result_tr = mysqli_fetch_array($sql_result_tr, MYSQLI_ASSOC)){
    $Firstname = $rows_sql_result_tr['Firstname'];
    $Lastname = $rows_sql_result_tr['Lastname'];
}

$sql_result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE ID='$ID_tr' ");
while($rows_sql_result_subjects = mysqli_fetch_array($sql_result_subjects, MYSQLI_ASSOC)){
     $Subjects_code = $rows_sql_result_subjects['Subjects_code'];
     $Name = $rows_sql_result_subjects['Name'];
     $Time_start = $rows_sql_result_subjects['Time_start'];
     $Time_end = $rows_sql_result_subjects['Time_end'];
     $Time_all = $rows_sql_result_subjects['Time_all'];
     $Teacher_id = $rows_sql_result_subjects['Teacher_id'];
     $Day = $rows_sql_result_subjects['Day'];
     $St_class = $rows_sql_result_subjects['St_class'];
     $St_department = $rows_sql_result_subjects['St_department'];
     $Late = $rows_sql_result_subjects['Late'];

     
     $Time_start = second_cover_return($Time_start);
     $Time_end = second_cover_return($Time_end);


     $Time_hour_start   = substr($Time_start,0,2);
     $Time_minute_start   = substr($Time_start,3,2);
     $Time_end_hour   = substr($Time_end,0,2);
     $Time_end_minute   = substr($Time_end,3,2);
     //echo $Time_hour_start;
     ///echo '<br>';
     //echo $Time_minute_start;
     //echo '<br>';
     //echo $Time_second_start;

     $St_class_main = substr($St_class,0,-2);
     $St_class_sub = substr($St_class,-1);

     //echo $St_class_main;
     //echo $St_class_sub;

     
}

$sql = "SELECT * FROM subjects WHERE ID='$ID_tr' ";
$result = $con->query($sql);


?>

 <!-- Breadcrumbs-->
 <ol class="breadcrumb">
 <li class="breadcrumb-item">
   <a href="index.php">แผนควบคุม</a>
 </li>
 <li class="breadcrumb-item">
   <a href="add_subjects.php">จัดการตารางสอนครู</a>
 </li>
 <li class="breadcrumb-item">
   <a href="add_subjects_teacher.php?ID_tr=<?php echo $ID_tr; ?>">ตารางสอนครู <?php echo $Firstname.' '.$Lastname ?></a>
 </li>
 <li class="breadcrumb-item active">แก้ไขตารางสอน</li>
</ol>
     <?php if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  
?> 
<!-- แก้ไขตารางสอน เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แก้ไขตารางสอน</div>
        <div class="card-body">
          <div class="table-responsive">
            
          <?php
          $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

          if($confirm == "1"){
                 echo '<font size="3" color="#008000">แก้ไขข้อมูลตารางสอน ! </font>';
          }elseif($confirm == "0"){
                 echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ</font>';
          }
          ?>
 




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="edit.php" method="POST">
    

    <div align="center" >
       <h2>แก้ไขข้อมูลตารางสอน</h2>
    </div>
    
       
       <div class="form-group">
       <label>ชื่อ</label>
       <input name= "Name" type="text" value="<?php echo $row['Name']; ?>"   required/>
       <input name= "ID" type="text" value="<?php echo $row['ID']; ?>"   required/>
       </div>

       <div class="form-group">
       <label>วันที่สอน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" <?php if($Day == 'Sunday'){ echo 'checked'; } ?> required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" <?php if($Day == 'Monday'){ echo 'checked'; } ?> required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" <?php if($Day == 'Tuesday'){ echo 'checked'; } ?> required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" <?php if($Day == 'Wednesday'){ echo 'checked'; } ?> required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" <?php if($Day == 'Thursday'){ echo 'checked'; } ?> required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" <?php if($Day == 'Friday'){ echo 'checked'; } ?> required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" <?php if($Day == 'Saturday'){ echo 'checked'; } ?> required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <!--****************************************** เวลาเริ่มเรียน *************************************************-->

       <div class="form-group">
       <label>เริ่มเรียนเวลา&nbsp;</label>
       <input class="form-control" type="time" name="Time_start" placeholder="ชื่อวิชา" value="<?php echo $row['Time_start']; ?>" required>
       
       



<!--****************************************** เวลาจบเรียน ***************************************************-->
<div class="form-group">
       <label>หมดเรียนเวลา&nbsp;</label>
       <input class="form-control" type="time" name="Time_end" placeholder="ชื่อวิชา" value="<?php echo $row['Time_end']; ?>" required>
       
       </div>

      
       



       <label>&nbsp;หมายเหตุ&nbsp;</label>
       <input class="form-control" type="text" name="notation" placeholder="หมายเหตุ" value="<?php echo $row['notation']; ?>" required>
       <input class="form-control" type="text" name="Teacher_id" placeholder="Teacher_id" value="<?php echo $row['Teacher_id']; ?>" required>
       

       </div>

       



<!-- เวลาจบเรียน -->
    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="แก้ไขตารางสอน" >
    <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>
    
    </div>
    <p>
    </form>
    <p>

</div>

<?php }
} else {
  echo "0 results";
}
?>


            
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->
<!-- ตารางแสดงรายชื่อ จบ -->


<?php
require_once("footer.php");
?>



