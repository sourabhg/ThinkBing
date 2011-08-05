<?php include ("sqlinclude.php"); ?>
<?php
session_start();

//mysql_connect("localhost","rad","SP240rf5") or die ('Error '.mysql_error());
//mysql_select_db("advocacy_admin") or die(mysql_error());
$pd = mysql_real_escape_string($_POST['pd']);
$text = mysql_real_escape_string($_POST['textarea']);
$head = mysql_real_escape_string($_POST['heading']);
//$curr = "Y";



// Code to upload image file


 // Configuration - Your Options
      $allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
      $max_filesize = 924288; 
      $upload_path = './uploads/'; // The place the files will be uploaded to (currently a 'uploads' directory).
   
   
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
    if(strcmp($pd,""))
    {
      if($filename == "")
	  {
	   $query1="UPDATE pix set title = '".$text."',
	   heading = '".$head."'
	   where pid = ".$pd;
	  // $_SESSION['title_stat'] = "iN HERE1";
	  }
	  else
	  {
	   $query1="UPDATE pix set name_pic = '".$filename."',
	   title = '".$text."',
	   heading = '".$head."'
	   where pid = ".$pd;
	   //$_SESSION['title_stat'] = "iN HERE2";

	  } 
	}
	else
	{
	 if($filename == "")
	 {
        	 
	   $query2 = "select * from pix order by pid desc limit 1;";
	   $res1 = mysql_query($query2);
	   
	   while($ress = mysql_fetch_array($res1))
	   {
	   $filename = $ress[name_pic];
	   }
	 }
	 $query1="insert into pix(name_pic,title,heading)values('".$filename."','".$text."','".$head."')";
      // echo "**************".$query1;
	  // exit;
	  //$_SESSION['title_stat'] = "iN HERE3";
	}
   
   if (!mysql_query($query1))
  {
  //die('Error: ' . mysql_error());
     $_SESSION['title_stat'] = "Error"; 
     header("Location: welcomec.php");
  }
 else
  {
     $_SESSION['title_stat'] = "Record Added Successfully";  
     header("Location: welcomec.php");
	 
  }
   
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
 
   // Check if the filetype is allowed, if not DIE and inform the user.
   if(!in_array($ext,$allowed_filetypes))
      die('The file you attempted to upload is not allowed.');
 
   // Now check the filesize, if it is too large then DIE and inform the user.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('The file you attempted to upload is too large.');
 
   // Check if we can upload to the specified path, if not DIE and inform the user.
   if(!is_writable($upload_path))
      die('You cannot upload to the specified directory, please CHMOD it to 777.');
 
   // Upload the file to your specified path.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
   {
         echo 'Your file upload was successful, view the file <a href="' . $upload_path . $filename . '" title="Your File">here</a>'; // It worked.
		 
	// $query1="INSERT INTO pix(name_pic)values('".$filename."')";
		//  mysql_query($query1) or die ('Error Updating DB'.mysql_error());
   }
      else
         echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
 
  

?>
