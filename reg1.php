<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/md5.js" type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<title>英通一百 -- 会员注册</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
      var _email;
      function check_submit() 
      { 
	     _email = document.form1.email.value;
	     var code = document.getElementById("input_code").value; 
		 
         if(!document.form1.email.value || !document.form1.name.value || !document.form1.passcode.value || !document.form1.secondpassword.value || !code) 
         {  
           alert("请填写完整的信息"); 
           return false;
         }
	     if(!check_email(document.form1.email.value))
	     {  
           alert("请填写正确的邮箱格式,邮箱将被作为您的用户名."); 
           return false;
         }
	   
	     if(document.form1.passcode.value.length<6)
		 {
		   alert("密码最少需要6位，请重新设置您的密码");
		   return false;
		 }
	     if(document.form1.passcode.value !=  document.form1.secondpassword.value)
	     {  
           alert("两次密码不一致,请确认你的密码"); 
           return false; 
         }
	 
 
		 var post_data = "email="+document.form1.email.value+"&name="+document.form1.name.value+"&passcode="+document.form1.passcode.value+"&checkcode="+code;
		 
		 alert(post_data);
		 send_register_request('register.php',post_data);
		 RefreshImage();
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
         document.getElementById("code_ver").src="CodeImg.php?"+Math.random(); 
     }
     
     function OnRegisterSuccess()
     {
         var url = "EmailCheck.php?email="+document.form1.email.value;
	     window.location.href=url;
     }
	 
	 function  OnRedirectPassWordReset()
	 {
	    var url = "PassWordReset?type=1&email="+document.form1.email.value;
		window.location.href=url;
	 }
	 
	 window.onload = function (){
	    
         RefreshImage(); 
		 form_clear();
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
			用户注册
		</div>
		<HR style="border:1px dotted #ccc" width="80%">
		<div class="reg_form">
			<form name="form1" ">
				
				<div class="input_form">
					<span class="input_form_name" >
						<font color="red">*</font>邮箱地址:
					</span>
					<span class="input_form_input">
						<input type="text" name="email" value="" size="33" id="input_email" onkeypress="if(event.keyCode==13||event.which==13){return false;}" > 
					</span>
					
				</div>
				
				<div class="input_form">
					<span class="input_form_name">
						 &nbsp;&nbsp;<font color="red">*</font>昵&nbsp;&nbsp;称:
					</span>
					<span class="input_form_input">
						<input type="text" name="name" value="" size="33" onkeypress="if(event.keyCode==13||event.which==13){return false;}" >
					</span>
				</div>
				
				<div class="input_form">
					<span class="input_form_name">
						   &nbsp;&nbsp;<font color="red">*</font>密&nbsp;&nbsp;码:
					</span>
					<span class="input_form_input">
						<input type="password" name="passcode" value="" size="33" onkeypress="if(event.keyCode==13||event.which==13){return false;}" >
					</span>
				</div>
				
				<div class="input_form">
					<span class="input_form_name" >
						<font color="red">*</font>确认密码:
					</span>	
					<span class="input_form_input">
 						<input type="password" name="secondpassword" value="" size="33" onkeypress="if(event.keyCode==13||event.which==13){return false;}" >
					</span>
				</div>
				
				<div class="input_form">
				
				    <div class="lay1">
						   <font color="red">*</font>验证码:
					</div>  		
					
                     <div class="lay2">
					   <input type="text" id="input_code" name="input_code" value="" size="12" onkeypress="if(event.keyCode==13||event.which==13){return false;}" >
					 </div>  
                     
					 <div class="lay3">
					    <img id = "code_ver"  src="CodeImg.php?"  onclick="RefreshImage()"/>
						<a href="#" name="can not see" id="test" onclick="RefreshImage()">换一张</a>
					 </div> 
					 
		  			<div class="clear"></div>
				</div>
				
				<div class="input_button">
					<input type="image" src="image/tijiao.png"   onclick="check_submit()"/>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="image" src="image/qingkong.png" value="重填" onclick="return form_clear()"/>
				</div>
				
			</form>
		</div>
	</div>
	
	 
</div>
</body>
</html>
