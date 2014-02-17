

/*
*   设置cookie
*/
function SetCookie(name,value)
{
     var Days = 30; //此 cookie 将被保存 30 天
     var exp = new Date();
     exp.setTime(exp.getTime() + Days*24*60*60*1000);
     document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

/*
*   删除cookie
*/
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
    	document.cookie= name + "="+cval+";expires="+exp.toGMTString();
return null;
}

/*
*  读取cookie
*/
function getCookie(name)
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null)
       return unescape(arr[2]);
	return null;
}

function on_reg_quit()
{
	/*实时监测cookie*/
	var UserName = getCookie("UserName");
        var Email    = getCookie("email");
    
        if(UserName && Email) 
        { 
		    /*退出*/	 
		delCookie("UserName");
		delCookie("email");
		document.getElementById("login_user").innerHTML = '登陆';
                document.getElementById("reg_quit").innerHTML = '注册';  
	}
	else //跳转
		window.location.href="http://www.doword.cn/ET100/reg";
}
	 
function on_login_user()
{
	    /*实时监测cookie*/
	var UserName = getCookie("UserName");
        var Email    = getCookie("email");
    
        if(UserName && Email)
        {
		   
	}
	else //跳转
	    window.location.href="http://www.doword.cn/ET100/login";
		 
}

function PageOnLoad()
{
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