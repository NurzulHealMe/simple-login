<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:index.php');
}
//we need protect this page
?>
<html>
<head></head>
<body>
<h2>Protected Page</h2>
<?
echo "<h3> Name : ".$_SESSION['username']."</h3>";

?>
<a href="logout.php">Logout</a>

</body>
</html>
