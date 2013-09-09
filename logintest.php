<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/flash.js"></script>
<script src="artDialog/artDialog.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>

<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
<title>英通一百 -- 会员登陆</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
      FlashInit();
      function form_sub() 
      { 
	     if(!document.form1.email.value || !document.form1.passcode.value) 
         {  
           alert("请填写完整的信息"); 
           return false; 
         }
	     if(!check_email(document.form1.email.value))
	     {  
           alert("请填写正确的邮箱格式,邮箱将被作为您的用户名."); 
           return false; 
         }
	 	 
		 var post_data = "email="+document.form1.email.value+"&passcode="+document.form1.passcode.value;
		 send_login_request('login_fun.php',post_data);
		 
		 return false;
      }	

      function form_clear()
      {
          document.form1.reset();       
          document.form1.input_email.focus();
          return false;
      }   
 
     function check_email_exsit() //检测email是否存在
     { 
     	  
     }
	 
	 function RefreshImage()
     {
         document.getElementById("code_ver").src=document.getElementById("code_ver").src+Math.random(); 
     }
	 
	 function on_login_success(UserName)
	 {
	      var zJson =  eval('(' + UserName + ')');
	    alert("123");
	      SetCookie("email",document.form1.email.value);
	      SetCookie("UserName",zJson.name);
		  SetCookie("loginnum",zJson.loginnum);
		  
	      getSwfInstance("DoWords").flash_saveCookie("loginnum",zJson.loginnum);
	       
		  var op= "<?php echo $_REQUEST["op"] ?>";
		  if(op == 1) //跳转到购买页面
		  {
		       art.dialog({
			   lock:true,
			   content: '登陆成功,3秒钟内为您跳转到购买页面..',
			   icon:"succeed",
	           width: 400,
               height: 120,
			   init: function () {
    	          var that = this, i = 3;
                  var fn = function () {
                  that.content('登陆成功,'+i + '秒钟内为您跳转到购买页面..');
                  !i && that.close();
                  i --;
                  };
                timer = setInterval(fn, 1000);
                fn();
              },
			  close: function () {
    	         clearInterval(timer);
				 window.location.href="purchase.php"; 
              },
               
               });
		  }
		  else
		  {
		      art.dialog({
			   lock:true,
			   content: '登陆成功,3秒钟内为您跳转到首页..',
			   icon:"succeed",
	           width: 400,
               height: 120,
			   init: function () {
    	          var that = this, i = 3;
                  var fn = function () {
                  that.content('登陆成功,'+i + '秒钟内为您跳转到首页..');
                  !i && that.close();
                  i --;
                  };
                timer = setInterval(fn, 1000);
                fn();
              },
			  close: function () {
    	         clearInterval(timer);
				 window.location.href="http://www.doword.cn/ET100/"; 
              },
               
               }); 
		  }
	}
		     
	 
	 
</script>

</head>
<body>
 
		
<div class="main">
	<link href="css.css" rel="stylesheet" type="text/css" />

	 <div class="div_user">
	        <a style="color:red" href="index" > 回到首页 </a>				 
	 </div>
			   
<div class="title">
		<img src="image/top.jpg" />
	</div>
	 
	<div class="logo">
		<img src="image/pic.jpg" />
	</div>
	<div class="reg">
		<div class="reg_title">
			用户登陆
		</div>
		<HR style="border:1px dotted #ccc" width="80%">
		<div class="reg_form">
			<form method="post" name="form1" action="register.php"  onsubmit="return form_sub()">
				
				<div class="input_form">
					<span class="input_form_name" >
						邮箱地址:
					</span>
					<span class="input_form_input">
						<input type="text" name="email" value="" size="27" id="input_email" onBlur="check_email_exsit()"> 
					</span>
				</div>
				 
				
				<div class="input_form">
					<span class="input_form_name">
						   &nbsp;&nbsp;密&nbsp;&nbsp;码:
					</span>
					<span class="input_form_input">
						<input type="password" name="passcode" value="" size="27">
					</span>
					<a href="findpassword.php">&nbsp;忘记密码?</a>
				</div>
				
				 
			 
				
				<div class="input_button">
					<input type="image" src="image/tijiao.png" value="提交" onclick=""/>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="image" src="image/qingkong.png" value="重填" onclick="return form_clear()"/>
				</div>
				
			</form>
		</div>
	</div> 
</div>

  <div id="flashContent">
   </div>
</body>
</html>
