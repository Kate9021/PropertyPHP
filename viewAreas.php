<?php
require_once 'Area.php';
require_once 'Connection.php';
require_once 'AreaTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$areaGateway = new AreaTableGateway($connection);

$area = $areaGateway->getAreas();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/area.js.js"></script>
        <title>Areas</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
        <h2>View Areas</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <!-- <th>I.D.</th> -->
                        <th>Name</th>
                        <th>Description</th>
                        <th>Facilities</th>
                        <th>Number of Properties</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $areas->fetch(PDO::FETCH_ASSOC);
                    while ($row) {

                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['facilities'] . '</td>';
                        echo '<td>' . $row['noOfProperties'] . '</td>';
                        echo '<td>'
                        . '<a href="viewArea.php?id='.$row['id'].'">View</a> '
                        . '<a href="editAreaForm.php?id='.$row['id'].'">Edit</a> '
                        . '<a class="deleteArea" href="deleteArea.php?id='.$row['id'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $areas->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="createAreaForm.php">Add Area</a></p>
            <?php require 'footer.php'; ?>
        </div>
    </body>
</html>