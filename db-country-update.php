<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST['country'];
    $country_new = $_POST['country_new'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($country_new) && isset($country)) {
    $sql = "UPDATE countries_db SET country = ? WHERE country = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$country_new, $country]);

    echo "Country name for $country is now shown as $country_new in the database";
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