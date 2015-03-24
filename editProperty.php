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

$id = filter_input(INPUT_POST,          'id',           FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST,     'address',      FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description',  FILTER_SANITIZE_STRING);
$rent = filter_input(INPUT_POST,        'rent',         FILTER_SANITIZE_NUMBER_INT);
$bedrooms = filter_input(INPUT_POST,    'bedrooms',     FILTER_SANITIZE_NUMBER_INT);


$rentValid = filter_var($rent, FILTER_VALIDATE_INT);
$bedroomsValid = filter_var($bedrooms, FILTER_VALIDATE_INT);
$idValid = filter_var($id, FILTER_VALIDATE_INT);

if ($areaId == -1) {
    $areaId = NULL;
}

$gateway->updateProperty($id, $address, $description, $rent, $bedrooms);

header('Location: viewProperties.php');