<?php
require_once 'Area.php';
require_once 'Connection.php';
require_once 'AreaTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new AreaTableGateway($connection);

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$facilities = filter_input(INPUT_POST, 'facilities', FILTER_SANITIZE_NUMBER_INT);
$noOfProperties = filter_input(INPUT_POST, 'noOfProperties', FILTER_SANITIZE_NUMBER_INT);


$rentValid = filter_var($rent, FILTER_VALIDATE_INT);
$bedroomsValid = filter_var($bedrooms, FILTER_VALIDATE_INT);
$idValid = filter_var($id, FILTER_VALIDATE_INT);

if ($areaId == -1) {
    $areaId = NULL;
}

$gateway->updateArea($id, $name, $description, $facilities, $noOfProperties);

header('Location: viewAreas.php');