<?php
    session_start();
	$json_user_list = addslashes($_COOKIE['user_list']);
	if(!$json_user_list)
	   $json_user_list = "[]"
	//die($json_user_list);
	/*echo $json_user_list;
 	$de_json = json_decode($cookie_user_list) or die("json_decode") ;
	$arr_user_list = array();
	for($index = 0;$index<count($de_json);$index++)
	{
	   $item["text"] = $de_json[$index]["text"];
	   $arr_user_list[] = $item;
	}
	$json_user_list = addslashes(json_encode($arr_user_list));
    echo $json_user_list;*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<script type="text/javascript" src="js/swfobject.js"></script>
<script type="text/javascript" src="js/flash.js"></script>
<script src="artDialog/artDialog.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
 
<script src="babu_client/babu.common.js" type="text/javascript"></script>
<script src="babu_client/babu.combobox.js" type="text/javascript"></script>
	
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
<title>英通一百 -- 会员登陆</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
     
      FlashInit();
	  var item_user;
	  var _user_email;
	  var _user_list;
      function form_sub() 
      { 
	      _user_email = document.getElementById("cb5").value;
	  
	     if(!_user_email || !document.form1.passcode.value) 
         {  
           alert("请填写完整的信息"); 
           return false; 
         }
	     if(!check_email(_user_email))
	     {  
           alert("请填写正确的邮箱格式,邮箱将被作为您的用户名."); 
           return false; 
         } 
		 var post_data = "email="+_user_email+"&passcode="+document.form1.passcode.value;
		 send_login_request('login_fun.php',post_data);		 
		 return false;
      }	

	  
	 
	
      function form_clear()
      {
           document.form1.reset();       
           document.getElementById("passcode").value="";	   
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
	  
	      SetCookie("email",_user_email);
	      SetCookie("UserName",zJson.name);
		  SetCookie("loginnum",zJson.loginnum);  
		  
		  
		  /*写入用户cookie列表*/	  
		  var _cookie_user_list="";
		  _cookie_user_list =  _cookie_user_list+"{\"text\":\""+_user_email+"\"}";
		  
		  for(var index =0;index<item_user.length;++index)
		  {
		    if(item_user[index]["text"]!=_user_email)
			{
		        _cookie_user_list = _cookie_user_list+",";	
		     	_cookie_user_list = _cookie_user_list+"{\"text\":\""+item_user[index].text+"\"}";
			} 
		  }
		  _cookie_user_list = "["+_cookie_user_list+"]";
		  SetCookie("user_list",_cookie_user_list);
			 
		  var bCheck = document.getElementById("check_rember").checked;
		  if(bCheck)
		  {
		     SetCookie(_user_email,document.getElementById("passcode").value);
	      }
		  else  //删除
		  {
		     delCookie(_user_email); 
		  }
		  
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
	
	  
	 function createComboBox(eltid, settings) {
             var cb = new ComboBox(document.getElementById(eltid), settings);
			 if(item_user.length>0)
			    cb.set_value(item_user[0].text);
             cb.onValueChanged = cb_onValueChanged;
			 
         }
		 
		function cb_onValueChanged(sender, e) {
             _user_email = e.value;
			 for(var index=0;index<item_user.length;++index)
			 {
			     if(item_user[index].text == _user_email) //找到匹配的,设置密码
				 { 
				     document.getElementById("passcode").value	 = getCookie(_user_email);
					  
				 }
			 }
         } 
		 
  		
	 function pageLoad() {
	    
		//sz_user_list = getCookie("user_list");
		//_user_list = eval('(' + sz_user_list + ')');
		//var text = 
		item_user =  eval('(' + "<?php echo $json_user_list; ?>" + ')');;
		createComboBox("cb5", { itemSource: item_user, style: "edit" });
	 
		if(item_user.length>0)
		{
		   
		   document.getElementById("passcode").value = getCookie(item_user[0].text);
		}
	   
     }
		 
	window.onload =pageLoad;
		     
	 
	 
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
			<form method="post" name="form1" action=""  onsubmit="">
				
				<div class="input_form">
					<span class="input_form_name" >
						邮箱地址:
					</span>
					<span class="input_form_input">
						<input id="cb5" name="cb5" style="width:180px;"/>
					</span>
				</div>
				 
				
				<div class="input_form">
					<span class="input_form_name">
						   &nbsp;&nbsp;密&nbsp;&nbsp;码:
					</span>
					<span class="input_form_input">
						<input type="password" id="passcode" name="passcode" value="" size="27">
					</span>
					<a href="findpassword.php"> <font size="3"> &nbsp;忘记密码?</font></a>
				</div>
				
								
				 
			    <div class ="input_form">
				   <span >
				      <input style="margin-left:-30px; " type="checkbox" name="check_rember" id ="check_rember" value="记住密码"> <font size="3">记住密码 </font>
				   </span>
				</div>
				
				<div class="input_button">
					<input type="image" src="image/tijiao.png" value="提交" onclick="return form_sub()"/>&nbsp;&nbsp;&nbsp;&nbsp;
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
