<?php
include_once "./admin_panel/config/dbconnect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Reports</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>

    <header>
        <div class="logos">
            <img src="imgs/Logos/Code Academy logo-15.png" alt="Your Logo" width="100" height="100">
            <h>WCIS</h>
        </div>
        <nav class="navigation">
           
                <li id="current" class="menuitem"><a href="index.html">Home</a></li>
                <!-- <li><a href="student_report.php">Generate Report</a></li> -->
            
        </nav>
    </header>
    <div class="home">
         <form class="form" method="post" action="student_report.php">
            <h1>Generate Student Report</h1>
            <br><br><br>
            <label> Choose Student: </label>

            <select id="student" name="student">
            <?php

                $sql="SELECT * from product where school_id='1'";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['student_id']."'>".$row['student_name'] ."</option>";
                }
                }
                ?>
            </select>

            <!-- <br><br><br>
            <label> Enter Student Name: </label>
            <input type="text" class="name"></input> -->
            <br><br><br>
            <button type="submitStudent" name="submitStudent">generate report</button>
                        
        </form>
    </div>    
</body>
</html>