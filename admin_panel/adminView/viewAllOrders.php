<div id="ordersBtn" >
  <h2>Students Assessement</h2>
  <table class="table table-striped">
    <thead>
      <tr>
          <th>S.N.</th>
          <th>Student</th>
          <th>Quiz Score</th>
          <th>Project Score</th>
          <th>Attendence</th>
          <th>Retention</th>
          <th>Creativity</th>
          <th>Concentration</th>
          <th>Applicability</th>
          <th>Interest</th>
          <th>Speed</th>
          <th>Project Link</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from orders, product where orders.student_id=product.student_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$count?></td>
          <td><?=$row["student_id"]?></td>
          <td><?=$row["quiz_score"]?></td>
          <td><?=$row["project_score"]?></td>
          <td><?=$row["attendence"]?></td>
          <td><?=$row["retention"]?></td>
          <td><?=$row["creativity"]?></td>
          <td><?=$row["concentration"]?></td>
          <td><?=$row["applicability"]?></td>
          <td><?=$row["Interest"]?></td>
          <td><?=$row["Speed"]?></td>
          <td><a href="<?=$row["scratch_project"]?>"><Link:favicon>Project</Link:favicon></a></td>
    <?php
         $count=$count+1;   
        }
      }
    ?>
     
  </table>
   
</div>

 <!-- Trigger the modal with a button -->
 <button type="button" class="btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add a student assessment
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Assessement</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <form  enctype='multipart/form-data' action="index.php" method="POST">
          <label> Choose Student: </label>
            <select id="student" name="student">
            <?php
                $sql="SELECT product.student_id, product.student_name
                FROM product
                LEFT JOIN orders ON product.student_id = orders.student_id
                WHERE orders.student_id IS NULL;";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['student_id']."'>".$row['student_name'] ."</option>";
                }
                }
                ?>
            </select>

            <div class="form-group">
              <label for="quiz_score">Quiz Score:</label>
              <input type="number" class="form-control" name="quiz_score" required>
            </div>
            <div class="form-group">
              <label for="project_score">Project Score:</label>
              <input type="number" class="form-control" name="project_score" required>
            </div>
            <div class="form-group">
              <label for="attendence">Attendence:</label>
              <input type="number" class="form-control" name="attendence" required>
            </div>
            <div class="form-group">
              <label for="creativity">Creativity:</label>
              <input type="number" class="form-control" name="creativity" required>
            </div>
            <div class="form-group">
              <label for="retention">Rention:</label>
              <input type="number" class="form-control" name="rention" required>
            </div>
            <div class="form-group">
              <label for="applicability">Application of concepts:</label>
              <input type="number" class="form-control" name="applicability" required>
            </div>
            <div class="form-group">
              <label for="Participation">Participation:</label>
              <input type="number" class="form-control" name="participation" required>
            </div>
            <div class="form-group">
              <label for="interest">Interest:</label>
              <input type="number" class="form-control" name="interest" required>
            </div>
            <div class="form-group">
              <label for="speed">Speed:</label>
              <input type="number" class="form-control" name="speed" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn-secondary" name="upload5" style="height:40px">Add Assessement</button>
            </div>
            
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
  <?php

  if (isset($_POST['upload5'])){
    $std_id=$_POST['student'];
    $project_score=$_POST['project_score'];
    $attendence=$_POST['attendence'];
    $creativity=$_POST['creativity'];
    $retention=$_POST['retention'];
    $applicability=$_POST['applicability'];
    $participation=$_POST['participation'];
    $interest=$_POST['interest'];
    $speed=$_POST['speed'];
    $quiz_score=$_POST['quiz_score'];
    // $quiz_score=$_POST['quiz_score'];

    $assmtQry = mysqli_query($conn,"INSERT INTO `orders` (`assessment_id`, `student_id`, `quiz_score`, `project_score`, `attendence`, `creativity`, `retention`, `applicability`, `concentration`, `Interest`, `Speed`) 
    VALUES (NULL, '$std_id', '$quiz_score', '$project_score', '$attendence', '$creativity', '$retention', '$applicability', '$participation', '$interest', '$speed');");

    if($updateSchool)
    {
        header("Location: ../index.php#category");
    }
    else
    {
        echo mysqli_error($conn);
    }
}
