<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the supervisor ID to update
    $update_id = $_POST['update_id'];

    // Retrieve other updated data from the form
    $updated_first_name = $_POST['updated_first_name'];
    $updated_last_name = $_POST['updated_last_name'];
    $updated_email = $_POST['updated_email'];
    $updated_gender = $_POST['updated_gender'];

    // Process or save the updated data (you can update a database record, for example)
    // For demonstration purposes, let's just display the updated data
    echo "Supervisor ID to Update: " . htmlspecialchars($update_id) . "<br>";
    echo "Updated First Name: " . htmlspecialchars($updated_first_name) . "<br>";
    echo "Updated Last Name: " . htmlspecialchars($updated_last_name) . "<br>";
    echo "Updated Email: " . htmlspecialchars($updated_email) . "<br>";
    echo "Updated Gender: " . htmlspecialchars($updated_gender) . "<br>";

    // Here you can update the data in a database or perform any other desired actions
}
?>
