<?php
include_once "./admin_panel/config/dbconnect.php";
// require_once('TCPDF-main/tcpdf.php');

// Function to execute prepared statements
function executePreparedStatement($conn, $sql, $params, $types) {
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    if (!empty($params) && !empty($types)) {
        $stmt->bind_param($types, ...$params);
    }

    // Execute the statement
    $stmt->execute();

    // Get the result (if needed)
    $result = $stmt->get_result();

    // Close the statement
    $stmt->close();

    return $result;
}

// Check if the form is submitted
if (isset($_POST['submitStudent'])) {
    // Retrieve the student code from the POST data
    $student = $_POST['student_code'];
    $escaped_student = mysqli_real_escape_string($conn, $student);

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Reports</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body class="report">
    <!-- Your HTML content here -->
    <div class="rpt">
    <header>
        <div class="logos">
            <img src="imgs/Logos/Code Academy logo-15.png" alt="Your Logo" width="100" height="70">
            <h class="school"> Code Academy Uganda</h>
            <p>+256 774802292  +256 757612154</p>
        </div>

        
        
    
        <!-- Add more navigation links as needed -->
    
        <!-- <nav class="navigation">
           
                <li><a href="index.php">Home</a></li>
                <li  id="current" class="menuitem"><a href="student_report.php">Generate Report</a></li> 

        </nav> -->

        <h1>Student Report</h1>
        <!-- <div class="download-button" onclick="downloadPDF()">Download as PDF</div> -->
    </header>
    <a href="index.php" class="back-arrow">&#8592;</a>
    <br>

            <div class="container">
               <div class="card">

               <?php
                // Fetch details
                $fetchDetails = "SELECT * FROM product WHERE student_id = ?";
                $result1 = executePreparedStatement($conn, $fetchDetails, [$escaped_student], "s");

                if ($result1->num_rows > 0) {
                    while ($row = $result1->fetch_assoc()) {
                        // Display student details here
                        ?>
                        <section class="student_details" id="student-details">
                            <!-- Include student details here -->
                            <div class="profile-card">
                                <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                                <h2><?= $row["student_name"] ?></h2>
                                <p>Level: <?= $row["std_level"] ?></p>
                                <p><?= $row["student_desc"] ?></p>
                            </div>
                            <?php
                    }
                } else {
                    echo "Check student code and generate report again";
                }
                ?>
                <?php
                    // Fetch marks
                    $fetchMarks = "SELECT * FROM orders WHERE student_id = ?";
                    $result2 = executePreparedStatement($conn, $fetchMarks, [$escaped_student], "s");

                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            // Display student marks here
                        ?>

                            <div class="std_project">
                <iframe src="<?= $row["scratch_project"] ?>/embed" allowtransparency="true" width="380" height="402"  frameborder="0" scrolling="no" allowfullscreen></iframe>        </div>
               </div>


                        </section>
            </div>

            <section id="quiz-project">
                        <!-- Quiz and project assessment here -->
                        <div class="cont">
                            <div class="score_desc">
                                <p style="padding:10px;"> Quiz Average</p>
                            </div>
                            <div class="score_card">
                                <div class="pie animate no-round" style="--p:<?= $row["quiz_score"] ?>;--c:#F79600;"><?= $row["quiz_score"] ?>%</div>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="score_desc">
                                <p>Final Project</p>
                            </div>
                            <div class="score_card">
                                <div class="pie animate no-round" style="--p: <?= $row["project_score"] ?>;--c:#F79600;"><?= $row["project_score"] ?>%</div>
                            </div>
                        </div>
            </section>


            <section id="class-assessment">
                 <!-- Include class assessment here -->
             <h2 style=" background:  #0046B6;
    color: #F79600;
    padding: 18px; margin-bottom:5%; margin-top:3%;  margin-left:0;  margin-right:0">Quiz Assessment</h2>
               <!-- Add your content here -->
             <div class="crad">
             <div class="marks">
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Loops</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["attendence"]?>;--c:#F79600;">  <?=$row["attendence"]?>%</div>
                        
                        </div>
                    </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p> Variables</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["retention"]?>;--c:#F79600;">  <?=$row["retention"]?>%</div>
                        
                        </div>
                    </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Arithmetic Operators</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["creativity"]?>;--c:#F79600;">  <?=$row["creativity"]?>%</div>
                        
                        </div>
                    </div>
                    <!-- <div class="cont_ass">
                        <div class="score_desc">
                            <p>Application of knowledge</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["applicability"]?>;--c:#F79600;">  <?=$row["applicability"]?>%</div>
                        
                        </div>
                    </div> -->
                            <div class="cont_ass">
                            <div class="score_desc">
                                <p>Scenes</p>
                            </div>
                            <div class="score_card">
                                <div class="pie animate no-round" style="--p: <?=$row["concentration"]?>;--c:#F79600;">  <?=$row["concentration"]?>%</div>
                            
                            </div>
                    </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Cordinates</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["Interest"]?>;--c:#F79600;">  <?=$row["Interest"]?>%</div>
                          
                        </div>
                    </div>
                    <div class="cont_ass">
                        <div class="score_desc">
                            <p>Class Quiz</p>
                        </div>
                        <div class="score_card">
                            <div class="pie animate no-round" style="--p: <?=$row["Speed"]?>;--c:#F79600;">  <?=$row["Speed"]?>%</div>
                          
                        </div>
                    </div>
            </div>
    
             </div>
                        <?php
                    }
                } else {
                    echo "No quiz and project assessment data found for the student";
                }
                
    // Close the connection
    $conn->close();
}
                ?>
            </section>
            <!-- <section>
                <input type="submit" name="create" class="btn btn-success" value="Generate PDF">
            </section> -->

</div>
<br><br><br>

    <footer>
        &copy; 2023 Code Academy Uganda
    </footer>
</body>
<!-- <script>
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
</script> -->
</html>