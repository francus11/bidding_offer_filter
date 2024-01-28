<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/common_head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/account.css">
    <script type="text/javascript" src="./public/js/form_transition.js" defer></script>
    <title>Account</title>
</head>

<body>
    <?php
    include 'common/header.php';
    ?>
    <div id="content">
        <div id="account-container">
            <div class="title">Account</div>
            <form id="login-form" class="visible-form" action="change_password" method="POST">
                <div class="form-title">Change password</div>
                <input type="password" name="password_old" placeholder="Old password">
                <input type="password" name="password_new" placeholder="New password">
                <input type="password" name="password_repeat" placeholder="Repeat password">
                <div class="form-buttons">
                    <div class="common-button form-button" class="focused" type="submit">Change password</div>
                </div>
            </form>
            <form id="register-form" class="invisible-form" action="change_email" method="POST">
                <div class="form-title">Change email</div>
                <input type="email" name="email_old" placeholder="Old email">
                <input type="email" name="email_new" placeholder="New email">
                <div class="form-buttons">
                    <div class="common-button form-button" class="focused" type="submit">Change email</div>
                </div>
            </form>
            <div id="big-buttons">
                <div id="delete" class="big-button" class="focused" type="submit">Delete</div>
                <a href="/logout" class="big-button" class="focused" type="submit">Logout</a>

            </div>
        </div>
    </div>
    <?php
    include 'common/footer.php';
    ?>
</body>

</html>