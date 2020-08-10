<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../XIID1.php");
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
     <!--importing new -->
  <link rel="stylesheet" href="./style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.min.js"></script>
  <script src="https://unpkg.com/ml5@latest/dist/ml5.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="./screencap.css">
  <!--importing new over-->
</head>
<body>
  <div class="page-header">
        <h1 style="color:black;">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>

        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>

    <!--  importing new -->
<!-- partial:index.partial.html -->
<h3 style="margin-left:10px;font-size:12px;font-weight:normal;color:#AAA;"><em>Checks If Browser Tab &amp; Browser Window Gain Or Lose Focus</em></h3>

<span id="focus" class="active">TAB FOCUS</span> <span id="blur">TAB BLUR</span> <span id="focusW">WINDOW FOCUS</span> <span id="blurW">WINDOW BLUR</span>

<div id="wrapper">


<iframe src="webcam.html" height="300px" width = "400px"></iframe>
<script src="FaceAI.js"></script>


<div id="container">
  <div style="text-align:center;">
    <h2>Record the screen, mic and system sounds.</h2>
    <video controls autoplay></video><br>
    <button id="shareScreen" onclick="onShareScreen()" class="btn btn-primary" >Share Screen</button>
    <button id="rec" onclick="onBtnRecordClicked()"class="btn btn-success" disabled>Record</button>
    <button id="stop" onclick="onBtnStopClicked()" class="btn btn-danger" disabled>Stop</button>
  </div>
  <a id="downloadLink" download='mediarecorder<?php echo htmlspecialchars($_SESSION["username"]); ?>.webm' name="mediarecorder.webm" href></a>

  <script src="https://webrtchacks.github.io/adapter/adapter-latest.js"></script>
  
</div>

<script  src="./screencap.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js'></script><script  src="./script.js"></script>

</body>

<!-- over importing new -->
</html>