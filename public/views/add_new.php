<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'common/common_head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/add_new.css">
    <script type="text/javascript" src="./public/js/pattern_edit_scripts.js" defer></script>
    <title>Add new search pattern</title>

</head>

<body>
    <div id="overlay" onclick="closePopup()"></div>

    <!-- Popup -->
    <div id="popup">
        <div id="popup-header">
            <h2>Select filter</h2>
            <i class="icon-cancel-1" onclick="closePopup()"></i>
        </div>
        <select name="filter-selector" id="filter-selector">
            <option value="price">&nbsp;&nbsp;&nbsp;&nbsp;Price</option>
            <option value="name"><t></t>Name</option>
            <option value="color">Color</option>
        </select>
    </div>
    <?php
    include 'common/header.php';
    ?>
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
            <input id="query-input" type="text" name="query" placeholder="Enter query">
            <i onclick="loadAddFilterButton()" type="button" class="icon-search"></i>
        </div>
        <div id="website-selector">Website: Currently only Allegro supported</div>
        <div id="static-filters">
            <select name="category" id="category">
                <option value=""></option>
            </select>
        </div>
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
        <div id="add-filter-button">
            <div class="added-filter" onclick="openPopup()">
                <div>Add new filter</div>
                <i class="icon-plus-1"></i>
            </div>
        </div>
        <div id="save-button-location"></div>
        <!-- <div id="save-button" class="common-button">Save and search</div> -->
    </div>
    <?php
    include 'common/footer.php';
    ?>
</body>

</html>