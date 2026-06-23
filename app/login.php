<?php
session_start();
include 'db.php';

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5 col-md-4">

<h3>Login</h3>

<?php if($error) echo "<div class='alert alert-danger'>$error</div>"; ?>

<form method="POST">
<input name="username" class="form-control mb-2" placeholder="Username">
<input type="password" name="password" class="form-control mb-2" placeholder="Password">
<button class="btn btn-primary w-100">Login</button>
</form>

</div>

</body>
</html>