<?php
   
   /*
   *  在每个页面前面检查是否是已经登录
   *  如果登录号存在,则是退出登录
   */
   
    $link = mysql_connect("localhost","root","ep1000")
      or die("10000");  
    mysql_query("SET NAMES 'utf8'");
	
	/*
   *   检查某个登录号是否有效。
   */ 
   function check_loginnum_valid()
   {
     $login_num = $_COOKIE['loginnum'];
	  
     mysql_select_db("WordsLibrary");
	 if(!$login_num)
	 {
	   setcookie("email",NULL);
	   setcookie("UserName",NULL);
	   setcookie("loginnum",NULL);
	   return false;  
	 }
     /*根据LoginNum 返回对应的账户信息*/
	 $sql = "select * from LoginState where LoginNum = $login_num and TIME_TO_SEC(TIMEDIFF(now(),Time))<30*60";
	 $result = mysql_query($sql);
     $num_rows = mysql_num_rows($result);
	 if($num_rows == 0)
	 {
	   setcookie("email",NULL);
	   setcookie("UserName",NULL);
	   setcookie("loginnum",NULL);
	   return false;  	
	 } 
	 return true;
   }
   
   /*
   *  从当前登录号获取信息
   *  $cookie_login_num为cookie中的登录号 如果和传参进来的不一样 则会被删除。
   */
   function getInfoFromLoginNum($login_num,$userid,&$email,&$name)
   {
     mysql_select_db("WordsLibrary");
	 
     /*根据LoginNum 返回对应的账户信息*/
	 $sql = "select * from LoginState where LoginNum = $login_num and UserID = $userid and TIME_TO_SEC(TIMEDIFF(now(),Time))<30*60";
	 $result = mysql_query($sql);
     $num_rows = mysql_num_rows($result);
	 if($num_rows == 0) //当前登录号无效
	 {
	     
	    return false;  	
	 }
	 
	 /*删除上一个记录*/
	 if($login_num!=$_COOKIE['loginnum'])
	 {
	    $cookie_login_num = $_COOKIE['loginnum'];
	    $delete_sql = "delete from LoginState where LoginNum=$cookie_login_num and UserID=$userid";
		mysql_query($delete_sql);
	 }
	 
	 $row = mysql_fetch_array($result);
	 
	 
	 mysql_select_db("et_web");
	 $sql = "select * from active_user where ID = $userid";
	 $result = mysql_query($sql);
	 $num_rows = mysql_num_rows($result);
	 if($num_rows == 0) //无用户信息
	 {
	   
	   return false;  
	 }
	 
	 $row = mysql_fetch_array($result);
	 $email = $row["Email"];
	 $name = $row["Name"];
	 return true;
	 
   }
   
   $type     = $_REQUEST["type"];
   $loginNum = $_REQUEST["loginnum"];
   if($loginNum && $type==1)
   {
       mysql_select_db("WordsLibrary");
	   $delete_sql = "delete from LoginState where LoginNum=$loginNum";
	   mysql_query($delete_sql);
	   die("1");
   }
   
    
?>