<?php
require 'connection.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

// Client-side validation
$errors = [];

if (!preg_match('/^[A-Za-z ,.]+$/', $fullname)) {
    $errors[] = 'Invalid Full Name';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid Email Address';
}

if (!preg_match('/^09[0-9]{9}$/', $mobile)) {
    $errors[] = 'Invalid Mobile Number';
}

// Calculate age based on date of birth
$dob_date = new DateTime($dob);
$today = new DateTime();
$age = $today->diff($dob_date)->y;

// Server-side validation
if (empty($errors)) {
    // Perform database insert using PDO
    try {
        $stmt = $pdo->prepare("INSERT INTO users (fullname, email, mobile, dob, gender, age) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $mobile, $dob, $gender, $age]);

        echo 'User added successfully!';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo implode('<br>', $errors);
}
?>
