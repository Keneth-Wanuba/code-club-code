
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
<form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="student_id" value="<?=$row1['student_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Student Name:</label>
      <input type="text" class="form-control" id="p_name" value="<?=$row1['student_name']?>">
    </div>
    <div class="form-group">
      <label for="desc">Student Description:</label>
      <input type="text" class="form-control" id="p_desc" value="<?=$row1['student_desc']?>">
    </div>
    <div class="form-group">
      <label for="price">Level</label>
      <input type="number" class="form-control" id="p_price" value="<?=$row1['level']?>">
    </div>
    <div class="form-group">
      <label>School:</label>
      <select id="category">
        <?php
          $sql="SELECT * from category WHERE school_id='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['school_id'] ."'>" .$row['school_name'] ."</option>";
            }
          }
        ?>
        <?php
          $sql="SELECT * from category WHERE school_id!='$catID'";
          $result = $conn-> query($sql);
          if ($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
              echo"<option value='". $row['school_id'] ."'>" .$row['school_name'] ."</option>";
            }
          }
        ?>
      </select>
    </div>
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$row1["std_image"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$row1['std_image']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Student</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>