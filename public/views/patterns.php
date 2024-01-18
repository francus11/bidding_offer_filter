<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/common_head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/patterns.css">
    <title>Your patterns</title>
</head>

<body>
    <?php
    include 'common/header.php';
    ?>
    <div id="content">
        <div id="patterns-header">
            <div id="title">Patterns</div>
            <div class="common-button">Create new patters</div>
        </div>
        <div id="patterns">
            <div class="pattern">
                <div class="upper">
                    <div class="pattern-title">Refrigerator</div>
                    <div class="common-button">Edit</div>
                </div>
                <div class="lower">
                    <div class="offers-count new">New: 3</div>
                    <div class="offers-count">All: 22</div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'common/footer.php';
    ?>
</body>

</html>