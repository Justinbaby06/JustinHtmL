<?php
session_start();

$message = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username == "" || $password == "") {
        $error = "Please fill in all fields!";
    } else {
        if (!isset($_SESSION["users"])) {
            $_SESSION["users"] = [];
        }

        if (isset($_SESSION["users"][$username])) {
            $error = "Username already exists!";
        } else {
            $_SESSION["users"][$username] = $password;
            $message = "Account created successfully! You can now log in.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(135deg, #6fb1fc, #4a90e2);
        }
        header {
            text-align: center;
            padding: 20px;
            color: white;
            font-size: 26px;
            font-weight: bold;
        }
        .box {
            width: 320px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
        }
        .btn {
            background: #4a90e2;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header>Justin Lumayaga</header>

<div class="box">
    <h2 style="text-align:center;">Sign Up</h2>

    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <?php if ($message) echo "<p class='success'>$message</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Choose Username" required>
        <input type="password" name="password" placeholder="Choose Password" required>
        <input type="submit" class="btn" value="Sign Up">
    </form>

    <a href="login.php">Already have an account? Login</a>
</div>

</body>
</html>