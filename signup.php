<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
    <style>
        body{
            background-color: lightblue;
        }
    </style>
        
    <title>Sign Up</title>
    
</head>
<body>
<?php

session_start();

include("connection.php");
$_SESSION["user"] = "";
$_SESSION["usertype"] = "";

date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$_SESSION["date"] = $date;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usertype = $_POST['usertype'];
    
    if ($usertype === 'p') {
        // Patient registration
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname . " " . $lname;
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $email = $_POST['newemail'];
        $tele = $_POST['tele'];
        $newpassword = $_POST['newpassword'];
        $cpassword = $_POST['cpassword'];
        
        if ($newpassword === $cpassword) {
            $result = $database->query("SELECT * FROM webuser WHERE email='$email'");
            if ($result->num_rows == 0) {
                // No duplicate email, proceed with registration
                $database->query("INSERT INTO patient(pemail,pname,ppassword,paddress,pdob,ptel) VALUES('$email','$name','$newpassword','$address','$dob','$tele')");
                $database->query("INSERT INTO webuser(email, usertype) VALUES('$email','p')");
                
                $_SESSION["user"] = $email;
                $_SESSION["usertype"] = "p";
                $_SESSION["username"] = $fname;
                
                header('Location: patient/index.php');
                exit(); // Terminate script after redirect
            } else {
                // Display error message for duplicate email
                $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
            }
        } else {
            // Password confirmation error
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Please confirm your password again.</label>';
        }
    } elseif ($usertype === 'h') {
        // Hospital registration
        $hname = $_POST['name'];
        $hemail = $_POST['hnewemail'];
        $htele = $_POST['htele'];
        $hnewpassword = $_POST['hpassword'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
    
        $result = $database->query("SELECT * FROM webuser WHERE email='$hemail'");
        if ($result->num_rows == 0) {
            // No duplicate email, proceed with registration
            $database->query("INSERT INTO hospital(name,email,contact,password,latitude,longitude) VALUES('$hname','$hemail','$htele','$hnewpassword','$latitude','$longitude')");
            $database->query("INSERT INTO webuser(email, usertype) VALUES('$hemail','h')");
            
            $_SESSION["user"] = $hemail;
            $_SESSION["usertype"] = "h";
            $_SESSION["username"] = $hname;
            
            header('Location: hospital/index.php');
            exit(); // Terminate script after redirect
        } else {
            // Display error message for duplicate email
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }
    } else {
        // Invalid user type
        $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Invalid user type.</label>';
    }
}

?>


<center>
    <div class="container">
        <form method="POST" action="signup.php">
            <table border="0">
                <tr>
                    <td colspan="2">
                        <p class="header-text">Let's Get Started</p>
                        <p class="sub-text">Add Your Personal Details to Continue</p>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="usertype" class="form-label">Register as: </label>
                        <select name="usertype" id="usertype" class="input-text"  onchange="toggleFormFields()">
                            <option value="p">Patient</option>
                            <option value="h">Hospital</option>
                        </select>
                    </td>
                </tr>
                <!-- Patient Form Fields -->
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="fname" class="form-label">First Name: </label>
                        <input type="text" name="fname" class="input-text" placeholder="First Name" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="lname" class="form-label">Last Name: </label>
                        <input type="text" name="lname" class="input-text" placeholder="Last Name" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="address" class="form-label">Address: </label>
                        <input type="text" name="address" class="input-text" placeholder="Address" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="dob" class="form-label">Date of Birth: </label>
                        <input type="date" name="dob" class="input-text" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="newemail" class="form-label">Email: </label>
                        <input type="email" name="newemail" class="input-text" placeholder="Email Address" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="tele" class="form-label">Mobile Number: </label>
                        <input type="tel" name="tele" class="input-text" placeholder="Mobile Number" pattern="[0-9]{10}" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="newpassword" class="form-label">Create New Password: </label>
                        <input type="password" name="newpassword" class="input-text" placeholder="New Password" >
                    </td>
                </tr>
                <tr class="patient-form">
                    <td class="label-td" colspan="2">
                        <label for="cpassword" class="form-label">Confirm Password: </label>
                        <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" >
                    </td>
                </tr>
                <!-- Include other patient form fields here -->
                <!-- Hospital Form Fields -->
                <tr class="hospital-form" style="display: none;">
                    <td class="label-td" colspan="2">
                        <label for="name" class="form-label">Hospital Name: </label>
                        <input type="text" name="name" class="input-text" placeholder="Hospital Name" >
                    </td>
                </tr>
                <tr class="hospital-form" style="display: none;">
                    <td class="label-td" colspan="2">
                        <label for="hnewemail" class="form-label">Hospital Email: </label>
                        <input type="email" name="hnewemail" class="input-text" placeholder="Hospital Email" >
                    </td>
                </tr>
                <tr class="hospital-form" style="display: none;">
                    <td class="label-td" colspan="2">
                        <label for="htele" class="form-label">Contact Number: </label>
                        <input type="tel" name="htele" class="input-text" placeholder="Contact Number" >
                    </td>
                </tr>
                <tr class="hospital-form" style="display: none;">
                    <td class="label-td" colspan="2">
                        <label for="hpassword" class="form-label">Create New Password: </label>
                        <input type="password" name="hpassword" class="input-text" placeholder="New Password" >
                    </td>
                </tr>
                <tr class="hospital-form" style="display: none;">
    <td class="label-td" colspan="2">
    <button type="button" id="getLocationBtn" onclick="getLocation()" class="login-btn btn-primary btn">Get Current Location</button>

        <input type="text" name="latitude" id="latitude" class="input-text" placeholder="Latitude" >
        <input type="text" name="longitude" id="longitude" class="input-text" placeholder="Longitude" >
    </td>
</tr>

                <!-- End Hospital Form Fields -->
                <tr>
                    <td>
                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                    </td>
                    <td>
                        <input type="submit" value="Sign Up" class="login-btn btn-primary btn">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                        <a href="login.php" class="hover-link1 non-style-link">Login</a>
                        <br><br><br>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</center>
 
<script>

function toggleFormFields() {
    var userType = document.getElementById('usertype').value;
    var patientForm = document.querySelectorAll('.patient-form');
    var hospitalForm = document.querySelectorAll('.hospital-form');

    if (userType === 'p') {
        patientForm.forEach(function (element) {
            element.style.display = 'table-row';
            // Enable patient form fields
            element.querySelectorAll('.input-text').forEach(function (input) {
                input.removeAttribute('disabled');
            });
        });
        hospitalForm.forEach(function (element) {
            element.style.display = 'none';
            // Disable hospital form fields
            element.querySelectorAll('.input-text').forEach(function (input) {
                input.setAttribute('disabled', 'disabled');
            });
        });
    } else if (userType === 'h') {
        patientForm.forEach(function (element) {
            element.style.display = 'none';
            // Disable patient form fields
            element.querySelectorAll('.input-text').forEach(function (input) {
                input.setAttribute('disabled', 'disabled');
            });
        });
        hospitalForm.forEach(function (element) {
            element.style.display = 'table-row';
            // Enable hospital form fields
            element.querySelectorAll('.input-text').forEach(function (input) {
                input.removeAttribute('disabled');
            });
        });
    }
}
 function getLocation() {
    // Check if Geolocation is supported by the browser
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            // Get the latitude and longitude coordinates
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Update the latitude and longitude input fields
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
        }, function(error) {
            // Handle errors when obtaining the user's position
            console.error('Error getting user position:', error);
        });
    } else {
        // Geolocation is not supported by the browser
        console.error('Geolocation is not supported by this browser.');
    }
}

</script>
</body>
</html>
