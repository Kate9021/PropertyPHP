<?php

class AreaTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getAreas() {
        // execute a query to get all areas
        $sqlQuery = "SELECT * FROM area";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve areas");
        }

        return $statement;
    }

    public function getAreaById($id) {
        // execute a query to get the area with the specified id
        $sqlQuery = "SELECT * FROM area WHERE id = :id";

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

    public function insertArea($a, $d, $f) {
        $sqlQuery = "INSERT INTO area " .
                "(address, description, facilities) " .
                "VALUES (:address, :description, :facilities )";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "facilities" => $f
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert area");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteArea($id) {
        $sqlQuery = "DELETE FROM area WHERE id = :id";

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

    public function updateArea($id, $a, $d, $f) {
        $sqlQuery =
                "UPDATE area SET " .
                
                "address = :address, " .
                "description = :description, " .
                "facilities = :facilities " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "address" => $a,
            "description" => $d,
            "facilities" => $f
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}


