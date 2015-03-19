<?php
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$rent = filter_input(INPUT_POST, 'rent', FILTER_SANITIZE_NUMBER_INT);
$bedrooms = filter_input(INPUT_POST, 'bedrooms', FILTER_SANITIZE_NUMBER_INT);


$rentValid = filter_var($rent, FILTER_VALIDATE_INT);
$bedroomsValid = filter_var($bedrooms, FILTER_VALIDATE_INT);

$id = $gateway->insertProperty($address, $description, $rent, $bedrooms);

$message = "Property created successfully";

header('Location: viewProperties.php');