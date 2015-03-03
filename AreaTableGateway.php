<?php

class AreaTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getAreas() {
        // execute a query to get all areas
        $sqlQuery = "SELECT * FROM areas";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve areas");
        }

        return $statement;
    }

    public function getAreaById($id) {
        // execute a query to get the area with the specified id
        $sqlQuery = "SELECT * FROM areas WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve area");
        }

        return $statement;
    }

    public function insertArea($n, $d, $f, $nP) {
        $sqlQuery = "INSERT INTO areas " .
                "(name, description, facilities, noOfProperties) " .
                "VALUES (:name, :description, :facilities :noOfProperties)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "description" => $d,
            "facilities" => $f,
            "noOfProperties" => $nP
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert area");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteArea($id) {
        $sqlQuery = "DELETE FROM areas WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete area");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateArea($id, $n, $d, $f, $nP) {
        $sqlQuery =
                "UPDATE areas SET " .
                
                "name = :name, " .
                "description = :description, " .
                "facilities = :facilities " .
                "noOfProperties = :noOfProperties" .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "name" => $n,
            "description" => $d,
            "facilities" => $f,
            "noOfProperties" => $nP
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}


