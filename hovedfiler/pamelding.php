<?php
session_start();

// Sjekk om brukeren er logget inn
if (!isset($_SESSION['brukernavn'])) {
    // Hvis ikke logget inn, omdiriger brukeren til innloggingssiden
    header("Location: loginpage.php");
    exit(); // Avslutt skriptet for å hindre at resten av siden lastes inn
}

// Step 1: Connect to the database
$connection = mysqli_connect("localhost", "root", "Admin", "winkensteindatabase");

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming you have stored the user's name in a session variable called 'brukernavn'
$brukernavn = $_SESSION['brukernavn'];

// Initialize variables for form data
$email = $hvorfor = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $hvorfor = $_POST["hvorfor"];

    // Step 2: Retrieve data from the database based on the user's username
    $sql = "SELECT usertype FROM kundeinfo WHERE brukernavn = '$brukernavn'";
    $result = mysqli_query($connection, $sql);

    // Step 3: Insert form data into the database
    $sql_insert = "INSERT INTO pameldingsinfo (brukernavn, email, hvorfor) VALUES ('$brukernavn','$email', '$hvorfor')";
    $result_insert = mysqli_query($connection, $sql_insert);
    if (!$result_insert) {
        echo "Error: " . mysqli_error($connection);
    } else {
        // Redirect to thankyou.php
        header("Location: thankyou.php");
        exit();
    }
}

// Close the database connection
mysqli_close($connection);
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
            <div class="downloadgameifregisterdcontainer">
                <a href="redownloadgame.php" class="atagstyledupe">Re-Download Spillet!</a>
            </div>
        </div>
    </div>


    <!--     jeg har brukt form method POST for å levere inn informasjonen brukeren taster inn til databasen. -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="inputcontainer">
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

    /*     dette her er database delen som gjør at det brukeren skriver blir sendt til databasen.
        Jeg har brukt syntaxen require for å enkelt hente database informasjonen.
        jeg har definert variablene til post som at det blir levert i databasen og sql for å sende det inn. */

    require "databaseconnection.php";

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