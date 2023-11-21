<?php

    include_once "../config/dbconnect.php";
    
    $std_id=$_POST['student_id'];
    $query="DELETE FROM product where student_id='$std_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Student data Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>