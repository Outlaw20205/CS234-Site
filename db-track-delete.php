<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $circuit = $_POST['circuit'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($circuit)) {
    $sql = "DELETE FROM track_db WHERE circuit_name = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$circuit]);

    echo "$circuit has now been deleted from the database.";
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