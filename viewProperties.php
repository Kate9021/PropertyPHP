<?php 
require_once 'Property.php';
require_once 'Connection.php';
require_once 'PropertyTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new PropertyTableGateway($connection);

$statement = $gateway->getPropertys();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        
    </head>
    <body>
        
            <?php require 'toolbar.php' ?>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
        
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Rent</th>
                    <th>Bedrooms</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['rent'] . '</td>';
                    echo '<td>' . $row['bedrooms'] . '</td>';
                    echo '<td>'
                    . '<a href="viewProperty.php?id='.$row['id'].'">View</a> '
                    . '<a href="editPropertyForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a href="deleteProperty.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';
                    
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createPropertyForm.php">Create Property</a></p>
        </div>
        
    </body>
</html>
