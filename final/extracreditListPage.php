<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
Author - Josh Keyes
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Website Listing</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css" />
    </head>
    <body>
        
        <h1 id="logo"><span>&#x2728;</span>View Our Other Websites</h1>
        
        <div id="corner"><a href="signup.php">Signup</a></div>
        
        
        <?php
        
        $user = new User();
        $userResults = $user->readWebsite();
        
        
        echo '<table border="1" align="center">'; 
            echo '<tr><th>Website</th><th>View Button</th></tr>';
            
            foreach ($userResults as $key => $value) {
                
                echo '<tr>';
                echo '<td>', $value['website'] ,'</td>';      
                echo '<td><form name="mainform" action="index.php" method="get"><input name="website" type="hidden" value="', $value['website'] ,'" /><input type="submit" value="View" /></form> </td>';     
                echo '</tr>';
            }
            echo '</table>';
        ?>
    </body>
</html>
