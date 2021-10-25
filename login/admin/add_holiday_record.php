<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();




$Day = filter_input(INPUT_POST, 'Day', FILTER_SANITIZE_SPECIAL_CHARS);
$Day_holiday = filter_input(INPUT_POST, 'Day_holiday', FILTER_SANITIZE_SPECIAL_CHARS);
$Detail_holiday = filter_input(INPUT_POST, 'Detail_holiday', FILTER_SANITIZE_SPECIAL_CHARS);



echo $Day;

/* echo $Day;
echo $day;
echo $Birthday_month;
echo $Birthday_year;
echo $Detail_holiday; */
$sql="INSERT INTO holiday (Day, Day_holiday, Detail_holiday) 
VALUES ('$Day','$Day_holiday','$Detail_holiday')";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con, $sql));
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
  		//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		echo"alert('Register Success');";
	    echo"window.location = 'add_holiday.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = 'add_holiday_new.php'; ";
				echo"</script>";
	}


   
#$sqli_insert_holida = mysqli_query($con, "UPDATE holiday SET Day='$Day', Day_holiday='$Day_holiday', Detail_holiday='$Detail_holiday' ");
?>

