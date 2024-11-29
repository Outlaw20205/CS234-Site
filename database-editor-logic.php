<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $editChoice = $_POST['actionVal'];
    $db_choice = $_POST['db_select'];
}

if ($editChoice == "insert") {
    if ($db_choice == "country") {
        header("Location: db-country-insert-form.php");
    exit();
    }
    elseif ($db_choice == "track") {
        header("Location: db-track-insert-form.php");
        exit();
    }
    elseif ($db_choice == "reg") {
        header("Location: db-reg-insert-form.php");
        exit();
    }
    else {
        header("Location: home-page.php");
        exit();
    }
}
elseif ($editChoice == "search") {
    if ($db_choice == "country") {
        header("Location: db-country-search-form.php");
    exit();
    }
    elseif($db_choice == "track") {
        header("Location: db-track-search-form.php");
        exit();
    }
    elseif ($db_choice == "reg") {
        header("Location: db-reg-search-form.php");
        exit();
    }
    else {
        header("Location: home-page.php");
        exit();
    }
}
elseif ($editChoice == "update") {
    if ($db_choice == "country") {
        header("Location: db-country-update-form.php");
    exit();
    }
    elseif($db_choice == "track") {
        header("Location: db-track-update-form.php");
        exit();
    }
    elseif ($db_choice == "reg") {
        header("Location: db-reg-update-form.php");
        exit();
    }
    else {
        header("Location: home-page.php");
        exit();
    }
}
elseif ($editChoice == "delete") {
    if ($db_choice == "country") {
        header("Location: db-country-delete-form.php");
    exit();
    }
    elseif($db_choice == "track") {
        header("Location: db-track-delete-form.php");
        exit();
    }
    elseif ($db_choice == "reg") {
        header("Location: db-reg-delete-form.php");
        exit();
    }
    else {
        header("Location: home-page.php");
        exit();
    }
}
else {
    header("Location: home-page.php");
    exit();
}
?>