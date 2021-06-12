<?php
  include('../dbconnection.php');
  include('../adminsession.php');

	if(isset($_POST['datepicker']))
	{
		$date = $_POST['datepicker'];
		$_SESSION['date'] = $date;
	}
	else
	{
		$date = $_SESSION['date'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include '../pages-styling.php';
?>
<!-- for calendar/date picker-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

  <script>
  $( function() {
  	var dateToday = new Date();
    $( "#datepicker" ).datepicker({
    	dateFormat: 'yy/mm/dd',
    	minDate: dateToday}).datepicker("setDate", new Date());;
  } );
  </script>
</head>

<!-- FOR SLIDERS/TOGGLE BUTTON--->
<style>
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	.switch input { 
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
</style>


<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue" data-active-color="danger">
      <div class="logo">
        <a href="../admin/dashboard.php" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../img/logo.png">
          </div>
        </a>
        <a href="../admin/dashboard.php" class="simple-text logo-normal">ESDM Admin Panel</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <li>
            <a>
              <p>Health</p>
            </a>
          </li> 
          <li>
            <a href="../health/health.php">
              <i class="fa fa-bars"></i>
              <p>Manage Health</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" style="padding: 1rem;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">ESDM Admin Health Page</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#logout" style="color:white;"> Log out &nbsp <i class="fa fa-sign-out "></i></button>
              
              </li>
            </ul>
          </div>
        </div>
      </nav>

	    <div style="display: flex; justify-content: flex-start;align-items: center; width: 100%;margin-top: 5rem; margin-bottom: 1rem;">
	      <button class="btn btn-secondary" onclick="window.location.href='health.php' ">Manage Slots</button>
	      <button class="btn btn-secondary" onclick="window.location.href='healthappointment.php' ">View Appointments</button>
	    </div>

		<form method='POST' action='healthprocess.php'>
			<div style="display: flex; justify-content: space-between;align-items: center; width: 100%;">
			<div class="form group">
				<label for="date" style="color:black; font-size:1rem">Slots for the day :<?php echo $date; ?> </label>
				<input type="text" id=fcdate name=fcdate hidden name="begin" value="<?php echo $date; ?>">
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
			</div>

			<?php 
				$selected1 = '0'; $datetime1 = $date.' 08:00:00'; 
				$selected2 = '0'; $datetime2 = $date.' 08:30:00';
				$selected3 = '0'; $datetime3 = $date.' 09:00:00';
				$selected4 = '0'; $datetime4 = $date.' 09:30:00';
				$selected5 = '0'; $datetime5 = $date.' 10:00:00';
				$selected6 = '0'; $datetime6 = $date.' 10:30:00';
				$selected7 = '0'; $datetime7 = $date.' 11:00:00';
				$selected8 = '0'; $datetime8 = $date.' 11:30:00';
				$selected9 = '0'; $datetime9 = $date.' 12:00:00'; 
				$selected10 = '0'; $datetime10 = $date.' 12:30:00';
				$selected11 = '0'; $datetime11 = $date.' 13:00:00';
				$selected12 = '0'; $datetime12 = $date.' 13:30:00';
				$selected13 = '0'; $datetime13 = $date.' 14:00:00';
				$selected14 = '0'; $datetime14 = $date.' 14:30:00';
				$selected15 = '0'; $datetime15 = $date.' 15:00:00';
				$selected16 = '0'; $datetime16 = $date.' 15:30:00';
				$selected17 = '0'; $datetime17 = $date.' 16:00:00';
				$selected18 = '0'; $datetime18 = $date.' 16:30:00';
				$selected19 = '0'; $datetime19 = $date.' 17:00:00'; 
				$selected20 = '0'; $datetime20 = $date.' 17:30:00';
				$selected21 = '0'; $datetime21 = $date.' 18:00:00';
				$selected22 = '0'; $datetime22 = $date.' 18:30:00';
				$selected23 = '0'; $datetime23 = $date.' 19:00:00';
				$selected24 = '0'; $datetime24 = $date.' 19:30:00';
				$selected25 = '0'; $datetime25 = $date.' 20:00:00';
				$selected26 = '0'; $datetime26 = $date.' 20:30:00';
				$selected27 = '0'; $datetime27 = $date.' 21:00:00';
				$selected28 = '0'; $datetime28 = $date.' 21:30:00';

				$sql1 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime1' ";
				$result= mysqli_query($con,$sql1);
				$count = mysqli_num_rows($result);

				if($count > 0)
				{
					$selected1 = '1';
				}


				$sql2 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime2' ";
				$result2= mysqli_query($con,$sql2);
				$count2 = mysqli_num_rows($result2);

				if($count2 > 0)
				{
					$selected2 = '1';
				}

				$sql3 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime3' ";
				$result3= mysqli_query($con,$sql3);
				$count3 = mysqli_num_rows($result3);

				if($count3 > 0)
				{
					$selected3 = '1';
				}

				$sql4 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime4' ";
				$result4 = mysqli_query($con,$sql4);
				$count4 = mysqli_num_rows($result4);

				if($count4 > 0)
				{
					$selected4 = '1';
				}

				$sql5 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime5' ";
				$result5 = mysqli_query($con,$sql5);
				$count5 = mysqli_num_rows($result5);

				if($count5 > 0)
				{
					$selected5 = '1';
				}

				$sql6 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime6' ";
				$result6 = mysqli_query($con,$sql6);
				$count6 = mysqli_num_rows($result6);

				if($count6 > 0)
				{
					$selected6 = '1';
				}

				$sql7 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime7' ";
				$result7 = mysqli_query($con,$sql7);
				$count7 = mysqli_num_rows($result7);

				if($count7 > 0)
				{
					$selected7 = '1';
				}	

				$sql8 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime8' ";
				$result8 = mysqli_query($con,$sql8);
				$count8 = mysqli_num_rows($result8);

				if($count8 > 0)
				{
					$selected8 = '1';
				}

				$sql9 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime9' ";
				$result9 = mysqli_query($con,$sql9);
				$count9 = mysqli_num_rows($result9);

				if($count9 > 0)
				{
					$selected9 = '1';
				}

				$sql10 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime10' ";
				$result10 = mysqli_query($con,$sql10);
				$count10 = mysqli_num_rows($result10);

				if($count10 > 0)
				{
					$selected10 = '1';
				}

				$sql11 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime11' ";
				$result11 = mysqli_query($con,$sql11);
				$count11 = mysqli_num_rows($result11);

				if($count11 > 0)
				{
					$selected11 = '1';
				}

				$sql12 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime12' ";
				$result12= mysqli_query($con,$sql12);
				$count12 = mysqli_num_rows($result12);

				if($count12 > 0)
				{
					$selected12 = '1';
				}

				$sql13 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime13' ";
				$result13= mysqli_query($con,$sql13);
				$count13 = mysqli_num_rows($result13);

				if($count13 > 0)
				{
					$selected13 = '1';
				}

				$sql14 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime14' ";
				$result14 = mysqli_query($con,$sql14);
				$count14 = mysqli_num_rows($result14);

				if($count14 > 0)
				{
					$selected14 = '1';
				}

				$sql15 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime15' ";
				$result15 = mysqli_query($con,$sql15);
				$count15 = mysqli_num_rows($result15);

				if($count15 > 0)
				{
					$selected15 = '1';
				}

				$sql16 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime16' ";
				$result16 = mysqli_query($con,$sql16);
				$count16 = mysqli_num_rows($result16);

				if($count16 > 0)
				{
					$selected16 = '1';
				}

				$sql17 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime17' ";
				$result17 = mysqli_query($con,$sql17);
				$count17 = mysqli_num_rows($result17);

				if($count17 > 0)
				{
					$selected17 = '1';
				}	

				$sql18 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime18' ";
				$result18 = mysqli_query($con,$sql18);
				$count18 = mysqli_num_rows($result18);

				if($count18 > 0)
				{
					$selected18 = '1';
				}

				$sql19 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime19' ";
				$result19 = mysqli_query($con,$sql19);
				$count19 = mysqli_num_rows($result19);

				if($count19 > 0)
				{
					$selected19 = '1';
				}

				$sql20 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime20' ";
				$result20 = mysqli_query($con,$sql20);
				$count20 = mysqli_num_rows($result20);

				if($count20 > 0)
				{
					$selected20 = '1';
				}

				$sql21 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime21' ";
				$result21 = mysqli_query($con,$sql21);
				$count21 = mysqli_num_rows($result21);

				if($count21 > 0)
				{
					$selected21 = '1';
				}

				$sql22 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime22' ";
				$result22= mysqli_query($con,$sql22);
				$count22 = mysqli_num_rows($result22);

				if($count22 > 0)
				{
					$selected22 = '1';
				}

				$sql23 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime23' ";
				$result23= mysqli_query($con,$sql23);
				$count23 = mysqli_num_rows($result23);

				if($count23 > 0)
				{
					$selected23 = '1';
				}

				$sql24 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime24' ";
				$result24 = mysqli_query($con,$sql24);
				$count24 = mysqli_num_rows($result24);

				if($count24 > 0)
				{
					$selected24 = '1';
				}

				$sql25 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime25' ";
				$result25 = mysqli_query($con,$sql25);
				$count25 = mysqli_num_rows($result25);

				if($count25 > 0)
				{
					$selected25 = '1';
				}

				$sql26 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime26' ";
				$result26 = mysqli_query($con,$sql26);
				$count26 = mysqli_num_rows($result26);

				if($count26 > 0)
				{
					$selected26 = '1';
				}

				$sql27 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime27' ";
				$result27 = mysqli_query($con,$sql27);
				$count27 = mysqli_num_rows($result27);

				if($count27 > 0)
				{
					$selected27 = '1';
				}	

				$sql28 = "SELECT * FROM tb_appointment_slot WHERE slot_datetime = '$datetime28' ";
				$result28 = mysqli_query($con,$sql28);
				$count28 = mysqli_num_rows($result28);

				if($count28 > 0)
				{
					$selected28 = '1';
				}

				
			?>
		<div style="font-size: 1.2rem;display: flex;justify-content: space-between;align-items: flex-start;">
			<table style="color:black;width: 50%;">
				<thead>
				  <tr>
				    <th>Slot Time</th>
				    <th>Availability</th>
				  </tr>
				</thead>

				<tr>
					<td><label for="date">8:00 a.m.</label></td>
					<td>			
						<div class="form group">

						<label class="switch">
						  <input type="checkbox" id='my_checkbox1' name='my_checkbox1'  <?php if($selected1 =='1')echo 'checked'; ?>>
						  <span class="slider round"></span>
						</label>
						</div>
					</td>
				</tr>


				<tr>
					<td><label for="date">8:30 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox2'  <?php if($selected2 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">9:00 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox3'  <?php if($selected3 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">9:30 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox4'  <?php if($selected4 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">10:00 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox5'  <?php if($selected5 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">10:30 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox6'  <?php if($selected6 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">11:00 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox7'  <?php if($selected7 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>				


				<tr>
					<td><label for="date">11:30 a.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox8'  <?php if($selected8 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">12:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox9'  <?php if($selected9 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">12:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox10'  <?php if($selected10 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">1:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox11'  <?php if($selected11 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">1:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox12'  <?php if($selected12 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">2:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox13'  <?php if($selected13 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">2:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox14'  <?php if($selected14 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				

			
			</table>
			<table style="color:black;width: 50%;">
				<thead>
				  <tr>
				    <th>Slot Time</th>
				    <th>Availability</th>
				  </tr>
				</thead>
				<tr>
					<td><label for="date">3:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox15'  <?php if($selected15 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>				


				<tr>
					<td><label for="date">3:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox16'  <?php if($selected16 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">4:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox17'  <?php if($selected17 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>				


				<tr>
					<td><label for="date">4:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox18'  <?php if($selected18 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">5:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox19'  <?php if($selected19 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">5:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox20'  <?php if($selected20 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">6:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox21'  <?php if($selected21 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">6:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox22'  <?php if($selected22 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">7:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox23'  <?php if($selected23 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">7:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox24'  <?php if($selected24 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">8:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox25'  <?php if($selected25 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>				


				<tr>
					<td><label for="date">8:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox26'  <?php if($selected26 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">9:00 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox27'  <?php if($selected27 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>

				<tr>
					<td><label for="date">9:30 p.m.</label></td>
					<td>			
							<div class="form group">

							<label class="switch">
							  <input type="checkbox" id='my_checkbox1' name='my_checkbox28'  <?php if($selected28 =='1')echo 'checked'; ?>>
							  <span class="slider round"></span>
							</label>
							</div>
					</td>
				</tr>
			</table>
		</div>

        <div class="modal fade" id="logout" role="dialog">
	        <div class="modal-dialog">
	            <!-- Modal content-->
		        <div class="modal-content">
			        <div class="modal-header">
				        <h4 class="modal-title">Confirmation on Logout</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        <div class="modal-body">
			       		<p>Are you sure you want to log out from the system?</p>
			        </div>
			        <div class="modal-footer">
				        <button type="button" class="btn btn-primary btn-labeled" data-dismiss="modal">No <i class="fa fa-times"></i></button>
				        <a href="../logout.php"><button type="submit" name="submit" class="btn btn-warning btn-labeled">Yes <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button></a>
			        </div>
		        </div>                                                
	        </div>
        </div>

  		<br> <br>
      
    </div>
  </div>
  <!--   Core JS Files   -->

  <script src="../js/core/popper.min.js"></script>
  <script src="../js/core/bootstrap.min.js"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
</body>

</html>
