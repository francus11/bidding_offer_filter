function getParameters(query) {
    let parameters;
    fetch(`http://localhost/api/parameters?categoryId=${query}`)
        .then(response => response.json())
        .then(data => {
            parameters = data.parameters;
        })
        .catch(function (error) {
            console.log(error);
        });

    console.log(parameters);
    return parameters
}