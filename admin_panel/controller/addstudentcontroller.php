<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload1']))
    {
        $student_code= $_POST['student_code'];
        $studentname = $_POST['student_name'];
        $std_desc= $_POST['student_desc'];
        $level = $_POST['student_level'];
        $sch_id = $_POST['std_school'];
         $insert1 = mysqli_query($conn,"INSERT INTO product
         (student_id,student_name,student_desc,school_id,std_level) 
         VALUES ('$student_code','$studentname','$std_desc','$sch_id','$level')");
 
         if(!$insert1)
         {
            ?><script>
            console.log "not working well";
        </script>
        <?php
             echo mysqli_error($conn);
             header("Location: ../index.php#products");
         }
         else
         {
            ?><script>
                console.log "working well";
            </script>
            <?php
             echo "Record added successfully.";
             header("Location: ../index.php#products");

         }
        
    }else{
        echo "failed";
    }
        
?>