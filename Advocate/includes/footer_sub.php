<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="960" valign="top" bgcolor="#7D8183">
  <div class="footerOuter">  
    <div class="footerLeft">
    <div class="address">
      <strong>Binghamton University</strong> State University of New York<br />
      <span class="sep">PO BOX 6000</span> Binghamton, NY 13902-6000
    </div>

    <div class="addlInfo">
      <div class="copyright">&copy; 2010 Binghamton University</div>
      <span class="footerLinks"><span class="sep"><a href="/about.php">About This Site</a></span> <a href="/RFjobs.php">Employment Opportunities</a></span>
    </div>
  </div>
  <div class="footerRight">
  
    
    <div class="feedsNetworks">
     
      <div class="shareLinks">
		<!-- AddThis Button BEGIN --><a href="http://www.addthis.com/bookmark.php" onclick="addthis_url = location.href; addthis_title = document.title; return addthis_click(this);"><img src="http://s9.addthis.com/button1-share.gif" width="125" height="16" alt="Bookmark and Share" align="right" /></a> <script type="text/javascript">var addthis_pub = 'drewhill'; addthis_logo = 'images/banners/binghamton-university.png';</script><script type="text/javascript" src="http://s9.addthis.com/js/widget.php?v=10"></script>  
		<!-- AddThis Button END -->
      </div>
    </div>
  </div>
  </div>
    
    
    
    
    </td>
  </tr>
</table>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-251641-4");
pageTracker._initData();
pageTracker._trackPageview();
</script>



<?php   //add last updated

$ip_address = $_SERVER['REMOTE_ADDR'];  

if (($lngIP=ip2long($ip_address)) < 0){ $lngIP += 4294967296 ;} 


if (($lngIP>2162312960) && ($lngIP<2162313470)) {

date_default_timezone_set(”EST”); echo "Last Updated: ".date ("m-j-Y h:i:s A (T)", getlastmod());   


}

?> 
