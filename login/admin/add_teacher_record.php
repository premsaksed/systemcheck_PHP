<?php
session_start();
require("../../config/connection.php");
require("../../config/function_time.php");
require("../../config/function.php");

Checkadmin();

$Username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$Firstname = filter_input(INPUT_POST, 'Firstname', FILTER_SANITIZE_SPECIAL_CHARS);
$Lastname = filter_input(INPUT_POST, 'Lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$sex = filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_SPECIAL_CHARS);
$Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_SPECIAL_CHARS);



$edit = filter_input(INPUT_GET, 'edit', FILTER_SANITIZE_SPECIAL_CHARS);
$id_main = filter_input(INPUT_GET, 'id_main', FILTER_SANITIZE_SPECIAL_CHARS);

if($edit == '1'){
    $sql="UPDATE user SET Username='$Username',sex='$sex',Firstname='$Firstname',Lastname='$Lastname',email='$email',phone='$phone' WHERE ID='$id_main'";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con, $sql));
	mysqli_close($con);
	  		//ถ้าสำเร็จให้ขึ้นอะไร
		if ($result){
			echo "<script type='text/javascript'>";
			echo"alert('Register Success');";
		    echo"window.location = 'add_teacher.php';";
			echo "</script>";
			}
			else {
				//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
					echo "<script type='text/javascript'>";
					echo "alert('error!');";
					echo"window.location = 'add_teacher_new.php'; ";
					echo"</script>";}
}else{   
        $result_insert_to_record = mysqli_query($con, "INSERT INTO user (Username, Password, sex, Firstname, Lastname, email, phone, Userlevel) VALUES ('$Username','$Password','$sex','$Firstname','$Lastname','$email','$phone','T')");
        Header("Location: add_teacher.php?confirm=1&id_main=$id_main");
        }




echo '<br>';


// $sql="INSERT INTO user (Username, Password, sex, Firstname, Lastname, email, phone, Userlevel) VALUES ('$Username','$Password','$sex','$Firstname','$Lastname','$email','$phone','T')";
// $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error($con, $sql));
	
// 	//ปิดการเชื่อมต่อ database
// 	mysqli_close($con);
//   		//ถ้าสำเร็จให้ขึ้นอะไร
// 	if ($result){
// 		echo "<script type='text/javascript'>";
// 		echo"alert('Register Success');";
// 	    echo"window.location = 'add_teacher.php';";
// 		echo "</script>";
// 		}
// 		else {
// 			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
// 				echo "<script type='text/javascript'>";
// 				echo "alert('error!');";
// 				echo"window.location = 'add_teacher_new.php'; ";
// 				echo"</script>";
// 	}

?>

