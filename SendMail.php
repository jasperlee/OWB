<?php
   session_start();
   header("Content-type: text/html;charset=GBK");
   header("Cache-Control: no-cache, must-revalidate");
   
     /*注册页面,实现注册*/
     require_once ('email.class.php');  //发送邮件类

     /*
     *   发送邮件函数 -- 
     *   $dest:目的地址  $subject:邮件主题 $mailbody:邮件内容
     */
     function sendMail($dest,$subject,$mailbody)
     {
        $smtpusermail = "1846319964@qq.com";  //发送邮件的邮箱地址
        $smtpserverport =25;//SMTP服务器端口
        $smtpserver = "smtp.qq.com";          //邮件服务器
        $smtpuser = "1846319964@qq.com";//SMTP服务器的用户帐号
        $smtppass = "595207641";//SMTP服务器的用户密码
        $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件

        $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证
        //$smtp->debug = TRUE;//是否显示发送的调试信息
        return $smtp->sendmail($dest, $smtpusermail, $subject, $mailbody, $mailtype);
     }

     
     $email = $_REQUEST["email"];
 
    /*校验参数是否是完整的*/
    if(!$email)
    	die ("-3");
    
    $link = mysql_connect("localhost","root","ep1000")
    or die("10000"); 
    mysql_select_db("et_web") or die("10001");
    mysql_query("SET NAMES 'utf8'");
  
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("数据库不存在或不可用");

     /*查询当前邮箱是否存在*/
     $sql_unactive = "select * from unactive_user where Email = '$email'";
     $query_result_unactive  = mysql_query($sql_unactive) or die("-1");

   

     if($row=mysql_fetch_array($query_result_unactive)){  //用户名存在 
         $url_active = "http://www.doword.cn/ET100/active.php?name=".$email."&passcode=".md5($row["password"]);
         /*发送激活邮件*/
         sendMail($email,"英通一百账号激活","<br><br> <B>尊敬的用户:<br><br></B>  <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>欢迎使用Doword，如果本邮件不是您本人发送的，请忽略。<br><br> <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>请点击以下链接地址激活您的注册:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;".$url_active." <br><br> <span style=\"font-size:12px;\"></span>&nbsp;&nbsp;&nbsp;&nbsp;(如果您无法点击此处打开,请复制以上链接到浏览器中打开)<br><br> ");
		 
		 $_SESSION['UnactiveUser']=$email; //设置当前session数据
         die("1"); //操作成功
     }
     else  //用户名不存在 不合法。
         die("-4"); //无效的用户名

 
?>
