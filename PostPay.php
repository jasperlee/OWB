<?php

     require_once("UserAssist.php");
	 require_once("OrderAssist.php");
     require_once('class.phpmailer.php');
     require_once("class.smtp.php"); 
	 
     /*
     *   发送邮件函数 -- 
     *   $dest:目的地址  $subject:邮件主题 $mailbody:邮件内容
     */
     function send_ssl_Mail($dest,$subject,$mailbody)
     {
        $mail  = new PHPMailer(); 

        $mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
        $mail->IsSMTP();                            // 设定使用SMTP服务
        $mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
        $mail->SMTPSecure = "ssl";                  // SMTP 安全协议      
        $mail->Host       = "smtp.exmail.qq.com";       // SMTP 服务器
        $mail->Port       = 465;                    // SMTP服务器的端口号
        $mail->Username   = "register@et100.cn";  // SMTP服务器用户名
        $mail->Password   = "panhan0625";        // SMTP服务器密码
        $mail->SetFrom('register@et100.cn', 'register@et100.cn');    // 设置发件人地址和名称
        $mail->AddReplyTo("register@et100.cn","register@et100.cn"); 
                                            // 设置邮件回复人地址和名称
        $mail->Subject    = $subject;                     // 设置邮件标题
        $mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端"; 
                                            // 可选项，向下兼容考虑
        $mail->MsgHTML($mailbody);                         // 设置邮件内容 
        $mail->AddAddress($dest, $dest);
        //$mail->AddAttachment("images/phpmailer.gif"); // 附件 
        $mail->Send();
 
     }
	 
   $email = $_REQUEST["email"];
   $OrderNum   = $_REQUEST["order"];
   $price   = $_REQUEST["price"];
   $send    = $_REQUEST["send"];
   
   if(!IsValidOrderNum($email,$OrderNum,$price))
   {
      echo "<script language='javascript' type='text/javascript'>";
      echo "window.location.href='invalidate.php'";
      echo "</script>"; 
   }
   
   if($send) //发送邮件
   {
      $url = "http://www.doword.cn/ET100/PostPay.php?email=".$email."&order=".$OrderNum."&price=".$price;
 	  $mail_body= "<br><br> <B>尊敬的用户:<br><br></B>  
	  &nbsp;&nbsp;&nbsp;&nbsp;您选择了邮购汇款，您的订单号是".$OrderNum."，订单消费:".$price."元。<br><br> &nbsp;&nbsp;&nbsp;&nbsp;要查看具体邮购流程，请点击以下链接:<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;".$url."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;(如果您无法点击此处打开,请复制以上链接到浏览器中打开)<br><br>";
	  send_ssl_Mail($email,"英通一百--邮购订单",$mail_body);
   }
   
   $send_email_tip = "";
   if($send)
      $send_email_tip = "<font color=\"#FF0000\"> (以上信息，我们已经通过邮件的形式发往您邮箱,以方便您日后查看) </font><br/><br/>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/md5.js" type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<title>英通一百 -- 邮购操作流程</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
 
	window.onload = function (){
    
    }
	 
</script>

</head>
<body>
    <div class="main">
	
	    <div class="title">
		   <img src="image/top.jpg" />
	    </div>
	    
		
	  <div class="tip">
	        <div class="reg_title">
			  邮购操作流程
              </div>
	      <HR style="border:1px dotted #ccc" width="100%">
		  <br/>  
	         <font color="#FF0000" size="5"> 请牢记您的订单号,<?php  echo $OrderNum;?> 订单消费:<?php  echo $price;?>元 </font> <br/><br/>
			 
			 <?php  echo $send_email_tip;?>
			 
			 <B>操作流程</B><br/><br/>
			 &nbsp;&nbsp;&nbsp;1，邮局汇款单填写，在收款人姓名部分，请填写北京英通一百教育科技有限公司。
			    商户客户号必须填写XXXXXXX，然后填写正确的汇款金额。<br/><br/>
			 &nbsp;&nbsp;&nbsp;2，在附言部分请填写以上的订单号13位订单号，此将作为我们确认的依据，请您务必填写正确。<br/><br/>
			 &nbsp;&nbsp;&nbsp;3，在我们确认收款后，将会尽快为您处理，处理结果将以邮件的形式发送给您，请注意查收。<br/><br/>
        </div>
    </div>
</body>
</html>
