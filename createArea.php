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
$areaGateway = new AreaTableGateway($connection);

$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$facilities = filter_input(INPUT_POST, 'facilities', FILTER_SANITIZE_STRING);

$id = $areaGateway->insertArea($address, $description, $facilities);

$message = "Area Inserted successfully";

header('Location: viewAreas.php');