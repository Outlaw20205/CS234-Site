<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $username_new = $_POST['username_new'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($username_new) && isset($username)) {
    $sql = "UPDATE registration SET username = ? WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username_new, $username]);

    echo "Username for $username is now shown as $username_new in the database";
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