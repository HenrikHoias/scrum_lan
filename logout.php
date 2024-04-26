<!-- logout koden for at brukeren for muligheten til å logge ut -->

<?php
session_start(); // Start the session
session_destroy(); // Destroy all session data

// Redirect the user to the login page
header("Location: home.php");
exit;
?>