<?php

       $type=$_REQUEST["type"];
	   $file_name="DoWordSetUp.zip";
	   if($type==1)
	     $file_name="DoWord.zip";	   
       
       $file_dir="/var/www/release/windows";
 
       $file_dir = $file_dir."/";
       if(!file_exists($file_dir.$file_name))   {   //检查文件是否存在  
          exit;    
       } 
       else   {  
         $file = fopen($file_dir . $file_name,"rb"); // 打开文件
         // 输入文件标签
         Header("Content-type: application/octet-stream");
         Header("Accept-Ranges: bytes");
         Header("Accept-Length: ".filesize($file_dir . $file_name));
         Header("Content-Disposition: attachment; filename=" . $file_name);
         // 输出文件内容
         echo fread($file,filesize($file_dir . $file_name));
         fclose($file);
         exit();
       }
       
?>
