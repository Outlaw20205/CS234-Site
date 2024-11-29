<?php

function check_user($username) {
    if (!isset($username)) {
        return "No username entered.";
    }
    else {
        global $pdo;

        $sql = "SELECT username FROM registration WHERE username = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$username]);

        $output = $statement->fetch();

        if ($output['username'] != $username) {
            return "DNE";
        }
        else {
            return "Exists";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['newUsername'];
    $userPWD = $_POST['newPWD'];
    $pwdHashed = "";
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";
    
$pdo = new PDO($dsn, $username_db, $password_db);

$sql = "CREATE TABLE IF NOT EXISTS registration
    (id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(75) NOT NULL, password VARCHAR(75) NOT NULL, admin INT NOT NULL)";

$statement = $pdo->prepare($sql);
$statement->execute();

$userStatus = check_user($username);

if($userStatus == "Exists") {
    echo "<p>Username already exists. Please enter a different Username.</p>";

    echo "
    <form action='registration-form.php' method='POST'>
        <input type='submit' value='Try Again'>
    </form>";
}
elseif ($userStatus == "DNE") {
    $pwdHashed = password_hash($userPWD, PASSWORD_BCRYPT);

    $sql = "INSERT INTO registration (username, password, admin) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username, $pwdHashed, 0]);

    echo "User has been added to database.";

    echo "
    <form action='index.php' method='POST'>
        <input type='submit' value='Login'>
    </form>";
}
else {
    echo"Fatal error.";
}

$pdo = null;

?>