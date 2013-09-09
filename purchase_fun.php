<?php

      /*
      *   课程购买相关 根据购买更新对应的数据库
      *   这里只存入子课程
      */

     require_once("CourseAssist.php");
     header("Content-type: text/html;charset=GBK");
     header("Cache-Control: no-cache, must-revalidate");
     
	 
    function link_et_web()
	{
	     //链接数据库
	     $link = mysql_connect("localhost","root","ep1000")
         or die("-3"); 
         mysql_select_db("et_web") or die("-3");
         mysql_query("SET NAMES 'utf8'");
  
         @mysql_select_db("et_web")   
           or die("-3");
	}

	$type = $_REQUEST["type"];
	
	if($type==1)
	{
       $param =  $_REQUEST["course"];   //要购买的课程
       $email = $_REQUEST["email"];  //购买的用户id
       if(!$param || !$email)
	      die("-2");
	   /*根据Email获取用户Id*/
	   link_et_web();
	   $sql = "select ID from active_user where Email = '$email'";
	   
	   $result_user_id  = mysql_query($sql) or die("query failed..-4");
	   $num_rows = mysql_num_rows($result_user_id);
	   $user_id  = 0;
	   if($num_rows!=0)
	   {
			$row = mysql_fetch_array($result_user_id);
		    $user_id = $row["ID"]; //以天计算 		   
	    }
		else
		    die("not user..-4");
	   
	   
	   $de_json = json_decode($param,TRUE) or die("json decode failed..-3".$param);
	   $count = count($de_json);
       for($index = 0;$index<$count;$index++)
       {
			 $course_id = $de_json[$index]["id"];
		     if(IsChildCourseID($course_id))
			 {  
   		        link_et_web();
    	        $query_sql = "select * from UserPurchase where UserID=$user_id and CourseID=$course_id and TIMESTAMPDIFF(day ,now(),Time)>0";	
		        $result = mysql_query($query_sql) or die("-4");
		   	        
				$num_rows = mysql_num_rows($result);
		        if($num_rows!=0)
				{
				   $row = mysql_fetch_array($result);
                   $insert_sql = "update UserPurchase set Time = ADDDATE(Time,interval 365 day) where UserID=$user_id and  CourseID = $course_id";
    	           mysql_query($insert_sql) or die(mysql_error()."-4");				   
		        }
				else
				{
		           $insert_sql = "insert into UserPurchase values($user_id,$course_id,ADDDATE(now(),interval 365 day))"; //设置一年后到期
    	           mysql_query($insert_sql) or die("-4");
				}
	 	     }
	   }
	   echo "1";
    }
	else
	   echo "invalid param";
	


?>