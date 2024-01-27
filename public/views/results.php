<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/common_head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/results.css">
    <title>Results</title>
</head>

<body>
    <?php
    include 'common/header.php';
    ?>
    <div id="content">
        <div id="results-header">
            <div id="result-counter">Results: 34</div>
            <div class="common-button">Edit</div>
        </div>
        <?php foreach ($offers as $offer) : ?>
            <div class="result-item">
                <div class="result-item-photo">
                    <img src="/public/img/mock.jpg" alt="">
                </div>
                <div class="result-item-texts">
                    <div class="result-item-title"><?= $offer->getName(); ?></div>
                    <div class="result-item-price"><?= $offer->getPrice(); ?> zł</div>
                </div>
                <div class="result-item-buttons">
                    <i class="icon-heart-empty"></i>
                    <i class="icon-eye-off"></i>
                </div>
            </div>
        <?php endforeach; ?>

        
    </div>
    <?php
    include 'common/footer.php';
    ?>
</body>

</html>