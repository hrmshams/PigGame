const baseUrl = "/myFirstSite/public/"
const methods = {
    getUsers : "api/users",
    getGames : 'api/games',
    addGame : 'api/games/add_game',
    getReviews: 'api/get_reviews/'
}
const csrf_token = document.getElementById("csrf-meta").getAttribute('content');
const axios = require('axios')


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

export function addGame(data, onSuccess, onFailure){
    let url = baseUrl + methods.addGame
    console.log(data)

    axios({
        method: 'post',
        url: url,
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN" : csrf_token
        },
        data: data
    }).then((res)=>{
        onSuccess(res)
    }).catch((err)=>{
        onFailure(err)
    });
}

export function getAdminReviews(isGameComments, onSuccess, onFailure){
    let url = methods.getReviews
    if (isGameComments){
        url += "games"
    }else{
        url += "users"
    }

    axios({
        method: 'get',
        url: url,
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN" : csrf_token
        },
    }).then((res)=>{
        onSuccess(res)
    }).catch((err)=>{
        onFailure(err)
    });

}