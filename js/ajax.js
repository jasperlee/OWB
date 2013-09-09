

 /*
 *  封装了各个类型的网络请求
 */
var email_input;
var http_request;
function check_email(str_email) 
 { 
       var pattern = /^[a-zA-Z0-9_.]+@([a-zA-Z0-9_]+.)+[a-zA-Z]{2,3}$/;  
       if(pattern.test(str_email)) 
          return true; 
       else 
          return false; 
 } 
/*
*   设置cookie
*/
function SetCookie(name,value)
{
     var Days = 30; // 
     var exp = new Date();
     exp.setTime(exp.getTime() + Days*24*60*60*1000);
     document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/";
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
    	document.cookie= name + "="+cval+";expires="+exp.toGMTString()+";path=/";
return null;
}

/*
*   获取cookie
*/
function getCookie(name)
{
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
    if(arr != null)
       return unescape(arr[2]);
	return null;
}
/*
*   初始化ajax.
*/

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


function send_register_request(url,post_data)
{  
   http_request=false;
	//开始初始化XMLHttpRequest对象
   http_request = ajax_init();
   http_request.onreadystatechange=process_check_request;
   //确定发送请求方式，URL，及是否同步执行下段代码   
	 
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}


function send_findpassword_request(url,post_data)
{
   http_request=false;
	//开始初始化XMLHttpRequest对象
   
   http_request = ajax_init();
   http_request.onreadystatechange=process_findpassword_request;
   //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}

function send_course_purcharse_request(url,post_data)
{ 
     
    http_request=false;
	//开始初始化XMLHttpRequest对象
    http_request = ajax_init();
    http_request.onreadystatechange=process_purchase_request;
	
    //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
 
}

function send_pay_request(url,post_data)
{ 
     
    http_request=false;
	//开始初始化XMLHttpRequest对象
    http_request = ajax_init();
    http_request.onreadystatechange=process_pay_request;
	
    //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}



function send_login_request(url,post_data)
{ 
     
    http_request=false;
	//开始初始化XMLHttpRequest对象
    http_request = ajax_init();
    http_request.onreadystatechange=process_login_request;
	
    //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}

function send_loginout_request(post_data)
{ 
     
	url = "LoginNumCheckHeader.php";
    http_request=false;
	//开始初始化XMLHttpRequest对象
    http_request = ajax_init();
    http_request.onreadystatechange=process_loginout_request;
	
    //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}
 
 
/*发送邮件*/
function send_check_email(url,post_data)
{
    http_request=false;
	//开始初始化XMLHttpRequest对象
    http_request = ajax_init();
    http_request.onreadystatechange=process_send_email;
	
    //确定发送请求方式，URL，及是否同步执行下段代码   
    http_request.open('POST',url,true);
    http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    http_request.send(post_data); 
}

//处理返回信息的函数  
function process_check_request(){
  
	if(http_request.readyState==4){//判断对象状态
	  if(http_request.status==200){//信息已成功返回，开始处理信息
	      
	     if(http_request.responseText == "-4")
		   alert("验证码错误!");
		 else if(http_request.responseText == "-3")
		   alert("请填写完整的信息");
		 else if(http_request.responseText == "-2")
		   alert("用户名已被占用,请更换新的用户名。");
		 else if(http_request.responseText == "-1")
		 {
		     //重定向到找密码首页
			 OnRedirectPassWordReset();
		 }
		 else if(http_request.responseText == "1")
		 {
		     OnRegisterSuccess();
		 }
		 else
		    alert("注册失败，你可以重复本次操作 如果还出现类似问题，请联系管理员。");
	  }else{
	      alert("您所请求的页面不正常！");
	  }
	}
}


function process_findpassword_request()
{
  if(http_request.readyState==4){
	  if(http_request.status==200){
	       Process_findpassword_result(http_request.responseText);
	  }else{
	      alert("您所请求的页面不正常！");
	  }
	}
}

function process_purchase_request()
{
    
    if(http_request.readyState==4){
	  if(http_request.status==200){
	     purchase_now = false;
	     OnPurchase(http_request.responseText);
	  }else{ 
	      purchase_now = false;
	      alert("您所请求的页面不正常！");
	  }
	}
}

function process_login_request()
{
    if(http_request.readyState==4){
	  if(http_request.status==200){
 
	     if(http_request.responseText != "-1")
		 {
			 on_login_success(http_request.responseText); 
		 }	
		 else
		   alert("登陆失败!");
	  }else{ 
	      alert("您所请求的页面不正常！");
	  }
	}
}



function process_send_email()
{
    if(http_request.readyState==4){
	  if(http_request.status==200){
	     if(http_request.responseText == "-4")
		 {
			 alert("检测到无效的请求,建议您重新注册。");
		 }
		 else if(http_request.responseText == "1")
		   alert("邮件发送成功,请注意查收。");
	  }else{ 
	      alert("您所请求的页面不正常！");
	  }
	}
}



function process_pay_request()
{
	 if(http_request.readyState==4){
	  if(http_request.status==200){
	       OnPay(http_request.responseText);
	  }else{ 
	      alert("您所请求的页面不正常！");
	  }
	}
}