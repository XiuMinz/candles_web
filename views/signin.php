<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign UP</title>
</head>
<body>
    <form action="handlers/signingHandler.php" method="post">
        <label>Email Address</label>
        <input type= "email" name="email" placeholder="Enter your email address" required>
        <label>Password</label>
        <input type="password" name="passWord" placeholder="Enter your password">
        <input type="submit" value="Sign IN" name="signin">
    </form>
    <a href="signup.php">Register</a>
</body>
</html>