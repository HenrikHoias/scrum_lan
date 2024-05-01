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

// Retrieve the 'navn' parameter from the URL
if (isset($_GET['navn'])) {
    $navn = $_GET['navn'];

    // Step 3: Check if the user exists in the "pameldingsinfo" table
    $sql_check_user = "SELECT COUNT(*) AS user_count FROM pameldingsinfo WHERE navn = '$navn'";
    $result_check_user = mysqli_query($connection, $sql_check_user);

    // Check if query was successful
    if ($result_check_user) {
        $row_check_user = mysqli_fetch_assoc($result_check_user);
        $user_count = $row_check_user['user_count'];

        // Check if the user exists in the "pameldingsinfo" table
        if ($user_count > 0) {
            // User exists, set flag to show the button
            $show_download_button = true;
        } else {
            // User does not exist, set flag to hide the button
            $show_download_button = false;
        }
    } else {
        // Query failed, handle error
        echo "Error: " . mysqli_error($connection);
    }
}



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

    <div class="thankyoucontainerdupoe">
        <h2 class="thanksforsigningup">Takk for at du logett inn. Last ned spillet på nytt!
        </h2>
        <a href="https://cdn.splashdamage.com/downloads/games/wet/WolfET_2_60b_custom.exe" class="atagstylenew">Last
            ned Wolfenstein spillet!</a>

    </div>



    <div class="wowie">
        <div class="Sponsorsdupe">
            <img src="images/dnb.png" class="imgstyle">
            <img src="images/telenor.png" class="imgstyle">
            <img src="images/steelseries.png" class="imgstyle">
            <img src="images/epicgames.png" class="imgstyle">
        </div>
    </div>


    <?php


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