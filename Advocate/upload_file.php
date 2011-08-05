<?php

session_cache_limiter('nocache');
session_start();
$host = "localhost";
$dbusername = "rad";
$dbpassword = "SP240rf5";
$dbname = "advocacy_admin";
$link_id=mysql_pconnect($host,$dbusername,$dbpassword);
mysql_select_db($dbname);
echo $_FILES["userfile"]["name"];
$file_name = $_FILES["userfile"]["name"];


   // Configuration - Your Options
      $allowed_filetypes = array('.jpg','.gif','.bmp','.png'); // These will be the types of file that will pass the validation.
      $max_filesize = 924288; 
      $upload_path = './uploads/'; // The place the files will be uploaded to (currently a 'uploads' directory).
 
   $filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
   
   $query1="INSERT INTO pix(name_pic)values('".$filename."')";
		  mysql_query($query1) or die ('Error Updating DB'.mysql_error());
   
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
		 
		 $query1="INSERT INTO pix(name_pic)values('".$filename."')";
		  mysql_query($query1) or die ('Error Updating DB'.mysql_error());
   }
      else
         echo 'There was an error during the file upload.  Please try again.'; // It failed :(.
 
?>