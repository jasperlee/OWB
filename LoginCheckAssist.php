<?php

     $link = mysql_connect("localhost","root","ep1000") or die("-1"); 
     mysql_select_db("et_web") or die("-1");
     mysql_query("SET NAMES 'utf8'");
		
     function check_email_user($email,$name,$passcode)
	 {
	    if(!$email || !$passcode || !$name)
	       return false;
        $sql = "select  * from active_user where Email = '$email' and Name = '$name'";
        $result = mysql_query($sql);
        if(!$result) 
      	   return false;
        $num_rows = mysql_num_rows($result);
        if($num_rows == 0) //无该条记录
           return false;
        $row=mysql_fetch_array($result);
        /*对比加密后的密码md5值*/
        if($passcode == md5($row["password"]))
           return true;

          return false;			
	 }
 
?>