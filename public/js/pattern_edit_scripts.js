const search = document.querySelector('#enter-query input');
const addFilterButtonLocation = document.querySelector("#add-filter-button");
const addSaveButtonLocation = document.querySelector("#save-button-location");
const searchIcon = document.querySelector('#enter-query i');
const save = document.querySelector('#save-button');
const staticFilters = document.getElementById("static-filters");
const category = document.getElementById("category");
const filtersList = document.getElementById("filter-selector");
const filtersBox = document.getElementById('filters');

let parametersGlobal;

let selectedParameter;
let selectedParameterValue;

search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        queryInserted()
    }
});

function searchIconClicked() {
    queryInserted();
}

function queryInserted() {
    if (search.value.length >= 3) {
        loadCategoryList()
        loadAddFilterButton();
    }
}

function loadCategoryList() {
    var query = search.value;
    var options = getOptions(query);
    document.getElementById("category").innerHTML = options;
    staticFilters.classList = "visible";
}

function loadAddFilterButton() {
    if (search.value.length >= 3) {
        var filterButton = `
<div class="added-filter" onclick="openPopup()">
    <div>Add new filter</div>
    <i class="icon-plus-1"></i>
</div>
`;
        var saveButton = '<div onclick="test()" id="save-button" class="common-button">Save and search</div>';
        addFilterButtonLocation.innerHTML = filterButton;
        addSaveButtonLocation.innerHTML = saveButton;
    }
}

function getParameters(query) {
    let parameters;
    let options = "";

    fetch(`http://localhost/api/parameters?categoryId=${query}`)
        .then(response => response.json())
        .then(data => {
            var parameters = data.parameters;
            parametersGlobal = data.parameters;
            parameters.forEach(element => {
                options += `<option value="${element.id}">${element.name}</option>`
            });
            console.log(filtersList);
            filtersList.innerHTML = `<option value=""></option>` + options;
        })
        .catch(function (error) {
            console.log(error);
        });


    return parameters
}

function openPopup() {
    var select = document.getElementById("filter-selector");
    var categoryId = category.options[category.selectedIndex].value;
    parameters = getParameters(categoryId);

    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}

function selectFilter() {

    var select = document.getElementById("filter-selector");
    var type = select.options[select.selectedIndex].value;
    var valueBox = document.getElementById("parameter-box");

    if (type != "") {
        document.getElementById("apply").style.display = "block";
        var foundElement = parametersGlobal.find(element => element.id === type);

        if (foundElement.type == "string") {
            var input1 = document.createElement("input");
            input1.id = "input1";
            input1.placeholder = "Wpisz coś";
            valueBox.appendChild(input1);
        }
    }

}

function applyFilter() {
    var select = document.getElementById("filter-selector");
    var type = select.options[select.selectedIndex].value;
    var foundElement = parametersGlobal.find(element => element.id === type);
    var filterTemplate = `
    <div class="added-filter" fid="${type}">
                <div class="filter-type">${foundElement.name}</div>
                <div class="separator">:</div>
                <div class="filter-value">Biały</div>
                <i class="icon-minus" onclick="deleteFilter()"></i>
            </div>
    `;
    document.getElementById('filters').innerHTML += filterTemplate;

    closePopup();
}

function searchOffers()
{
    
}