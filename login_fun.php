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
	    die("-1");
	
	/*
	*   更新登录表
	*/
    function UpdateLoginState($user_id)
	{
        mysql_select_db("WordsLibrary");
        $sql = "replace LoginState(UserID,LoginNum,Time,RequestCount) values($user_id,NULL,now(), 0)";
        mysql_query($sql);

        $sql = "select LoginNum from LoginState where UserID=$user_id and TIME_TO_SEC(TIMEDIFF(now(),Time))<30*60";
        $result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0)
		  return 0;
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        return $row["LoginNum"];
	}
	
	 //链接数据库
	$link = mysql_connect("localhost","root","ep1000")
    or die("-1"); 
    mysql_select_db("et_web") or die("-1");
    mysql_query("SET NAMES 'utf8'");
  
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("-1");
      
	 /*查询当前邮箱是否存在*/
     $sql_active = "select * from active_user where Email = '$email' and password = '$passcode'";
     $query_result_active  = mysql_query($sql_active) or die("-1");

     if($row_active_user = mysql_fetch_array($query_result_active))  //用户名存在 
     {
	     //更新在线列表
		 $userid = $row_active_user["ID"];
		 $login_num = UpdateLoginState($userid);
		 if($login_num==-1)
		    die("-1");
	     else
		 {
		   $json_ret["id"] = $userid;
	       $json_ret["email"] = $row_active_user["Email"];
	       $json_ret["name"] = $row_active_user["Name"];
	       $json_ret["passcode"] = md5($row_active_user["password"]);
		   $json_ret["loginnum"] = $login_num;
		   echo json_encode($json_ret);
		 }
	 }
     else
       die("-1");
	 
	
	 
?>