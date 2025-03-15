<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $errors = [];

    if (empty($name)) {
        $errors['nameErr'] = "Name is required.";
    }

    if (empty($email)) {
        $errors['emailErr'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailErr'] = "Invalid email format.";
    }

    if (empty($password) || empty($confirm_password)) {
        $errors['passwordErr'] = "Both password fields are required.";
    } elseif ($password !== $confirm_password) {
        $errors['passwordErr'] = "Passwords do not match.";
    }

    if (!empty($errors)) {
        $query = http_build_query($errors);
        header("Location: index.html?$query");
        exit();
    } else {
        
        echo "<h2>Form Submitted Successfully!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
    }
}
?>
