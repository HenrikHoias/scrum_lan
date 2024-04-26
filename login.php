<?php
if (isset($_POST['submit'])) {
    //Gjøre om POST-data til variabler
    $brukernavn = $_POST['brukernavn'];
    $passord = md5($_POST['passord']);

    //Koble til databasen
    $dbc = mysqli_connect('127.0.0.1', 'root', 'Admin', 'winkensteindatabase') or die('Error connecting to MySQL server.');

    //Gjøre klar SQL-strengen
    $query = "SELECT brukernavn, passord from kundeinfo where brukernavn='$brukernavn' and passord='$passord'";
    echo $query;

    //Utføre spørringen
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    //Sjekke om spørringen gir resultater
    if ($result->num_rows > 0) {
        // Gyldig login
        // Set the 'username' session variable
        session_start(); // Make sure to start the session
        $_SESSION['brukernavn'] = $brukernavn;

        header('location: success.html');
    } else {
        // Ugyldig login
        header('location: failure.html');
    }

    //Koble fra databasen
    mysqli_close($dbc);
} else {
    echo "Du har ikke trykket submit i formen";
}
?>

<!-- dette er koden for å få brukeren til logge inn i nettsiden, der har jeg definert nødvendig informasjon som datbase navn, passord, user og hvilken sever. -->