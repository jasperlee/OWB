<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html,body {padding:0;margin:0;height:935px;}
	#sub {width:800px;margin:auto;height:935px;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>
<title>读我背单词 -- 词库结构</title>

<script src="js/common.js" type="text/javascript"></script>	
<script type="text/javascript" language="javascript">
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
				<li id="list2"><a href="library_1"> <img src="image/menu_02_1.jpg" name ="menu2" border="0"/></a></li>
				<li id="list3"><a href="eng_library_1"> <img src="image/menu_03_2.jpg" name ="menu3" border="0" onmouseover="this.src='image/menu_03_1.jpg'" onmouseout="menu3.src='image/menu_03_2.jpg'"/></a></li>
				<li id="list4"><a href="syzn_1"> <img src="image/menu_04_2.jpg" name ="menu4" border="0" onmouseover="this.src='image/menu_04_1.jpg'" onmouseout="menu4.src='image/menu_04_2.jpg'"/></a></li>
				<li id="list5"><a href="#"> <img src="image/menu_05_2.jpg" name ="menu5" border="0" onmouseover="this.src='image/menu_05_1.jpg'" onmouseout="menu5.src='image/menu_05_2.jpg'"/></a></li>
				<li id="list6"><a href="#"> <img src="image/menu_06_2.jpg" name ="menu6" border="0" onmouseover="this.src='image/menu_06_1.jpg'" onmouseout="menu6.src='image/menu_06_2.jpg'"/></a></li>
				<li id="list7"><a href="#"> <img src="image/menu_07_2.jpg" name ="menu7" border="0" onmouseover="this.src='image/menu_07_1.jpg'" onmouseout="menu7.src='image/menu_07_2.jpg'"/></a></li>
				<li id="list8"><a href="#"> <img src="image/menu_08_2.jpg" name ="menu8" border="0" onmouseover="this.src='image/menu_08_1.jpg'" onmouseout="menu8.src='image/menu_08_2.jpg'"/></a></li>
		
			</ul>
			</div>
			
			<div class="main_head">
			</div>
			<div class="main_body">
				<div class="main_left">
						<div class="main_left_navigate_bk">
										<div id="news_list">                                
                                                         <li class="li"> <div class="newstitle"><a href="library_1"  style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000 ">&nbsp;&nbsp;词库简介</a></div> </li>
						         <li class="li_focus"> <div class="newstitle"><a href="library_2"    style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000  ">&nbsp;&nbsp;词库结构</a></div> </li>
						         <li class="li"> <div class="newstitle"><a href="library_3"   style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000  ">&nbsp;&nbsp;功能性词库介绍</a></div> </li>
						         <li class="li"> <div class="newstitle"><a href="library_4"  style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000  ">&nbsp;&nbsp;普通词库介绍</a></div> </li>					   
					               </div>
					<a href="http://www.dowords.com.cn/DoWords/as/DoWords.html" target="_blank"> <img style="margin:5px;float:left;" src="image/pic_7.jpg"></img> </a>
					<a href="down" target="_blank"><img style="margin-left:5px;float:left;" src="image/pic_8.jpg"></img> </a>
				</div>
				
				<div class="main_3_right">
					<img style="margin-top:5px;" src="image/n_词库结构.png"></img>
					<img style="margin-top:5px;" src="image/pic_3.jpg"></img>
				</div>
				
				<div class = "main_tail">
					Copyright 2013 ©Web International English,All Right Reserved.京ICP备 13026785号 电话：010-62191221
			        </div>
			
			</div>
			
		</div>
		
	</body>
	

</html>