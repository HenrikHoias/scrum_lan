<?php
session_start();

// Step 1: Connect to the database
$connection = mysqli_connect("localhost", "root", "Admin", "winkensteindatabase");


// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Retrieve data from the table
$sql = "SELECT * FROM pameldingsinfo"; // Replace 'your_table_name' with your actual table name
$result = mysqli_query($connection, $sql);

// Assuming you have stored the user's name in a session variable called 'user_name'
$brukernavn = $_SESSION['brukernavn'];
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

    <?php
    // Display the "List of Participants" button if the user is an admin
    if ($usertype === 'admin') {
        echo '<div class="arangorbackgroundcontainer">';
        echo '<div class="arangorliststyle">';
        echo '<h2 class="headlinearangorstyle">Velkommen Admin</h2>';
        echo '<h2 class="headlinearangorstyle">Liste over folk som har påmeldt seg til LAN</h2>';
        echo '<button>List of Participants</button>'; // Add your button here
        echo '</div></div>';
    }
    ?>

    <div class="arangorbackgroundcontainer">
        <div class="arangorliststyle">
            <h2 class="headlinearangorstyle">Velkommen Admin</h2>
            <h2 class="headlinearangorstyle">Liste over folk som har påmeldt seg til LAN</h2>

            <!-- Step 3: Display the data on the website -->
            <table>
                <thead>
                    <tr>
                        <?php
                        // Fetch column names and display as table headers
                        $row = mysqli_fetch_assoc($result);
                        foreach ($row as $column_name => $value) {
                            echo "<th>$column_name</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Rewind the result set pointer back to the beginning
                    mysqli_data_seek($result, 0);

                    // Fetch and display all rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
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
<?php
// Step 4: Close the database connection
mysqli_close($connection);
?>