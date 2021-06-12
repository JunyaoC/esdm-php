
<div class="container">
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Complaint</th>
      <th class="th-sm">Student</th>
      <th class="th-sm">Hostel</th>
      <th class="th-sm">Date</th>
      <th class="th-sm">Permission</th>
      <th class="th-sm">Technician</th>
    </tr>
  </thead>
  <tbody>
    <?php 
while($row = mysqli_fetch_array($query)){
    $complaint_id = $row['complaint_id'];
    $student_id = $row['student_id'];
    $room_id = $row['room_id'];
    $block_id = $row['block_id'];
    $tech_id = $row['tech_id'];
    $permission = $row['permission'];
    $squery = mysqli_query($con,"SELECT * FROM tb_student WHERE student_matric = '$student_id' ") or die(mysqli_error());
    $srow = mysqli_fetch_array($squery);
    $rrquery = mysqli_query($con,"SELECT * FROM tb_hos_room WHERE room_id = '$room_id' ") or die(mysqli_error());
    $rrrow = mysqli_fetch_array($rrquery);
    $bbquery = mysqli_query($con,"SELECT * FROM tb_hos_block WHERE block_id = '$block_id' ") or die(mysqli_error());
    $bbrow = mysqli_fetch_array($bbquery);

?>

    <tr>
              <td><?php echo $row['complaint_reason'] ?></td>
      <td>
        <?php echo $srow['student_name'] ?><br>
        <i style="color:grey;font-size: 14px"><?php echo $row['student_id'] ?></i>
      </td>
      <td>
        <?php echo $row['kolej_name'] ?><br>
        <i style="color:grey;font-size: 14px"><?php echo $bbrow['block_name'] ?> | <?php echo $rrrow['room_no'] ?></i>  
        </td>
      <td><?php echo $row['complaint_date']?></td>
      <td><?php if($permission == 1){
        echo 'Yes';
      }else{
        echo 'No';
      } ?></td>
      <td>

      	<?php echo $row['tech_name']; ?>

      </td>

    </tr>
<?php } ?>
  </tbody>
</table>
</div>