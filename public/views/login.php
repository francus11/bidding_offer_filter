<?php
function message($text)
{
    return '<div class="message">' . $text . '</div>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/common_head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/login.css">
    <script type="text/javascript" src="./public/js/form_transition.js" defer></script>
    <title>Login</title>
</head>

<body>
    <?php
    include 'common/header_empty.php';
    ?>
    <div id="content">

        <div id="login-container">
            <form id="login-form" class="visible" action="login" method="POST">
                <div class="form-title">Login</div>
                <input type="text" name="login" class="login-input" placeholder="Username">
                <input type="password" name="password" placeholder="Password">


                <?php

                if (isset($inv_login)) {
                    echo message($inv_login);
                }
                ?>
                <div class="form-buttons">
                    <button id="register-swap-button" type="button">Register</button>
                    <button class="focused" type="submit">Login</button>
                </div>
            </form>
            <form id="register-form" class="invisible" action="register" method="POST">
                <div class="form-title">Register</div>
                <input type="text" name="login" class="login-input" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_repeat" placeholder="Repeat password">
                <div class="form-buttons">
                    <button class="focused" type="submit">Register</button>
                    <button id="login-swap-button" type="button">Login</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include 'common/footer.php';
    ?>
</body>

</html>