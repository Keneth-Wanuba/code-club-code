<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Student Name</th>
            <!-- <th>School</th> -->
            <th>Quiz Score</th>
            <th>Project Score</th>
            <th>Attendence</th>
            <th>Retention</th>
            <th>Creativity</th>
            <th>Concentration</th>
            <th>Applicability</th>
            <th>Interest</th>
            <th>Speed</th>
        </tr>
    </thead>
    <?php
        include_once "../config/dbconnect.php";
        $ID= $_GET['orderID'];
        //echo $ID;
        $sql="SELECT * from orders where orders.student_id=products.student_id;
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
               
    ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$row["student_id"]?></td>
                    -- <td><?=$row["school_name"]?></td>
                    <td><?=$row["quiz_score"]?></td>
                    <td><?=$row["project_score"]?></td>
                    <td><?=$row["attendance"]?></td>
                    <td><?=$row["retention"]?></td>
                    <td><?=$row["creativity"]?></td>
                    <td><?=$row["concentration"]?></td>
                    <td><?=$row8["applicability"]?></td>
                    <td><?=$row9["interest"]?></td>
                    <td><?=$row10["speed"]?></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
