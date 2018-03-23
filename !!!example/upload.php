<?php
if(isset($_POST["SubmitBtn"])){

  $fileName=$_FILES["imageUpload"]["name"];
  $fileSize=$_FILES["imageUpload"]["size"]/1024;
  $fileType=$_FILES["imageUpload"]["type"];
  $fileTmpName=$_FILES["imageUpload"]["tmp_name"];  

  if($fileType=="image/jpeg"){
    if($fileSize<=5000){

      //New file name
      $random=rand(1111,9999);
      $newFileName=$random.$fileName;

      //File upload path
      $uploadPath="uploads/".$newFileName;

      //function for upload file
      if(move_uploaded_file($fileTmpName,$uploadPath)){
        echo "Successful"; 
        echo "File Name :".$newFileName; 
        echo "File Size :".$fileSize." kb"; 
        echo "File Type :".$fileType; 
      }
    }
    else{
      echo "Maximum upload file size limit is 5,000 kb";
    }
  }
  else{
    echo "You can only upload a JPEG.";
  }  
}
?> 