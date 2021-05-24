
<div class="container">
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Complaint</th>
      <th class="th-sm">Student</th>
      <th class="th-sm">Hostel</th>
      <th class="th-sm">Date</th>
      <th class="th-sm">Permission</th>
      <th class="th-sm">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
while($row = mysqli_fetch_array($query)){
    $complaint_id = $row['complaint_id'];
    $student_id = $row['student_id'];
    $room_id = $row['room_id'];
    $block_id = $row['block_id'];
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
        <a rel="tooltip"  title="Approve" id="a<?php echo $complaint_id; ?>" href="#a<?php echo $complaint_id; ?>" role="button" data-toggle="modal" class="btn btn-success">Approve</a>

        <a rel="tooltip"  title="Rejected" id="r<?php echo $complaint_id; ?>" href="#r<?php echo $complaint_id; ?>" role="button" data-toggle="modal" class="btn btn-danger">Reject</a>
      </td>
<!-- Reject Modal -->
          <div id="r<?php echo $complaint_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      </div>
                        <div class="modal-body">
                            <div class="alert alert-danger">Are you Sure you Want to <strong>Reject</strong>&nbsp;this Complaint?</div>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="reject_complaint.php?id=<?php echo $complaint_id ?>" class="btn btn-danger">Reject</a>
                                </div>
                      </div>
</div>
</div>

<!-- Accept Modal -->
          <div id="a<?php echo $complaint_id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      </div>
                        <div class="modal-body">
                            <div class="alert alert-success">Are you Sure you Want to <strong>Accept</strong>&nbsp;this Complaint?</div>
                                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a href="accept_complaint.php?id=<?php echo $complaint_id ?>" class="btn btn-success">Accept</a>
                                </div>
                      </div>
</div>
</div>

    </tr>
<?php } ?>
  </tbody>
</table>
</div>