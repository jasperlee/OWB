<?php
    require_once ('LinkValidCheck.php'); 
    require_once('function.php');
    $code = $_REQUEST["code"];
    if(!$code)
      location_url("http://www.doword.cn/ET100/invalidate");
    $email="";
    if(!check_findpassword_link($code,$email))
      location_url("http://www.doword.cn/ET100/invalidate");
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<title>英通一百 -- 重置密码</title>

<style type="text/css">
html,body {padding:0;margin:0;height:98%;}
#sub {width:800px;margin:auto;height:98%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
    function on_page_load() 
    { 
        
	}
	
  
	function ajax_init()
    {
        var ajax=false;
        try {
          ajax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        try {
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            ajax = false;
        }
       }
      if (!ajax && typeof XMLHttpRequest!='undefined') {
        ajax = new XMLHttpRequest();
      }
      return ajax;
    }
	
	 
	 function process_resetpassword_request(url,post_data)
    {
  
       if(http_request.readyState==4){//判断对象状态
	      if(http_request.status==200){//信息已成功返回，开始处理信息      
	        if(http_request.responseText == "1")
		     alert("密码重置成功!");
	        else
	         alert("密码重置失败!");
	     }else{//页面不正常
	      alert("您所请求的页面不正常！");
	    }
	   }
    }
	
	 function send_resetpassword_request(url,post_data)
     {
  
       http_request=false;
	   //开始初始化XMLHttpRequest对象
       http_request = ajax_init();
       http_request.onreadystatechange=process_resetpassword_request;
       //确定发送请求方式，URL，及是否同步执行下段代码   
       
       http_request.open('POST',url,true);
       http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       http_request.send(post_data); 
	   
    }
	
	function send_querypassword_request(url,post_data)
    { 
	 
       http_request=false;
       http_request = ajax_init();
       
       http_request.open('POST',url,false);
       http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
       http_request.send(post_data); 
	   var result = http_request.status; 
	   
	   if(result==200) 
       { 
         var ret = http_request.responseText;
	     if(ret == "-1")
         {
	        
		   window.location.href="http://www.doword.cn/ET100/invalidate";
	  }
       } 
	   else
	     alert("您所请求的页面不正常！");
    }
	
	
	function on_reset_password()
	{
		var email = "<?php echo $email;?>";
		var password = document.getElementById("input_password").value;
		var second_password = document.getElementById("input_secondpassword").value;
		 
		if(password!=second_password)
		{
			alert("两次密码不一致。");
			return false;
		}
		var post_data = "email="+email+"&passcode="+password+"&linkCode="+"<?php echo $code;?>";
	    send_resetpassword_request("resetpassword_fun.php",post_data);
	}


</script>

</head>
<body onload="on_page_load()" >	

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
	  重置密码
     </div>
     <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
	       
	 <div class="div_findpassword">
                
		
		<div class="input_form">
				<span class="input_form_name">
						 您的邮箱:
				</span>
				
				<span style="float:left">
				     <font color="#FF0000"><?php echo $email;?> </font>	  
				</span>			
				 
		</div>
		
		&nbsp;&nbsp;&nbsp;&nbsp;现在您可以重置您的Doword.cn的密码。
		
		<div class="input_form">
				<span class="input_form_name">
						 &nbsp;&nbsp;密&nbsp;&nbsp;码:
				</span>
				<span class="input_form_input">
					<input type="password" id = "input_password" name="input_password" value="" size="33">
				</span>
		</div>
				
		<div class="input_form">
			<span class="input_form_name" >
					  确认密码:
			</span>	
			<span class="input_form_input">
				<input type="password" id = "input_secondpassword" name="input_secondpassword" value="" size="33">
			</span>
		</div>
		
		
		 <div class="right_botton">
					<input type="image" src="image/tijiao.png" value="提交" onclick="return on_reset_password()"/>
		 </div>

        
    </div>
     </div>
	
	<div class = "div_bottom">
	        北京英通一百教育科技有限公司2013.
	</div>
    

</div>

</body>
</html>