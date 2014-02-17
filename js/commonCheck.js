window.onload = function (){
     var bDeleteCookie = "<?php echo $bDeleteCookie;?>";
     if(bDeleteCookie==1)
	 {
	    delCookie("UserName");
		delCookie("email");
		delCookie("loginnum");
	 }
	  
     var UserName = getCookie("UserName");
     var Email    = getCookie("email");
         
        if(UserName && Email)
        { 
     	   document.getElementById("login_user").innerHTML = "欢迎您,"+UserName;
	       document.getElementById("login_user").style.color="red";
           document.getElementById("reg_quit").innerHTML = '退出';  
        }
        else
        { 
           document.getElementById("login_user").innerHTML = '登陆';
           document.getElementById("reg_quit").innerHTML = '注册';  
        }
}

 var bSendRequest = false;

	 
function on_reg_quit()
{
	     /*实时监测cookie*/
	    var UserName = getCookie("UserName");
        var Email    = getCookie("email");
    
        if(UserName && Email) 
		{ 
		    /*退出*/	
			if(bSendRequest)
			{
			   alert("操作中,请稍候重试");
			   return;
			}
			bSendRequest = true;	
			var post="type=1&loginnum="+getCookie("loginnum");
			 
			 
            send_loginout_request(post);
            document.getElementById("login_user").innerHTML = '登陆';
            document.getElementById("reg_quit").innerHTML = '注册';  
		}
		else //跳转
		  window.location.href="http://www.doword.cn/ET100/reg";
}
	 
function process_loginout_request()
{
	 　bSendRequest = false;
       if(http_request.readyState==4){
	     if(http_request.status==200){
		    
	        delCookie("UserName");
			delCookie("email");
			delCookie("loginnum");
			
	    }else{ 
	      alert("您所请求的页面不正常！");
	    }
	  }
}

	 
	 
function on_login_user()
{
	    /*实时监测cookie*/
	    var UserName = getCookie("UserName");
        var Email    = getCookie("email");
    
        if(UserName && Email)
		{
		   document.getElementById("login_user").innerHTML = "欢迎您,"+UserName;
	       document.getElementById("login_user").style.color="red";
           document.getElementById("reg_quit").innerHTML = '退出'; 
		}
		else //跳转
		   window.location.href="http://www.doword.cn/ET100/login";
		 
}