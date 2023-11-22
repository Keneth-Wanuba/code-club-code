<?php
 include_once "../config/dbconnect.php";
 if (isset($_POST['school_id'])){
 $ID=$_POST['school_id'];


 ?>

<div class="container p-5">

<h4>Edit School Details</h4>
<?php
   echo $ID;
	$qry=mysqli_query($conn, "SELECT * FROM category WHERE school_id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
      $SchID=$row1["school_id"];
?>
  <div class="modal fade" id="myModal" role="dialog">

<form id="update-School" action="editSchoolForm.php" method="POST" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="number" class="form-control" name="school_id" id="school_id" value="<?=$row1['school_id']?>" >
    </div>
    <div class="form-group">
      <label for="student_name">School Name:</label>
      <input type="text" class="form-control" name="school_name" id="school_name" value="<?=$row1['school_name']?>">
    </div>
    <div class="form-group">
      <label for="student_desc">Location:</label>
      <input type="text" class="form-control" name="location" id="location" value="<?=$row1['location']?>">
    </div>
  
    <div class="form-group">
      <button type="submit" style="height:40px" name="upload3" id="upload3" class="btn btn-primary">Update School</button>
    </div>
    </form>

    </div>
    </div>

    <?php
    }
    // else{
        // echo "tebikola";
    // }


    

    if(isset($_POST['upload3'])){
    
    
    $sch_id=$_POST['school_id'];
    $school_name= $_POST['school_name'];
    $location= $_POST['location'];
   
    $updateSchool = mysqli_query($conn,"UPDATE `category` SET 
    `school_name` = '$school_name', 
    `location` = '$location', 
    `school_id` = '$sch_id' 
    WHERE `category`.`school_id` = '$sch_id';");


    if($updateSchool)
    {
        header("Location: ../index.php#category");
    }
    else
    {
        echo mysqli_error($conn);
    }
}
// else{
//     echo "bigaanye";
// }
}
}
?>