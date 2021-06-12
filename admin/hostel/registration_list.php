

<div class="container">
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Student</th>
      <th class="th-sm">Applied College</th>
      <th class="th-sm">Phase</th>
      <th class="th-sm">Activity</th>
      <th class="th-sm">Reason</th>
      <th class="th-sm">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
while($row = mysqli_fetch_array($query)){
    $reg_id = $row['reg_id'];
    $student_id = $row['student_id'];
    $phase_id = $row['reg_phase'];
    $status = $row['reg_status'];
    $squery = mysqli_query($con,"SELECT * FROM tb_student WHERE student_matric = '$student_id' ") or die(mysqli_error());
    $srow = mysqli_fetch_array($squery);
    $ppquery = mysqli_query($con,"SELECT * FROM tb_hos_phase WHERE phase_id = '$phase_id' ") or die(mysqli_error());
    $pprow = mysqli_fetch_array($ppquery);

?>

    <tr>
      <td>
        <?php echo $srow['student_name'] ?><br>
        <i style="color:grey;font-size: 14px"><?php echo $row['student_id'] ?></i>
      </td>
      <td><?php echo $row['kolej_name'] ?></td>
      <td><?php echo $pprow['phase_name'] ?></td>
      <td><?php echo $row['activity_list']?></td>
      <td><?php echo $row['reason'] ?></td>
<?php if($status == "Pending"){ ?>
        <td>
        <a rel="tooltip"  title="Approve" role="button" href="approve.php?id=<?php echo $reg_id; ?>" class="btn btn-success">Approve</a>

        <a rel="tooltip"  title="Rejected" id="r<?php echo $reg_id; ?>" href="#r<?php echo $reg_id; ?>" role="button" data-toggle="modal" class="btn btn-danger">Reject</a>
      </td>
<?php }else {?>
    <td>
      <i><?php echo $status ?></i>
    </td>
<?php }?>
<!-- Reject Modal -->
          <div id="r<?php echo $reg_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      </div>
                        <div class="modal-body">
                            <div class="alert alert-danger">Are you Sure you Want to <strong>Reject</strong>&nbsp;This Student?</div>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="delete.php?id=<?php echo $reg_id ?>" class="btn btn-danger">Reject</a>
                                </div>
                      </div>
</div>
</div>

<!-- Approve Modal -->

  <div class="modal fade" id="a<?php echo $reg_id;?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Assign Block & Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label class="col-form-label">Select Block:</label>
            <?php
                  $bquery = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.*,tb_hos_block.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id INNER JOIN tb_hos_block ON tb_hos_college.kolej_id = tb_hos_block.hostel_id WHERE tb_hostel_reg.reg_id = '$reg_id' ")or die(mysqli_error()); 

                    echo'<select name="getblock">
                    <option> Select block..</option>';
                        while ($brow = mysqli_fetch_array($bquery)) {
                            echo "<option value='".$brow['block_id']."'>".$brow['block_name']."</option>";

                        }
                    echo'</select>'; 
                ?>
          </div>
          <div class="form-group">
            <label class="col-form-label">Select Room:</label>
                        <?php
                  $rquery = mysqli_query($con,"SELECT tb_hostel_reg.*,tb_hos_college.*,tb_hos_block.*,tb_hos_room.* FROM tb_hostel_reg INNER JOIN tb_hos_college ON tb_hostel_reg.hostel_id = tb_hos_college.kolej_id INNER JOIN tb_hos_block ON tb_hos_college.kolej_id = tb_hos_block.hostel_id INNER JOIN tb_hos_room ON tb_hos_block.block_id = tb_hos_room.block_id WHERE tb_hostel_reg.reg_id = '$reg_id' ")or die(mysqli_error());       
                    echo'<select name="getroom">
                    <option> Select room..</option>';
                        while ($rrow = mysqli_fetch_array($rquery)) {
                            echo "<option value='".$rrow['room_id']."'>".$rrow['room_no']."</option>";
                        }
                    echo'</select>';
                ?>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="regid" value="<?php echo $reg_id; ?>">
        <button name="save1" type="submit" class="btn btn-primary">Save</button> 
         </form>
     </div>  
     
      </div>
  </div>
</div>
      <?php 
          if(isset($_POST['save1'])) {
        $reg_id = $_POST['regid'];
        $block = $_POST['getblock'];
        $room = $_POST['getroom'];

          $sql= "UPDATE tb_hostel_reg SET block_id = '$block', room_id = '$room',reg_status='Accepted' WHERE reg_id = '$reg_id'";
  
        if(mysqli_query($con, $sql)){
            echo '<script> alert("Assigned successfully !");window.location.href="../hostel/register.php"; </script>';
        }
        else{
            echo '<script> alert("Failed to update data !"); </script>';
        }
                  
      } ?>  
    </tr>
<?php } ?>
  </tbody>
</table>
</div>