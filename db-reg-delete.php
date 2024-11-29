<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($username)) {
    $sql = "DELETE FROM registration WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);

    echo "$username has now been deleted from the database.";
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