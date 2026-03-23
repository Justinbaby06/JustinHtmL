echo "
    <div style='text-align:center; margin-top:100px; font-family:Arial;'>
        <h2>Welcome, " . htmlspecialchars($username) . "!</h2>
        <br>
        <a href='logout.php' style='
            padding:10px 20px;
            background:#e74c3c;
            color:white;
            text-decoration:none;
            border-radius:5px;
        '>Logout</a>
    </div>
";
exit();