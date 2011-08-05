 <html>
    <head><title>Think Binghamton</title></head>
    <body>
       <div id="fb-root"></div>
       <script src="http://connect.facebook.net/en_US/all.js"></script>
       <script>
          FB.init({ appId:'108635402526995', cookie:true, xfbml:true });
       </script>
       <fb:serverFbml width="740px">
          <script type="text/fbml">
          <fb:fbml>
           <fb:request-form method='POST' invite=true
            action="http://apps.facebook.com/thinkbing/index.php" 
			type='Think Binghamton'
            content='Would you like to join me in this great application?'>
            <fb:multi-friend-selector cols=3
             actiontext="Invite your friends to join you in helping Binghamton University"
            />
            </fb:request-form>
           </fb:fbml>
           </script>
       </fb:serverFbml>
	   <a href="main.php">Home<a>
    </body>
 </html>