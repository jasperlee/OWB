
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
session_start();
$email=$_REQUEST['email'];
if(!$email){	
$url = "http://121.199.44.5/register/demo/reg.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<script src="ajax.js"  type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>英通一百 -- 个人中心</title>

<style type="text/css">
html,body {padding:0;margin:0;height:98%;}
#sub {width:800px;margin:auto;height:98%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">


		function getQueryString(name) {    
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");    
		var r = window.location.search.substr(1).match(reg);    
		if (r != null) 
		return unescape(r[2]); 
		return null;    
		}
	    
		function form_sub() 
      { 
        
      }	
	  
</script>

</head>
<body">
<div class="main">
	<link href="css.css" rel="stylesheet" type="text/css" />

<div class="title">
		<img src="image/top.jpg" />
	</div>
	
<div class="menu">
	<ul>
		<li id="list1"><a href="#"><img src="image/niu_1.png" border="0"/></a></li>
		<li id="list2"><a href="#"><img src="image/niu_2.png" border="0"/></a></li>
		<li id="list3"><a href="#"><img src="image/niu_3.png" border="0"/></a></li>
		<li id="list4"><a href="#"><img src="image/niu_4.png" border="0"/></a></li>
	</ul>
 </div>
      

	<div class="left">
	<p>left</p>
	</div>
	<div class="right">
	<p>right</p>
	</div>

 
	
	<div class = "div_bottom">
	        版权所有:北京英通一百教育科技有限公司 2013.
	</div>
</div>
</body>
</html>
