<?php
    header("Content-Type: text/html;charset=utf-8"); 
 
    $link = mysql_connect("localhost","root","ep1000")
    or die("10000"); 
    mysql_query("SET NAMES 'utf8'");
	
	 
	
	/*  
	*    获取课程的截止时间
	*/
	function get_Course_EndTime($userid,$course_id)
	{
	    mysql_select_db("et_web");
	    $sql = "select Time from UserPurchase where UserID=$userid and CourseID=$course_id";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0)
		  return "";
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
		return $row["Time"];
	}
	
	function get_Course_Price($course_id)
	{
	    mysql_select_db("WordsLibrary");
	    $sql = "select * from Course where CourseId = $course_id";
	    $result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		
		if($num_rows>0)
		{
		    $row = mysql_fetch_row($result,MYSQL_ASSOC);
			return $row["CoursePrice"];
		}
		return 0;
	}
	
	 function GetCourseFullNameByCourseID($course_id)
      {
	    mysql_select_db("WordsLibrary");
	    if($course_id == 0)
		    return "课程";
		$course_arr = array();
		$ret_course_name;
		for($loop_index= 0 ;$loop_index<8;$loop_index++)
		{
		    $sql = "select ParentID,CourseName from Course where CourseID = $course_id";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result,MYSQL_ASSOC);
			$course_arr[] = $row["CourseName"];
			$course_id = $row["ParentID"];
			if($course_id == 1)
			  break;
		}
		/*数组逆序*/
		for($index = count($course_arr)-1; $index>=0; $index--)
		{
		     $ret_course_name = $ret_course_name.$course_arr[$index];
			 if($index!=0 && $ret_course_name)
			    $ret_course_name = $ret_course_name."-";
		}
		return $ret_course_name;
		
	}

	
	function print_purchase_record($email)
	{
	   mysql_select_db("et_web");
	   
	   $sql = "select * from active_user where Email='$email'";
	   $result = mysql_query($sql);
	   $num_rows = mysql_num_rows($result);
	   if($num_rows == 0)
	     return "[]"; //返回一个空的json数据
	   
	   $row = mysql_fetch_row($result,MYSQL_ASSOC);
	   $userid = $row["ID"];
	   
  	   $ret_json = array();
	   /*获取某个用户的订单信息*/
	   $sql = "select * from FinishOrder where UserID = $userid";
	   $result_order = mysql_query($sql);
	   $num_rows = mysql_num_rows($result_order);
	   if($num_rows == 0)
	     return "[]"; //返回一个空的json数据
		 
	   while($row = mysql_fetch_row($result_order,MYSQL_ASSOC))
       {
            $course = $row["Course"];
			$de_json = json_decode($course,TRUE); //获取订单的购买课程数据
			$count = count($de_json);
			 
			if($count >0) //如果当前有效
			{
			    for($index=0;$index<$count;$index++)
				{
				    $course_id = $de_json[$index]["id"];
					$item["buytime"] = $row["Time"];
					$item["order"]   = $row["OrderNum"];
					$item["endtime"] = get_Course_EndTime($userid,$course_id);
					$item["price"]   = get_Course_Price($course_id);
					$item["name"]    = GetCourseFullNameByCourseID($course_id);
					$ret_json[] = $item;
 				}
			}
       }
	   
	   return addslashes(json_encode($ret_json));
    }
	
	 
?>