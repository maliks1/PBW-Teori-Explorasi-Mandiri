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
            <h1>2FA by Email</h1>
            <br>
            <form method="POST" action="mail.php" class="login-form">
                <input type="email" name="email" placeholder="input token here" />
                <button type="submit" name="send">continue</button>
            </form>
        </div>
    </div>
</body>

</html>