<?php

class PropertyTableGateway {
    
    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }
    
    public function getPropertys() {
        // execute a query to get all programmers
        $sqlQuery = "SELECT * FROM property";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve users");
        }
        
        return $statement;
    }
    
    public function getPropertyById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM property WHERE id = :id";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve user");
        }
        
        return $statement;
    }
    
    public function insertProperty( $a, $d, $r, $b) {
        $sqlQuery = "INSERT INTO property " .
                "(address, description, rent, bedrooms) " .
                "VALUES (:address, :description, :rent, :bedrooms)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "description" => $d,
            "rent" => $r,
            "bedrooms" => $b,
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert property");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }
    
    public function deleteProperty($id) {
        $sqlQuery = "DELETE FROM property WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }
    
    public function updateProperty($id, $a, $d, $r, $b) {
        $sqlQuery =
                "UPDATE property SET " .
                "address = :address, " .
                "description = :description, " .
                "rent = :rent, " .
                "bedrooms = :bedrooms " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "address" => $a,
            "description" => $d,
            "rent" => $r,
            "bedrooms" => $b
        );

        echo '<pre>';
        print_r($sqlQuery);
        echo '</pre>';
        
        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
    
}