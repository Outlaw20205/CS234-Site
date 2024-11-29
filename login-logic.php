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

function checkAdmin($username) {
    global $pdo;

    $sql = "SELECT admin FROM registration WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$username]);

    $output = $statement->fetch();

    if ($output['admin'] == 1) {
        echo "Admin permission granted.";
        return TRUE;
    }
    else {
        return FALSE;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $retUsername = $_POST['returningUsername'];
    $retUserPWD = $_POST['returningPassword'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";
    
$pdo = new PDO($dsn, $username_db, $password_db);

$userStatus = check_user($retUsername);

if($userStatus == "Exists") {
    $sql = "SELECT password FROM registration WHERE username = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$retUsername]);

    $output = $statement->fetch();
    $retHashed = $output['password'];

    if (password_verify($retUserPWD, $retHashed)) {
        echo "Valid login. Granting access. ";

        session_start();
        $_SESSION["Valid User"] = TRUE;

        if (checkAdmin($retUsername)) {
            $_SESSION["Admin"] = "Approved";
        }

        header("Location: login-verify.php");
        exit();
    }
    else {
        echo "Invalid Username or Password. Please try again.";

        echo "
            <form action='index.php' method='POST'>
                <input type='submit' value='Try Again'>
            </form>";
    }
}
else {
    echo "<p>User does not exist. Please create an account.</p>";

    echo "
    <form action='registration-form.php' method='POST'>
        <input type='submit' value='Register'>
    </form>";
}

?>