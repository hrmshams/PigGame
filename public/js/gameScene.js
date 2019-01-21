/****************************************/
/*** Game Class and its dependencies ***/
/****************************************/
var images = [
  0,
  document.getElementById("img1").getAttribute('content'),
  document.getElementById("img2").getAttribute('content'),
  document.getElementById("img3").getAttribute('content'),
  document.getElementById("img4").getAttribute('content'),
  document.getElementById("img5").getAttribute('content'),
  document.getElementById("img6").getAttribute('content'),
]

var dice1 = document.getElementById("dice1")
var dice2 = document.getElementById("dice2")
var playerContainers = [
  document.getElementById("player-0-container"),
  document.getElementById("player-1-container")
]

var scoreVal = document.getElementById("scoreVal")

var currentPointCompos = [
  document.getElementById("player-0-currentpoint"),
  document.getElementById("player-1-currentpoint")
]

var sumPointCompos = [
  document.getElementById("player-0-sumpoint"),
  document.getElementById("player-1-sumpoint")
]

function Game(score) {
  var self = this
  this.gameStarted = false

  this.startGame = function(){
    let val = parseInt(scoreVal.value)
    if (val > 0)
      self.score = val
    else
      self.score = score

    self.gameStarted = true
    self.playerNumber = 0 //number of player => 0 or 1
    self.players = [new Player(0), new Player(1)]

    currentPointCompos[0].innerHTML = 0
    currentPointCompos[1].innerHTML = 0
    sumPointCompos[0].innerHTML = 0
    sumPointCompos[1].innerHTML = 0
  }

  this.rollDice = function(){
    if (!self.gameStarted){
      alert('You need to start the game first')
      return
    }

    const vals = [(Math.floor(Math.random() * 6) + 1), (Math.floor(Math.random() * 6) + 1)]

    // setting the images
    dice1.src = images[vals[0]]
    dice2.src = images[vals[1]]

    // logic of game
    const sumRolls = vals[0] + vals[1]
    if (vals[0] === 1 || vals[1] === 1){
      // game over
      self.players[self.playerNumber].addCurrentPoint(-1)
      self.changeTurn()
    }else{
      self.players[self.playerNumber].addCurrentPoint(sumRolls)
    }
  }

  this.hold = function(){
    if (!self.gameStarted){
      alert('You need to start the game first')
      return
    }
    self.players[self.playerNumber].addSumPoint()
    if (self.checkPoints() !== 1)
      self.changeTurn()
  }

  /* */
  this.checkPoints = function(){
    console.log(self.score);
    for (let i=0; i<self.players.length; i++){
      if (self.players[i].getSumPoint() >= self.score){
        alert("Player " + i + " wins")
        self.gameStarted = false
        return 1
      }
    }
  }

  this.changeTurn = function(){
    playerContainers[self.playerNumber].removeAttribute("class")
    playerContainers[self.playerNumber].setAttribute("class", "subContainer center")
    self.playerNumber = (self.playerNumber + 1) % 2
    playerContainers[self.playerNumber].setAttribute("class", "subContainer center player")
  }

}

/*****************************************/
/*** Player Class and its dependencies ***/
/*****************************************/
function Player(playerNumber){
  var self = this
  this.playerNumber = playerNumber
  this.currentPoint = 0
  this.sumPoint = 0

  this.addCurrentPoint = function(val){
    if (val === -1)
      self.currentPoint = 0
    else
      self.currentPoint += val

    currentPointCompos[self.playerNumber].innerHTML = self.currentPoint
  }
  this.addSumPoint = function (){
    self.sumPoint = self.sumPoint + self.currentPoint
    self.addCurrentPoint(-1)

    sumPointCompos[self.playerNumber].innerHTML = self.sumPoint
  }

  this.getCurrentPoint = function(val){
    return self.currentPoint
  }
  this.getSumPoint = function(val){
    return self.sumPoint
  }
}

/****************************************/
/*** index Class and its dependencies ***/
/****************************************/
var game = new Game(100)

// assgining functions
var newGameBtn =  document.getElementById("new-game-btn")
newGameBtn.onclick = game.startGame

var rollDiceBtn =  document.getElementById("roll-dice-btn")
rollDiceBtn.onclick = game.rollDice

var holdBtn =  document.getElementById("hold-btn")
holdBtn.onclick = game.hold
