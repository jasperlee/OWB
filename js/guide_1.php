<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	html,body {padding:0;margin:0;height:1130px;}
	#sub {width:800px;margin:auto;height:1130px;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}

	.menuTitle
	{
		width:100%; height:25px; margin:0 auto; line-height:25px; font-size:12px; font-weight:bold;
	}
	.activeTitle
	{
		width:100%; height:25px; margin:0 auto; line-height:25px; font-size:12px; font-weight:bold;
	}
	.menuContent
	{
		margin-top:-20px; height:25px; width:100%;  display:none;
	}
	.mainli1{
		background:url(image/jh.png) no-repeat 5px 6px ;list-style-type:none;padding:0px 0px 0px 0px; font-size:12px;
		
	}
	.mainli2{
		background:url(image/jh_1.png) no-repeat 5px 6px ; list-style-type:none;padding:0px 0px 0px 0px; font-size:12px;
		
	}
	.subli
	{
		 background:url(image/sub.gif) no-repeat 5px 6px ; list-style-type:none;padding:0px 0px 0px 0px; font-size:11px; 
	}
</style>
<title>读我背单词 -- 使用指南</title>
<script type="text/javascript" src="js/menu.js"></script>
<script src="js/common.js" type="text/javascript"></script>	
<script type="text/javascript" language="javascript">
	$(document).ready(
	function() 
	{
		$(".menuTitle").click(function(){
			$(this).next("div").slideToggle("fast")
		});
		$(".mainli1").click(function(){
			$(this).toggleClass("mainli2");
			$(this).siblings(".mainli2").removeClass("mainli2");
		});
	});
  window.onload = function (){
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
</script>

	
</head>
	
<body>
		<div class="main">
		
			<link href="css.css" rel="stylesheet" type="text/css" />
			
			<div class="main_logo">
			  <span class="main_user">
	                       <a  id= "login_user" style="cursor:pointer;color:red" onclick="on_login_user()" ></a>
						  |
	                      <a  id= "reg_quit"   style="cursor:pointer;color:red" onclick="on_reg_quit()"></a>&nbsp;&nbsp;
			   </span>
			</div>
			
			<div class="main_menu">
			<ul>
				<li id="list1"><a href="index"> <img src="image/menu_01_2.jpg" name ="menu1" border="0"  onmouseover="this.src='image/menu_01_1.jpg'" onmouseout="menu1.src='image/menu_01_2.jpg'"/></a></li>
				<li id="list3"><a href="eng_library_1"> <img src="image/menu_03_2.jpg" name ="menu3" border="0" onmouseover="this.src='image/menu_03_1.jpg'" onmouseout="menu3.src='image/menu_03_2.jpg'"/></a></li>
				<li id="list4"><a href="guide_1"> <img src="image/menu_04_1.jpg" name ="menu4" border="0"/></a></li>
				<li id="list5"><a href="http://www.doword.cn/web/DoWords.html" target="_blank"> <img src="image/menu_05_2.jpg" name ="menu5" border="0" onmouseover="this.src='image/menu_05_1.jpg'" onmouseout="menu5.src='image/menu_05_2.jpg'"/></a></li>
				<li id="list6"><a href="#"> <img src="image/menu_06_2.jpg" name ="menu6" border="0" onmouseover="this.src='image/menu_06_1.jpg'" onmouseout="menu6.src='image/menu_06_2.jpg'"/></a></li>
				<li id="list7"><a href="#"> <img src="image/menu_07_2.jpg" name ="menu7" border="0" onmouseover="this.src='image/menu_07_1.jpg'" onmouseout="menu7.src='image/menu_07_2.jpg'"/></a></li>
				<li id="list8"><a href="#"> <img src="image/menu_08_2.jpg" name ="menu8" border="0" onmouseover="this.src='image/menu_08_1.jpg'" onmouseout="menu8.src='image/menu_08_2.jpg'"/></a></li>
		
			</ul>
			</div>
			
			<div class="main_head">
			</div>
			<div style="height:100%;width:800px;border:1px;">
				<div class="main_left">
					<div class="main_guide_left_bk">
						<img  style="margin-top:-5px" src="image/lm.jpg"></img>
						<div class="menuTitle">
							<li class="mainli1">  <div style="margin-left:20px;">阅读本指南的重要性</div></li>
						</div>
						<div class="menuTitle">
							<li class="mainli1"> <div style="margin-left:20px;">为什么开发《读我背单词》？</div></li>
						</div>
						<div class="menuContent">
							<ul>
								<li class="subli"> <a href="#">背单词的重要性</a></li>
								<li class="subli"> <a href="#">中国英语学习者的词汇现状</a></li>
								<li class="subli"> <a href="#">现有背单词软件的功能缺陷</a></li>
								<li class="subli"> <a href="#">矫正单词发音错误是《读我背单词》的最初开发动机</a></li>
								<li class="subli"> <a href="#">长达半年的试用来完善《读我背单词》</a></li>
								<li class="subli"> <a href="#">现有背单词软件的功能缺陷</a></li>
							</ul>
						</div>
                                             
					</div>
				</div>
				
				<div class="main_1_right">
					<img style="margin-top:5px;" src="image/bn_5.png"></img>
					<div  style="margin-left:50px;margin-top:5px;margin-right:50px;">
						<label style="color:#0000ff;font-weight:bolder">《读我背单词》英语单词库介绍</label>
						</br>
						<label>&nbsp;&nbsp;&nbsp;&nbsp;我们的背英语单词产品中包含大量的、分门别类的英语单词库，并且我们还将根据用户需要进一步开发单词库。单词库中的所有
单词都包含英式和美式两种发音，可供用户根据自己的需要选择使用。</br>&nbsp;&nbsp;&nbsp;&nbsp;库名前包含前标[]的单词库包含一个以上的子库，我们称它非叶子库；库名前包含前标[]的单词库不包含任何子库，我们称它叶
子库。用户可以对叶子库使用《读我背单词》的全部功能进行学习；但对非叶子库用户只能使用捋单词功能（捋发音、捋词义、捋拼
写）。</br>&nbsp;&nbsp;&nbsp;&nbsp;有些单词库包含大量的单词（如托福包含6000多个单词）。我们现在人为地把它们分成两个字库：按拼写排序和按使用频度排序。
使用“按拼写排序”的单词库的优点是：你可以在空闲的时候对已记忆的单词进行默想（我们发现睡觉前躺着默想单词可以使人很快
入睡。如果你经常失眠，不妨使用《读我背单词》，既省去了有害且花钱的安眠药，又能提高英语）。使用“按使用频度排序”的单
词库的优点是：任何时候中断背单词都能让你的学习效率最大化。我们今后还可能对这些单词库开发新的排序方式，如：按考试频度
排序。</br>&nbsp;&nbsp;&nbsp;&nbsp;我们的单词库分为功能性词库和正常词库，功能型词库放在树形词库的最前面，其操作与正常词库完全一致。</label>
					</div>

				</div>
				<div class = "main_tail">
					Copyright 2013 ©Web International English,All Right Reserved.京ICP备 13026785号 电话：010-62191221
			        </div>
				
				
			</div>
			
		</div>
		
	</body>
	

</html>