<?php
   require_once("LoginNumCheckHeader.php");
   $bDeleteCookie = 0;
   if(!check_loginnum_valid())
   {
      $bDeleteCookie = 1;
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	html,body {padding:0;margin:0;height:765px;}
	#sub {width:800px;margin:auto;height:765px;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>
<title>读我背单词 -- 英语单词库</title>

<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/commonCheck.js" type="text/javascript"></script>
 
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
				<li id="list3"><a href="eng_library_1"> <img src="image/menu_03_1.jpg" name ="menu3" border="0"/></a></li>
				<li id="list4"><a href="syzn_1"> <img src="image/menu_04_2.jpg" name ="menu4" border="0" onmouseover="this.src='image/menu_04_1.jpg'" onmouseout="menu4.src='image/menu_04_2.jpg'"/></a></li>
				<li id="list5"><a href="http://www.doword.cn/web/DoWords.html" target="_blank"> <img src="image/menu_05_2.jpg" name ="menu5" border="0" onmouseover="this.src='image/menu_05_1.jpg'" onmouseout="menu5.src='image/menu_05_2.jpg'"/></a></li>
				<li id="list6"><a href="#"> <img src="image/menu_06_2.jpg" name ="menu6" border="0" onmouseover="this.src='image/menu_06_1.jpg'" onmouseout="menu6.src='image/menu_06_2.jpg'"/></a></li>
				<li id="list7"><a href="#"> <img src="image/menu_07_2.jpg" name ="menu7" border="0" onmouseover="this.src='image/menu_07_1.jpg'" onmouseout="menu7.src='image/menu_07_2.jpg'"/></a></li>
				<li id="list8"><a href="#"> <img src="image/menu_08_2.jpg" name ="menu8" border="0" onmouseover="this.src='image/menu_08_1.jpg'" onmouseout="menu8.src='image/menu_08_2.jpg'"/></a></li>
		
			</ul>
			</div>
			
			<div class="main_head">
			</div>
			<div class="main_body" style="height:400px">
				<div class="main_left">
						<div class="main_left_navigate_bk">
								<div id="news_list">                                
                                                         <li class="li"> <div class="newstitle"><a href="eng_library_1"  style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000 ">&nbsp;&nbsp;词库概述</a></div> </li>
						         <li class="li"> <div class="newstitle"><a href="eng_library_2"    style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000  ">&nbsp;&nbsp;词库结构</a></div> </li>
						         <li class="li_focus"> <div class="newstitle"><a href="eng_library_3"   style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#FFF  ">&nbsp;&nbsp;功能性词库介绍</a></div> </li>
						         <li class="li"> <div class="newstitle"><a href="eng_library_4"  style="TEXT-DECORATION:none;  height:30px;
    line-height:30px; color:#000  ">&nbsp;&nbsp;普通词库介绍</a></div> </li>					   
					               </div>
                                             
					</div>
					
					<a href="http://www.doword.cn/web/DoWords.html" target="_blank"> <img style="margin:5px;float:left;" src="image/pic_7.jpg"></img> </a>
					<a href="DownDoword" target="_blank"><img style="margin-left:5px;float:left;" src="image/pic_8.jpg"></img> </a>
				</div>
				
				<div class="main_1_right">
					<img style="margin-top:5px;" src="image/n_libraray_3.png"></img>
					<div style="color:#ff9966;font-weight:bolder;margin-left:50px;margin-top:5px;margin-right:50px;">
						<label style="font-size:14px;">试用词库</label>
						</br>
						<label style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;包含100个单词，该单词库的目的是让你了解我们产品的功能，无论你是否注册都可以试用本单词库。使用本单词库时，会弹出一个"使用提示"对话框，对相应操作进行详细介绍。</label>
					</div>
					<img style="margin-left:10px;margin-top:5px;" src="image/line.png"></img>
					<div style="color:#009966;font-weight:bolder;margin-left:50px;margin-top:5px;margin-right:50px;">
						<label style="font-size:14px;">我的单词库</label>
						</br>
						<label style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;用户可以自己从相关单词库中选择单词添加到该库中，也可以从该库中删除单词。这个单词库的目的是让用户可以充分利用《读我背单词》的全部功能背诵自己需要背诵的某些单词。建议用户一次选择1000个左右的单词进行背诵。</label>
					</div>
					<img style="margin-left:10px;margin-top:5px;" src="image/line.png"></img>
					<div style="color:#993399;font-weight:bolder;margin-left:50px;margin-top:5px;margin-right:50px;">
						<label style="font-size:14px;">我的学习记录</label>
						</br>
						<label style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;根据用户的操作分门别类地记录用户学习过的单词，目的是方便用户对已学习过的单词进行复习，其字库如下：
						</br>&nbsp;&nbsp;&nbsp;&nbsp;接触过的单词&nbsp;&nbsp;&nbsp;&nbsp;查找过的单词</br>
						&nbsp;&nbsp;&nbsp;&nbsp;跟读过的单词&nbsp;&nbsp;&nbsp;&nbsp;朗读过的单词</br>
						&nbsp;&nbsp;&nbsp;&nbsp;做过词义练习的单词&nbsp;&nbsp;&nbsp;&nbsp;做过拼写练习的单词
						
						</label>
					</div>
				</div>
				
				<div class = "main_tail">
					 京ICP备 13026785号 | 电话：010-62191221
			        </div>
			</div>
			
		</div>
		
	</body>
	

</html>