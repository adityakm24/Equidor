<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
echo "<h3>logged out!</h3>";
echo "<h3><a href='../../../index.html'>HOME</a></h3>";
exit;
?>