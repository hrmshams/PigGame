
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" type="text/css"/>
    <meta id ="csrf-meta" name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
  </head>

  <body>
    <div id="mainContainer">
      <!-- middle subcontainer -->
      <div id="center-sub-container" >
        <div class= "center">
            <label id="game-name"> {{$gameName}} </label>
            <input type="text" id="scoreVal" name="fname" value="Enter the point">
        </div>

        <div class="center">
          <div class="transparent-btn" id="new-game-btn">
            <span class="lnr lnr-plus"></span> NEW GAME
          </div>
        </div>

        <div class="center">
          <div>
            <img id="dice1" src="assets/dice-1.png" alt="dice-1" class="image">
          </div>
          <div>
            <img id="dice2" src="assets/dice-1.png" alt="dice-2" class="image">
          </div>
        </div>

        <div class="center">
          <div id="roll-dice-btn" class="transparent-btn">
            <span class="lnr lnr-roll"></span> ROLL DICE
          </div>
        </div>
        <div class="center">
          <div id="hold-btn" class="transparent-btn">
            <span class="lnr lnr-hold"></span> HOLD
          </div>
        </div>

      </div>

      <!-- left subcontainer -->
      <div class="subContainer center player" id="player-0-container">
        <div class = "center top-sub-cont">
          <p>PLAYER 0</p>
          <p class = "point red" id="player-0-sumpoint">0</p>
        </div>

        <div class = "bottom-sub-cont">
          <div class="center">
            <p>CURRENT</p>
            <p id="player-0-currentpoint">0</p>
          </div>
        </div>
      </div>

      <!-- right subcontainer -->
      <div class="subContainer center" id="player-1-container">
        <div class = "center top-sub-cont">
          <p>PLAYER 1</p>
          <p class="point red" id="player-1-sumpoint">0</p>
        </div>

        <div class = "bottom-sub-cont">
          <div class="center">
            <p>CURRENT</p>
            <p id="player-1-currentpoint">0</p>
          </div>
        </div>
      </div>

    </div>
    <!-- <img src="assets/bg.jpg" alt=""> -->
  </body>
  <script src="{{asset('js/gameScene.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/gameSceneModel.js')}}" type="text/javascript"></script>

</html>