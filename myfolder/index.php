<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (isset($_SESSION["users"][$username]) && $_SESSION["users"][$username] === $password) {
        echo "<h2 style='text-align:center; margin-top:100px;'>Welcome, " . htmlspecialchars($username) . "!</h2>";
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: linear-gradient(135deg, #4a90e2, #6fb1fc);
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
    <h2 style="text-align:center;">Login</h2>

    <?php if ($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" class="btn" value="Login">
    </form>

    <a href="signup.php">Don't have an account? Sign up</a>
</div>

</body>
</html>