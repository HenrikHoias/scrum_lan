<?php
session_start(); // Make sure to start the session at the beginning of your PHP file

// Assuming you have stored the user's name in a session variable called 'user_name'
$brukernavn = $_SESSION['brukernavn'];
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <title>Lag en bruker</title>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,600;1,600&display=swap"
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
    </div>

    <div class="cotnainerforevetythinglogin">
        <div class="containerforloginpage">
            <p class="textstylelogin">Vennligst logg inn</p>
            <form method="post" action="login.php">
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

            </form>
            <p class="textstylelogin">Eller klikk <a href="registration.php" class="herstyle">her</a> for å
                registrere
                ny bruker
        </div>
    </div>
    <div class="wowie">
        <div class="sposorsloginpage">
            <img src="images/dnb.png" class="imgstyle">
            <img src="images/telenor.png" class="imgstyle">
            <img src="images/steelseries.png" class="imgstyle">
            <img src="images/epicgames.png" class="imgstyle">
        </div>
    </div>


</body>

</html>