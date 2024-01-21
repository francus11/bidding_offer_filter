const search = document.querySelector('#enter-query input');
const addFilterButtonLocation = document.querySelector("#add-filter-button");
const addSaveButtonLocation = document.querySelector("#save-button-location");
const searchIcon = document.querySelector('#enter-query i');
const environmentAllegro = "allegro.pl.allegrosandbox.pl";
const tokenAllegro = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX25hbWUiOiIxMDY4NTE3NjkiLCJzY29wZSI6WyJhbGxlZ3JvOmFwaTpvcmRlcnM6cmVhZCIsImFsbGVncm86YXBpOmZ1bGZpbGxtZW50OnJlYWQiLCJhbGxlZ3JvOmFwaTpwcm9maWxlOndyaXRlIiwiYWxsZWdybzphcGk6ZnVsZmlsbG1lbnQ6d3JpdGUiLCJhbGxlZ3JvOmFwaTpiaWxsaW5nOnJlYWQiLCJhbGxlZ3JvOmFwaTpjYW1wYWlnbnMiLCJhbGxlZ3JvOmFwaTpkaXNwdXRlcyIsImFsbGVncm86YXBpOmJpZHMiLCJhbGxlZ3JvOmFwaTpzYWxlOm9mZmVyczpyZWFkIiwiYWxsZWdybzphcGk6c2hpcG1lbnRzOndyaXRlIiwiYWxsZWdybzphcGk6b3JkZXJzOndyaXRlIiwiYWxsZWdybzphcGk6YWRzIiwiYWxsZWdybzphcGk6cGF5bWVudHM6d3JpdGUiLCJhbGxlZ3JvOmFwaTpwcm9maWxlOnJlYWQiLCJhbGxlZ3JvOmFwaTpyYXRpbmdzIiwiYWxsZWdybzphcGk6cGF5bWVudHM6cmVhZCIsImFsbGVncm86YXBpOnNoaXBtZW50czpyZWFkIiwiYWxsZWdybzphcGk6bWVzc2FnaW5nIl0sImFsbGVncm9fYXBpIjp0cnVlLCJpc3MiOiJodHRwczovL2FsbGVncm8ucGwuYWxsZWdyb3NhbmRib3gucGwiLCJleHAiOjE3MDU4NDI3MTAsImp0aSI6IjMxNDA0Y2U2LTU2NDQtNGMwMS1hMzkxLWQ4YjNkYTJlYTg4NiIsImNsaWVudF9pZCI6ImY1MWY2Y2ZmZDIwMzQ1MjBiYjI1YzIxNGE4M2Q0ODk2In0.TM8fUik8ssFh4PeK6_xnCWXnTeRHZWrFM3CBvXgKFzDzbxivSmRvce27NVXoqbOP8Yn0F5ZY6HHcLk8SeibZHQYhHXwnW9hHUihP2QmC8DFUxgVfzqR8bE0DPnZ1Gud9LMsVzsNUDhhI5oELbNMIfPjVKVmOkd-zNCVbbkEt9pzmgwyJRYlng3ofLeuwuJWewpLC-_zqXUy-9Z860oj2yDpq-GNI_KH3wI9HGBNl7Qmj38j_zSp0n3MXB5bAEQkngsLDOR5ncY5A1dDcVYQqUwiG1F_l-fIFuK17ed9OBCWVq_gTRjrYLooT-39PqB3557zzKDddpgfFvjOf19Ysd7FAs7600wBl_OXyRlLrrmSSfnUOi06Q-jF1CGTciZJo9qc7yDvzZdG8-6FsSqarcVj1W37kT0BXYb4kYcR5w0EBJU-yzAzi5oRiQBfqRsuvckdc9bY8hi74RLSO1xrwznfmeVKuXd43aIl3_yfbJq7_R9AzvSMAHfML7k6Nm3FzNPCSFFSkUM5oeI6_kCNPqSmctsvT8rsfIVPwjgIIdamw1IMkai5Z-4gW6DbwNJohgLWtMiNpRGlosceMnOEov_ERbh5ELzQ2FJgnK3buU4J4P_77SU9tt3dpLEo-dtgKN7TW_ID34viZoy05amRqAOrrgeOYpB33Rvr6aBMnCUk";

search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        loadAddFilterButton();
        console.log('works');
    }
});

function searchIconClicked() {
    loadAddFilterButton();
}

function loadAddFilterButton() {
    if (search.value.length >= 3) {
        fetch(`https://api.${environmentAllegro}/sale/matching-categories?name=${search.value}`, {
            mode: 'cors',
            method: "GET",
            headers: {
                'Accept': 'application/vnd.allegro.public.v1+json',
                'Content-type': 'application/vnd.allegro.public.v1+json',
                'Authorization': `Bearer ${tokenAllegro}`
            }
        }).then(function (response) {
            
            console.log(response);
        });
        var filterButton = `
<div class="added-filter" onclick="openPopup()">
    <div>Add new filter</div>
    <i class="icon-plus-1"></i>
</div>
`;
        var saveButton = '<div id="save-button" class="common-button">Save and search</div>';
        addFilterButtonLocation.innerHTML = filterButton;
        addSaveButtonLocation.innerHTML = saveButton;
    }
}
function openPopup() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
}

function closePopup() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}
