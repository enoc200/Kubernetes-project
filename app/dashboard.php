<?php
include 'includes/auth.php';
include 'db.php';
include 'includes/header.php';

$total = $conn->query("SELECT COUNT(*) as t FROM students")->fetch_assoc()['t'];

$male = $conn->query("SELECT COUNT(*) as t FROM students WHERE gender='Male'")->fetch_assoc()['t'];

$female = $conn->query("SELECT COUNT(*) as t FROM students WHERE gender='Female'")->fetch_assoc()['t'];
?>

<h2 class="mb-4">Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h3><?= $total ?></h3>
                <p>Total Students</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h3><?= $male ?></h3>
                <p>Male Students</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h3><?= $female ?></h3>
                <p>Female Students</p>
            </div>
        </div>
    </div>

</div>

<hr>

<h4>Quick Actions</h4>

<a href="register.php" class="btn btn-success">➕ Add Student</a>
<a href="students.php" class="btn btn-primary">📋 View Students</a>

<?php include 'includes/footer.php'; ?>