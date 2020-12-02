var moves = 0; 
var table, rows, columns, textMoves, arrayForBoard; 



//change the theme

function checkAnswer(){
  var ans = prompt("Choose background image: Among Us, Fortnite, Minecraft, Mario");

  //change the background image to user's selected image
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

 


//start new game
function start()
{
  var button = document.getElementById("scramble");
  button.addEventListener( "click", startNewGame, false );
  button.addEventListener( "click", countTimer, false);
  // button.addEventListener( "click", bg, false );
  textMoves = document.getElementById("moves");
  table = document.getElementById("puzzle");

  startNewGame();
  // window.clearInterval(countTimer, 1000);
 
  
  countTimer();
  
  
}

//star the timer when web loads
var timerVar = setInterval(countTimer, 1000);
var totalSeconds = 0;
var hour, minute, seconds;

//display the timer
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



//reset the game and start new game
function startNewGame()
{
  var bg = document.body.style.backgroundColor = "#0ec0c0";
  var puzzlePieces = new Array();
  var hasbeenUsed;
  var randomNumber = 0;
  var counter = 0;
  moves = 0;
  rows = document.getElementById("rows").value;
  columns = document.getElementById("columns").value;
  textMoves.innerHTML = moves;
  // Create the proper board size.
  arrayForBoard = new Array(rows);
  
  for (var i = 0; i < rows; i++)
  {
    arrayForBoard[i] = new Array(columns);
  }
  // Set up a temporary array for
  // allocating unique numbers.
  hasbeenUsed = new Array( rows * columns );
  for (var i = 0; i < rows * columns; i++)
  {
    hasbeenUsed[i] = 0;
  }
 
  // Assign random numbers to the board.
  for (var i = 0; i < rows * columns; i++)
  {
    randomNumber = Math.floor(Math.random()*rows * columns);
    // If our random numer is unique, add it to the board.
    if (hasbeenUsed[randomNumber] == 0) 
    {
      hasbeenUsed[randomNumber] = 1;
      puzzlePieces.push(randomNumber);
 
    }
    else // Our number is not unique. Try again.
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
      arrayForBoard[i][j] = puzzlePieces[counter];
      
      counter++;
    }
  }
 
  Table();

}




//display the tiles
    
function Table()
{
  var outputString = "";
  for (var i = 0; i < rows; i++)
  {
    outputString += "<tr>";
    for (var j = 0; j < columns; j++)
    {
      if (arrayForBoard[i][j] == 0)
      {
	outputString += "<td class=\"emptyTile\"> </td>";
      }
      else
      {
	outputString += "<td class=\"tile\" onclick=\"moveThisTile(" + i + ", " + j + ")\">" + arrayForBoard[i][j] + "</td>";
      }
    } // end for (var j = 0; j < columns; j++)
    outputString += "</tr>";
  } // end for (var i = 0; i < rows; i++)
  
  table.innerHTML = outputString;
}

//check if image is moveable 

function moveThisTile( rowIndex, rowColumn)
{
  if (moveablePiece(rowIndex, rowColumn, "up") || moveablePiece(rowIndex, rowColumn, "down") || moveablePiece(rowIndex, rowColumn, "left") ||
      moveablePiece(rowIndex, rowColumn, "right") )
  {
    incrementMoves();
  }
  
 
  if (winsGame())
  {

    // setInterval(bg, 1000);
    // function bg(){
    document.body.style.backgroundImage = "url(./mario.png)";
  // }
    alert("Congratulations! You solved the puzzle in " + moves + " moves." + hour + ":" + minute + ":" + seconds);
    var v = document.body.style.backgroundColor = "#0ec0c0";
//  setInterval(bg, 1000);
//  function bg(){
//   document.body.style.backgroundImage = "url(./mario.png)";
// }
//clearInterval(timerVar);

  
    //clearInterval(timerVar);
    // document.write(v);
    // location.reload; 
    startNewGame(); 
    
  }
}

//move a piece the direction user selected
function moveablePiece(rdirec, cdirec, direction)
{
  // The following variables an if else statements
  // make the function work for all directions.
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
  
  // Check if the tile can be moved to the spot.
  // If it can, move it and return true.
  if (rdirec + r >= 0 && cdirec + c >= 0 && rdirec + r < rows && cdirec + c < columns
  )
    {
      if ( arrayForBoard[rdirec + r][cdirec + c] == 0)
      {
        arrayForBoard[rdirec + r][cdirec + c] = arrayForBoard[rdirec][cdirec];
        arrayForBoard[rdirec][cdirec] = 0;
        Table();
      return true;
      }
  }
  return false; 
}

//check if user win the game
function winsGame()
{
  var counter = 1;
  for (var i = 0; i < rows; i++)
  {
    for (var j = 0; j < columns; j++)
    {
      if (!(arrayForBoard[i][j] == counter))
      {
	if ( !(counter === rows * columns && arrayForBoard[i][j] === 0 ))
	{
	  return false;
	}
      }
      counter++;
    }
  }
 
  return true;
}

//add move to moving counter
function incrementMoves()
{
  moves++;
  if (textMoves) // This is nessessary.
  {
    textMoves.innerHTML = moves;
  }
}

window.addEventListener( "load", start, false ); // This event listener makes the function start() execute when the window opens. 
