
<div >
  <h2>Students</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Student_ID</th>
        <th class="text-center">Sdt Name</th>
        <th class="text-center">Sdt Description</th>
        <th class="text-center">School</th>
        <th class="text-center">level</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product, category WHERE product.school_id=category.school_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["student_id"]?></td>
      <td><?=$row["student_name"]?></td>
      <td><?=$row["student_desc"]?></td>      
      <td><?=$row["school_name"]?></td> 
      <td><?=$row["std_level"]?></td>

      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['student_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['student_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Student
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addstudentcontroller.php" method="POST">
          <div class="form-group">
              <label for="student_code">Student Code:</label>
              <input type="text" class="form-control" name="student_code" id="student_code" required>
            </div>  
          <div class="form-group">
              <label for="student_name">Student Name:</label>
              <input type="text" class="form-control" name="student_name" id="student_name" required>
            </div>
            <div class="form-group">
              <label for="student_level">Level:</label>
              <input type="number" class="form-control" name="student_level" id="student_level" required>
            </div>
            <div class="form-group">
              <label for="student_desc">Description:</label>
              <input type="text" class="form-control" name="student_desc" id="student_desc" required>
            </div>
            
            <div class="form-group">
              <label for="std_school">School:</label>
              <select name="std_school" id="std_school">
                <option disabled selected>Select School</option>
                <?php

                  $sql="SELECT * from category";
                  $result = $conn-> query($sql);

                  if ($result-> num_rows > 0){
                    while($row = $result-> fetch_assoc()){
                      echo"<option value='".$row['school_id']."'>".$row['school_name'] ."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" class="btn-secondary" name="upload1" style="height:40px">Add Student</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   