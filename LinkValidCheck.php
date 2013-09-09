<?php

 /*
 *    用户激活注册信息
 *    $userName 代表用户名   $passcode代表md5之后的数据
 */
 

 
    $link = mysql_connect("localhost","root","ep1000")
      or die("10000");  
    mysql_select_db("et_web") or die("10001");
    mysql_query("SET NAMES 'utf8'");

    function check_findpassword_link($code,&$email)
    {
      $sql = "select  * from check_valid where CheckID = '$code' and type=2";
      $result = mysql_query($sql);
      
      $num_rows = mysql_num_rows($result);
      if($num_rows == 0)
          return false;
      $row=mysql_fetch_array($result);
      $email = $row["Email"];   
	  
	  $delete_sql = "delete  from check_valid where CheckID = '$code'";
	  mysql_query($delete_sql);
	  
      return true;
    }
    
    
     
?>
