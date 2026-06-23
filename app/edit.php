<?php
include 'includes/auth.php';
include 'db.php';
include 'includes/header.php';

$id = $_GET['id'];

// Get student data
$stmt = $conn->prepare("SELECT * FROM students WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

// Update logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $update = $conn->prepare("
        UPDATE students 
        SET fullname=?, email=?, course=?, phone=?, gender=? 
        WHERE id=?
    ");

    $update->bind_param(
        "sssssi",
        $fullname,
        $email,
        $course,
        $phone,
        $gender,
        $id
    );

    $update->execute();

    header("Location: students.php");
    exit();
}
?>

<h2>Edit Student</h2>

<form method="POST">

<input name="fullname" class="form-control mb-2"
value="<?= $student['fullname'] ?>">

<input name="email" class="form-control mb-2"
value="<?= $student['email'] ?>">

<input name="course" class="form-control mb-2"
value="<?= $student['course'] ?>">

<input name="phone" class="form-control mb-2"
value="<?= $student['phone'] ?>">

<select name="gender" class="form-control mb-2">

    <option <?= $student['gender']=="Male" ? "selected" : "" ?>>Male</option>
    <option <?= $student['gender']=="Female" ? "selected" : "" ?>>Female</option>

</select>

<button class="btn btn-primary">Update Student</button>

</form>

<?php include 'includes/footer.php'; ?>