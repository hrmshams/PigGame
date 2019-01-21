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
  var baseURL = 'http://127.0.0.1/myFirstSite/public/api/game_scene/'
  var routes = {
    askGame : baseURL + 'ask_new_game',
    getGameState : baseURL + 'get_game_state'
  }

  this.onSuccCallback = (res)=>{
    console.warn(res)
  }
  this.onFailCallback = (err)=>{
    console.warn('error happened : ')
    console.warn(err)
  }

  this.askForGame = function(){
    var onSucc = function(res){
      console.log(res)
    }
    var onFail = function(err){
      console.log(err)
    }

    var game_name = document.getElementById("game-name").innerHTML;
    // var data = 'game_name=' + game_name 
    request('GET', routes.askGame + "/" + game_name, null, onSucc, onFail)
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
          request('GET', routes.getGameState, data, onSucc, onFail)
        }              
    ,1500)
  }
}

var gameHandler = new GameHandler()
gameHandler.askForGame()