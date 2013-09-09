<?php
    /*
	*   订单处理的相关逻辑
	*   关于订单号的生成 -- 用户ID+当前时间(精确到)+5位随机数字
	*   当前页面返回值 -1均表示失败
	*/
	
	require_once("CourseAssist.php");
	require_once("OrderAssist.php");
	
	header("Content-Type: text/html;charset=utf-8");
 
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db("et_web") or die("-1");
	  
	
    $type = $_REQUEST["type"];
	if($type == 1)  //根据提交的信息 生成订单号
	{ 
	    $email  = addslashes($_REQUEST["email"]);
	    $course = $_REQUEST["course"];
	 
	   /*校验Course是否是完整的数据*/
	   $de_json = json_decode($course,TRUE) or die(" json decode -1");
	   /*校验是否是合法用户*/
	   $userid = GetIDByEmail($email);
	   if($userid == 0)
	       die("invalid email_-1");//非法的用户名
	   $price = GetCourseTotalPrice($de_json);
	   $orderNum = MakeOrderNum($userid);
	   /*参数都合法,更新数据库*/
	   mysql_select_db("et_web");
	   $insert_sql = "replace into UnFinishOrder values('$orderNum',$userid,'$course',$price,now())";
	   mysql_query($insert_sql) or die("insert_-1");  
	   /*返回订单号*/
	   echo $orderNum; 
	}
	else if($type == 2)
	{
	    $orderNum = addslashes($_REQUEST["order"]); // 给某个订单付款
 	
		$sql = "select * from UnFinishOrder where OrderNum = $orderNum";
		$result = mysql_query($sql);
	   
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //订单无效
		    die("-1");
	    else
		{
		    $row = mysql_fetch_array($result);
		    $email    = $_REQUEST["email"];
		    $user_id =  GetIDByEmail($email);
		
		    $course_arr = array();
		    $course = $row["Course"];
			$de_json = json_decode($course,TRUE); //decode json course.
			$count = count($de_json);
            for($index = 0;$index<$count;$index++)
			    get_all_courseId($course_arr,$de_json[$index]["id"]);
			 
		    for($index =0;$index<count($course_arr);$index++)
			{
			    $course_id = $course_arr[$index];
		          
   		        mysql_select_db("et_web");
				  
    	        $query_sql = "select * from UserPurchase where UserID=$user_id and CourseID=$course_id and TIMESTAMPDIFF(day ,now(),Time)>0";	
		        $result = mysql_query($query_sql);
		   	        
				$num_rows = mysql_num_rows($result);
		        if($num_rows!=0)
				{
				    $row = mysql_fetch_array($result);
                    $insert_sql = "update UserPurchase set Time = ADDDATE(Time,interval 365 day) where UserID=$user_id and  CourseID = $course_id";
    	            mysql_query($insert_sql);				   
		        }
				else
				{
		            $insert_sql = "insert into UserPurchase values($user_id,$course_id,ADDDATE(now(),interval 365 day))"; //设置一年后到期
    	            mysql_query($insert_sql);
				} 
			}
			MakeOrderFinish($orderNum);
			echo "1";
		 
		}
		
		
		
	}
	else
	  echo "-1";

?>