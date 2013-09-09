<?php

 /*
 *    用户激活注册信息
 *    $userName 代表用户名   $passcode代表md5之后的数据
 */

  require_once ('function.php'); 
  function active_user($userName,$passcode)
  {
      $sql = "select  * from unactive_user where Email = '$userName'";
      $result = mysql_query($sql);
      if(!$result)
      	return false;
      $num_rows = mysql_num_rows($result);
      if($num_rows == 0) //无该条记录
         return false;
      $row=mysql_fetch_array($result);
      /*对比加密后的密码md5值*/

      if($passcode == md5($row["password"]))
      {
      	/*有效地址 插入到激活用户表*/
      	$email = $row["Email"];
      	$name  = $row["Name"];
      	$passcode = $row["password"];

      	$insert_sql = "insert into active_user values(null,'$email','$name','$passcode')";
      	$ret = mysql_query($insert_sql);
      	/*删除原有项*/
      	$delete_sql = "delete from unactive_user where Email = '$userName'";
      	mysql_query($delete_sql);
      	
        if($ret)
        	return true;
      }
      return false;
  }
  
  function check_passcode($userName,$passcode)  //判断忘记密码的参数是否正确
  {
       $sql = "select  * from active_user where Email = '$userName'";
       $result = mysql_query($sql);
       if(!$result)
      	 return false;
       $num_rows = mysql_num_rows($result);
       if($num_rows == 0) //无该条记录
          return false;
	   else if($passcode == md5($row["password"]))
	      return true;
		return false;
  }

  header("Content-Type: text/html;charset=utf-8");
 
  $link = mysql_connect("localhost","root","ep1000")
    or die("10000");  
  mysql_select_db("et_web") or die("10001");
  mysql_query("SET NAMES 'utf8'");

  $type     = $_REQUEST["type"];
  $userName = $_REQUEST["name"];
  $passcode = $_REQUEST["passcode"];
  
  if($type == 2)  //找回密码
  {
      if($userName && $passcode && check_passcode($userName,$passcode))  //userName password存在 且能激活
      { 
		   $url = "http://www.doword.cn/ET100/resetpassword.php?email=".$userName;
	           location_url($url);
		   exit(-1);   
	  }
	  else
	  {
                $url = "http://www.doword.cn/ET100/invalidate";
	        location_url($url);
	  }
	  exit(-1);
  }

  if($userName && $passcode && active_user($userName,$passcode))  //userName password存在 且能激活
      echo '<script language="JavaScript">;alert("您的账号激活成功..."); </script>';
  else
      {
        $url = "http://www.doword.cn/ET100/invalidate";
	        location_url($url);
      }
	   
    location_url("http://www.doword.cn/ET100/");
?>
