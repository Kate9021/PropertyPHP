<?php
class Connection {
    
    private static $connection = NULL;
    
    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connects to database
            $host = 'daneel'; 
            $database = 'N00134200'; 
            $username = 'N00134200'; 
            $password = 'N00134200';
            
            $dsn = 'mysql:dbname='.$database.";host=".$host;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database!");
            }
        }
        
        return Connection::$connection;
    }
}
