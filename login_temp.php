<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />

<script src="artDialog/artDialog.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
 
<script src="babu_client/babu.common.js" type="text/javascript"></script>
<script src="babu_client/babu.combobox.js" type="text/javascript"></script>
	
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
<title>Ӣͨһ�� -- ��Ա��½</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">
var items = [{ text: "595207641@qq.com" }];   
	  var _user_email;
      function form_sub() 
      { 
	     _user_email = document.getElementById("cb5").value;
		 
		 
	     if(!_user_email || !document.form1.passcode.value) 
         {  
           alert("����д��������Ϣ"); 
           return false; 
         }
	     if(!check_email(_user_email))
	     {  
           alert("����д��ȷ�������ʽ,���佫����Ϊ�����û���."); 
           return false; 
         }
	 	 
		 var post_data = "email="+_user_email+"&passcode="+document.form1.passcode.value;
		 send_login_request('login_fun.php',post_data);
		 
		 return false;
      }	

      function form_clear()
      {
          document.form1.reset();       
          document.form1.input_email.focus();
          return false;
      }   
 
     function check_email_exsit() //���email�Ƿ����
     { 
     	  
     }
	 
	 function RefreshImage()
     {
         document.getElementById("code_ver").src=document.getElementById("code_ver").src+Math.random(); 
     }
	 
	 function on_login_success(UserName)
	 {
	      alert("on_login_success");
	      var zJson =  eval('(' + UserName + ')');
	  
	      SetCookie("email",_user_email);
	      SetCookie("UserName",zJson.name);
		  SetCookie("loginnum",zJson.loginnum);
		  
	       
		  var op= "<?php echo $_REQUEST["op"] ?>";
		  if(op == 1) //��ת������ҳ��
		  {
		       art.dialog({
			   lock:true,
			   content: '��½�ɹ�,3������Ϊ����ת������ҳ��..',
			   icon:"succeed",
	           width: 400,
               height: 120,
			   init: function () {
    	          var that = this, i = 3;
                  var fn = function () {
                  that.content('��½�ɹ�,'+i + '������Ϊ����ת������ҳ��..');
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
			   content: '��½�ɹ�,3������Ϊ����ת����ҳ..',
			   icon:"succeed",
	           width: 400,
               height: 120,
			   init: function () {
    	          var that = this, i = 3;
                  var fn = function () {
                  that.content('��½�ɹ�,'+i + '������Ϊ����ת����ҳ..');
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
	
	  function cb_onValueChanged(sender, e) {
           alert( e.value);
         }
	 function createComboBox(eltid, settings) {
             var cb = new ComboBox(document.getElementById(eltid), settings);

             cb.onValueChanged = cb_onValueChanged;
 
         }
		 
	 function pageLoad() {
	    createComboBox("cb5", { itemSource: items, style: "edit", autoComplete: "local" });
     }
		 
	window.onload =pageLoad;
		     
	 
	 
</script>

</head>
<body>
 
		
<div class="main">
	<link href="css.css" rel="stylesheet" type="text/css" />

	 <div class="div_user">
	        <a style="color:red" href="index" > �ص���ҳ </a>				 
	 </div>
			   
<div class="title">
		<img src="image/top.jpg" />
	</div>
	 
	<div class="logo">
		<img src="image/pic.jpg" />
	</div>
	<div class="reg">
		<div class="reg_title">
			�û���½
		</div>
		<HR style="border:1px dotted #ccc" width="80%">
		<div class="reg_form">
			<form method="post" name="form1" action="register.php"  onsubmit="return form_sub()">
				
				<div class="input_form">
					<span class="input_form_name" >
						�����ַ:
					</span>
					<span class="input_form_input">
						<input id="cb5" name="cb5" size="27"/>
					</span>
				</div>
				 
				
				<div class="input_form">
					<span class="input_form_name">
						   &nbsp;&nbsp;��&nbsp;&nbsp;��:
					</span>
					<span class="input_form_input">
						<input type="password" name="passcode" value="" size="27">
					</span>
					<a href="findpassword.php">&nbsp;��������?</a>
				</div>
				
								
				 
			 
				
				<div class="input_button">
					<input type="image" src="image/tijiao.png" value="�ύ" onclick=""/>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="image" src="image/qingkong.png" value="����" onclick="return form_clear()"/>
				</div>
				
			</form>
		</div>
	</div> 
</div>

  <div id="flashContent">
   </div>
</body>
</html>
