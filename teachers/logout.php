<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page

exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>HOME- EQUIDOR</title>
    </head>
<body>

    <div class="card text-center">
        <div class="card-header">
            <h1 class="card-title">Welcome!</h1>
        </div>
        <div class="card-body">
            <p class="card-title">Please choose your role.</p>
            <a href="teachers.html" class="btn btn-primary">Teacher</a>
            <a href="students.html" class="btn btn-primary">Student</a>
        </div>

    </div>


</body>
</html>
