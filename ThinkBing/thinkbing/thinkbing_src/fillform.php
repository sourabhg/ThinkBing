<!-- Code By Sourabh Gandhe -->
<html>
<head>
<style type="text/css"> 

.style9 {font-weight: bold; color:#FFFFFF; background-color: #006600;}


</style>
<style type="text/css">

.style10 {font-family: Arial, Helvetica, sans-serif}
</style>
<script type="text/javascript">
function validate_form() { 
//alert("Enter a valid 5 digit Zip Code")
	
	var nameValue = document.getElementById('name').value;
	
	if (nameValue=="")
	{
		alert("Enter Name");
		form.name.focus();
		return false;
	}
	
	
	var regexp = /^\d{5}$/;
	var zipValue = document.getElementById('zip').value;
	if (!regexp.test(zipValue))
	{
		alert("Enter a valid 5 digit Zip Code");
		form.zip.focus();
		return false;
	}
	
	regexp = /^\d{4}$/;
	var yearValue = document.getElementById('graduated').value;
	if(yearValue!=""){
	if (!regexp.test(yearValue))
	{
		alert("Enter a valid 4 digit Graduation Year");
		form.graduated.focus();
		return false;
	}
	}
	
	return true;
}
</script>
</head>
<?php include ("sqlinclude.php"); ?>
<?php
session_start();
//$msubject = $_POST['subject'];
//$msgb   = $_POST['msgbody'];
$addr1 = mysql_real_escape_string($_POST['address']);
$zip1   = mysql_real_escape_string($_POST['zip']);
$zipcode1   = mysql_real_escape_string($_POST['zip4']);
$city1 = mysql_real_escape_string($_POST['city']);
$iamny = mysql_real_escape_string($_POST['chkbox']);
//echo $iamny;
$_SESSION['iam_ny'] = $iamny;
if($iamny == "yes")
{
 $statecode = "NY";
}
else
{
 $statecode = "";
}
$_SESSION['addr11'] = $addr1;
$_SESSION['zip11'] = $zip1;
$_SESSION['zipcode11'] = $zipcode1;
$_SESSION['city11'] = $city1;
require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '108635402526995',
  
  'secret' => '3f5d6411e89258afe37cecb8e39a0f79',
  'cookie' => true,
));

$session = $facebook->getSession();
$fbconfig['appBaseUrl'] = 'https://apps.facebook.com/thinkbing';
//$fbconfig['baseUrl'] = 'http://research.binghamton.edu/RAD/students/gmaps/facebook';
$me = null;
// Session based API call.
if ($session) {
  try {
    $uid = $facebook->getUser();
	$fbme = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
  }
}

$mname=$fbme['name'];
$loc=$fbme['location'];
$locale=$fbme['locale'];
$mloc = $loc[name];
$tok = strtok($mloc, ",");
$sstate = strtok(',');
//echo $locale;
//echo $tok;
if($city1 == "")
{
  $city1 = $tok;
  $statecode = $sstate;
}

?>

<body>
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js"></script>

<div align="left"><img border="0" src="Think_FB_header.gif" alt="Pulpit rock" width="722" height="69" /></div> 
<br /> <br/>
<form action="senatmail.php" method="post" id="form" onSubmit="return validate_form();"> 

<img src="your_information2.gif" width="722" height="27"><br />
<p> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="name"><span class="style10">Name:</span></label>
    <br /> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="name" name="name" type="text" value="<?php echo $mname ?>"/> *
    <span class="formError"></span></p>

<table width="399" border="0">
  <tr>
    <td width="197" height="24">&nbsp;&nbsp;&nbsp;
        <label for="label"><span class="style10"> Industry:</span></label>
      &nbsp;</td>
    <td width="184">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="label"><span class="style10">Job Title:</span></label></td>
  </tr>
  <tr>
<td>   &nbsp;&nbsp;&nbsp;<input id="industry" name="industry" type="text" value=""/></td>
    <td>   &nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;<input id="title" name="title" type="text" value=""/></td>
  </tr>
</table>
<p><img src="address.gif" width="722" height="27"><br />
</p>
<p> 
&nbsp;&nbsp;&nbsp;&nbsp;<label for="street"><span class="style10">Street Address:</span></label>
<input id="street" name="street" type="text" value="<?php echo $addr1 ?>"/> 
 

<label for="city"><span class="style10">City:</span></label>
<input id="city" name="city" type="text" value="<?php echo $city1 ?>"/> 
</p>
<p>
  &nbsp;&nbsp;&nbsp;&nbsp;<label for="state"><span class="style10">State/Province:</span></label>
  <select name="State"> 
    <option value="" selected="selected">Select a State</option> 
    <option value="AL">Alabama</option> 
    <option value="AK">Alaska</option> 
    <option value="AZ">Arizona</option> 
    <option value="AR">Arkansas</option> 
    <option value="CA">California</option> 
    <option value="CO">Colorado</option> 
    <option value="CT">Connecticut</option> 
    <option value="DE">Delaware</option> 
    <option value="DC">District Of Columbia</option> 
    <option value="FL">Florida</option> 
    <option value="GA">Georgia</option> 
    <option value="HI">Hawaii</option> 
    <option value="ID">Idaho</option> 
    <option value="IL">Illinois</option> 
    <option value="IN">Indiana</option> 
    <option value="IA">Iowa</option> 
    <option value="KS">Kansas</option> 
    <option value="KY">Kentucky</option> 
    <option value="LA">Louisiana</option> 
    <option value="ME">Maine</option> 
    <option value="MD">Maryland</option> 
    <option value="MA">Massachusetts</option> 
    <option value="MI">Michigan</option> 
    <option value="MN">Minnesota</option> 
    <option value="MS">Mississippi</option> 
    <option value="MO">Missouri</option> 
    <option value="MT">Montana</option> 
    <option value="NE">Nebraska</option> 
    <option value="NV">Nevada</option> 
    <option value="NH">New Hampshire</option> 
    <option value="NJ">New Jersey</option> 
    <option value="NM">New Mexico</option> 
    <option value="NY">New York</option> 
    <option value="NC">North Carolina</option> 
    <option value="ND">North Dakota</option> 
    <option value="OH">Ohio</option> 
    <option value="OK">Oklahoma</option> 
    <option value="OR">Oregon</option> 
    <option value="PA">Pennsylvania</option> 
    <option value="RI">Rhode Island</option> 
    <option value="SC">South Carolina</option> 
    <option value="SD">South Dakota</option> 
    <option value="TN">Tennessee</option> 
    <option value="TX">Texas</option> 
    <option value="UT">Utah</option> 
    <option value="VT">Vermont</option> 
    <option value="VA">Virginia</option> 
    <option value="WA">Washington</option> 
    <option value="WV">West Virginia</option> 
    <option value="WI">Wisconsin</option> 
    <option value="WY">Wyoming</option>
  </select>
  <label>  </label>
&nbsp; <span class="style10">
<label for="zip">Zip Code:</label>
</span>
<input id="zip" name="zip" size="10" type="text" value="<?php echo $zip1 ?>"/>
&nbsp; <span class="style10">
<label for="country">Country:</label>
</span>
<input id="country" name="country" type="text" value="United States"/> 
</p> 

<p><img src="affiliation.gif" width="722" height="27"><br />
</p>
<p>&nbsp;<span class="style10">I am a (check all that apply):</span></p>
<table width="321" border="0">
  <tr>
    <td width="136"><input id="student" name="affiliation1" type="checkbox" value="y" />
      <span class="style10">
      <label for="student">Student</label>
&nbsp;</span></td>
    <td width="167"><span class="style10">
      <input id="parent" name="affiliation2" type="checkbox" value="y" />
      <label for="label">Parent of a Student</label>
    </span></td>
  </tr>
  <tr>
    <td><span class="style10">
      <input id="alumnus" name="affiliation3" type="checkbox" value="y" />
      <label for="alumnus">Alumnus</label>
&nbsp;&nbsp;&nbsp;</span></td>
    <td><span class="style10">
      <input id="community" name="affiliation4" type="checkbox" value="y" />
Community Partner</span></td>
  </tr>
  <tr>
    <td><span class="style10">
      <input id="industry-partner" name="affiliation5" type="checkbox" value="y" />
      <label for="industry-partner">Industry Partner</label>
    </span></td>
    <td><span class="style10">
      <input id="faculty" name="affiliation6" type="checkbox" value="y" />
      <label for="label">Faculty Member</label>
    </span></td>
  </tr>
  <tr>
    <td><span class="style10">
      <input id="staff" name="affiliation7" type="checkbox" value="y" />
      <label for="staff">Staff Member</label>
&nbsp;</span></td>
    <td><span class="style10">
      <input id="retiree" name="affiliation8" type="checkbox" value="y" />
      <label for="label">University Retiree</label>
    </span></td>
  </tr>
  <tr>
    <td><span class="style10">
      <input id="donor" name="affiliation9" type="checkbox" value="y" />
      <label for="donor">Donor</label>
&nbsp;&nbsp;</span></td>
    <td><span class="style10">
      <input id="friend" name="affiliation10" type="checkbox" value="y" />
      <label for="label">Friend</label>
    </span></td>
  </tr>
</table>
<p><span class="style10">&nbsp;</span>&nbsp;&nbsp;&nbsp;<label for="graduated"><span class="style10">Class year if Binghamton University graduate:</span></label>
    <input id="graduated" name="graduated" size="4" type="text" />
     	
&nbsp;&nbsp;&nbsp;&nbsp;</p>
  <label>
 <input type="checkbox" name="signmeup" id="signmeup" value="y">  
  <span class="style10">Sign me up  </span></label>
  <span class="style10">for the e-mail list.</span>
  <p><span class="style10">&nbsp;</span>
    <input type="image" src="Next.gif" alt="Submit ">
  </p>
  <p></a></p> 
</form> 
</body>
</html> 
