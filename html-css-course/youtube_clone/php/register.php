<?php
include 'connect.php';

if (isset($_POST['register'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../index.html");
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
