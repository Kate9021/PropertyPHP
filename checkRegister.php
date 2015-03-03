<?php
require_once 'Connection.php';
require_once 'UserTableGateway.php';
require_once 'User.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);

$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';
}
else {
    // query database to see if username exists
    $statement = $gateway->getUserByUsername($username);
    
    if ($statement->rowCount() != 0){
        $errorMessage['username'] = 'Username already registered <br/>';
    }
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Password2 must not be blank<br/>';
}
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Passwords must match<br/>';
}

if (empty($errorMessage)) {
    if (!isset($_SESSION['users'])) {
        $users = array();
    }
    else {
        $users = $_SESSION['users'];
    }
    
    $user = new User($username, $password);
    $users[] = $user;
    $_SESSION['users'] = $users;
    
    $gateway->insertUser($username, $password);
    
    header('Location: home.php');
}
else {
    require 'register.php';
}
