
<div >
  <h3>Schools</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">SCH ID.</th>
        <th class="text-center">School Name</th>
        <th class="text-center">Location</th>
        <th class="text-center">No of Students</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from category";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td>CAU_SCH<?=$row["school_id"]?></td>
      <td><?=$row["school_name"]?></td>   
      <td><?=$row["location"]?></td>

      <?php
      $sid = $row["school_id"];
      $sqlNOS = "SELECT * from product where school_id=$sid";
      $noOfStudents = $conn-> query($sqlNOS);
      $stdcount=0;
      if ($noOfStudents-> num_rows > 0){
        while ($row=$noOfStudents-> fetch_assoc()) {
          $stdcount=$stdcount+1;
        }}
      ?>

      <td><?=$stdcount?></td>
      <td>
        <form action="./adminview/editSchoolForm.php" method="post">
            <input type="number" name="school_id" value="<?=$row['school_id']?>" hidden>
            <button type="submit" class="btn btn-primary" style="height:40px">Edit</button>
        </form>
      </td>
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['school_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add School
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New School</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="c_name">School Name:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <label for="c_name">Location:</label>
              <input type="text" class="form-control" name="c_location" required>
            </div>
            <!-- <div class="form-group">
              <label for="c_name">Number Of Students:</label>
              <input type="text" class="form-control" name="c_students" required>
            </div> -->
            <div class="form-group">
              <button type="submit" class="btn-secondary" name="upload" style="height:40px">Add School</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
  