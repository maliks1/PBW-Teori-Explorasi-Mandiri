<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h1>Login Form</h1>
            <br>
            <form method="POST" action="mail.php" class="login-form">
                <input type="email" name="email" placeholder="email" />
                <button type="submit" name="send">reset password</button>
                <p class="message"><a href="login.php">Login</a> Or <a href="register.php">Create an
                        account</a></p>
            </form>
        </div>
    </div>
</body>

</html>