<!doctype html>
<html>
  <head>
    <?php
    include("config.php");
 
    if(isset($_POST['but_upload'])){
       $maxsize = 104857600000; // 100000MB
 
       $name = $_FILES['file']['name'];
       $name2 = $_FILES['file2']['name'];
       $target_dir = "videos/";
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
              $query = "INSERT INTO videos(student_name,webcam,location,screencapture,location2) VALUES('".$uname."','".$name."','".$target_file."','".$name2."','".$target_file2."')";
      
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
  </head>
  <body>
    <form method="post" action="" enctype='multipart/form-data'>
    <input type='text' name='uname' />
    <input type='file' name='file2' />
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>

  </body>
</html>