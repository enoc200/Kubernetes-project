<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO students(fullname,email,course,phone,gender)
            VALUES('$fullname','$email','$course','$phone','$gender')";

    $conn->query($sql);

    header("Location: students.php");
    exit();
}

include 'includes/header.php';
?>

<h2>Add Student</h2>

<form method="POST">

<input name="fullname" class="form-control mb-2" placeholder="Full Name">
<input name="email" class="form-control mb-2" placeholder="Email">
<input name="course" class="form-control mb-2" placeholder="Course">
<input name="phone" class="form-control mb-2" placeholder="Phone">

<select name="gender" class="form-control mb-2">
    <option>Male</option>
    <option>Female</option>
</select>

<button class="btn btn-success">Save</button>

</form>

<?php include 'includes/footer.php'; ?>