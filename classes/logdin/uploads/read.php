<?php
include("config.php");
?>
<!doctype html>
<html>
  <head>
    <style>
    video{
     float: left;
    }
    </style>
  </head>
  <body>
    <div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT id, student_name, location, location2 FROM xiiastud ORDER BY id ASC");
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
       echo "<td><a href='".$location."' > Webcam </a></td>";
       echo "<td><a href='".$location2."' > Screen recording </a></td>";
       echo "</table>";
     }
     ?>
 
    </div>

  </body>
</html>