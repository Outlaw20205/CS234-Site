<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $circuit = $_POST['circuit_cur'];
    $length = $_POST['length_update'];
    $turn = $_POST['turns_update'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($circuit) && isset($length) && isset($turn)) {
    $sql = "UPDATE track_db SET length = ?, turns = ? WHERE circuit_name = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$length, $turn, $circuit]);

    echo "$circuit now has Length: $length - Turns: $turn in the database";
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