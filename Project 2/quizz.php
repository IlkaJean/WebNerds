<?php session_start(); ?>

<!DOCTYPE >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>PHP Quiz</title>

    <link rel="stylesheet" type="text/css" href="./quizzes.css" />
</head>

<body>
    <h1 id="byte"> ByteTyme</h1>
    <h2>Knowledge Test</h2>
    <div id="page-wrap">

             

            <form action="quiz-submit.php" method="post" id="quiz">

                <ol>
                    <?php
                        //get the questions from the .json file
                        $data = file_get_contents('./questions.json'); 
                        $Question = json_decode($data); 
                      
                        // show question and their options
                        for ($i = 0; $i < 10; $i++) {
                            echo 
                                "<li>" . 
                                       "<h3> ". $Question[$i]->question ."</h3>" . 
                                       
	        		  				"<div>".
                                      "<input type=\"radio\" name=". $Question[$i]->id ."  id=". $Question[$i]->id ." value=". 0 ."  />".
                                      "<label for=".  $Question[$i]->options[0] .">A)".  $Question[$i]->options[0] ."?". "</label>".
                                      "</div>".
                                      "<div>".
                                      "<input type=\"radio\" name=". $Question[$i]->id ."  id=". $Question[$i]->id ." value=". 1 ."  />".
                                      "<label for=".  $Question[$i]->options[1] .">B)".  $Question[$i]->options[1] ."?". "</label>".
                                      "</div>".
                                      
                                      "<div>".
                                      "<input type=\"radio\" name=". $Question[$i]->id ." id=". $Question[$i]->id ." value=". 2 ."  />".
                                      "<label for=".  $Question[$i]->options[2] .">C)".  $Question[$i]->options[2] ."?". "</label>".
                                      "</div>".
                                      
                                      "<div>".
                                      "<input type=\"radio\" name=". $Question[$i]->id ." id=". $Question[$i]->id ." value=". 3 ."  />".
                                      "<label for=".  $Question[$i]->options[3] .">D)".  $Question[$i]->options[3] ."?". "</label>".
	        		  				"</div>".
			        		  	"</li>";
                        }

                    ?> 

                </ol>

                <input type="submit" value="Submit" />

            </form>

    </div>
    <div class="home1">
        <a href="./home.html"><strong>Go Back</strong></a>

    </div>


</body>

</html>






</html>
