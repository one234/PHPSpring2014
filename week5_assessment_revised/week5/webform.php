<?php include 'dependency.php'; ?>
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
         <link href="css/style.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        
                
            $signup = new Signup();
            
            $errors = array();
            
            if ( Util::isPostRequest() ){
            
            if ( $signup->entryIsValid() ) {
                echo '<p class="success">Information Valid</p>';
                

                ?>
        <table>
        <?php
                
                echo "<tr>";
                echo "<td>";
                echo "<strong>Information Preview</strong>";
                echo "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>";
                echo "The date is " . date("m/d/y");
                echo "</td>";
                echo "</tr>";
                
                foreach ($_POST as $key => $value) {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
                
                }
                
                


        ?>
        </table>
        <?php
            } else {
                $errors = $signup->getErrors();
            }
        }
        
            if ( count($errors) ) {
                echo '<ul class="error">';
                foreach ($errors as $value) {
                    echo '<li>',$value,'</li>';
                }
                echo '</ul>';
            }
        ?>
        

        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Assessment:</legend>
                <label for="name">Full Name:</label> 
                <input id="name" type="text" name="name" value="<?php echo $signup->getName(); ?>" /> <br />
                
                
                
                
                <label for="comments">Comments:</label>
                
                <textarea name="comments" id="comments"><?php echo $signup->getComments(); ?></textarea>
                <br />
                
                
                
                <label for="state">State:</label>
                <?php
                
                $state_list = array('AL'=>"Alabama",  
			'AK'=>"Alaska",  
			'AZ'=>"Arizona",  
			'AR'=>"Arkansas",  
			'CA'=>"California",  
			'CO'=>"Colorado",  
			'CT'=>"Connecticut",  
			'DE'=>"Delaware",  
			'DC'=>"District Of Columbia",  
			'FL'=>"Florida",  
			'GA'=>"Georgia",  
			'HI'=>"Hawaii",  
			'ID'=>"Idaho",  
			'IL'=>"Illinois",  
			'IN'=>"Indiana",  
			'IA'=>"Iowa",  
			'KS'=>"Kansas",  
			'KY'=>"Kentucky",  
			'LA'=>"Louisiana",  
			'ME'=>"Maine",  
			'MD'=>"Maryland",  
			'MA'=>"Massachusetts",  
			'MI'=>"Michigan",  
			'MN'=>"Minnesota",  
			'MS'=>"Mississippi",  
			'MO'=>"Missouri",  
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio",  
			'OK'=>"Oklahoma",  
			'OR'=>"Oregon",  
			'PA'=>"Pennsylvania",  
			'RI'=>"Rhode Island",  
			'SC'=>"South Carolina",  
			'SD'=>"South Dakota",
			'TN'=>"Tennessee",  
			'TX'=>"Texas",  
			'UT'=>"Utah",  
			'VT'=>"Vermont",  
			'VA'=>"Virginia",  
			'WA'=>"Washington",  
			'WV'=>"West Virginia",  
			'WI'=>"Wisconsin",  
			'WY'=>"Wyoming");

                echo'<select name="state">';

                

                foreach($state_list as $state){

                echo'<option value="'.$state.'">'.$state.'</option>';

                }

                echo'</select>';

                ?>
                <br />
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        <table>
        
        </table>
    </body>
</html>
