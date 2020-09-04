<?php

    $sql = "SELECT *  from pokedex order by id asc";

    $result = $conn->query($sql);

    $counter = 0;

        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {

                $counter = $counter + 1;

            }

    }

    echo "<h1 class=title > There are <span>" . $counter . "</span> Pokemon registered.</h1>";

?>