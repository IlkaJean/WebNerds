var moves = 0; 
var table, rows, columns, textMoves, array; 

//function to prompt user to select preferred background
function checkAnswer(){
  var ans = prompt("Choose background image: Among Us, Fortnite, Minecraft, Mario");
  if(ans =='Among Us'){
    document.getElementById('puzzle').style.backgroundImage="url(./amongus.png)";
  }
  else if (ans=='Fortnite'){
    document.getElementById('puzzle').style.backgroundImage="url(./fortnite.png)";
  }
  else if(ans=='Minecraft'){
    document.getElementById('puzzle').style.backgroundImage="url(./mine.png)";
  }
  else if (ans=='Mario'){
    document.getElementById('puzzle').style.backgroundImage="url(./mario.png)";
  }

}


window.onload = function(){
  var button = document.getElementById("scramble");
  button.addEventListener( "click", shuffleGame, false );
  button.addEventListener( "click", countTimer, false);
  textMoves = document.getElementById("moves");
  table = document.getElementById("puzzle");


  shuffleGame();
  countTimer();
}

//timer that counts duration of game, ends when game is won
var timer = setInterval(countTimer, 1000);
var totalSeconds = 0;
var hour, minute, seconds;
function countTimer() {
           ++totalSeconds;
           hour = Math.floor(totalSeconds /3600);
           minute = Math.floor((totalSeconds - hour*3600)/60);
           seconds = totalSeconds - (hour*3600 + minute*60);
           if(hour < 10)
             hour = "0"+hour;
           if(minute < 10)
             minute = "0"+minute;
           if(seconds < 10)
             seconds = "0"+seconds;
           document.getElementById("timer").innerHTML = hour + ":" + minute + ":" + seconds;
           
           //reset time each timer each time shuffle is pressed
           document.getElementById('scramble').addEventListener('click', () => {
            totalSeconds = 0;
            document.getElementById("timer").innerHTML = "0" + ":" + "0" + ":" + "0";
         });
 }

//creating puzzle, based on user input
function shuffleGame()
{
  
  var puzzlePieces = new Array();
  var hasbeenUsed;
  var randomNumber = 0;
  var counter = 0;
  moves = 0;
  rows = document.getElementById("rows").value;
  columns = document.getElementById("columns").value;
  textMoves.innerHTML = moves;
  
  array = new Array(rows);
  
  for (var i = 0; i < rows; i++)
  {
    array[i] = new Array(columns);
  }
 
  hasbeenUsed = new Array( rows * columns );
  for (var i = 0; i < rows * columns; i++)
  {
    hasbeenUsed[i] = 0;
  }
  // Assign random numbers to the board.
  for (var i = 0; i < rows * columns; i++)
  {
    randomNumber = Math.floor(Math.random()*rows * columns);
    // check if each rand number that is being generated is unique
    if (hasbeenUsed[randomNumber] == 0) 
    {
      hasbeenUsed[randomNumber] = 1;
      puzzlePieces.push(randomNumber);
    }
    else 
    {
      i--;
    } 
  }
  // Assign numbers to the game board.
  counter = 0;
  for (var i = 0; i < rows; i++)
  {
    for (var j = 0; j < columns; j++)
    {
      array[i][j] = puzzlePieces[counter];
      
      counter++;
    }
  }
  Table();
}



    
function Table()
{
  var content = "";
  for (var i = 0; i < rows; i++)
  {
    content += "<tr>";
    for (var j = 0; j < columns; j++)
    {
      if (array[i][j] == 0)
      {
	      content += "<td class=\"emptyTile\"></td>";
      }
      else{
	      content += "<td class=\"tile\" onclick=\"moveThisTile(" + i + ", " + j + ")\">" + array[i][j] + "</td>";
      }
    } 
        content += "</tr>";
  } 
  table.innerHTML = content;
}

//count move funciton
function Moves()
{
  moves++;
  if (textMoves) 
  {
    textMoves.innerHTML = moves;
  }
}

//changes background when user wins game
function bg(){
  document.getElementById("body").style.backgroundImage = "url(./Winner.png)";
  
}


function moveablePiece(rdirec, cdirec, direction)
{
  r = 0;
  c = 0;
  if (direction == "up")
  {
    r = -1;
  }
  else if (direction == "down")
  {
    r = 1;
  }
  else if (direction == "left")
  {
    c = -1;
  }
  else if (direction == "right")
  {
    c = 1;
  }  
  
  // return true if puzzle on board can be move to empty space. return true if it can, else false
  if ( cdirec + c >= 0  && rdirec + r >= 0  && rdirec + r < rows && cdirec + c < columns
  )
    {
      if ( array[rdirec + r][cdirec + c] == 0)
      {
        array[rdirec + r][cdirec + c] = array[rdirec][cdirec];
        array[rdirec][cdirec] = 0;
        document.getElementsByClassName("tile").onmouseover = function() {mouseOver()};
       Table();
      return true;
      }
  }
  return false; 
}

function winsGame()
{
  var counter = 1;
  for (var i = 0; i < rows; i++)
  {
    for (var j = 0; j < columns; j++)
    {
      if (!(array[i][j] == counter))
      {
	if ( !(counter == rows * columns && array[i][j] == 0 ))
	{
	  return false;
	}
      }
      counter++;
    }
  }
  return true;
}

function mouseOver() {
  document.getElementById("demo").style.border = "red";
}
// document.getElementsByClassName("tile").onmouseover = function() {mouseOver()};

function moveThisTile( row, column)
{
  if (moveablePiece(row, column, "up") || moveablePiece(row, column, "down") || moveablePiece(row, column, "left") ||
      moveablePiece(row, column, "right") )
     
Moves();


  if (winsGame())
  {
    alert("Congratulations! You solved the puzzle in " + moves + " moves. In " + hour + ":" + minute + ":" + seconds);
    
   bg(); //function to call winner image
 
  setTimeout(function(){location.reload()}, 3000); //switch image after few sec
  shuffleGame();   
  } 
}



