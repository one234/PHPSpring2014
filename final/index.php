<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<!--
Author - Josh Keyes
-->
<html>
    <head>
        <?php
        
        $website = filter_input(INPUT_GET, 'website');
        //$website = $_GET['website'];
        $user = new User();
        $admin = new Admin();
        
        if(!$user->readWebsite($website))
        {
            header("Location: extracreditListPage.php");
        }
        
        $userResult = $user->readWebsite($website);
        
        $adminResult = $admin->read($userResult['user_id']);
     
        ?>
        <meta charset="UTF-8">
        <title><?php echo $adminResult['title']; ?></title>
        <link rel="stylesheet" type="text/css" href="css/<?php echo $adminResult['theme']; ?>.css" />
        
        
    </head>
    <body>
        
        
       
        
        <div id="icon">&#x270d;</div>
        
        <h1><span>Welcome to</span>
            <?php echo $adminResult['title']; ?></h1>
        
        
        <div id='about'>  
            <h2>Who We Are</h2> 
            <p><a href="login.php">Edit</a></p>
            <?php echo nl2br($adminResult['content']); ?>
        </div>
        
        <div id="contact">
           
            <div id="email"> 
                 <div class="iconHeader">&#x2709;</div>
                 <?php echo $adminResult['email']; ?>
                 
                          </div>
            <div id="phone"> 
                 <div class="iconHeader">&#x2706;</div>
                <?php echo $adminResult['phone']; ?>
            </div>
             <div id="address">
                <div class="iconHeader">&#x270e;</div>
                <?php echo $adminResult['address']; ?>
                            </div>
        </div>
        

    </body>
</html>
