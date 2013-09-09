<?php
   session_start();
   header("Content-type: text/html;charset=GBK");
   header("Cache-Control: no-cache, must-revalidate");
   
     /*注册页面,实现注册*/
    // require_once ('email.class.php');  //发送邮件类
     require_once('class.phpmailer.php');
     require_once("class.smtp.php"); 
	 require_once("function.php");
     /*
     *   发送邮件函数 -- 
     *   $dest:目的地址  $subject:邮件主题 $mailbody:邮件内容
     */
     function sendMail($dest,$subject,$mailbody)
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
     $userName = $_REQUEST["name"];
     $passcode = $_REQUEST["passcode"];
     if($_REQUEST['checkcode']!=$_SESSION['randcode']){    
       die ("-4");   
     }
    /*校验参数是否是完整的*/
    if(!$email || !$userName || !$passcode)
    	die ("-3");
    
    $link = mysql_connect("localhost","root","ep1000")
    or die("10000"); 
    mysql_select_db("et_web") or die("10001");
    mysql_query("SET NAMES 'utf8'");
  
    @mysql_select_db("et_web") //选择数据库mydb 
         or die("数据库不存在或不可用");

     /*在非激活列表中删除对应的email*/
     $del_unactive = "delete  from unactive_user where Email = '$email'";
     mysql_query($del_unactive) or die("-5".$del_unactive);
    
     $sql_active = "select * from active_user where Email = '$email'";
     $query_result_active  = mysql_query($sql_active) or die("-5");

     if($row = mysql_fetch_array($query_result_active)){  //该邮箱已经被注册
	       /*已注册 则判定为忘记密码,发送密码重置邮件*/
	    $check_id = random_string(20);
		
		$sql = "delete from check_valid where Email = '$email' and type=2"; //删除 如果存在的话
	    mysql_query($sql) or die("delete failed..");
		
	    $sql = "delete from check_valid where CheckID = '$check_id'"; //删除 如果存在的话
	    mysql_query($sql) or die("delete failed..");
	  
	    $sql = "insert into check_valid values('$check_id','$email',2,now())";
	    mysql_query($sql) or die("insert failed..");
	    
	    $url_findpassword = "http://www.doword.cn/ET100/resetpassword.php?code=".$check_id;
	    sendMail($email,"用户密码重置","<br><br> <B>尊敬的用户:<br><br></B>  <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>您收到这封这封电子邮件是因为您 (也可能是某人冒充您的名义) 申请了一个新的密码。假如这不是您本人所申请, 请不用理会这封电子邮件, 但是如果您持续收到这类的信件骚扰, 请您尽快联络管理员。<br><br> <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>要使用新的密码, 请使用以下链接启用密码:<br><br>".$url_findpassword."<br><br> <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span><br>((如果无法点击该URL链接地址，请将它复制并粘帖到浏览器的地址输入框，然后单击回车即可。该链接使用后将立即失效。)<br><br> ");
    
           die("-1");
     }
 
  
      $sql = "insert into unactive_user values(null,'$email','$userName','$passcode',now())";
      mysql_query($sql) or die("insert failed..");
      
      
      $sql = "delete from check_valid where Email='$email' and type=1";
      mysql_query($sql) or die("delete failed..");
      
	  $check_id = random_string(20);
	  $sql = "delete from check_valid where CheckID = '$check_id'";
	  mysql_query($sql) or die("delete failed..");
	  
      $sql = "insert into check_valid values('$check_id','$email',1,now())";
      mysql_query($sql) or die("insert failed..");
      
    
      
      $url_active = "http://www.doword.cn/ET100/active.php?code=".$check_id;
       /*发送激活邮件*/
      sendMail($email,"Doword.cn注册用户激活","<br><br> <B>尊敬的用户:<br><br></B>  <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>欢迎使用Doword，如果本邮件不是您本人发送的，请忽略。<br><br> <span style=\"font-size:12px;\">&nbsp;&nbsp;&nbsp;&nbsp;</span>请点击以下链接地址激活您的注册:<br><br>&nbsp;&nbsp;&nbsp;&nbsp;".$url_active." <br><br> <span style=\"font-size:12px;\"></span>&nbsp;&nbsp;&nbsp;&nbsp;(如果您无法点击此处打开,请复制以上链接到浏览器中打开)<br><br> ");
		 
	    $_SESSION['UnactiveUser']=$email; //设置当前session数据
      die("1"); //操作成功
 
 
?>