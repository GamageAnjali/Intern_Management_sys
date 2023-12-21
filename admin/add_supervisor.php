<?php
// add_supervisor.php
include 'db.php';

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

$sql = "INSERT INTO `supervisors` VALUES ('','$first_name','$last_name','$email','$gender')";

if ($conn->query($sql) === TRUE) {
    echo 'Supervisor added successfully!';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>