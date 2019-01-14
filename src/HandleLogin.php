<?php

require_once(SRC_PATH.DIRECTORY_SEPARATOR."Connection.php");


if(isset($_POST['username']) || isset($_POST['password'])) {
    $errors = [];

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $foundUser = $dbConnection->search('users')
                              ->where('username', $username)
                              ->where('password', $password)
                              ->get();
    //if a result was found, we can add user to Session
    if(!$foundUser) {
        $errors[] = "You've Entered Incorrect Credentials.";
    } else {
        if(count($foundUser)) {
            $_SESSION['user'] = $foundUser[0];
            header('Location:index.php');
        }
    }
}
?>