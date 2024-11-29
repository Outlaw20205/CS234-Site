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

function confirmAdmin($bool) {
    if ($bool == "True") {
        return 1;
    }
    else {
        return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $adminBool = $_POST['adminBool'];
}

$dsn='mysql:host=localhost;dbname=project';
$username_db="root";
$password_db="root";

$pdo = new PDO($dsn, $username_db, $password_db);

if (isset($username) && isset($pwd) && isset($adminBool)) {

    $userStatus = check_user($username);
    $adminBool = confirmAdmin($adminBool);

    if($userStatus == "Exists") {
        echo "<p>Username already exists. Please enter a different Username.</p>";
    
        echo "
        <form action='home-page.php' method='POST'>
            <input type='submit' value='Return to Home Page'>
        </form>";
        $pdo = null;
    }
    elseif ($userStatus == "DNE") {   
        $hashPWD = password_hash($pwd, PASSWORD_BCRYPT);

        $sql = "INSERT INTO registration (username, password, admin) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$username, $hashPWD, $adminBool]);
    
        echo "User $username has been added to database.";
    
        echo "
        <form action='home-page.php' method='POST'>
            <input type='submit' value='Return to Home Page'>
        </form>";
        $pdo = null;
    }
    else {
        $pdo = null;
        echo"Fatal error.";
    }
}
else {
    echo "No values selected.";
    $pdo = null;
    echo "
        <form action='home-page.php' method='POST'>
            <input type='submit' value='Return to Home Page'>
        </form>";
}

$pdo = null;

?>