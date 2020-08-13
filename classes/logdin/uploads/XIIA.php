<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../XIIA.php");
    exit;
 }
  ?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
       $maxsize = 104857600000; // 100000MB
 
       $name = $_FILES['file']['name'];
       $name2 = $_FILES['file2']['name'];
       $target_dir = "videosxiia/";
       $target_file = $target_dir . $_FILES["file"]["name"];
       $target_file2 = $target_dir . $_FILES["file2"]["name"];
       $uname = $_POST["uname"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg","webm");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0) || ($_FILES['file2']['size'] >= $maxsize) || ($_FILES["file2"]["size"] == 0)) {
            echo "File too large. File must be less than 5MB.";
          }else{
            // Upload
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)  && move_uploaded_file($_FILES['file2']['tmp_name'],$target_file2)){
              // Insert record
              global $name2, $target_file2,$uname;
              $name2 = $name2;
              $target_file2 = $target_file2;
              $query = "INSERT INTO xiiastud(student_name,webcam,location,screencapture,location2) VALUES('".$uname."','".$name."','".$target_file."','".$name2."','".$target_file2."')";
      
              mysqli_query($con,$query);
              echo "Upload successfully.";
              echo $query;
            }
          }

       }else{
          echo "Invalid file extension.";
       }
 
     } 
     ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Upload - XIIA</title>
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <form method="post" action="" enctype='multipart/form-data'>
    <input type='text' name='uname' />
    <input type='file' name='file2' />
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>



</body>
</html>
