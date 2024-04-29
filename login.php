<?php
if (isset($_POST['submit'])) {
    // Convert POST data to variables
    $brukernavn = $_POST['brukernavn'];
    $passord = md5($_POST['passord']);

    // Connect to the database
    $dbc = mysqli_connect('127.0.0.1', 'root', 'Admin', 'winkensteindatabase') or die('Error connecting to MySQL server.');

    // Prepare the SQL query
    $query = "SELECT brukernavn, passord, usertype FROM kundeinfo WHERE brukernavn='$brukernavn' AND passord='$passord'";

    // Execute the query
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    // Check if the query returns any rows
    if ($result->num_rows > 0) {
        // Valid login
        // Start the session
        session_start();

        // Fetch the user's data
        $row = mysqli_fetch_assoc($result);

        // Set the 'username' session variable
        $_SESSION['brukernavn'] = $brukernavn;

        // Check the user type and redirect accordingly
        if ($row['usertype'] == 'admin') {
            header('location: sjekkarangor.php'); // Redirect to admin page
        } else {
            header('location: index.php'); // Redirect to user page
        }
    } else {
        // Invalid login
        header('location: failure.html');
    }

    // Close the database connection
    mysqli_close($dbc);
} else {
    echo "Du har ikke trykket submit i formen"; // You haven't clicked submit in the form
}
?>