<?php
    session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script src="js/ajax.js" type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<title> 找回密码  - 会员中心 </title>

<style type="text/css">
html,body {padding:0;margin:0;height:98%;}
#sub {width:800px;margin:auto;height:98%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
    function on_find_password() 
    {
         var email = document.getElementById("input_email").value;
		 var code  = document.getElementById("input_code").value;
		 
	     if(!check_email(email))
 	     {
	       alert("请输入有效的邮箱地址!");
		   return false;
	     }
		 if(!code)
		 {
		    alert("请输入验证码!");
			return false;
		 }
	     var post_data = "email="+ email+"&checkcode="+code;
	     send_findpassword_request("findpassword_fun.php",post_data);
    }
    
    function Process_findpassword_result(ret)
    {
      if(ret == "-1")
		alert("请输入已注册过的邮箱");
	  else if(ret == "1")
		{
		    var url = "PassWordReset?email="+document.getElementById("input_email").value;
		    window.location.href=url;
		}
	  else if(ret == "-4")
		alert("验证码错误,请重新输入。");
	  else 
	    alert("操作失败,建议您重新操作一次。");
    }
	
	 function RefreshImage()
     {
         document.getElementById("code_ver").src="CodeImg.php?"+Math.random(); 
     }
     
	  window.onload = function (){
         RefreshImage();
   }
    
</script>

</head>
</body>
  
<div class="main"> 
	<link href="css.css" rel="stylesheet" type="text/css" />
    
	 <div class="div_user">
	        <a style="color:red" href="index" > 回到首页 </a>				 
	 </div>

    <div class="title">
		<img src="image/top.jpg" />
    </div>
  <div class="tip">
  
     <div class="reg_title">
	  找回密码
     </div>
     <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
    <div class="div_findpassword">
        <div class="input_form">
				<span class="input_form_name">
						 请输入邮箱:
				</span>

				<span class="input_form_input">
					<input type="text"  id= "input_email" name="input_email" value="" size="33">
				</span>
				
				<div class="input_form">
				
				    <div class="lay1">
						   验证码:
					</div>  		
					
                     <div class="lay2">
					   <input type="text" id="input_code" name="input_code" value="" size="12">
					 </div>  
                     
					 <div class="lay3">
					    <img id = "code_ver"   onclick="RefreshImage()"/>
						<a href="#" name="can not see" id="test" onclick="RefreshImage()">换一张</a>
					 </div> 
					 
		  			<div class="clear"></div>
				</div>
				
				
				<div class="div_twoline">
						(确认后,将发送一个重置链接到您的邮箱。)
				</div>
		</div>

         <div class="right_botton">
			<input type="image" src="image/tijiao.png" value="找回密码" onclick="return on_find_password()"/>
		 </div>
    </div>
    </div>
	
	
	 

</div>

</body>
</html>