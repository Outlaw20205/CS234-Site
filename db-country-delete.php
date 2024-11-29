<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $country = $_POST['country'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($country)) {
    $sql = "DELETE FROM countries_db WHERE country = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$country]);

    echo "$country has now been deleted from the database.";
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