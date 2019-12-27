<?php
session_start();
$conn = new mysqli('127.0.0.1', 'root', 'rootroot', 'login');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    $sql_select = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $username;
            header('location:home.php');
        }
    } else {
        echo "<script>alert('username and password not match')</script>";

//        header('location:index.php');
    }
    $conn->close();


}
?>
<html>
<head></head>
<body>
<div class="form-login">
    <p>Login Form</p>
    <form action="index.php" method="post">
        Username <br>
        <input type="text" required="required" name="username">
        <br>
        <br>
        Password <br>
        <input name="password" type="password" required="required">
        <br>
        <br>
        <input type="submit" name="login" value="Login">

    </form>


</div>


</body>
</html>
<style>
    .form-login {
        margin-left: 20%;
        margin-top: 10%;
        width: 30%;
        background-color: azure;
    }
</style>