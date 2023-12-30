<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <header></header>
    <div id="content">
        <div id="login-container">
            <form id="login-form" action="login" method="POST">
                <div class="form-title">Login</div>
                <input type="text" name="login" class="login-input" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <div class="form-buttons">
                    <button>Register</button>
                    <button class="focused" type="submit">Login</button>
                </div>
            </form>
            <form id="register-form" action="register">
                <div class="form-title">Register</div>
                <input type="text" name="login" class="login-input" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_repeat" placeholder="Repeat password">
                <div class="form-buttons">
                    <button class="focused" type="submit">Register</button>
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
    <footer></footer>
</body>

</html>