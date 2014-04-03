<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        for($i = 1; $i<101; $i++)
        {
        if($i % 2 != 0)
        {echo "<table>";
        echo  " <tr>
                <td>".$i."</td> <td>".date("m/d/Y")."</td>
            </tr>";
        }
        else{
        echo " <tr style ='background-color: silver';>
                <td>".$i."</td> <td>".date("m/d/Y")."</td>
            </tr>";
        echo "</table>";
        }
        }
        ?>
    </body>
</html>
