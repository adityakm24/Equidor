<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../XIIB.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>

        <a href="../reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a>

    </p>
    
    <div>
 
     <?php
     include("config.php");
     $fetchVideos = mysqli_query($con, "SELECT id, student_name, location, location2 FROM xiibstud ORDER BY id ASC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $id = $row['id'];
       $name = $row['student_name'];
       $location = $row['location'];
       $location2 = $row['location2'];
 
         
            echo "<table border='1'>
            <tr>
            <th>SI NO</th>
            <th>student name</th>
            <th>webcam</th>
            <th>screen recording</th>
            </tr>";
       echo "<td>'".$id."'</a></td>";
       echo "<td>'".$name."'</a></td>";
       echo "<td><a href='../../classes/logdin/uploads/".$location."' > Webcam </a></td>";
       echo "<td><a href='../../classes/logdin/uploads/".$location2."' > Screen recording </a></td>";
       echo "</table>";
     }
     ?>
</body>
</html>