<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user back to the login page
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <form class="form">
        <h2 class="title__dashboard">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p class="paragraph__dashboard">This is your dashboard.</p>
        <a type="submit__dashboard" class="logout-btn" href="logout.php">Logout</a>
    </form>
</body>
</html>


