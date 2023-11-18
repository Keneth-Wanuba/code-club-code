
<div class="container p-5">

<h4>Edit Student Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM product WHERE student_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $catID=$row1["school_id"];
?>
<form id="update-Items" action="controller/updateItemController.php" method="POST" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="number" class="form-control" name="student_id" id="student_id" value="<?=$row1['student_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="student_name">Student Name:</label>
      <input type="text" class="form-control" name="student_name" id="student_name" value="<?=$row1['student_name']?>">
    </div>
    <div class="form-group">
      <label for="student_desc">Student Description:</label>
      <input type="text" class="form-control" name="student_desc" id="student_desc" value="<?=$row1['student_desc']?>">
    </div>
    <div class="form-group">
      <label for="std_level">Level</label>
      <input type="number" class="form-control" name="std_level" id="std_level" value="<?=$row1['std_level']?>">
    </div>
 
    <div class="form-group">
              <label for="std_school">School:</label>
              <select name="std_school" id="std_school">

          
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
      <button type="submit" style="height:40px" name="upload3" id="upload3" class="btn btn-primary">Update Student</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>