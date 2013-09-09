<?php

 /*
 *    该php主要是验证登录号的信息
 */
 
 
    function GetOnlineNumber()
    {
        $count_filed = "count(*)";
        $sql = "select count(*) from LoginState where (UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(Time))<30*60";
        $result =  mysql_query($sql);
        while($row = mysql_fetch_array($result,MYSQL_ASSOC))
        {
             return $row[$count_filed];
        }
        return 0;
    }
	   
    $link = mysql_connect("localhost","root","ep1000")
      or die("10000");  
    mysql_select_db("WordsLibrary") or die("10001");
    mysql_query("SET NAMES 'utf8'");

	$json_ret = array();
	$login_num = $_REQUEST["loginnum"];
	if(!$login_num)
	{
	     $json_ret["id"] = -1;
	   die (json_encode($json_ret));  
	}
	
    /*根据LoginNum 返回对应的账户信息*/
	$sql = "select * from LoginState where LoginNum = $login_num and TIME_TO_SEC(TIMEDIFF(now(),Time))<30*60";
	$result = mysql_query($sql);
    $num_rows = mysql_num_rows($result);
	if($num_rows == 0)
	{
	   $json_ret["id"] = -1;
	   die (json_encode($json_ret));  
	}
	
	$row=mysql_fetch_array($result);
	$userid = $row["UserID"];
	$onlineNum = GetOnlineNumber();
	
	/*查询用户信息*/
	mysql_select_db("et_web");
	$sql = "select * from active_user where ID = $userid";
	$result = mysql_query($sql);
	$num_rows = mysql_num_rows($result);
	if($num_rows == 0)
	{
	   $item["id"] = -1;
	   $json_ret[]=item;
	   die (json_encode($json_ret));  	
	}
	
	$row=mysql_fetch_array($result);
	$json_ret["id"] = $userid;
	$json_ret["email"] = $row["Email"];
	$json_ret["name"] = $row["Name"];
	$json_ret["passcode"] = base64_encode($row["password"]);
	$json_ret["onlinenum"] = $onlineNum;
    echo json_encode($json_ret);
     
?>
