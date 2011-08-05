<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
       <title>Facebook Invite Friends PHP Example</title>
    </head>
    <body>
        <?php
           // require '../src/facebook.php';
            require_once 'index.php';
            UseGraphAPI();
            
            $invite1 = new InviteFriends();
            $invite1->SetMainTitle("Main title");
            $invite1->SetContent("This is Facebook invite friends content.");                        
            $invite1->Render();
        ?>    
    </body>
</html>