<?php
/* *
 * 功能：支付宝服务器异步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。


 *************************页面功能说明*************************
 * 创建该页面文件时，请留心该页面文件中无任何HTML代码及空格。
 * 该页面不能在本机电脑测试，请到服务器上做测试。请确保外部可以访问该页面。
 * 该页面调试工具请使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyNotify
 * 如果没有收到该页面返回的 success 信息，支付宝会在24小时内按一定的时间策略重发通知
 */

require_once("alipay/alipay.config.php");
require_once("alipay/lib/alipay_notify.class.php");

require_once("CourseAssist.php");
require_once("OrderAssist.php");
	
	
	
logResult("notify call..");
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();



if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代

	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
	
    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
	
	//商户订单号
	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号
	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];


    if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {
		 /*判定订单号是否被有效*/
		 $debug = $out_trade_no."--pay success";
		 logResult($debug);
		 
		 /*判定订单号是否是有效的*/
		 
		$link = mysql_connect("localhost","root","ep1000");   
		mysql_select_db("et_web");
		
		$orderNum = $out_trade_no; // 给某个订单付款	
		$sql = "select * from UnFinishOrder where OrderNum = $out_trade_no";
		$result = mysql_query($sql) or logResult("selecrt Order failed".mysql_error());
	   
		$num_rows = mysql_num_rows($result);
		if($num_rows == 0) //订单无效
		    logResult("invalid order.".$sql);
	    else
		{
		    $course_arr = array();
		    $row = mysql_fetch_array($result);
		    $user_id =  $row["UserID"];
		  
		    $course = $row["Course"];
			$de_json = json_decode($course,TRUE) or logResult("json decode failed"); //decode json course.
			$count = count($de_json);
            for($index = 0;$index<$count;$index++)
			    get_all_courseId($course_arr,$de_json[$index]["id"]);
			 
			mysql_select_db("et_web");
		    for($index =0;$index<count($course_arr);$index++)
			{
			    $course_id = $course_arr[$index];     
   		     
    	        $query_sql = "select * from UserPurchase where UserID=$user_id and CourseID=$course_id and TIMESTAMPDIFF(day ,now(),Time)>0";	
		        $result = mysql_query($query_sql) or logResult("select UserPurchase failed");
		   	        
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
		}
		 
    }
 

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
	echo "success";		//请不要修改或删除
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败 --
	
     //echo "fail";
    //调试用，写文本函数记录程序运行情况是否正常
    logResult("notify_fail");
}
?>