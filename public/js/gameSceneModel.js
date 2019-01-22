const csrf_token = document.getElementById("csrf-meta").getAttribute('content');
const player1Name = document.getElementById("player1name")
const player2Name = document.getElementById("player2name")

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
  var self = this
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
      var json = JSON.parse(res)
      self.getGameState(json.game_id)
    }
    var onFail = function(err){
      console.log(err)
    }

    var game_name = document.getElementById("game-name").innerHTML;
    request('GET', routes.askGame + "/" + game_name, null, onSucc, onFail)
  }

  this.getGameState = function(game_id){
    var onSucc = function (res){
      var json = JSON.parse(res)
      player1Name.innerHTML = json.player1
      player2Name.innerHTML = json.player2
      console.log(json);
    }
    var onFail = function(err){
      console.log(err)
    }

    setInterval(
        function(){ 
          request('GET', routes.getGameState+ "/" + game_id, null, onSucc, onFail)
        }
    ,1500)
  }
}

var gameHandler = new GameHandler()
gameHandler.askForGame()
