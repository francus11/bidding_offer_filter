const search = document.querySelector('#enter-query input');
const addFilterButtonLocation = document.querySelector("#add-filter-button");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter" && search.value.length >= 3) {
        loadAddFilterButton();
    }
});

function loadAddFilterButton() {
    var filterButton = `
    <div class="added-filter" onclick="openModal()">
        <div>Add new filter</div>
        <i class="icon-plus-1"></i>
    </div>
    `;
    var saveButton = '<div id="save-button" class="common-button">Save and search</div>';
    addFilterButtonLocation.innerHTML = filterButton;
    addSaveButtonLocation.innerHTML += saveButton;
}

function openPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";

}

function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}


