<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user back to the login page
header('Location: index.html');
exit();
?>