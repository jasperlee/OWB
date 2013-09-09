<?php


    require_once("UserAssist.php");
	
	//链接数据库
	$link = mysql_connect("localhost","root","ep1000");
    function IsValidOrderNum($email,$OrderNum,&$price)
	{ 
 	    $userid = GetIDByEmail($email);
		if($userid == 0)
		   return false;
		   
		mysql_select_db("et_web");
	    $sql = "select * from UnFinishOrder where UserID=$userid and OrderNum=$OrderNum";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0)
		  return false;
		else
		{ 
	      $row = mysql_fetch_array($result);
		  $price = $row["price"];
		  return true;
		}
	}
	
	function MakeOrderNum($userid)
	{
	    $var=sprintf("%04d", $userid);
		$time = substr(date('YmdHis'),4,8);
		$OrderNum = $time.$var.rand(11,99);
		return (int)$OrderNum;
	}
	
	
	
	/*
	*  将一个订单从未完成->完成
	*/
	function MakeOrderFinish($OrderNum)
	{
	    mysql_select_db("et_web");
		$sql = "select * from  UnFinishOrder where OrderNum = $OrderNum";
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		if($num_rows == 1)
		{
		    $row = mysql_fetch_array($result);
			$user_id = $row["UserID"];
			$Course  = $row["Course"];
			$price   = $row["price"];
			$time    = $row["Time"];
		    $insert_sql = "insert into FinishOrder values($OrderNum,$user_id,'$Course',$price,'$time')";
			 
			mysql_query($insert_sql) ;

			$delete_sql = "delete from UnFinishOrder where OrderNum = $OrderNum";
			mysql_query($delete_sql)  ;
			 
		}
	}
	
	 
	 
?>