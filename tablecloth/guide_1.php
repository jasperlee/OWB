<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=gb2312">
<link href="style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	html,body {padding:0;margin:0;height:1130px;}
	#sub {width:800px;margin:auto;height:1130px;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
	.container
	{
		width:100%; text-align:center;
	}
	.menuTitle
	{
		float:left;width:100%; height:25px; margin:0 ; line-height:25px; font-size:12px; font-weight:bold; cursor:pointer; margin-top:6px;
	}
	.activeTitle
	{
		float:left;width:100%; height:25px; margin:0 ; line-height:25px; font-size:12px; font-weight:bold;cursor:pointer; margin-top:6px;
	}
	.menuContent
	{
		float:left;margin-top:5px ; height:auto; width:auto; display:none;
	}
	.mainli1{
		background:url(image/jh.png) no-repeat 5px 6px ; list-style-type:none;padding:0px 0px 0px 18px; font-size:12px; height:20px; line-height:20px;
		
	}
	.mainli2{
		background:url(image/jh_1.png) no-repeat 5px 6px ; list-style-type:none;padding:0px 0px 0px 18px; font-size:12px; height:20px; line-height:20px;
		
	}
	.subli
	{
		 background:url(image/sub.gif) no-repeat 20px 6px ; list-style-type:none;padding:0px 0px 0px 30px; font-family:宋体;font-size:12px; height:20px; line-height:30px;
	}

	.subli_select
	{
		 background-color:#25a3a9;background:url(image/sub.gif) no-repeat 20px 6px ; list-style-type:none;padding:0px 0px 0px 30px; font-family:宋体;font-size:12px; height:20px; line-height:120%;
	}
	
	a{

		text-decoration:none;color:#000000;
	}
	.a_select{
		  background-color:#25a3a9;
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
			$(this).next("div").slideToggle("fast");
		});
		$(".mainli1").click(function(){
			$(this).toggleClass("mainli2");
			$(this).siblings(".mainli2").removeClass("mainli2");
		});
		$(".subli").click(function(){
			$(".subli").removeClass("subli_select");
			$(this).toggleClass("subli_select");
		});
		$("a").click(function(){
			$("a").removeClass("a_select");
			$(this).toggleClass("a_select");
         
			if($(this).attr("id").toString()=="a_menu_1_1"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;《读我背单词》的各项操作非常简单直观，使用起来非常容易。只要您有一定的电脑操作经验，就能轻易地摸索出各个背单词功能的操作步骤。但是我们还是希望您在真正使用《读我背单词》之前，仔细阅读本操作指南。因为本操作指南不仅告诉您如何使用《读我背单词》，更多的是告诉您如何用它来提高背单词的效率。前人的经验会让您少走很多弯路，这些经验是我们从《读我背单词》的数十位试用者的几个月的试用体会中提炼出来的。";

			}

			if($(this).attr("id").toString()=="a_menu_2_1"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;所有的英语学习者都知道，背单词对于英语学习多么重要！无论你是考四级、考六级、考研，还是考雅思、考托福等，你在英语学习上所花费的90%以上的时间都是在背单词。可以毫不夸张地说，语言学习本质上就是词汇学习。如果你能将常用的5000个英语单词掌握得非常透彻——能够准确地理解其含义且熟练地掌握其用法，能够不假思索且基本正确地说出其发音——那么你的英语水平就完全达到了可以正常使用英语的地步，并且足以应付各种英语考试。";

			}

			if($(this).attr("id").toString()=="a_menu_2_2"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;《词汇量很大，但对词汇的掌握程度很低。过了大学英语4级的大学生的词汇量应该在8000以上。有这么大的词汇量，应该说英语水平已经很高。但是90%以上的大学生对这些词汇的熟悉程度只是能够连蒙带猜地做词义选择题。除了临时应付简单的英语考试外，这种熟悉程度同完全不会几乎没有区别。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;根据拼写想当然地为英语单词发音。这主要表现在随意定义重音或者根本不考虑重音。我们公司曾经面试了大量的应届大学毕业生，其中一道面试题就是让应聘者朗读20个小学单词(从小学词汇表中随机选择的)。令人非常意外的是：没有一人能把这20个单词能基本读正确。主要原因就是重音错误。";

			}

			if($(this).attr("id").toString()=="a_menu_2_3"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;既然背单词如此重要，背单词的软件产品自然非常多（目前估计有数百种之多）。但现有的背单词软件主要是针对有临时快速记忆需求的用户（这类用户很多）。它们主要通过词义练习和拼写练习让你对想记忆的单词有些印象。这种方法可能能让你临时应付简单的考试，但不可能让你真正记牢单词。记得快，忘得更快。";

			}

			if($(this).attr("id").toString()=="a_menu_2_4"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;公司成立之初，我们曾经组织过一个20多人参加的小型英语学习者研讨会。会上大家有两个让所有学习者产生共鸣的问题：（1）单词的重音位置总是搞混；（2）习惯性发音错误总是改不掉。于是我们决定从这两个问题入手开发一个背单词软件。";

			}

			if($(this).attr("id").toString()=="a_menu_2_5"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;讨论会后，我们立即针对英语学习者的主要问题开发完成了一个背单词的原型产品，其功能非常单一，就是捋发音。因为我们认为功能越单一的产品，其卖点越明确。后来经过试用者反复试用，反复提建议，反复修改，才变成了现在的功能相对完备的《读我背单词》。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;有的试用者提出：用“捋”的方式背单词虽然很好，能够把半生不熟的单词记牢，但不适于记忆生单词。于是，我们增加了背生单词的功能。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;有些试用者认为其他背单词产品的功能也很有用，于是我们增加了词义练习和拼写练习。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;有些试用者认为朗读单词功能虽然很好，但是对于某些生单词，一开始就朗读，难度很大。于是，我们增加了跟读练习。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;有很多试用者还提出了很多很好的建议，但是我们无法把它们全部放在《读我背单词》中，我们将在以后的产品中实现。";

			}


			if($(this).attr("id").toString()=="a_menu_3_1"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;朗读单词是核心。《读我背单词》独特的朗读练习方式可以轻易帮您记住单词发音，或者纠正单词发音。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;“捋”——一种高效的单词记忆机制。\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;适合不同用户群及其不同需要的的超全分类单词库\
				<br>&nbsp;&nbsp;&nbsp;&nbsp;环境保存——让您的学习过程超级便捷;";
			}

			if($(this).attr("id").toString()=="a_menu_3_2"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;朗读单词不仅是练好口语的基础，而且是练好听力的基础。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;朗读单词使您对单词的记忆更牢固、更持久。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;朗读单词可以大大提高您的英语听力。只听不说，听力提高很慢。您可以试着听一段快速英语，您会发现：会正确说的单词，您都能听见；而不会说的单词基本听不到。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;朗读单词可以提高您对英语发音的准确性和敏感性。无论您花多少时间练习音标，您会发现您的发音进步很小；但是如果您利用朗读练习功能把200个单词朗读三遍，您会发现您对英语发音变得非常敏感。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;朗读单词可以改进你的英语思维，提高您在听说读写方面的反映速度。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;拿唱歌做比喻，一首歌听几十遍后，您可能仍然不会唱；但试唱几遍后，歌词和旋律就全记住了。这就是朗读单词的重要性。";
			}

			if($(this).attr("id").toString()=="a_menu_3_3"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;《读我背单词》按照单词记忆机制不同分为两大功能：背单词和捋单词。因为单词的记忆包括三个方面：发音、词义和拼写，所以它们又包括朗读练习、拼写练习、词义练习等几个记忆练习环节。";
			}

			if($(this).attr("id").toString()=="a_menu_3_4"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;背单词针对用户选择的单词进行各种练习；捋单词则针对用户选择的课程，系统根据用户对所选课程中单词的熟悉程度自动为用户挑选单词进行特定的练习。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;背单词更象是平时学习；而捋单词更象是总复习。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;背单词的目的是把生单词初步掌握；捋单词的目的则是把初步掌握的单词变得滚瓜烂熟。";
			}

			if($(this).attr("id").toString()=="a_menu_3_5"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;捋单词分为捋发音、捋词义和捋拼写，让您针对记忆单词的三个方面进行强化复习。特别注意：这三个功能会相互影响，如果您想同时使用这三个功能，请分别选用不同的课程。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;我们不能知道捋单词是否对您也是一种有效的单词记忆机制，请您通过捋单词的单词筛选流程去自己体会。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;a.对于一个单词进行初试。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;b.如果初试正确，过192小时后转到i；如果初试错误，过24小时后转到c。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;c.对该单词进行即时复习。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;d.如果即时复习正确，过48小时后转到e; 如果即时复习错误，过24小时后转到c。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;e.对该单词进行第一次复试。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;f.如果第一次复试正确，过96小时后转到g; 如果第一次复试错误，过24小时后转到c。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;g.对该单词进行第二次复试。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;h.如果第二次复试正确，过192小时后转到i; 如果第二次复试错误，过24小时后转到c。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;i.对该单词进行终试。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;j.如果终试正确，该单词背诵过程结束; 如果终试错误，过24小时后转到c。";
			}

			if($(this).attr("id").toString()=="a_menu_3_6"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;《读我背单词》中的所有练习都包含三个环节：练习、纠错和强化。这三个环节让您记忆单词时注意力更集中。具体流程如下：\
<br>&nbsp;&nbsp;&nbsp;&nbsp;a.针对所选单词，一一完成全部练习。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;b.挑选出做错练习的单词。如果有，转c; 如果没有做错的练习，转到d。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;c.针对做错练习的全部单词，一一完成全部练习，转到b。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;d.练习结束。转到a进行强化练习。";
			}

			if($(this).attr("id").toString()=="a_menu_3_7"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;朗读练习和其他练习的区别是朗读练习包含两个环节：朗读单词和判别正误。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;系统先让您把所选的单词全部朗读完成，然后通过录音对比自己判别您朗读的正确性。判别单词的正确性的原则：\
<br>&nbsp;&nbsp;&nbsp;&nbsp;a.重音位置是否正确\
<br>&nbsp;&nbsp;&nbsp;&nbsp;b.重音读的是否正确\
<br>&nbsp;&nbsp;&nbsp;&nbsp;c.音节数是否正确\
<br>&nbsp;&nbsp;&nbsp;&nbsp;d.各个非重读音节是否基本正确\
<br>&nbsp;&nbsp;&nbsp;&nbsp;您的母语不是英语，如果您不认为您是语言天才，您不必也不需要对您的发音过份挑剔。您练习发音的目的应该是：您能听懂别人说的英语；你说的英语别人也能听懂。";
			}

			if($(this).attr("id").toString()=="a_menu_3_8"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;面对不熟悉的单词，不要急于开口。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;首先要想一想这个单词包含哪几个音节，其次要确定哪一个是重读音节，然后想一想各个音节的发音，最后把所有音节连起来读。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;朗读不熟悉的单词不能求快，一定要把每个音读清楚。";
			}

			if($(this).attr("id").toString()=="a_menu_3_9"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;我们设置“试用课程”有两个目的：一是让所有人都能了解《读我背单词》的功能；二是让用户能够学会《读我背单词》的各个功能的操作步骤。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;当您针对试用课程进行背单词练习时，在进入任何一个功能界面时，都会有非常详细的使用提示。如果您对某些功能有任何疑问，请您选择试用课程，并仔细阅读使用提示。";
			}

			if($(this).attr("id").toString()=="a_menu_3_10"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;“我的单词库”是一个功能性课程，位于课程树的前面。您可以使用它来背诵您希望专门背诵的单词。在使用前，您需要自己把您希望背诵的单词添加进去。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;有两种方式为“我的单词库”添加单词。一是通过背单词的词汇选择功能，一是查单词功能。添加好单词后，您就可以象其他课程一样，利用《读我背单词》的全部功能来背诵“我的单词库”中的单词。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;在进入“我的单词库”后，您可以选择删除其中的单词。当您把以前的单词背诵完成后，可以更换新的单词进入“我的单词库”。";
			}

			if($(this).attr("id").toString()=="a_menu_3_11"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;“我的学习记录”分门别类地记录您学习过的单词。目的是让您能随时复习前面学习过的单词。";
			}

			if($(this).attr("id").toString()=="a_menu_3_12"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;环境保存功能总是自动保存您上次学习的全部环境。当您中断学习后，再次进入《读我背单词时》，您学习的环境几乎同上次一样。这会大大减少您不必要的操作。";
			}
			if($(this).attr("id").toString()=="a_menu_3_13"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;因为我们的服务器保存每个人用户的全部学习记录和过程。因此，如果您真正想使用《读我背单词》，您最好注册并登录。";
			}

			if($(this).attr("id").toString()=="a_menu_3_14"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;背单词是学好英语的必经步骤，这是每一个学习英语的用户都非常清楚的。背单词的最大困难不是缺少好的工具，而是难以坚持。每个人都知道，每天坚持背诵20个单词，一年就能掌握7300个单词。如果您能把7300个单词掌握得很透彻，那您的英语可以说好的一塌糊涂。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;问题是很少有人能坚持。心血来潮可以让您坚持3天，外人忽悠可以让您坚持15天，面对考试可以让您坚持一个月，有强人约束可以让您坚持2个月。目前好象很难找到方法办法让您坚持一年风雨无阻地背单词。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;我们正在研究通过网络技术解决您的坚持问题。也许我们无法让您坚持一年，但我们坚信我们能让你坚持两个月。坚持两个月，虽然无法让您的英语完全过关，但可以让您的英语提高一大步。";
			}

			if($(this).attr("id").toString()=="a_menu_4_1"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;第一步：确定您要背诵的单词集。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第二步：利用背单词功能把所选单词集中的全部生单词初步背会。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第三步：利用捋发音、捋词义或者捋拼写，把所选单词集中的全部单词记熟。";
			}
			if($(this).attr("id").toString()=="a_menu_4_2"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;第一步：选择课程。背单词的课程必须是叶子课程。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第二步：选择生单词。建议每次选择20个单词。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第三步：对所选单词进行跟读练习。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第四步：在跟读每个单词前，一定要查词典，仔细阅读单词的释义、用法、例句等。这对你能记牢单词非常关键。目前的在线词典非常多。客户端版的有金山词霸、友道词典；如果您不想下载，您可以直接使用百度词典。我们正在考虑让用户轻松而生动地记住单词的释义和用法的方法，不久会实现。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第五步：做朗读练习。做完朗读练习后，您对所选的单词应该是基本临时掌握了。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第六步：做词义练习和拼写练习以进一步巩固。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第七步：用单词做造句练习。许多英语教学专家认为，造句练习是学习语言最有效的方法。我们以后会提供这方面的功能。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第八步：做完以上步骤后，可以说您对所选生单词是真正掌握了，尽管记忆还很不牢固。";
			}

			if($(this).attr("id").toString()=="a_menu_4_3"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;第一步：选择课程。该课程中的大多数单词应该是您已经初步掌握的。\
<br>&nbsp;&nbsp;&nbsp;&nbsp;第二步：开始捋单词。建议您捋发音，尽管难度比其他两种练习大，但当您捋完后，您掌握的程度更好。";
			}

			if($(this).attr("id").toString()=="a_menu_5_1"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;界面图示";
			}
			if($(this).attr("id").toString()=="a_menu_5_2"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;录音音量设置图示";
			}

			if($(this).attr("id").toString()=="a_menu_5_3"){
				document.getElementById("show").innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;播放音量设置图示";
			}

				
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
		<li class="mainli1"> 阅读本指南的必要性？</li>
	</div>
	<div class="menuContent">
			<li class="subli"> <a  id="a_menu_1_1"  href="#">阅读本指南的必要性？</a></li>
	</div>
	
	<div class="menuTitle">
		<li class="mainli1"> 为什么开发《读我背单词》？</li>
	</div>
	<div class="menuContent">
			<li class="subli"> <a id="a_menu_2_1"  href="#">背单词的重要性？</a></li>
			<li class="subli"> <a id="a_menu_2_2"  href="#">中国英语学习者的词汇现状</a></li>
			<li class="subli"> <a id="a_menu_2_3"  href="#">现有背单词软件的功能缺陷</a></li>
			<li class="subli" style="height:35px"> <a id="a_menu_2_4"  href="#">矫正单词发音错误是《读我背单词》的最初开发动机</a></li>
			<li class="subli"> <a  id="a_menu_2_5"  href="#">长达半年的试用来完善《读我背单词》</a></li>
	</div>
	
	<div class="menuTitle" style="margin-top:15px">
		<li class="mainli1"> 《读我背单词》的功能特征</li>
	</div>
	<div class="menuContent">
			<li class="subli"> <a id="a_menu_3_1"  href="#">主要特点</a></li>
			<li class="subli"> <a id="a_menu_3_2"  href="#">朗读单词的好处和重要性</a></li>
			<li class="subli"> <a id="a_menu_3_3"  href="#">功能层次结构图</a></li>
			<li class="subli"> <a id="a_menu_3_4"  href="#">捋单词和背单词的区别</a></li>
			<li class="subli"> <a id="a_menu_3_5"  href="#">捋单词的单词筛选流程</a></li>
			<li class="subli"> <a id="a_menu_3_6"  href="#">相关练习的通用流程 </a></li>
			<li class="subli"> <a id="a_menu_3_7"  href="#">朗读练习的步骤</a></li>
			<li class="subli"> <a id="a_menu_3_8"  href="#">如何朗读不大熟悉的单词？</a></li>
			<li class="subli"> <a id="a_menu_3_9"  href="#">试用课程</a></li>
			<li class="subli"> <a id="a_menu_3_10"  href="#">我的单词库</a></li>
			<li class="subli"> <a id="a_menu_3_11"  href="#">我的学习记录</a></li>
			<li class="subli"> <a id="a_menu_3_12"  href="#">环境保存</a></li>
			<li class="subli"> <a id="a_menu_3_13"  href="#">关于注册和登录</a></li>
			<li class="subli"> <a id="a_menu_3_14"  href="#">背单词的最大难度——坚持</a></li>
	</div>
	
	<div class="menuTitle">
		<li class="mainli1"> 使用《读我背单词》的建议学习步骤</li>
	</div>
	<div class="menuContent" style="margin-top:20px">
			<li class="subli"> <a id="a_menu_4_1"  href="#">总体步骤</a></li>
			<li class="subli"> <a id="a_menu_4_2"  href="#">背单词的步骤</a></li>
			<li class="subli"> <a id="a_menu_4_3"  href="#">捋单词的步骤</a></li>
	</div>
           
<div class="menuTitle" style="margin-top:20px">
		<li class="mainli1"> 使用说明书</li>
	</div>
	<div class="menuContent">
			<li class="subli"> <a id="a_menu_5_1"  href="#">界面图示</a></li>
			<li class="subli"> <a id="a_menu_5_2"  href="#">录音音量设置</a></li>
			<li class="subli"> <a id="a_menu_5_3"  href="#">播放音量设置</a></li>
	</div>		   
					</div>
				</div>
				
				<div class="main_1_right">
					<img style="margin-top:5px;" src="image/bt_syzn.png"></img>
					<div  style="margin-left:50px;margin-top:5px;margin-right:50px;">
						<label id="show">
						</label>
					</div>

				</div>
				<div class = "main_tail">
					Copyright 2013 ©Web International English,All Right Reserved.京ICP备 13026785号 电话：010-62191221
			        </div>
				
				
			</div>
			
		</div>
		
	</body>
	

</html>