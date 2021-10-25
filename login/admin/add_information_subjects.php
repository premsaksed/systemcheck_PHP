<?php
require_once("header.php");
$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);

$sql_result_tr = mysqli_query($con, "SELECT Firstname,Lastname FROM user WHERE ID='$ID_tr' ");
while ($rows_sql_result_tr = mysqli_fetch_array($sql_result_tr, MYSQLI_ASSOC)) {
       $Firstname = $rows_sql_result_tr['Firstname'];
       $Lastname = $rows_sql_result_tr['Lastname'];
}
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
       <li class="breadcrumb-item">
              <a href="index.php">แผนควบคุม</a>
       </li>
       <li class="breadcrumb-item">
              <a href="add_subjects.php">จัดการตารางเวรครู</a>
       </li>
       <li class="breadcrumb-item">
              <a href="add_subjects_teacher.php?ID_tr=<?php echo $ID_tr; ?>">ตารางเวรครู <?php echo $Firstname . ' ' . $Lastname ?></a>
       </li>
       <li class="breadcrumb-item active">สร้างตารางเวร</li>
</ol>

<!-- สร้างตารางสอน เริ่มต้น -->
<!-- Example DataTables Card-->
<div class="card mb-3">
       <div class="card-header">
              <i class="fa fa-table"></i> สร้างตารางเวร
       </div>
       <div class="card-body">
              <div class="table-responsive">

                     <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

                     if ($confirm == "1") {
                            echo '<font size="3" color="#008000">เพิ่มข้อมูลตารางสอน ! </font>';
                     } elseif ($confirm == "0") {
                            echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ</font>';
                     }
                     ?>





                     <br><br>
                     <div class="container">

                            <form class="form-signin-to" action="add_subjects_teacher_record.php?ID_tr=<?php echo $ID_tr; ?>" method="POST">


                                   <div align="center">
                                          <h2>เพิ่มข้อมูลตารางเวร</h2>
                                   </div>
                                   <?php $Name = "$Firstname $Lastname"; ?>
                                   <br>
                                   <div class="form-group">
                                          <input name="Name" type="text" value="<?php echo $Name; ?>" readonly />
                                   </div>
                                   <div class="form-group">
                                          <label>วันที่สอน&nbsp;</label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Sunday" required />&nbsp;อาทิตย์&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Monday" required />&nbsp;จันทร์&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Tuesday" required />&nbsp;อังคาร&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Wednesday" required />&nbsp;พุธ&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Thursday" required />&nbsp;พฤหัสบดี&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Friday" required />&nbsp;ศุกร์&nbsp;
                                          </label>
                                          <label class="radio-inline">
                                                 <input name="Day" type="radio" value="Saturday" required />&nbsp;เสาร์&nbsp;
                                          </label>
                                   </div>

                                   <!--****************************************** เวลาเริ่มเรียน *************************************************-->

                                   <div class="form-group">
                                          <label>เริ่มเรียนเวลา&nbsp;</label>
                                          <input name="Time_start" type="time" value="Saturday" required />

                                          <!--****************************************** เวลาเริ่มเรียน *************************************************-->

                                          <label> - </label>

                                          <!--****************************************** เวลาจบเรียน ***************************************************-->
                                         
                                          <input name="Time_end" type="time" value="Saturday" required />
                                          <br>
                                          <label>กรอกหมายเหตุ :</label> <br>
                                          <textarea name="notation" id="notation" cols="65" rows="5"></textarea>




                                   </div>



                                   <!-- checkbox หลายอัน radio 1 อัน-->

                                   <!-- เวลาจบเรียน -->
                                   <br>
                                   <div align="center">
                                          <input type="submit" class="btn btn-danger" value="สร้างตารางสอน">
                                          <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>

                                   </div>
                                   <p>
                            </form>
                            <p>

                     </div>





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