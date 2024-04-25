<?php
session_start(); // Make sure to start the session at the beginning of your PHP file

// Assuming you have stored the user's name in a session variable called 'user_name'
$brukernavn = $_SESSION['brukernavn'];
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Registrer Bruker</title>
    <link rel="stylesheet" href="style.css">
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
    </div>

    <div class="backgroundcontainerforregistartion">
        <form method="POST">
            <div class="containerforreg">
                <p class="textstylelogin">Lag Ny Bruker</p>

                <div class="brukernavnstyle">
                    <label for="brukernavn" class="textstylelogin">Brukernavn:</label>
                    <input type="text" name="brukernavn" placeholder="brukernavn"
                        class="loginandregisterinputstyle" /><br />
                </div>
                <div class="passordstyle">
                    <label for="passord" class="textstylelogin">Passord:</label>
                    <input type="password" name="passord" placeholder="passord"
                        class="loginandregisterinputstyle" /><br />
                </div>
                <div class="loginnbtnstyle">
                    <input type="submit" value="Logg inn" name="submit" class="submitbtnstyle" />
                </div>
                <?php
                if (isset($_POST['submit'])) {
                    //Gjøre om POST-data til variabler
                    $brukernavn = $_POST['brukernavn'];
                    $passord = md5($_POST['passord']);

                    //Koble til databasen
                    $dbc = mysqli_connect('localhost', 'root', 'Admin', 'winkensteindatabase')
                        or die('Error connecting to MySQL server.');

                    //Gjøre klar SQL-strengen
                    $query = "INSERT INTO kundeinfo (brukernavn, passord) VALUES ('$brukernavn','$passord')";

                    //Utføre spørringen
                    $result = mysqli_query($dbc, $query)
                        or die('Error querying database.');

                    //Koble fra databasen
                    mysqli_close($dbc);

                    //Sjekke om spørringen gir resultater
                    if ($result) {
                        //Gyldig login
                        echo "<div style='font-family: Impact, Haettenschweiler, \"Arial Narrow Bold\", sans-serif; font-size: xx-large; color: rgb(255, 255, 255); text-align: center;'>Takk for at du lagde bruker! Trykk <a href='loginpage.php' style='color: aqua;'>her</a> for å logge inn</div>";
                    } else {
                        //Ugyldig login
                        echo "Noe gikk galt, prøv igjen!";
                    }
                }
                ?>
            </div>
    </div>

    </form>

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