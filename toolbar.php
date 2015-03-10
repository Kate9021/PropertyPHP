<?php
$session_id = session_id();
if ($session_id == ""){
    session_start();
}
echo '<ul>';
if(isset($_SESSION['username'])) {
    echo '<li><a href="home.php">Home</a></li>';
    echo '<p><a href="logout.php">Logout</a></p>';
}
else {
    echo '<li><a href="index.php">Home</a></li>';
    echo '<p><a href="login.php">Login</a></p>';
}
echo '</ul>';
?> 