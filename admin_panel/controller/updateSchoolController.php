<?php
    include_once "../config/dbconnect.php";

    if(isset($_POST['upload3'])){
    
    
    $std_id=$_POST['student_id'];
    $std_name= $_POST['student_name'];
    $std_desc= $_POST['student_desc'];
    $lvl= $_POST['std_level'];
    $sch_id = $_POST['std_school'];
        echo $std_desc,$std_id,$std_name;
    // if( isset($_FILES['newImage']) ){
        
    //     $location="./uploads/";
    //     $img = $_FILES['newImage']['name'];
    //     $tmp = $_FILES['newImage']['tmp_name'];
    //     $dir = '../uploads/';
    //     $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    //     $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
    //     $image =rand(1000,1000000).".".$ext;
    //     $final_image=$location. $image;
    //     if (in_array($ext, $valid_extensions)) {
    //         $path = UPLOAD_PATH . $image;
    //         move_uploaded_file($tmp, $dir.$image);
    //     }
    // }else{
    //     $final_image=$_POST['existingImage'];
    // }
    $updateItem = mysqli_query($conn,"UPDATE `product` SET 
    `student_name` = '$std_name', 
    `student_desc` = '$std_desc', 
    `school_id` = '$sch_id' 
    WHERE `product`.`student_id` = '$std_id';");


    if($updateItem)
    {
        header("Location: ../index.php#products");
    }
    else
    {
        echo mysqli_error($conn);
    }
}else{
    echo "bigaanye";
}
?>