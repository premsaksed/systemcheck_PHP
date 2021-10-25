<?php
require_once("header.php");
$ID_holiday = filter_input(INPUT_GET, 'ID_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

$sqi_result_holiday = mysqli_query($con, "SELECT * FROM holiday WHERE ID='$ID_holiday' ");
while($rows_sqi_result_holiday = mysqli_fetch_array($sqi_result_holiday, MYSQLI_ASSOC)){
    $Day = $rows_sqi_result_holiday['Day'];
    $Day_holiday = $rows_sqi_result_holiday['Day_holiday'];
    $Detail_holiday = $rows_sqi_result_holiday['Detail_holiday'];

    $sub_Date   = substr($Day_holiday,0,-8);
    $sub_Month = substr($Day_holiday,3,-5);
    $sub_Year = substr($Day_holiday,6);
    
    }
?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_holiday.php">เพิ่มวันหยุดนักขัตฤกษ์</a>
        </li>
        <li class="breadcrumb-item active"> แก้ไขข้อมูลวันหยุดนักขัตฤกษ์</li>
      </ol>
      
<!-- ตารางแสดง เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มแก้ไขข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $Day_holiday = filter_input(INPUT_GET, 'Day_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">แก้ไขข้อมูลวันหยุดสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ เนื่องจากวันที่ '.$Day_holiday.' มีในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ ! </font>';
                     }
                     ?>
            




<br><br>
<div class="container">
     
    <form class="form-signin-to" action="add_holiday_record1.php?edit=1&ID_holiday=<?php echo $ID_holiday; ?>" method="POST">


    <div align="center" >
       <h2>แก้ไขข้อมูลวันหยุด</h2>
    </div>

       <br>
       <div class="form-group">
       <label>หยุดวัน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" <?php if($Day == "Sunday"){ echo 'checked'; } ?> required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" <?php if($Day == "Monday"){ echo 'checked'; } ?> required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" <?php if($Day == "Tuesday"){ echo 'checked'; } ?> required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" <?php if($Day == "Wednesday"){ echo 'checked'; } ?> required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" <?php if($Day == "Thursday"){ echo 'checked'; } ?> required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" <?php if($Day == "Friday"){ echo 'checked'; } ?> required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" <?php if($Day == "Saturday"){ echo 'checked'; } ?> required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <div class="form-group">
       <label>หยุดวันที่</label>
       <label class="radio-inline">
       <input name= "Day_holiday" type="date" value="Saturday" <?php if($Day == "Saturday"){ echo 'checked'; } ?> required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>


       <div class="form-group">
       <label>รายละเอียดวันหยุด</label><br>
       <input class="form-control" type="text" name="Detail_holiday" placeholder="ใส่คำอธิบาย เช่น หยุดวันปีใหม่" value="<?php echo $Detail_holiday; ?>" required>
       </div>


    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="บันทึกข้อมูลวันหยุด" >
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



<?php
require_once("footer.php");
?>