<!DOCTYPE HTML>
<html>

    <head>
        <title>UMBC ID Verification</title>
        <link rel="stylesheet" type="text/css" href="style.css" title="style" />
    <head>
<body>


    <?php
        $name = $_POST["name"];
        $idv = $_POST["id"];
    ?>
    <h1>Thank you, <?php print $name ?>!</h1> 
    <?php
        if(preg_match("/^[a-zA-Z]{4}[0-9]{2}/", $idv)){
    ?>
            <p class= "results">
                 Campus ID was in the correct format.
            </p>
    <?php
        }
        else{
    ?>    
            <p class= "results">
            Campus ID was incorrect. Go back and re-enter your name and campus ID. 
            </p>
    <?php
        }
    ?>

    <p class= "results"> 
        You entered your Campus ID as: <?php print $idv ?>. 
    </p>
</body>
</html>