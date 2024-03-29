
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="{{URL::asset('css/main.css')}}" type="text/css"/>
    <meta id ="csrf-meta" name="csrf-token" content="{{ csrf_token() }}">

    <meta id ="img1" content="{{ asset('assets/dice-1.png') }}">
    <meta id ="img2" content="{{ asset('assets/dice-2.png') }}">
    <meta id ="img3" content="{{ asset('assets/dice-3.png') }}">
    <meta id ="img4" content="{{ asset('assets/dice-4.png') }}">
    <meta id ="img5" content="{{ asset('assets/dice-5.png') }}">
    <meta id ="img6" content="{{ asset('assets/dice-6.png') }}">

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}

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
            <img id="dice1" src="{{asset('assets/dice-1.png')}}" alt="dice-1" class="image">
          </div>
          <div>
            <img id="dice2" src="{{asset('assets/dice-1.png')}}" alt="dice-2" class="image">
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

          <div id="end-btn" class="transparent-btn">
              <span class="lnr lnr-hold"></span> END
          </div>
  

        </div>

      </div>

      <!-- left subcontainer -->
      <div class="subContainer center player" id="player-0-container">
        <div class = "center top-sub-cont">
          <p id="player1name">PLAYER 0</p>
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
          <p id="player2name">PLAYER 1</p>
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


  </body>
  <script src="{{asset('js/gameScene.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/gameSceneModel.js')}}" type="text/javascript"></script>

</html>