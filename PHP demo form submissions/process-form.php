<!--the form data is sent through the post method, you can retrieve the value of a particular form field by passing its name to the $_POST superglobal array, and displays each field value using echo() statement.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>
        <li><em>Name:</em> <?php echo $_POST["name"]?></li>
        <li><em>Email:</em> <?php echo $_POST["email"]?></li>
        <li><em>Subject:</em> <?php echo $_POST["subject"]?></li>
        <li><em>Message:</em> <?php echo $_POST["message"]?></li>
    </ol>
</body>
</html>