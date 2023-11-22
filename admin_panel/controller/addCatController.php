<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $catname = $_POST['c_name'];
        $catlocation = $_POST['c_location'];
       
         $insert = mysqli_query($conn,"INSERT INTO category
         (school_name,location) 
         VALUES ('$catname',' $catlocation')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php#category");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php#category");
         }
     
    }
        
?>