<?php
include_once "./admin_panel/config/dbconnect.php";
require_once('TCPDF-main/tcpdf.php');


?>


<?php
if(isset($_POST['submitStudent'])){

$student = $_POST['student_code'];
$escaped_student = mysqli_real_escape_string($conn, $student);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Reports</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body class="report">

    <header>
        <div class="logos">
            <img src="imgs/Logos/Code Academy logo-15.png" alt="Your Logo" width="100" height="70">
            <img src="imgs/Logos/watotologo.png" alt="Your Logo" width="100" height="80">
        </div>
        <!-- <nav class="navigation">
           
                <li><a href="index.php">Home</a></li>
                <li  id="current" class="menuitem"><a href="student_report.php">Generate Report</a></li> 

        <!-- </nav> -->
        <h1>Student Report</h1>
        <div class="download-button" onclick="downloadPDF()">Download as PDF</div>

<script>
    function downloadPDF() {
        $.ajax({
            type: 'POST',
            url: 'student_report.php',
            success: function(data) {
                // Create a Blob from the PDF data
                var blob = new Blob([data], { type: 'application/pdf' });

                // Create a link element and trigger a click to download the PDF
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'student_report.pdf';
                link.click();
            }
        });
    }
</script>
    </header>
    <div class="container">
    <?php
         $fetchDetails = "SELECT * from product where student_id=$escaped_student";
         $result1 = $conn-> query($fetchDetails);
         
         if ($result1-> num_rows > 0){
            while ($row=$result1-> fetch_assoc()) {
                ?>
                <section class="student_details" id="student-details">
                <!-- Include student details here -->
                <div class="profile-card">
                    
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    <h2><?=$row["student_name"]?></h2>
                    <p>Level: <?=$row["std_level"]?></p>
                    <p><?=$row["student_desc"]?></p>
                </div>    

                <?php
            }
        } else{
            echo "no such student found in the database";
        }
        

   

   

    
        $fetchMarks = "SELECT * from orders where student_id=$escaped_student";
        $result2 = $conn-> query($fetchMarks);
        if ($result2-> num_rows > 0){
            while ($row=$result2-> fetch_assoc()) {
                ?>





                <!-- Add your content here -->
                <div class="std_project">
                <iframe src="https://scratch.mit.edu/projects/893197457/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>        </div>
            </section>
        
    <section id="quiz-project">
        <!-- Include quiz and project assessment here -->
        <div class="cont">
            <div class="score_desc">
                <p>Quiz</p>
            </div>
            <div class="score_card">
                <div class="pie animate no-round" style="--p:<?=$row["quiz_score"]?>;--c:#F79600;"> <?=$row["quiz_score"]?>%</div>
            </div>
        </div>
        <div class="cont">
            <div class="score_desc">
                <p>Final Project</p>
            </div>
            <div class="score_card">
                <div class="pie animate no-round" style="--p: <?=$row["project_score"]?>;--c:#F79600;">  <?=$row["project_score"]?>%</div>
             </div>
        </div>
        <!-- Add your content here -->
    </section>

    <section id="class-assessment">
        <!-- Include class assessment here -->
        <h2>Class Assessment</h2>
        <!-- Add your content here -->
        <div class="marks">
            <div class="cont_ass">
                <div class="score_desc">
                    <p>Attendence</p>
                </div>
                <div class="score_card">
                    <div class="pie animate no-round" style="--p: <?=$row["attendence"]?>;--c:#F79600;">  <?=$row["attendence"]?>%</div>
                  
                </div>
            </div>
            <div class="cont_ass">
                <div class="score_desc">
                    <p>Retention</p>
                </div>
                <div class="score_card">
                    <div class="pie animate no-round" style="--p: <?=$row["retention"]?>;--c:#F79600;">  <?=$row["retention"]?>%</div>
                  
                </div>
            </div>
            <div class="cont_ass">
                <div class="score_desc">
                    <p>Creativity</p>
                </div>
                <div class="score_card">
                    <div class="pie animate no-round" style="--p: <?=$row["creativity"]?>;--c:#F79600;">  <?=$row["creativity"]?>%</div>
                  
                </div>
            </div>
            <div class="cont_ass">
                <div class="score_desc">
                    <p>Application of knowledge</p>
                </div>
                <div class="score_card">
                    <div class="pie animate no-round" style="--p: <?=$row["applicability"]?>;--c:#F79600;">  <?=$row["applicability"]?>%</div>
                  
                </div>
            </div>
                <div class="cont_ass">
                        <div class="score_desc">
                            <p>Concentration in class</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["concentration"]?>;--c:#F79600;">  <?=$row["concentration"]?>%</div>
                        
                        </div>
                </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Interest in coding</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["Interest"]?>;--c:#F79600;">  <?=$row["Interest"]?>%</div>
                          
                        </div>
                    </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Speed</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["Speed"]?>;--c:#F79600;">  <?=$row["Speed"]?>%</div>
                          
                        </div>
                    </div>
        </div>
        <?php
            }
        }
            ?>
        
    

    </div>
    <br>  <br>   <br>   <br>   <br>  <br>

    <footer>
        &copy; 2023 Code Academy Uganda
    </footer>
</body>
</html>
<?php
        }else{
            echo "tebikoze";
        }