<?php
session_start();

// Step 1: Connect to the database
$connection = mysqli_connect("localhost", "root", "Admin", "winkensteindatabase");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have stored the user's name in a session variable called 'brukernavn'
$brukernavn = $_SESSION['brukernavn'];

// Step 2: Retrieve data from the database based on the user's username
$sql = "SELECT usertype FROM Kundeinfo WHERE brukernavn = '$brukernavn'";
$result = mysqli_query($connection, $sql);

// Check if query was successful and if the user is an admin
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $usertype = $row['usertype'];
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <!--     navbar delen av koden -->
    <div class="navbar">
        <a href="index.php" class="atagstyle">Home</a>
        <a href="pamelding.php" class="atagstyle">Meld Deg På</a>
        <a href="loginpage.php" class="atagstyle">Logg Inn</a>
        <a href="registration.php" class="atagstyle">Registrer Bruker</a>
        <?php
        // Display the "List of Participants" button if the user is an admin
        if ($usertype === 'admin') {
            echo '<a href="sjekkarangor.php" class="atagstyle">Deltakere</a>'; // Add your button here
        }
        ?>


        <!--         php kode som printer ut brukeren username når den har logget inn, den skal også vise en logout knapp hvis brukeren har logget inn. -->
        <?php
        // Check if the user is logged in
        if (isset($_SESSION['brukernavn'])) {
            // If logged in, display the logout link
            echo '<a href="logout.php" class="atagstyle">Logout</a>';
        } else {
            // If not logged in, display a message or redirect to the login page
            echo '<p class="notloggedinstyle">Du er ikke logget inn</p>';
        }
        ?>
        <div class="welcomeuserstyle">
            <p class="welcomeUser">Welcome,
                <?php echo $brukernavn ?>
            </p>
        </div>
    </div>

    <!--     slutt på php delen -->

    <!--     slutt på navbar delen -->

    <div class="backgroundcontainer">
        <h2 class="headlinetext">Velkommen til WolfenStein LAN!</h2>
        <a href="pamelding.php" class="atagstyleoptiontwo">Meld deg på vår LAN</a>
    </div>

    <div class="wowie">
        <div class="Sponsors">
            <img src="images/dnb.png" class="imgstyle">
            <img src="images/telenor.png" class="imgstyle">
            <img src="images/steelseries.png" class="imgstyle">
            <img src="images/epicgames.png" class="imgstyle">
        </div>
    </div>



</body>

</html>