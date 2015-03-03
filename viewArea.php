<?php
require_once 'Connection.php';
require_once 'AreaTableGateway.php';
require_once 'ProgrammerTableGateway.php';

$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$areaGateway = new AreaTableGateway($connection);
$programmerGateway = new ProgrammerTableGateway($connection);

$areas = $areaGateway->getAreaById($id);
$programmers = $programmerGateway->getProgrammersByAreaId($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/area.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>View Area Details</h2>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $area = $areas->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<td>Name</td>'
                . '<td>' . $area['name'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Description</td>'
                . '<td>' . $area['description'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Facilities</td>'
                . '<td>' . $area['facilities'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Number of Properties</td>'
                . '<td>' . $area['noOfProperties'] . '</td>';
                echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editAreaForm.php?id=<?php echo $area['id']; ?>">
                Edit Area</a>
            <a class="deleteArea" href="deleteArea.php?id=<?php echo $area['id']; ?>">
                Delete Area</a>
        </p>
        <h3>Programmers Assigned to <?php echo $area['name']; ?></h3>
        <?php if ($programmers->rowCount() !== 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Rent</th>
                        <th>Bedrooms</th>
                        <th>Area</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $programmers->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['description'] . '</td>';
                        echo '<td>' . $row['rent'] . '</td>';
                        echo '<td>' . $row['bedrooms'] . '</td>';
                        echo '<td>'
                        . '<a href="viewProgrammer.php?id='.$row['id'].'">View</a> '
                        . '<a href="editProgrammerForm.php?id='.$row['id'].'">Edit</a> '
                        . '<a class="deleteProgrammer" href="deleteProgrammer.php?id='.$row['id'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $programmers->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>There are no programmers assigned to this area.</p>
        <?php } ?>
        <?php require 'footer.php'; ?>
    </body>
</html>
