const csrf_token = document.getElementById("csrf-meta").getAttribute('content');
const player1Name = document.getElementById("player1name")
const player2Name = document.getElementById("player2name")
const endBtn = document.getElementById("end-btn")

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
  var home = 'http://127.0.0.1/myFirstSite/public/home'
  var routes = {
    askGame : baseURL + 'ask_new_game',
    getGameState : baseURL + 'get_game_state',
    endGame : baseURL + 'end_game',
    commentGame : baseURL + 'comment_game',
    commentUser : baseURL + 'comment_user',
  }

  this.onSuccCallback = (res)=>{
    console.warn(res)
  }
  this.onFailCallback = (err)=>{
    console.warn('error happened : ')
    console.warn(err)
  }

  this.game_id = null

  this.askForGame = function(){
    var onSucc = function(res){
      console.log(res)
      var json = JSON.parse(res)
      self.game_id = json.game_id
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

  this.endGame = function(){
    if (!self.game_id){
      console.log('acc')
      return
    }

    var onSucc = function(res){
      console.log(res)
    }
    var onFail = function(err){
      console.log(err)
    }

    var userComment = window.prompt("please enter your comment about the **USER** if you're willing to! leave it empty otherwise","");
    var gameComment = window.prompt("please enter your comment about the **GAME** if you're willing to! leave it empty otherwise","");

    request('GET', routes.userComment + '/' + this.game_id + '/' + userComment, null, onSucc, onFail)
    request('GET', routes.gameComment + '/' + this.game_id + '/' + gameComment, null, onSucc, onFail)
    request('GET', routes.endGame + '/' + this.game_id, null, function(res){
      console.log(res)
      window.location.replace(home)
    }, onFail)

  }
}

var gameHandler = new GameHandler()
gameHandler.askForGame()
endBtn.onclick = gameHandler.endGame
