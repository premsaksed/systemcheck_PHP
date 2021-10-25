<?php
require_once("header.php");
$ID_tr = filter_input(INPUT_GET, 'ID_tr', FILTER_SANITIZE_SPECIAL_CHARS);

$sql_result_tr = mysqli_query($con, "SELECT Firstname,Lastname FROM user WHERE ID='$ID_tr' ");
while($rows_sql_result_tr = mysqli_fetch_array($sql_result_tr, MYSQLI_ASSOC)){
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
   <a href="add_subjects.php">จัดการตารางสอนครู</a>
 </li>
 <li class="breadcrumb-item active"> ตารางสอนครู <?php echo $Firstname.' '.$Lastname ?></li>
</ol>

<!-- ตารางแสดงรายชื่อ เริ่มต้น -->
<!-- Example DataTables Card-->
<div class="card mb-3">
 <div class="card-header">
   <i class="fa fa-table"></i> จัดการตารางสอนครู</div>
          


          <div class="card-body">
             <div class="row">
               <div class="col-sm-2 text-center my-auto">
                  <a  class="fa fa-plus btn btn-primary" href="add_information_subjects.php?ID_tr=<?php echo $ID_tr; ?>"> เพิ่มตารางสอน</a>
               </div>      
               <?php
                     $confirm = filter_input(INPUT_GET, 'confirm', FILTER_SANITIZE_SPECIAL_CHARS);

                     if($confirm == "1"){
                            echo '<font size="3" color="#008000">ลบตารางสอนสำเร็จ ! </font>';
                     }elseif($confirm == "0"){
                      echo '<font size="3" color="red">ลบข้อมูลไม่สำเร็จ ! </font>';
               }elseif($confirm == "3"){
                echo '<font size="3" color="#008000">อัพข้อมูลเสร็จสิ้น ! </font>';
         }
            ?>     
            </div>
          </div>


<script>
// When the user clicks on div, open the popup แสดง pop รหัสนักศึกษา
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");    
}
</script>


        <div class="card-body">
          <div class="table-responsive">

          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th style="width:20%">วันที่เข้าเวร</th>
                  <th style="width:20%">เวลาเข้าเวร</th>
                  <th style="width20%">วันเวลาลงชื่อเข้าเวร</th>
                  <th style="width:20%">หมายเหตุ</th>
                  <th style="width:20%">หลักฐาน</th>
                  <th style="width:20%">แก้ไข/ลบ</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                         
                <th style="width:20%">วันที่เข้าเวร</th>
                  <th style="width:20%">เวลาเข้าเวร</th>
                  <th style="width:20%">หมายเหตุ</th>
                  <th>แก้ไข/ลบ</th>
                </tr>
              </tfoot>
              <tbody>

              <!--<div class="popup" onmouseover="myFunction()" onmouseout="myFunction()">3000-2003<span class="popuptext" id="myPopup">A Simple Popup!</span></div>-->

                <!--<tr class="list-group-item-action list-group-item-danger">
                  <td style="text-align:center"><div class="popup" onmouseover="myFunction()" onmouseout="myFunction()">3000-2003<span class="popuptext" id="myPopup">เวลา 10:30-10:40</span></div></td>
                  <td><font size="3" color="red">วิทยาศาสตร์และเทคโนโลยี</font></td>
                  <td>ปวส.2/1</td>
                  <td>10:32:50</td>
                  <td style="text-align:center"><a data-toggle="modal" data-target="#delet"><button class="btn btn-primary fa fa-pencil-square-o" type="submit"></button>&ensp;<a data-toggle="modal" data-target="#delet"><button class="btn btn-danger fa fa-times" type="submit"></button></td>
                  <td><a data-toggle="modal" data-target="#delet"><button class="btn btn-danger btn-block fa fa-arrow-circle-right" type="submit"></button></td>
                </tr>-->

              <?php

              $result_subjects = mysqli_query($con, "SELECT * FROM subjects WHERE Teacher_id='$ID_tr' ");
                
              if($result_subjects){

                while($row_subjects = mysqli_fetch_array($result_subjects, MYSQLI_ASSOC)){
                  $subjects_ID = $row_subjects['ID'];
                  $subjects_Time_start = $row_subjects['Time_start'];
                  $subjects_Time_end = $row_subjects['Time_end'];
                  $subjects_Teacher_id = $row_subjects['Teacher_id'];
                  $Name = $row_subjects['Name'];
                  $subjects_Day = $row_subjects['Day'];
                  $notation = $row_subjects['notation'];
                  $time = $row_subjects['time'];
 
                  

                  echo "<tr>";
                  
                  echo '<td style="text-align:center">'; echo Day_th($subjects_Day); echo'</td>';
                  echo '<td style="text-align:center">'; echo $subjects_Time_start."-"; echo $subjects_Time_end.'</td>';
                  echo "<td>$time</td>";
                  echo "<td>$notation</td>";
                  echo "<td> <button class='btn btn-success'> ดูหลักฐาน </button> </td>";
                  //echo "<td style='text-align:center'><a data-toggle='modal' data-target='#edit_teacher_new.php$subjects_ID'><button class='btn btn-primary fa fa-pencil-square-o' type='submit'></button></a>&ensp;<a data-toggle='modal' data-target='#delet_tr$ID_tr'><button class='btn btn-danger fa fa-times' type='submit'></button></a></td>";
                  echo '<td><a href="edit_subjects_new.php?ID_tr='.$subjects_ID.'"><button class="btn btn-primary fa fa-pencil-square-o"type="submit"></button></a>&ensp;<a href="del_subjects_new.php?Teacher_id='.$subjects_Teacher_id.'&&ID_tr='.$subjects_ID.'"><button class="btn btn-danger fa fa-times" type="submit"></button></a></td>';
                  // echo "<td style='text-align:center'><a data-toggle='modal' data-target='#edit_subjects_new$subjects_ID'><button class='btn btn-primary fa fa-pencil-square-o' type='submit'></button></a>&ensp;<a data-toggle='modal' data-target='#delet_subjects$subjects_ID'><button class='btn btn-danger fa fa-times' type='submit'></button></a></td>";
                  echo "</tr>";

                  echo "<script>";
                  echo "function myFunction$subjects_ID() {";
                  echo 'var popup'.$subjects_ID.' = document.getElementById("myPopup'.$subjects_ID.'");';
                  echo 'popup'.$subjects_ID.'.classList.toggle("show");';
                  echo "}";
                  echo "</script>";

                }

              }
              ?>


              </tbody>
            </table>
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