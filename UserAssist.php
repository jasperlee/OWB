<?php
 
   /*
   *   用户相关的帮助函数
   */
   
   function GetIDByEmail($e)
   {
      mysql_select_db("et_web");
      $email = addslashes($e);
      $sql = "select * from active_user where Email='$email'";
	  
	  $result = mysql_query($sql);
	  if($result)
	  {
	     $row = mysql_fetch_array($result);
		 return (int)$row["ID"];
	  }  
	  return 0;
   }



?>