<?php
// allocate.php
include 'db.php';

$studentId = $_POST['student_id'];
$supervisorId = $_POST['supervisor_id'];

$sql = "UPDATE fill_details SET supervisor_id = $supervisorId WHERE id = $studentId";

    if ($conn->query($sql) === TRUE) {
        echo "Allocation successful!";


 // Fetch supervisor email
 $supervisorEmailQuery = "SELECT email FROM supervisors WHERE id = $supervisorId";
 $supervisorEmailResult = $conn->query($supervisorEmailQuery);

 if ($supervisorEmailResult->num_rows > 0) {
     $supervisorEmailRow = $supervisorEmailResult->fetch_assoc();
     $supervisorEmail = $supervisorEmailRow['email'];

     // Fetch student and supervisor details
     $studentResult = $conn->query("SELECT * FROM fill_details WHERE id = $studentId");
     $supervisorResult = $conn->query("SELECT * FROM supervisors WHERE id = $supervisorId");

     if ($studentResult->num_rows > 0 && $supervisorResult->num_rows > 0) {
         $student = $studentResult->fetch_assoc();
         $supervisor = $supervisorResult->fetch_assoc();

         // Email subject and body
         $subject = "Student Allocation Notification";
         $message = "Dear {$supervisor['firstname']},\n\n";
         $message .= "You have been assigned as the supervisor for the student {$student['first_name']} (ID: {$student['id']}).\n\n";
         $message .= "Best regards,\n Internship Management System
         Digital Lab";

         // Send email to supervisor
         mail($supervisorEmail, $subject, $message);

         // to student 

         $subject2 = "Supervisor Allocation Notification";
         $message2 = "Dear {$student['first_name']},\n\n";
         $message2 .= "Thank you for your interest in taking up an internship at SLT Digital Lab. We have received your application.  Your application Registration ID: {$student['id']}.\n\n You will be informed with next actions in case you are selected for the internship. Above registration id shall be referred in future communications."
           ;
         $message2 .= "Best regards,
         \n Internship Management System ,Digital Lab";
         $studentEmail = $student['email']; 
          // Send email to student
         mail($studentEmail, $subject2, $message2);
     } else {
         $errorMessage = "Error fetching student or supervisor details.";
     }
 } else {
     $errorMessage = "Error fetching supervisor email.";
 }
} else {
 $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
































    
       










   