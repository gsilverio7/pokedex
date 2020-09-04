<html>

    <head>

        <title>GS' Pokedex</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
        <link rel="icon" href="assets/img/pokeball01.png">

        <!-- AJAX! -->

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">

            

        </script>
        
        <!-- END AJAX! -->

    </head>

    <?php

        include "includes/header.php";

    ?>

    

    <body>
        
        <form action="upload.php" id="" method="post" enctype="multipart/form-data">
            ID:
            <input type="number" name="id" required>
            Name:
            <input type="text" name="name" required>
            Species:
            <input type="text" name="species" required>
            First Type:
            <input type="text" name="type" required>
            Second Type:
            <input type="text" name="type2">
            Description:
            <textarea name="description" required></textarea>
            Photo:
            <input class="file" type="file" name="fileToUpload" id="fileToUpload"  required>
            <button type="submit" name="submit"> CADASTRAR </button>
        </form>

    </body>

    <?php

        include "includes/footer.php"

    ?>

</html>