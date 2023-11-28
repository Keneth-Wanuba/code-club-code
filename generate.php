<?php
include_once "./admin_panel/config/dbconnect.php";
require("fpdf.php");

$pdf = new FPDF();

if (isset($_POST['create'])){


    
    $studentname = $_POST['student_name'];
    $std_desc= $_POST['student_desc'];
    $level = $_POST['student_level'];
    $quiz_score=$_POST['quiz_score'];
    $project_score=$_POST['project_score'];
    $attendence=$_POST['attendence'];
    $creativity=$_POST['creativity'];
    $retention=$_POST['retention'];
    $applicability=$_POST['applicability'];
    $participation=$_POST['participation'];
    $interest=$_POST['interest'];
    $speed=$_POST['speed'];
 

    $pdf->AddPage();
    $pdf->SetFont("Ariel",B,19);

    $pdf->Output();
}
 
?>
