<?php
include 'includes/auth.php';
include 'db.php';
include 'includes/header.php';

$search = $_GET['search'] ?? "";

if($search){
    $sql = "SELECT * FROM students WHERE fullname LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM students";
}

$result = $conn->query($sql);
?>

<h2>Students</h2>

<form method="GET">
<input name="search" class="form-control mb-2" placeholder="Search">
</form>

<table class="table table-bordered">

<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>

<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['fullname'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['course'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
</td>
</tr>

<?php endwhile; ?>

</table>

<?php include 'includes/footer.php'; ?>