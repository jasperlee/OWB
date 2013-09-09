<?php
/* * 
 * 功能：支付宝页面跳转同步通知页面
 * 版本：3.3
 * 日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 * 该页面可以使用PHP开发工具调试，也可以使用写文本函数logResult，该函数已被默认关闭，见alipay_notify_class.php中的函数verifyReturn
 */

require_once("alipay/alipay.config.php");
require_once("alipay/lib/alipay_notify.class.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
	<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>
<?php
$bPayResult = 0;
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
$show_tip="";
if($verify_result) {//验证成功
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//请在这里加上商户的业务逻辑程序代码
	
	//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];
	//支付宝交易号
	$trade_no = $_GET['trade_no'];
	//交易状态
	$trade_status = $_GET['trade_status'];
    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
		  $bPayResult = 1;
		  $show_tip="恭喜您,支付成功!";
    }
    else {
          $bPayResult = 1;
		  $show_tip="恭喜您,支付成功!";	
    }
}
else {
     $bPayResult = 0;
	 $show_tip="抱歉,支付失败,您可以重试本操作!";
}
?>
<title>英通一百 -- 购买结果</title>
</head>

<body>
    <div class="main">
	
	    <div class="title">
		   <img src="image/top.jpg" />
	    </div>
	
	  <div class="tip">
	        <div class="reg_title">
			  支付结果
              </div>
	      <HR style="border:1px dotted #ccc" width="100%">
		  <br/><br/> 
	         <font color="#FF0000" size="5"> <?php  echo $show_tip;?>  </font> 
			 <br/><br/> 
			 <a style="cursor:pointer;color:red;text-decoration : underline " href="index"> 点此回到主页 </a>
        </div>
    </div>
</body>

</html>