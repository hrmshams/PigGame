const baseUrl = "/myFirstSite/public/"
const methods = {
    getUsers : "api/users"
}

export function getUsers(onSuccess, onFailure){
    fetch(baseUrl + methods.getUsers, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => response.json())     
    .then(response => onSuccess(response))     
    .catch(err => onFailure(err));
}