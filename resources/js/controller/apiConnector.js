const baseUrl = "/myFirstSite/public/"
const methods = {
    getUsers : "api/users",
    getGames : 'api/games',
}

export function getUsers(filter, onSuccess, onFailure){
    let url = baseUrl + methods.getUsers
    if (filter){
        url = url + "/" + filter
    }
    fetch(url, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => response.json())     
    .then(response => onSuccess(response))     
    .catch(err => onFailure(err));
}

export function getGames(filter, onSuccess, onFailure){
    let url = baseUrl + methods.getGames
    if (filter){
        url = url + "/" + filter
    }

    fetch(url, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        },
    })
    .then(response => response.json())     
    .then(response => {
        onSuccess(response)
    })     
    .catch(err => onFailure(err));
}