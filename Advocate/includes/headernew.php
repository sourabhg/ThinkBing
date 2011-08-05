<?php 
$basedir='d:/data/web/';

$file=basename($_SERVER['PHP_SELF']);
$file2=trim('landingpage_template.php');
$file3=trim('index.htm');
$file5=trim("researchfoundation.php");

$file=trim($file);
//echo $file."   ".$file2;
$index=0;
if ((strcasecmp ($file,$file2)==0) || (strcasecmp ($file,$file3)==0) || (strcasecmp ($file,$file4)==0)|| (strcasecmp ($file,$file5)==0)) $index=1;

if ($nosubmenu==1) $index=1;
?>

    <table width="960"  border="0" cellpadding="0" cellspacing="0" id="header">
        <tr>
          <td height="10" colspan="2" valign="top">            </td>
        </tr>
      <tr>
        <td width="495" rowspan="2" valign="top"><div class="toplogo">
              <a href="http://www.binghamton.edu" target="_blank">
<?php //if ($index) echo ('<img src="/images2/siteLogos/binghamton-logo2.gif" alt="Binghamton University" width="204" height="68" longdesc="http://www.binghamton.edu" />  </a> '); else 

echo ('<img src="/images2/siteLogos/binghamton-logo2.gif" alt="Binghamton University" width="204" height="68" longdesc="http://www.binghamton.edu" />  </a> <a href="http://research.binghamton.edu"><img src="/images2/siteLogos/logo-research2.gif" alt="Division of Research" width="174" height="68" longdesc="http://research.binghamton.edu" />  </a> ');
?>
       </div></td>
        <td width="465" height="10" align="right" valign="top">
       <div class="upperright"> 
       
        <div class="googlesearch">   <form action="http://research.binghamton.edu/search.php" id="cse-search-box">
          
            <input type="hidden" name="cx" value="005037982432870437543:zxrkljp-czs" />
            <input type="hidden" name="cof" value="FORID:11" />
            <input type="hidden" name="ie" value="UTF-8" />
            
            <input class="searchSubmit" type="text" name="q" size="20" />
         
        <script type="text/javascript" src="http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>       <input name="sa" type="image" class="searchSubmit" value="Search" src="/images2/common/btnArrow.gif" alt="Submit" /> 
        </form> </div>
       
       
       <div class="quickLinks">
        
       <a href="http://www.binghamton.edu" title="Home" target="_blank">BU Home</a>&nbsp;|&nbsp;<a href="http://www.telecom.binghamton.edu/directory/directory.search" title="Directory" target="_blank">Directory</a>&nbsp;|&nbsp;<a title="Contact Us" href="/ContactUs.php">Contact Us</a>&nbsp;&nbsp;&nbsp;</div>
       
       
         </div>


    
        </td>
      </tr>
      <tr>
        <td height="27" align="right" valign="bottom"><?php if (!$index)  {
		include ($basedir."headersubnav.php");}?>
           </td>
      </tr>
      <tr>
        <td width="495" height="26"  valign="top">&nbsp;</td>
        <td align="right" valign="top">     </td>
      </tr>
  
      <tr>
        <td height="50" colspan="2">
        <?php readfile($basedir."topmenu.html");?>
        </td>
        </tr>
    </table>