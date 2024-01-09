<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/add_new.css">
    <link rel="stylesheet" type="text/css" href="/public/fontello/css/fontello.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>Add new search pattern</title>
</head>

<body>
    <header></header>
    <div id="content">
        <div id="filters-header">
            <div id="pattern-name">
                <div>Name: </div>
                <input type="text" name="title" autofocus value="New search pattern">
            </div>
            <div id="buttons">
                <div class="common-button">Delete</div>
                <div class="common-button">Hidden offers</div>
            </div>
        </div>
        <div id="enter-query">
            <input type="text" name="query" placeholder="Enter query">
        </div>
        <div id="website-selector">Website: Currently only Allegro supported</div>
        <div id="filters">
            <div class="added-filter">
                <div class="filter-type">Type</div>
                <div class="separator">:</div>
                <div class="filter-value">value</div>
                <i class="icon-minus"></i>
            </div>
            <div class="added-filter">
                <div class="filter-type">Type</div>
                <div class="separator">:</div>
                <div class="filter-value">value</div>
                <i class="icon-minus"></i>
            </div>
            <div class="added-filter">
                <div class="filter-type">Type</div>
                <div class="separator">:</div>
                <div class="filter-value">value</div>
                <i class="icon-minus"></i>
            </div>
            <div class="added-filter">
                <div class="filter-type">Type</div>
                <div class="separator">:</div>
                <div class="filter-value">value</div>
                <i class="icon-minus"></i>
            </div>
            <div class="added-filter">
                <div class="filter-type">Type</div>
                <div class="separator">:</div>
                <div class="filter-value">value</div>
                <i class="icon-minus"></i>
            </div>
        </div>


        <div class="added-filter">
            <div>Add new filter</div>
            <i class="icon-plus-1"></i>
        </div>
        <div id="save-button" class="common-button">Save and search</div>
    </div>
    <footer></footer>
</body>

</html>