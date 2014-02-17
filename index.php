<?php
   require_once("LoginNumCheckHeader.php");
   $bDeleteCookie = 0;
   if(!check_loginnum_valid())
   {
      $bDeleteCookie = 1;
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHT
ML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
html,body {padding:0;margin:0;height:1780;}
#sub {width:800px;margin:auto;height:1780;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script src="js/ajax.js" type="text/javascript"></script>
<script src="js/commonCheck.js" type="text/javascript"></script>
<title>英通一百 -- 主页</title>

<script type="text/javascript" language="javascript">
 
 
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
				<li id="list1"><a href=""> <img src="image/menu_01_1.jpg" name ="menu1" border="0"/></a></li>
				<li id="list3"><a href="eng_library_1"> <img src="image/menu_03_2.jpg" name ="menu3" border="0" onmouseover="this.src='image/menu_03_1.jpg'" onmouseout="menu3.src='image/menu_03_2.jpg'"/></a></li>
				<li id="list4"><a href="syzn_1"> <img src="image/menu_04_2.jpg" name ="menu4" border="0" onmouseover="this.src='image/menu_04_1.jpg'" onmouseout="menu4.src='image/menu_04_2.jpg'"/></a></li>
				<li id="list5"><a href="http://www.doword.cn/web/DoWords.html" target="_blank"> <img src="image/menu_05_2.jpg" name ="menu5" border="0" onmouseover="this.src='image/menu_05_1.jpg'" onmouseout="menu5.src='image/menu_05_2.jpg'"/></a></li>
				<li id="list6"><a href="#"> <img src="image/menu_06_2.jpg" name ="menu6" border="0" onmouseover="this.src='image/menu_06_1.jpg'" onmouseout="menu6.src='image/menu_06_2.jpg'"/></a></li>
				<li id="list7"><a href="#"> <img src="image/menu_07_2.jpg" name ="menu7" border="0" onmouseover="this.src='image/menu_07_1.jpg'" onmouseout="menu7.src='image/menu_07_2.jpg'"/></a></li>
				<li id="list8"><a href="#"> <img src="image/menu_08_2.jpg" name ="menu8" border="0" onmouseover="this.src='image/menu_08_1.jpg'" onmouseout="menu8.src='image/menu_08_2.jpg'"/></a></li>
			</ul>
			</div>
			
			<div class="main_head">
			</div>
			 
			<div class="main_body">
				<div class="main_page_left_1">
					<a href="DownDoword" target="_blank">
					   <img src="image/niu_1.png"  style="margin-left:200px;margin-top:15px"/>
					 </a> 
					
				</div>
				
				<div class="main_page_right_1">
				         <a  style="width:168px;height:31px;" href="http://www.doword.cn/web/DoWords.html
" target="_blank">
					   <img style="margin-left:150px;margin-top:15px"type="image"  src="image/niu_2.png"/>
					 </a>
					
				</div>
				
				<div class="main_head_2">
				</div>
				
				<div class="main_page_text">
				
				    <div class = "main_page_text_header">   
					<span class="main_page_text_item_header_top">
					    这是我们的一些试用者对《读我背单词》的评语摘录，读起来有点盲人摸象的感觉。
					</span>
					
					 
					</div>
					
				    <div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">英语老师</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/pt_1.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						        钟离<br/> 
							  <font color="#25A3B3">(女,29岁,英语老师)<br/></font>
							  <font color="#25A3B3"> 使用超过90天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">
						        
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp;我觉得《读我背单词》的最大特点就是一个字"全"。</font>
							  一是背单词的功能全，二是单词库全。我开始一直搞不明白，这个软件通过“跟读练习”、“朗读练习”、“词义练习”、“拼写练习”去背单词已经非常充分且直观，为什么还需要“捋发音”、“捋词义”和“捋拼写”等捋单词的功能。最后使用这些功能后，发现它们是对已学过的单词进行总复习以及总检验，并且其记忆机制可以真正地让你牢记单词，特别适合中小学生在期末考试前使用。


						   </div>
						</div>
						
						<div class = "main_page_text_item_tail">
						</div>
					 	
				   </div>		
				   
				   <div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">软件工程师</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/zhaopian_2.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						         石森<br/> 
							  <font color="#25A3B3">(男，24岁，软件工程师)<br/></font>
							  <font color="#25A3B3"> 使用超过40天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">     
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp; 我最喜欢《读我背单词》的捋发音了。</font>
							  因为长期查阅英文资料，我的英语词汇量应该不小。试用《读我背单词》后，发现我原来认为自己非常熟悉的单词，读音却是错误的。如analysis，这是我每天都会碰到的单词，我原来把它的重音想当然地放在ly上，发音和analyze近似。通过捋发音，才知道它的重音在第2个音节na上。我这几年一直断断续续地练习英语听力，花了不少功夫，但始终不见本质上的提高，原来是因为我在一些常见的单词的读音上有明显错误，而我却一直没有注意到。捋发音确实是一个纠正单词发音错误的好方法。
						   </div>
						</div>
						
						<div class = "main_page_text_item_tail">
						</div>
					 	
				   </div>		
				   
				   
				   <div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">产品经理</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/pt_3.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						        肖大明<br/> 
							  <font color="#25A3B3">(男，47岁，产品经理)<br/></font>
							  <font color="#25A3B3"> 使用超过30天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">
						        
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp;《读我背单词》的自动化做得很好，也很实用。</font>
							  我前一段时间去外地度假，每天晚上睡觉前，把电脑放在房间的写字台上，打开《读我背单词》的跟读功能，躺在床上开始跟着电脑读单词，感觉背单词轻松而充实。 我以前晚上经常失眠，背单词却让我很快入睡。 这段假期，我真背会了不少单词。如果有手机版，就更好了。

						   </div>
						</div>
						
						<div class = "main_page_text_item_tail">
						</div>
					 	
				   </div>

					<div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">研究生</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/pt_4.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						        刘茹<br/> 
							  <font color="#25A3B3">(女，28岁，研究生)<br/></font>
							  <font color="#25A3B3"> 使用超过30天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">
						        
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp; 我觉得捋单词功能很好。</font>
							  我准备考雅思，一直断断续续地在背诵雅思词汇。以前用的是词汇本，每次中断后几乎是从头开始。结果词汇本前面的单词背得很熟悉，后面的单词却一直没有背。《读我背单词》的捋单词功能能够帮记住我以前的工作，并且滤掉我背熟的单词，使我能花更多的时间在不熟悉的单词上。   
							  
						   </div>
						</div>
						
						<div class = "main_page_text_item_tail">
						</div>
					 	
				   </div>	
				   
				   	<div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">美术编辑</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/pt_5.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						        宫萍<br/> 
							  <font color="#25A3B3">(女，36岁，美术编辑)<br/></font>
							  <font color="#25A3B3"> 使用超过60天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">
						        
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp; 我儿子上小学5年级，他很喜欢这个软件。</font>
							  每次上英语课的前一天晚上，他都把英语课上要学的新单词找出来，进行反复跟读。在英语课上他就可以在班上给同学们领读单词。
							  
						   </div>
						</div>
						
						<div class = "main_page_text_item_tail">
						</div>
					 	
				   </div>	
				   
				    	<div class = "main_page_text_item">
					    <div class = "main_page_text_item_header">  
					       <span class="left"><font color="#25A3B3">行政助理</font></span>
						   <span class="main_page_text_item_line">
						   </span>
						</div>
						
						<div class = "main_page_text_item_mid">
						   <img class="left" src="image/pt_6.jpg"  border="0"/>
						   <div class = "main_page_text_item_text1">
						        谭淑滢<br/> 
							  <font color="#25A3B3">(女，24岁，行政助理)<br/></font>
							  <font color="#25A3B3"> 使用超过45天</font>
						   </div>
						   
						    <div class = "main_page_text_item_label">
						        
							  <font color="#25A3B3">&nbsp;&nbsp;&nbsp;  我最喜欢用拼写练习功能了。</font>
							  可以边听单词录音，边写单词。
							  <img style="float:right;margin-left:10px" src="image/pic_10.jpg"  border="0"/>
						   </div>
						   
						</div>
						
 	 	
				   </div>
		        </div>
				
				<div style="float:left;width=800px;height=30px;font-size:12px; ">
				    分流下载/合作推广：<a href="http://baoku.360.cn/soft/show/appid/103470636" target="_blank" title="360分流下载"><img border="0" src="http://p1.qhimg.com/d/baoku/3.png" alt="360分流下载"/></a>
					&nbsp;&nbsp;					
					<a href="http://www.9ht.com/xz/39639.html" target="_blank">9号下载</a> 
					&nbsp;&nbsp;
					<a href="http://www.pc6.com" target="_blank">pc6官方下载</a>
                    
				</div>
				
			     <div class = "main_tail">
					京ICP备 13026785号 | 电话：010-62191221 
				</div>
		
		</div>
		
</body>
	

</html>