<?php

     /*
	 *    找回密码页面调用函数 
	 *    接受参数  Email  
	 *    返回值    1 成功 -1 用户名不存在 -2 参数非法  -3:服务器未知错误 主要是数据库不可用
	 */
	 require_once ('function.php'); 
	 
	 header("Content-type: text/html;charset=GBK");
     header("Cache-Control: no-cache, must-revalidate");
	 
     $email = $_REQUEST["email"];
     $passcode = $_REQUEST["passcode"];
     if(!$email || !$passcode)
	    die("-3");
		
	 //链接数据库
	$link = mysql_connect("localhost","root","ep1000")
    or die("-3"); 
    mysql_select_db("et_web") or die("-3");
    mysql_query("SET NAMES 'utf8'");
  
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("-3");
      
	 /*查询当前邮箱是否存在*/
     $sql_active = "select * from active_user where Email = '$email'";
     $query_result_active  = mysql_query($sql_active) or die("-3");

     if($row = mysql_fetch_array($query_result_active))  //用户名存在
	 {
	    $sql_update = "update active_user set password = $passcode where Email = '$email'";
	    mysql_query($sql_update);
        die("1"); //操作成功
     }
	 else
	   die("-1");
	  
	 
?>