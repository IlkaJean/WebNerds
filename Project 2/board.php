<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Home</title>

  <link rel="stylesheet" href="./home.css">

 
</head>

<body>
 

  
    <h1 id="byte"> ByteTyme</h1>

  <div  class="homecontainer">
    <form action="board.php" method="get">
    <table>
        <tr>
          <th >
              <!-- Ranking -->
              <label for="Ranking">Ranking</label>
            </th>
          <th>
            <label for="username">Username</label>
          </th>
          <th>
            <label for="score">Score</label>
          </th>
        </tr>

        <?php
            //get the results from the .json file
            $data = file_get_contents('./results.json'); 
            $Results = json_decode($data); 
            //sorting the scores
            usort($Results, function($a, $b)
            {
                return strcmp($b->score,$a->score);
            });

            // show rankings
            for ($i = 0; $i < count($Results); $i++) {
                echo 
                  "<tr>".
                      "<td> ".  $i ."</td>".
                      "<td>".  $Results[$i]->username ."</td>".
                      "<td> ". $Results[$i]->score ."</td>".
                "</tr>";
          
            }

       ?> 

       
         
    </table>
</form>

  </div>
  
  <div class="home1">
    <a href="./home.php"><strong>Go Back</strong></a>

</div>




</body>

</html>
