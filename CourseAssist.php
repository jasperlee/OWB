<?php

     session_start();
    header("Content-Type: text/html;charset=utf-8"); 

    
    function get_all_courseId(&$ret_id_arr,$parent_id)
     {
	     mysql_select_db("WordsLibrary");
         $ret_id_arr[] = $parent_id; 
         $query_course_sql = "select CourseId from Course where ParentID = $parent_id ";
         $result = mysql_query($query_course_sql) or die("get_course_query failed".mysql_error());
         $num_rows = mysql_num_rows($result);
         if($num_rows!=0)
         {
            while($row = mysql_fetch_row($result,MYSQL_ASSOC))
            {
                get_all_courseId($ret_id_arr,$row["CourseId"]);
            }
         }
     }
	 
	 /*
	 *    根据课程ID获取课程的信息
	 */
	 function get_course_info(&$course_info,$course_id)
	 {
	     $sql = "select * from Course where CourseId = $course_id";
		 $result =  mysql_query($sql);
		 $row = mysql_fetch_row($result,MYSQL_ASSOC);
                 $course_info["id"] = (int)$row["CourseId"]; 
                 $course_info["pId"]= (int)$row["ParentID"];
                 $course_info["price"]= (int)$row["CoursePrice"];
                 $course_info["name"] = $row["CourseName"];		
	 }

    /*
          获取一个课程的单词数,参数为课程ID
          获取完成单词数
    */
    function get_course_wordCount(&$word_arr,$id)
    {
         $query_sql = "select WordID from CourseWords where CourseID=$id";
         $result = mysql_query($query_sql);
         $num_rows = mysql_num_rows($result);
         if($num_rows!=0)
         {
             while($row = mysql_fetch_row($result,MYSQL_ASSOC))
                $word_arr[]  = $row["WordID"];
         }
    }
   
    function get_total_count($id)
    {
         $course_arr = array();
         $arr = array();
         get_all_courseId($course_arr,$id);
         for($index = 0;$index<count($course_arr);++$index)
         {
            get_course_wordCount($arr,$course_arr[$index]);
         }
         $arr = array_unique($arr);
         return count($arr);
    }
  
    
   function print_course()
   {
       $sqlstr="select * from Course";
       $link = mysql_connect("localhost","root","ep1000")
       or die("10000");
       mysql_select_db("WordsLibrary") or die("10001");
       mysql_query("SET NAMES 'utf8'");
       $_query = "count(*)";
       $result = mysql_query($sqlstr) or die("Query failed : " . mysql_error()); 
       $num_rows = mysql_num_rows($result);
   
       $b = array(); 
       $course_arr = array(); 
       get_all_courseId($course_arr,1);  
       for($index_course=0;$index_course<count($course_arr);$index_course++)
       {
	         if($course_arr[$index_course]>=1)
			 {
	            get_course_info($json_item,$course_arr[$index_course]);
	            $b[] = $json_item;
		     }
       }
       echo  addslashes(json_encode($b));
    }
	
	function print_purchase_course($email)
   {
       
	   /*数据库初始化*/
    $link = mysql_connect("localhost","root","ep1000")
    or die("10000"); 
    mysql_query("SET NAMES 'utf8'");
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("数据库不存在或不可用");

	 /*获取用户ID*/
     $sql_active = "select * from active_user where Email = '$email'";
     $query_result_active  = mysql_query($sql_active) or die("-1");
	 $ID=-1;
	 if($row = mysql_fetch_array($query_result_active)){ //用户ID存在
          $ID=$row['ID'];
     }
	 else die ("-1");
	   
	   
       $sqlstr="select * from UserPurchase where UserID='$ID'";
       $result = mysql_query($sqlstr) or die("Query failed : " . mysql_error()); 
	   $json_array=array();
	   $num_rows = mysql_num_rows($result);
	   for($index_course=0;$index_course<$num_rows;$index_course++){
		    if($row = mysql_fetch_array($result)){
			    mysql_select_db("WordsLibrary");
			    get_course_info($course_info,$row['CourseID']);
				$json_array[$index_course]['coursename']=$course_info['name'];
				$json_array[$index_course]['time']=$row['Time'];
			}
	   }
	 
     
       echo  addslashes(json_encode($json_array));
    }

    /*
    *  验证课程ID是否是一个子课程的课程ID
    */
    function IsChildCourseID($course_id)
    {
       $bChild = false;
	   
	   $link = mysql_connect("localhost","root","ep1000")
       or die("10000");
       mysql_select_db("WordsLibrary") or die("10001");
       mysql_query("SET NAMES 'utf8'");
	   
       $sql = "select * from Course where ParentID=$course_id";
	   $result = mysql_query($sql);
	   if(!$result)
	     return false;
	   $num_rows = mysql_num_rows($result);
	   if($num_rows == 0) //子课程
	      return true;
	   else
	      return false;
    }
	
	
	/*获得购买课程时间*/
    function get_purchase_info($email)
   {
       
	   /*数据库初始化*/
    $link = mysql_connect("localhost","root","ep1000")
    or die("10000"); 
    mysql_query("SET NAMES 'utf8'");
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("数据库不存在或不可用");

	 /*获取用户ID*/
     $sql_active = "select * from active_user where Email = '$email'";
     $query_result_active  = mysql_query($sql_active) or die("-1");
	 $ID=-1;
	 if($row = mysql_fetch_array($query_result_active)){ //用户ID存在
          $ID=$row['ID'];
     }
	   
       $sqlstr="select * from UserPurchase where UserID='$ID'";
       $result = mysql_query($sqlstr) or die("Query failed : " . mysql_error()); 
	   $num_rows = mysql_num_rows($result);
	   $json_array=array();
	   for($index_course=0;$index_course<$num_rows;$index_course++){
		    if($row = mysql_fetch_array($result)){
				$json_array[$index_course]['id']=$row['CourseID'];
				$json_array[$index_course]['time']=$row['Time'];
			}
	   }
	   echo  addslashes(json_encode($json_array));

    }
	
	function GetCoursePrice($id)
	{

	   mysql_select_db("WordsLibrary");
	   $sql = "select * from Course where CourseId = $id";
	   $result = mysql_query($sql);
	   if($result)
	   {
	       $row = mysql_fetch_array($result);
		   return (int)$row["CoursePrice"];
	   }
	   return 0;
	}
	
	function GetCourseTotalPrice(&$de_json)
	{	 
	    $price = 0;
	    for($index = 0;$index<count($de_json);$index++)
		{
		    $id = $de_json[$index]["id"];
			 if($id)
			   $price = $price + GetCoursePrice($id);
		}
		return $price;
		 
	}
	
	/*
	*   得到一个课程的所有叶子课程
	*/
	function GetLeafCourse(&$course_arr,$pid)
	{
	     if(IsChildCourseID($pid))
	         $course_arr[] = $pid; 
			 
         $query_course_sql = "select CourseId from Course where ParentID = $pid ";
         $result = mysql_query($query_course_sql) or die("get_course_query failed".mysql_error());
         $num_rows = mysql_num_rows($result);
         if($num_rows!=0)
         {
            while($row = mysql_fetch_row($result,MYSQL_ASSOC))
            {
                GetLeafCourse($course_arr,$row["CourseId"]);
            }
         }
	}
 
?>