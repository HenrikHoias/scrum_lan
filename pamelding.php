<?php
session_start(); // Make sure to start the session at the beginning of your PHP file

// Assuming you have stored the user's name in a session variable called 'user_name'
$brukernavn = $_SESSION['brukernavn'];
?>

<!DOCTYPE html>
<html lang="no">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>På Melding</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,900;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <a href="home.php" class="atagstyle">Home</a>
        <a href="pamelding.php" class="atagstyle">Meld Deg På</a>
        <a href="loginpage.php" class="atagstyle">Logg Inn</a>
        <a href="registration.php" class="atagstyle">Registrer Bruker</a>

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

    <form method="POST" action="thankyou.php">
        <div class="inputcontainer">
            <h2 class="inputtextstyle">Navn</h2>
            <input type="text" name="navn" placeholder="name" class="inputsstyletq">
            <h2 class="inputtextstyle">Etternavn</h2>
            <input type="text" name="etternavn" placeholder="Etternavn" class="inputsstyletq">
            <h2 class="inputtextstyle">Alder</h2>
            <input type="text" name="alder" placeholder="alder" class="inputsstyletq">
            <h2 class="inputtextstyle">Email</h2>
            <input type="email" name="email" placeholder="email" class="inputsstyletq">
            <h2 class="inputtextstyle">Hvorfor vil du melde deg?</h2>
            <input type="text" name="hvorfor" class="hvorforinpuit" placeholder="Fortell hvorfor du vil melde deg på?">
            <div class="submitstylebutn">
                <input type="submit" class="submitbtnstyle">
            </div>
    </form>
    </div>


    <div class="wowie">
        <div class="Sponsors">
            <img src="images/dnb.png" class="imgstyle">
            <img src="images/telenor.png" class="imgstyle">
            <img src="images/steelseries.png" class="imgstyle">
            <img src="images/epicgames.png" class="imgstyle">
        </div>
    </div>


    <?php

    require "databaseconnection.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {



        $navn = $_POST["navn"];
        $etternavn = $_POST["etternavn"];
        $alder = $_POST["alder"];
        $email = $_POST["email"];
        $hvorfor = $_POST["hvorfor"];

        $sql = "INSERT INTO pameldingsinfo (navn, etternavn, alder, email, hvorfor) VALUES ('$navn', '$etternavn','$alder','$email', '$hvorfor')";
        $resultat = mysqli_query($connec, $sql);

    }


    ?>
</body>

</html>