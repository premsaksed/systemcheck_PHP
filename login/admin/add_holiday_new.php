<?php
require_once("header.php");
?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">แผนควบคุม</a>
        </li>
        <li class="breadcrumb-item">
          <a href="add_holiday.php">เพิ่มวันหยุดนักขัตฤกษ์</a>
        </li>
        <li class="breadcrumb-item active"> เพิ่มข้อมูลวันหยุดนักขัตฤกษ์</li>
      </ol>
      
<!-- ตารางแสดง เริ่มต้น -->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> แบบฟอร์มบันทึกข้อมูล</div>
        <div class="card-body">
          <div class="table-responsive">
          <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);
                     $Day_holiday = filter_input(INPUT_GET, 'Day_holiday', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">เพิ่มข้อมูลวันหยุดสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                            echo '<font size="3" color="red">เพิ่มข้อมูลไม่สำเร็จ เนื่องจากวันที่ '.$Day_holiday.' มีในระบบอยู่แล้ว ! </font>';
                     }elseif($confirm == "2"){
                      echo '<font size="3" color="red">แก้ไขข้อมูลไม่สำเร็จ ! </font>';
                     }
                     ?>
            




<br><br>
<div class="container">
     
<form class="form-signin-to" action="add_holiday_record1.php" method="POST">
    

    <div align="center" >
       <h2>เพิ่มข้อมูลวันหยุด</h2>
    </div>

       <br>
       <div class="form-group">
       <label>หยุดวัน&nbsp;</label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Sunday" required/>&nbsp;อาทิตย์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Monday" required/>&nbsp;จันทร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Tuesday" required/>&nbsp;อังคาร&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Wednesday" required/>&nbsp;พุธ&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Thursday" required/>&nbsp;พฤหัสบดี&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Friday" required/>&nbsp;ศุกร์&nbsp;
       </label>
       <label class="radio-inline">
       <input name= "Day" type="radio" value="Saturday" required/>&nbsp;เสาร์&nbsp;
       </label>
       </div>

       <div class="form-group">
       <label>หยุดวันที่</label>
       
       <label class="radio-inline">
       <input name= "Day_holiday" type="date" value="" required/>
       </label>
       </div>


       <div class="form-group">
       <label>รายละเอียดวันหยุด</label><br>
       <input class="form-control" type="text" name="Detail_holiday" placeholder="ใส่คำอธิบาย เช่น หยุดวันปีใหม่" required>
       </div>


    <br>
    <div align="center" >
    <input type="submit" class="btn btn-danger" value="บันทึกข้อมูลวันหยุด" >
    <button type="reset" class="btn">ล้างฟอร์มข้อมูล</button>
    
    </div>
    <p>
    <p>

</div>


</form>


            
          </div>
        </div>
        <div class="card-footer small text-muted">อัปเดตเมื่อเวลา <?php Time_now() ?> นาฬิกา</div>
      </div>
    </div>
    <!-- /.container-fluid-->



<?php
require_once("footer.php");
?>