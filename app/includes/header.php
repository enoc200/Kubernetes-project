<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            background: #212529;
            color: white;
            padding: 20px;
            position: fixed;
            width: 220px;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #0d6efd;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h4>Student System</h4>
    <hr>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="register.php">➕ Add Student</a>
    <a href="students.php">📋 View Students</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<div class="content">