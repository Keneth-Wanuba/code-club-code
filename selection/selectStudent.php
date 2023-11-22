<?php
include_once "./admin_panel/config/dbconnect.php";


?>


<?php
if(isset($_POST['submitSchool'])){

$studentSchool = $_POST['selectSchool'];
echo "
?>
<form class="form" method="post" action="student_report.php">
            // <h1>Generate Student Report</h1>
            // <br><br><br>
            // <label> Choose School: </label>

            <select id="sdt" name="std">
            <?php

                $sql="SELECT * from product where product.school_id=$studentSchool";
                $result = $conn-> query($sql);

                if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo"<option value='".$row['student_id']."'>".$row['student_name'] ."</option>";
                }
                }
                ?>
            </select>

            // <br><br><br>
            // <label> Enter Student Name: </label>
            // <input type="text" class="name"></input>
            <br><br><br>
            <button type="submit" name="submit">Generate</button>
                        
        </form>
        "
        <?php
            }