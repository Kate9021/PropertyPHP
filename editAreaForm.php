<?php
/*require_once 'Area.php';*/
require_once 'Connection.php';
require_once 'AreaTableGateway.php';
require_once 'PropertyTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$areaGateway = new AreaTableGateway($connection);
$gateway = new PropertyTableGateway($connection);

$statement = $areaGateway->getAreaById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script type="text/javascript" src="js/area.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Area Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editAreaForm" name="editAreaForm" action="editArea.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else {echo $row['address'];}
                            ?> "/>
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                }
                                else {echo $row['description'];}
                            ?>" />
                            <span id="descriptionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Facilities</td>
                        <td>
                            <input type="text" name="facilities" value="<?php
                                if (isset($_POST) && isset($_POST['facilities'])) {
                                    echo $_POST['facilities'];
                                }
                                else {echo $row['facilities'];}
                            ?>" />
                            <span id="facilitiesError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['facilities'])) {
                                    echo $errorMessage['facilities'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Area" name="updateArea" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>