<?php
require "databaseconnection.php";
session_start(); // Make sure to start the session at the beginning of your PHP file

// Assuming you have stored the user's name in a session variable called 'user_name'
$brukernavn = $_SESSION['brukernavn'];

$email = $_POST["email"];
$hvorfor = $_POST["hvorfor"];

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
        <a href="index.php" class="atagstyle">Home</a>
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

    <div class="thankyoucontainer">
        <h2 class="thanksforsigningup">Takk for din påmelding. Din påmelding er offisielt registrert i systemet vårt!
        </h2>
        <h2 class="textstyletwo">På melding ID:
            <?php
            /* her er delen av koden som printer ut saks id eller påmeldings id. */
            $thenumber = "SELECT * FROM pameldingsinfo;";
            $resultavgreie = mysqli_query($connec, $thenumber);
            $resultavgreiecheck = mysqli_num_rows($resultavgreie);
            $textBefore = "#";
            echo '<h2 class="ticketidtext">' . $textBefore . $resultavgreiecheck . '</h2>';

            ?>
            <a href="https://cdn.splashdamage.com/downloads/games/wet/WolfET_2_60b_custom.exe" class="atagstylenew">Last
                ned Wolfenstein spillet!</a>

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


    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        $brukernavn = $_POST["brukernavn"];
        $email = $_POST["email"];
        $hvorfor = $_POST["hvorfor"];

        $sql = "INSERT INTO pameldingsinfo (brukernavn, email, hvorfor) VALUES ('$brukernavn','$email', '$hvorfor')";
        $resultat = mysqli_query($connec, $sql);

    }


    ?>
</body>

</html>