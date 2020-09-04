<?php

    $sql = "SELECT *  from pokedex order by id asc";

    $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row

            echo "<div class=" . "dexlist" .">";
            
            while($row = $result->fetch_assoc()) {

                echo "<div class=" . "dexitem" .">" . 
                "<br>" . "Name: " . $row['name'] . "<br>" .
                "<img src= " . $row['photo'] . "> </img>" . "<br>" .
                "ID: ";

                if($row['id'] < 10 ){
                    echo '00' . $row['id'];
                }

                elseif($row['id'] < 100 && $row['id'] > 9){
                    echo '0' . $row['id'];
                }
                
                else { echo $row['id'];}

                echo "<br>" .
                "Species: " . $row['species'] . " Pokemon" . "<br>" 
                . "Type: " . $row['type']; 
                
                if (!empty($row['type2'])){
                    echo "/" . $row['type2'];
                }

                echo "<br>" 
                . "Description: " . $row['description'] . "<br>" . 
                "</div>";
                
            }

            echo "</div>";

    }

    $conn->close();

?>