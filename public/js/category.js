function reverseTreeStructure(node, child) {
    const { id, name, parent } = node;
    const reversedNode = {
        id,
        name,
        children: child
    };
    if (node.parent) {
        return reverseTreeStructure(node.parent, reversedNode)
    }
    else {
        return reversedNode;
    }
}

function isCategoryExists(parent, child) {
    for (var i = 0; i < parent.length; i++) {
        if (parent[i].id == child.id) {
            return i + 1;
        }
    }

    return false;
}

function groupById(arr) {
    const groups = {};

    arr.forEach((item) => {
        const id = item.id;

        if (!groups[id]) {
            groups[id] = { ...item, children: [] };
        }

        if (item.children) {
            groups[id].children.push(...[item.children]);
        }
    });

    Object.values(groups).forEach((item) => {
        item.children = groupById(item.children);
    });

    return Object.values(groups);
}

function createCategoryList(array, layer) {
    var tabSigns = ""
    for (var i = 0; i < layer; i++) {
        tabSigns += "&emsp;";
    }

    var options = ``;
    array.forEach(item => {
        options += `<option value="${item.id}">${tabSigns + item.name}</option>`;
        if (item.children.length > 0) {
            options += createCategoryList(item.children, layer + 1);
        }
    });

    return options;
}

function getOptions(query) {
    let options;
    fetch(`http://localhost/cat?string=${query}`)
        .then(response => response.json())
        .then(data => {

            for (var i = 0; i < Object.keys(data.matchingCategories).length; i++) {
                data.matchingCategories[i] = reverseTreeStructure(data.matchingCategories[i], null);
            }
            const reducedJson = groupById(data.matchingCategories);
            options = createCategoryList(reducedJson, 0);

            options = `<option value=""></option>` + options;
            document.getElementById("category").innerHTML = options;
        })
        .catch(function (error) {
            console.log(error);
        });
    console.log(options);
    return options
}