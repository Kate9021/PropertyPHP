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

$id = filter_input(INPUT_POST,          'id',           FILTER_SANITIZE_NUMBER_INT);
$address = filter_input(INPUT_POST,     'address',         FILTER_SANITIZE_STRING);
$description = filter_input(INPUT_POST, 'description',  FILTER_SANITIZE_STRING);
$facilities = filter_input(INPUT_POST,  'facilities',   FILTER_SANITIZE_STRING);

$idValid = filter_var($id, FILTER_VALIDATE_INT);

if ($areaId == -1) {
    $areaId = NULL;
}

$areaGateway->updateArea($id, $address, $description, $facilities);

header('Location: viewAreas.php');