<?php
$id = session_id();
if ($id == "") {
    session_start();
}
require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Property Management Company</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script type="text/javascript" src="js/property.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Insert Area</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="createArea.php" 
              method="POST"
              onsubmit="return validateCreateArea(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="" />
                            <span id="descriptionError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Facilities</td>
                        <td>
                            <input type="text" name="facilities" value="" />
                            <span id="facilitiesError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Insert Area" name="insertArea" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>

