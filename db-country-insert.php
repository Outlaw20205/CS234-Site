<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST['country'];
    $abr = $_POST['abr'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($country) && isset($abr)) {
    $sql = "INSERT INTO countries_db (country, country_abr) VALUES (?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$country, $abr]);

    echo "Country: $country - ISO-3166: $abr added to the database";
    echo "
        <form action='home-page.php' method='POST'>
            <input type='submit' value='Return to Home Page'>
        </form>";
        $pdo = null;
}

else {
    echo "No values selected.";
    echo "
        <form action='home-page.php' method='POST'>
            <input type='submit' value='Return to Home Page'>
        </form>";
        $pdo = null;
}

?>