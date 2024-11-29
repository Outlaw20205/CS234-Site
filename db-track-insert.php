<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $abr = $_POST['abr'];
    $cir_name = $_POST['cir_name'];
    $length = $_POST['length'];
    $turns = $_POST['turns'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($abr) && isset($cir_name) && isset($length) && isset($turns)) {
    $sql = "INSERT INTO track_db (country, circuit_name, length, turns) VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$abr, $cir_name, $length, $turns]);

    echo "Country: $abr - Circuit Name: $cir_name - Length: $length - Turns: $turns added to the database";
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