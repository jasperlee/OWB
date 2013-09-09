<?php
    /*check*/
    session_start();
    $email = $_REQUEST["email"];
    if(!$email)
    {
      echo "<script>location.href='invalidate.php';</script>";
      exit;
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
<title>英通一百 -- 注册用户激活</title>

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
   
   function to_firstPage()
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
			邮箱验证
              </div>
	      <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
	       &nbsp;&nbsp;&nbsp;&nbsp;注册已成功。我们向你的注册邮箱<?php echo $_REQUEST["email"] ?>中发送了注册激活邮件。</br>
               &nbsp;&nbsp;&nbsp;&nbsp;请在5天内到您的注册邮箱中查收注册激活邮件，并点击链接以激活您的注册。</br> </br> 
 
               &nbsp;&nbsp;&nbsp;&nbsp;注册激活邮件的描述如下：</br>
               &nbsp;&nbsp;&nbsp;&nbsp;邮件发件人：register@et100.cn   邮件主题：doword.cn注册用户激活</br> </br> 
	       
	       
	       
	      &nbsp;&nbsp;&nbsp;<a style="cursor:pointer;color:red;text-decoration : underline " onclick="location_email()">点击此处进入邮箱激活</a></br>
	      &nbsp;&nbsp;&nbsp;<a style="cursor:pointer;color:red;text-decoration : underline " onclick="to_firstPage()">点此回到首页</a>
	   </div>
        </div>
</body>
</html>