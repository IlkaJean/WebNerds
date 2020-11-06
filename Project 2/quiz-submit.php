<!DOCTYPE >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <title>PHP Quiz</title>

    <link rel="stylesheet" type="text/css" href="./quizzes.css" />
</head>

<body>
    <h1>ByteTyme </h1>
     <?php
        //grading
        $score = 0;
        //get all the questions form the file
        $data = file_get_contents('./questions.json'); 
        $Question = json_decode($data); 
        
        for ($i = 0; $i < 10; $i++) {
            //compare the user's answer and the questions answer
             

            if($_POST[$i] == $Question[$i]->answer){
                 //if it the right answer increase the score
                $score = $score +1;
            }
        }
        echo " score =". $score;
    ?>

        <?php
            //save the user score
            $user = [
                "username" => "username", // ***************** change username to the name of the sign in user *****************
                "score" => $score,
            ];
       

            //add user score to the file
            $file = file_get_contents('./results.json');
            $data = json_decode($file); 
             
            $data[] = $user;
            file_put_contents('./results.json',json_encode($data));
 		?>
    

</body>

</html>

 
 