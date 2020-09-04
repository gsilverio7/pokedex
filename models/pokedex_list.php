<?php

    $sql = "SELECT *  from pokedex order by id asc";

    $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row

            echo "<div class=" . "dexlist" .">";
            
            while($row = $result->fetch_assoc()) {

                echo "<div class=" . "dexitem" .">" . 
                "<br>" . "<span>" . $row['name'] . "</span> <br>" .
                "<img src= " . $row['photo'] . "> </img>" . "<br>" .
                "<span>ID:</span> ";

                if($row['id'] < 10 ){
                    echo '00' . $row['id'];
                }

                elseif($row['id'] < 100 && $row['id'] > 9){
                    echo '0' . $row['id'];
                }
                
                else { echo $row['id'];}

                echo "<br>" .
                "<span>Species:</span> " . $row['species'] . " Pokemon" . "<br>" 
                . "<span>Type:</span> " . $row['type']; 
                
                if (!empty($row['type2'])){
                    echo "/" . $row['type2'];
                }

                echo "<br>" 
                . "<span>Description:</span> " . $row['description'] . "<br>" . 
                "</div>";
                
            }

            echo "</div>";

    }

    $conn->close();

?>