<?php
    /*check*/
    session_start();
    $email = $_REQUEST["email"];
    if(!$email)
    {
      echo "<script>location.href='invalidate.php';</script>";
      exit;
    }  
	
	$type = $_REQUEST["type"];
	$header_content = "";
	$header_mid="<br>&nbsp;&nbsp;&nbsp;&nbsp;请在5天内到您的邮箱中查收密码重置邮件，并点击其中的链接以进行密码重置。";
	$header_end  = "<br><br>";
	if($type==1)
	{
	   $header_content = "您曾经使用该邮箱注册过，且已经激活。";
	   $header_mid  = "";
	   $header_end = "<br><br>&nbsp;&nbsp;&nbsp;&nbsp;如果您只是忘记了密码，现在可以去您的信箱查收该邮件并重置您的密码。<br><br>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script src="artDialog/artDialog.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
<title>英通一百 -- 密码重置</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>
<script type="text/javascript">
   var email = "<?php echo $_REQUEST["email"] ?>";
   
   var hash={ 
   'qq.com': 'http://mail.qq.com', 
   'gmail.com': 'http://mail.google.com', 
   'sina.com': 'http://mail.sina.com.cn', 
   '163.com': 'http://mail.163.com', 
   '126.com': 'http://mail.126.com', 
   'yeah.net': 'http://www.yeah.net/', 
   'sohu.com': 'http://mail.sohu.com/', 
   'tom.com': 'http://mail.tom.com/', 
   'sogou.com': 'http://mail.sogou.com/', 
   '139.com': 'http://mail.10086.cn/', 
   'hotmail.com': 'http://www.hotmail.com', 
   'live.com': 'http://login.live.com/', 
   'live.cn': 'http://login.live.cn/', 
   'live.com.cn': 'http://login.live.com.cn', 
   '189.com': 'http://webmail16.189.cn/webmail/', 
   'yahoo.com.cn': 'http://mail.cn.yahoo.com/', 
   'yahoo.cn': 'http://mail.cn.yahoo.com/', 
   'eyou.com': 'http://www.eyou.com/', 
   '21cn.com': 'http://mail.21cn.com/', 
   '188.com': 'http://www.188.com/', 
   'foxmail.coom': 'http://www.foxmail.com' 
};

   function location_email()
   {
       //window.open("http://www.google.com.hk");
       var url = email.split('@')[1]; 
       var bFind = false;
       for (var j in hash) 
       {
	  if(hash[url]!=undefined)
          {
	      bFind = true;
	      window.open(hash[url]);
	      break;
	    }
      } 
      if(!bFind)
      {
          alert("无法打开您邮箱对应的网站，请您手动切换至您的邮箱查收。");
      }
   }
   
   function ToFirstPage()
   {
      window.location.href='http://www.doword.cn';
   }
   
   
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
			  密码重置
              </div>
	      <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
	       &nbsp;&nbsp;&nbsp;  <?php echo $header_content?> 我们已经向您的邮箱<font color="#FF0000"><?php echo $_REQUEST["email"] ?></font>中发送了密码重置邮件。
		   <?php echo $header_mid ?>
		   </br></br>
		   
		    
            &nbsp;&nbsp;&nbsp; 密码重置邮件的描述如下：</br>
            &nbsp;&nbsp;&nbsp;&nbsp;邮件发件人：register@et100.cn   邮件主题：doword.cn用户密码重置 
	        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $header_end?> 
	       
	       
	      &nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;color:red;text-decoration : underline " onclick="location_email()">点击此处进入邮箱重置密码</a></br>
	      &nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;color:red;text-decoration : underline " onclick="ToFirstPage()">点此回到首页</a>
	   </div>
        </div>
</body>
</html>
</html>