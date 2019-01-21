const csrf_token = document.getElementById("csrf-meta").getAttribute('content');

var request = function(method, url, data, onSuccess, onFail) {
    var xhttp = new XMLHttpRequest()

    xhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status === 200){
          onSuccess(this.responseText)
        }
        else {
          onFail(this.responseText)
        }
      }
    }
    xhttp.open(method, url, true)

    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.setRequestHeader("X-CSRF-TOKEN", csrf_token);
    xhttp.send(data)
}

var GameHandler = function(){
  this.baseURL = 'http://127.0.0.1/myFirstSite/public/api/'
  this.routes = {
    askGame : this.baseURL + 'ask_new_game',
    getGameState : this.baseURL + 'get_game_state'
  }

  this.onSuccCallback = (res)=>{
    console.warn(res)
  }
  this.onFailCallback = (err)=>{
    console.warn('error happened : ')
    console.warn(err)
  }
  
  this.askForGame = function(){
    var onSucc = function(){

    }
    var onFail = function(){

    }

    var game_name = document.getElementById("game-name").innerHTML;
    var data = 'game_name=' + game_name 
    request('POST', this.routes.askGame, data, onSucc, onFail)
  }

  this.getGameState = function(game_id){
    var onSucc = function (res){
      console.log(res)
    }
    var onFail = function(err){
      console.log(err)
    }

    var data = "game_id="+game_id 
    this.setInterval(
        function(){ 
          request('GET', getGameState, data, onSucc, onFail)
        }              
      ,1500)
  }
}

var gameHandler = new GameHandler()
gameHandler.askForGame()
