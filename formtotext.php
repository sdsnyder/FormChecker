<!DOCTYPE html>
<html> 
    <head>
        <title>Writing to File</title>
        <link rel="stylesheet" type="text/css" href="style.css" title="style" />
    </head>

    <body>
        <!-- QUESTION 2 BEGINS HERE -->
        <!-- =============================================================================================================================== -->
        <?php 
        //opening txt file 
            $history = fopen("/afs/umbc.edu/users/s/s/ssnyder3/pub/text-files/data.txt", "a+") or die("Error - file could not be opened"); 
            if(!(file_exists("/afs/umbc.edu/users/s/s/ssnyder3/pub/text-files/data.txt")))
        ?> 

        <?php
            // locking history.txt 
            if(flock($history, LOCK_EX))

            // retrieve values to variables
            $title = $_POST["title"];
            $author = $_POST["auth"];
            $isbn = $_POST["isbn"]; 
            $genre = $_POST["genre"];
            
            // if !empty, writes variables to file 
            if(!(empty($title)) && !(empty($author)) && !(empty($isbn)) && !(empty($genre))){
                if(!(empty($title))){
                    $bytes_written = fwrite($history, $title);
                    fwrite($history, "\n");
                    if($bytes_written == false){
                        print("<p>Unable to write file.</p>");
                    }
                }

                if(!(empty($author))){
                    $bytes_written = fwrite($history, $author);
                    fwrite($history, "\n");
            
                    if($bytes_written == false){
                        print("<p>Unable to write file.</p>");
                    }}

                if(!(empty($isbn))){
                    $bytes_written = fwrite($history, $isbn);
                    fwrite($history, "\n");
                
                    if($bytes_written == false){
                        print("<p>Unable to write file.</p>");
                    }}

                if(!(empty($genre))){
                    $bytes_written = fwrite($history, $genre);
                    fwrite($history, "\n");
                
                    if($bytes_written == false){
                        print("<p>Unable to write file.</p>");
                    }}
            } 
            else {
                if(empty($title)){
                ?>
                <p class="alert">
                    You forgot the title! Go back to <a href="bookform.html">the form</a> page to write content to the file. <!--messed up -->
                </p> 
                <?php
                }

                if(empty($author)){
                    ?>
                    <p class="alert">
                        You forgot the author! Go back to <a href="bookform.html">the form</a> page to write content to the file. <!--messed up -->
                    </p> 
                    <?php
                }

                if(empty($isbn)){
                    ?>
                    <p class="alert">
                        You forgot the ISBN! Go back to <a href="bookform.html">the form</a> page to write content to the file. <!--messed up -->
                    </p> 
                    <?php
                }

                if(empty($genre)){
                    ?>
                    <p class="alert">
                        You forgot the genre! Go back to <a href="bookform.html">the form</a> page to write content to the file. <!--messed up -->
                    </p> 
                    <?php
                }

            }
            flock($history, LOCK_UN); //unlock file 
            fclose($history); //close file 

        ?>
        <!-- QUESTION 2 ENDS HERE -->
        <!-- =============================================================================================================================== -->

        <!-- QUESTION 4 BEGINS HERE -->
        <!-- =============================================================================================================================== -->
        <?php 
            $history = fopen("/afs/umbc.edu/users/s/s/ssnyder3/pub/text-files/data.txt", "r") or die("Error - file could not be opened"); 
            //$recenthistory = `tail -4 /afs/umbc.edu/users/s/s/ssnyder3/pub/text-files/data.txt`; reads out most recent entry 
            //echo $recenthistory;
        ?>
        <h1> Favorite Book History </h1> 
        <h3> Thank you for your entry. </h3> 
        <h6> If you would like to make a new entry, please click <a href="bookform.html">here</a>. </h6>
        <h6> Entry History: </h6>
        <p>
        <?php
            $history_contents = file("/afs/umbc.edu/users/s/s/ssnyder3/pub/text-files/data.txt");
            $i = 1;
            foreach ($history_contents as $line){
        ?>
        <p class="results">
                <?php print("Line $i: $line <br />"); ?>
        </p>
        <?php
                $i++;
            }
            fclose($history);
        ?>
        <!-- =============================================================================================================================== -->
        <!-- QUESTION 4 ENDS HERE -->
    </body>
</html> 