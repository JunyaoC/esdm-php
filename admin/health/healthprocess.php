<?php 

include ('../dbconnection.php');

$datepicker = $_POST['fcdate'];



if(!empty($_POST['my_checkbox1'])) 
{
	$date = $datepicker.' 08:00:00' ;
    // user checked the box

	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 08:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}

////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox2'])) 
{
	$date = $datepicker.' 08:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 08:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}
/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox3'])) 
{
	$date = $datepicker.' 09:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 09:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}

///////////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox4'])) 
{
	$date = $datepicker.' 09:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else 
{
	$date = $datepicker.' 09:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox5'])) 
{
	$date = $datepicker.' 10:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 10:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox6'])) 
{
	$date = $datepicker.' 10:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}



} else {

	$date = $datepicker.' 10:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


///////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox7'])) 
{
	$date = $datepicker.' 11:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 11:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}
///////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox8'])) 
{
	$date = $datepicker.' 11:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 11:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox9'])) 
{
	$date = $datepicker.' 12:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 12:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox10'])) 
{
	$date = $datepicker.' 12:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 12:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox11'])) 
{
	$date = $datepicker.' 13:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 13:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}

///////////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox12'])) 
{
	$date = $datepicker.' 13:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else 
{
	$date = $datepicker.' 13:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox13'])) 
{
	$date = $datepicker.' 14:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 14:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox14'])) 
{
	$date = $datepicker.' 14:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}



} else {

	$date = $datepicker.' 14:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


///////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox15'])) 
{
	$date = $datepicker.' 15:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 15:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox16'])) 
{
	$date = $datepicker.' 15:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 15:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox17'])) 
{
	$date = $datepicker.' 16:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 16:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox18'])) 
{
	$date = $datepicker.' 16:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 16:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox19'])) 
{
	$date = $datepicker.' 17:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 17:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}

///////////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox20'])) 
{
	$date = $datepicker.' 17:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else 
{
	$date = $datepicker.' 17:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox21'])) 
{
	$date = $datepicker.' 18:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 18:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox22'])) 
{
	$date = $datepicker.' 18:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}



} else {

	$date = $datepicker.' 18:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


///////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox23'])) 
{
	$date = $datepicker.' 19:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 19:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox24'])) 
{
	$date = $datepicker.' 19:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 19:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox25'])) 
{
	$date = $datepicker.' 20:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 20:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox26'])) 
{
	$date = $datepicker.' 20:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}



} else {

	$date = $datepicker.' 20:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);
}


///////////////////////////////////////////////////////////////////////////////////
if(!empty($_POST['my_checkbox27'])) 
{
	$date = $datepicker.' 21:00:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 21:00:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

/////////////////////////////////////////////////////////////////////////////////////

if(!empty($_POST['my_checkbox28'])) 
{
	$date = $datepicker.' 21:30:00' ;
    // user checked the box
	if(!validateExist($date, $con)){
		$sql = "INSERT INTO tb_appointment_slot (slot_datetime,slot_center_id,slot_stu_id) 
				VALUES ('$date','1',NULL)";

		$results=mysqli_query($con,$sql);
	}


} else {

	$date = $datepicker.' 21:30:00' ;
    // user did not check the box
    $sql = "DELETE FROM tb_appointment_slot WHERE slot_datetime = '$date' ";
    $results=mysqli_query($con,$sql);

}

function validateExist($_datetime, $con){

	$sql = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$_datetime'";
    $result=mysqli_query($con,$sql);
    $rowcount=mysqli_num_rows($result);

    if($rowcount > 0){
    	return true;
    }else{
    	return false;
    }
}

// header('Location: healthslots.php');

echo '<script>
alert("Updated successfully!");
window.location.href="healthslots.php";
</script>';

?>