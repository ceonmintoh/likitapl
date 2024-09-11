<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Admin</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body{
            background-color: lightblue;
        }
        img {
        filter: drop-shadow(-5px -5px 12px rgba(0, 217, 255, 0.3))
          drop-shadow(10px 10px 10px rgb(1, 33, 102))
          drop-shadow(20px 20px 20px rgba(0, 48, 136, 0.2));
      }
      .logo {
  float: left;
  position: absolute;
  width: 150px;
  top: 18px;
  left: 20px;
  padding: 2px;
  filter: drop-shadow(-5px -5px 12px rgba(0, 217, 255, 0.3))
          drop-shadow(10px 10px 10px rgb(1, 33, 102))
          drop-shadow(20px 20px 20px rgba(0, 48, 136, 0.2));
}
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");

    
    ?>
    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <!-- <td width="30%" style="padding-left:20px" >
                                    <img src="../img/user.png" alt="" width="100%" style="border-radius:50%">
                                </td> -->
                                <td style="padding:0px;margin:0px;">
                                <a href="#"><img src="../img/logo.png" class="logo" /></a>
                                    <p class="profile-title">Administrator</p>
                                    <p class="profile-subtitle">admin@ehealthcare.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <a href="../logout.php" ><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                    </table>
                    </td>
                
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-dashbord" >
                        <a href="index.php" class="non-style-link-menu"><div><p class="menu-text">Dashboard</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                        <a href="hospital.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Hospital</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-schedule">
                        <a href="schedule.php" class="non-style-link-menu"><div><p class="menu-text">Schedule</p></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-appoinment">
                        <a href="appointment.php" class="non-style-link-menu"><div><p class="menu-text">Appointment</p></a></div>
                    </td>
                </tr>
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-patient">
                        <a href="patient.php" class="non-style-link-menu"><div><p class="menu-text">Patients</p></a></div>
                    </td>
                </tr>

            </table>
        </div>
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                    <td width="13%">
                        <a href="hospital.php" ><button  class="login-btn btn-primary-soft btn btn-icon-back"  style="padding-top:11px;padding-bottom:11px;margin-left:20px;width:125px"><font class="tn-in-text">Back</font></button></a>
                    </td>
                    <td>
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Hospital name or Email" list="hospital">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="hospital">';
                                $list11 = $database->query("select  name,email from  hospital;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["name"];
                                    $c=$row00["email"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Today's Date
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;">
                            <?php 
                        date_default_timezone_set('Asia/Kolkata');

                        $date = date('Y-m-d');
                        echo $date;
                        ?>
                        </p>
                    </td>
                    <td width="10%">
                        <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </td>


                </tr>
               
                <tr >
                    <td colspan="2" style="padding-top:30px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Add New Hospital</p>
                    </td>
                    <td colspan="2">
                        <a href="?action=add&id=none&error=0" class="non-style-link"><button  class="login-btn btn-primary btn button-icon"  style="display: flex;justify-content: center;align-items: center;margin-left:75px;background-image: url('../img/icons/add.svg');">Add New</font></button>
                            </a></td>
                </tr>
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Hospital (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <?php
if ($_POST) {
    $keyword = $_POST["search"];
    
    $sqlmain = "SELECT * FROM hospital WHERE name='$keyword' OR email='$keyword' OR name LIKE '$keyword%' OR name LIKE '%$keyword' OR name LIKE '%$keyword%'";
} else {
    $sqlmain = "SELECT * FROM hospital ORDER BY id DESC";
}

$result = $database->query($sqlmain);
?>

<tr>
    <td colspan="4">
        <center>
            <div class="abc scroll">
                <table width="93%" class="sub-table scrolldown" border="0">
                    <thead>
                        <tr>
                            <th class="table-headin">
                                Hospital Name
                            </th>
                            <th class="table-headin">
                                Email
                            </th>
                            <th class="table-headin">
                                Contact
                            </th>
                            <th class="table-headin">
                            Latitude    
                            </th>
                            <th class="table-headin">
                            Longitude
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows == 0) {
                            echo '<tr>
                                    <td colspan="4">
                                        <br><br><br><br>
                                        <center>
                                            <img src="../img/notfound.svg" width="25%">
                                            <br>
                                            <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We couldn\'t find anything related to your keywords!</p>
                                            <a class="non-style-link" href="hospital.php"><button class="login-btn btn-primary-soft btn" style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Hospitals &nbsp;</button></a>
                                        </center>
                                        <br><br><br><br>
                                    </td>
                                </tr>';
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                $name = substr($row["name"], 0, 30);
                                $email = substr($row["email"], 0, 20);
                                $contact = substr($row["contact"], 0, 30);
                                $latitude = substr($row["latitude"], 0, 20);
                                $longitude = substr($row["longitude"], 0, 20);
                                echo '<tr>
                                        <td>' . $name . '</td>
                                        <td>' . $email . '</td>
                                        <td>' . $contact . '</td>
                                        <td>' . $latitude . '</td>
                                        <td>' . $longitude . '</td>
                                        <td>
                                            <div style="display:flex;justify-content: center;">
                                                <a href="?action=edit&id=' . $id . '&error=0" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-edit" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Edit</font></button></a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="?action=view&id=' . $id . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-view" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href="?action=drop&id=' . $id . '&name=' . $name . '" class="non-style-link"><button class="btn-primary-soft btn button-icon btn-delete" style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remove</font></button></a>
                                            </div>
                                        </td>
                                    </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </center>
    </td>
</tr>          
                        
            </table>
        </div>
    </div>
    <?php
if ($_GET && isset($_GET["id"])) {
     $id = $_GET["id"];
    $action = $_GET["action"];
    if ($action == 'drop') {
    $nameget = $_GET["name"];
    echo '
    <div id="popup1" class="overlay">
        <div class="popup">
            <center>
                <h2>Are you sure?</h2>
                <a class="close" href="hospital.php">&times;</a>
                <div class="content">
                    You want to delete this record<br>(' . substr($nameget, 0, 40) . ').
                </div>
                <div style="display: flex;justify-content: center;">
                    <a href="delete-hospital.php?id=' . $id . '" class="non-style-link">
                        <button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;">
                            <font class="tn-in-text">&nbsp;Yes&nbsp;</font>
                        </button>
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="hospital.php" class="non-style-link">
                        <button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;">
                            <font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font>
                        </button>
                    </a>
                </div>
            </center>
        </div>
    </div>';
}
 elseif ($action == 'view') {
        $sqlmain = "SELECT * FROM hospital WHERE id='$id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $con=$row["contact"];
        $latitude=$row["latitude"];
        $longitude=$row["longitude"];
        echo '
        <div id="popup1" class="overlay">
            <div class="popup">
                <center>
                    <h2></h2>
                    <a class="close" href="hospital.php">&times;</a>
                    <div class="content">
                    Likita <br>
                    </div>
                    <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $name . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $email . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="con" class="form-label">Contact: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $con . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="password" class="form-label">Password: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $password . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="latitude" class="form-label">Latitude: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $latitude . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="longitude" class="form-label">Longitude: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $longitude . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="hospital.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </center>
                <br><br>
            </div>
        </div>';
    } elseif ($action == 'add') {
        $error_1 = $_GET["error"];
        $errorlist = array(
            '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
            '3' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
            '4' => "",
            '0' => "",
        );
        if ($error_1 != '4') {
            echo '
            <div id="popup1" class="overlay">
                <div class="popup">
                    <center>
                        <a class="close" href="hospital.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                            <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                    <tr>
                                        <td class="label-td" colspan="2">' .
                                            $errorlist[$error_1] .
                                        '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Hospital.</p><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <form action="add-new.php" method="POST" class="add-new-form">
                                            <td class="label-td" colspan="2">
                                                <label for="name" class="form-label">Name: </label>
                                            </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="name" class="input-text" placeholder="Hospital Name" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="Email" class="form-label">Email: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="email" name="email" class="input-text" placeholder="Email Address" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="con" class="form-label">Contact: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="tel" name="con" class="input-text" placeholder="Contact Number" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password" class="form-label">Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password" class="input-text" placeholder="Defind a Password" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="cpassword" class="form-label">Conform Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="latitude" class="form-label">Latitude</label>
                                    </td>
                                </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="latitude" class="input-text" placeholder="Enter Latitude" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="longitude" class="form-label">Longitude</label>
                                    </td>
                                </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="longitude" class="input-text" placeholder="Enter Longitude" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="submit" value="Add" class="login-btn btn-primary btn">
                                        </td>
                                    </tr>
                                </form>
                            </tr>
                        </table>
                    </div>
                </div>
            </center>
            <br><br>
        </div>
        </div>';
}
else {
    echo '
    <div id="popup1" class="overlay">
        <div class="popup">
            <center>
                <br><br><br><br>
                <h2>New Record Added Successfully!</h2>
                <a class="close" href="hospital.php">&times;</a>
                <div class="content">
                </div>
                <div style="display: flex;justify-content: center;">
                    <a href="hospital.php" class="non-style-link">
                        <button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;">
                            <font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font>
                        </button>
                    </a>
                </div>
                <br><br>
            </center>
        </div>
    </div>';}
} if ($action == 'edit') {
    $sqlmain = "SELECT * FROM hospital WHERE id='$id'";
    $result = $database->query($sqlmain);
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
    $con = $row["contact"];
    $password = $row["password"];
    $latitude = $row["latitude"];
    $longitude = $row["longitude"];
    $error_1 = $_GET["error"];
    $errorlist = array(
        '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
        '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
        '3' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
        '4' => "",
        '0' => "",
    );

  if ($error_1 != '4') {
        echo '
        <div id="popup1" class="overlay">
            <div class="popup">
                <center>
                    <a class="close" href="hospital.php">&times;</a> 
                    <div style="display: flex;justify-content: center;">
                        <div class="abc">
                            <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                    <td class="label-td" colspan="2">' .
                                        $errorlist[$error_1]
                                    . '</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Hospital Details.</p>
                                        Hospital ID : ' . $id . ' (Auto Generated)<br><br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="name" class="form-label">Name: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="text" name="name" class="input-text" placeholder="Hospital Name" value="' . $name . '" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <form action="edit-hospital.php" method="POST" class="add-new-form">
                                            <label for="Email" class="form-label">Email: </label>
                                            <input type="hidden" value="' . $id . '" name="id00">
                                            <input type="hidden" name="oldemail" value="' . $email . '" >
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="email" name="email" class="input-text" placeholder="Email Address" value="' . $email . '" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="con" class="form-label">Contact: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="tel" name="Tele" class="input-text" placeholder="Contact Number" value="' . $con . '" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="password" class="form-label">Password: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="password" name="password" class="input-text" placeholder="Define a Password" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="cpassword" class="form-label">Confirm Password: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="con" class="form-label">Latitude: </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="text" name="latitude" class="input-text" placeholder="Enter Latitude" value="' . $latitude . '" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <label for="con" class="form-label">Longitude :</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-td" colspan="2">
                                        <input type="text" name="longitude" class="input-text" placeholder="Enter Longitude" value="' . $longitude . '" required><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="submit" value="Save" class="login-btn btn-primary btn">
                                    </td>
                                </tr>
                            </form>
                        </tr>
                    </table>
                </div>
            </div>
        </center>
        <br><br>
    </div>
</div>';
} else {
    echo '
    <div id="popup1" class="overlay">
        <div class="popup">
            <center>
                <br><br><br><br>
                <h2>Edit Successful!</h2>
                <a class="close" href="hospitals.php">&times;</a>
                <div class="content">
                </div>
                <div style="display: flex;justify-content: center;">
                    <a href="hospitals.php" class="non-style-link">
                        <button class="btn-primary btn" style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;">
                            <font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font>
                        </button>
                    </a>
                </div>
                <br><br>
            </center>
        </div>
    </div>';

}; };
};
?>
</div>
</body>
</html>

