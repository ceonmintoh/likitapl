
<?php
// Import database
include("../connection.php");

if ($_POST) {
    // Retrieve hospital information from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];


    // Prepare SQL statement to insert data into the hospital table
    $sql = "INSERT INTO hospital (name, email,contact,password,latitude, longitude)
            VALUES ('$name','$email',' $contact ','$password','$latitude', '$longitude')";

    // Execute SQL statement
    if ($database->query($sql) === TRUE) {
        $error = '4'; // Success
    } else {
        $error = '5'; // Error
    }
} else {
    $error = '3'; // No POST data received
}

header("location: hospital.php?action=edit&error=".$error);
?>

</body>
</html>