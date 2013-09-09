<?php
   require_once("CourseAssist.php");
   require_once("LoginCheckAssist.php");
   require_once("LoginNumCheckHeader.php");  
   // /*check*/
   $login_num = $_REQUEST["loginnum"];
   $userid    = $_REQUEST["userid"];
   $bCheck = 0;
   $email;$name;;
   if($login_num)
   {
       if(getInfoFromLoginNum($login_num,$userid,$email,$name))
	   {
	      $bCheck = 1;
	   }
 
   }    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=utf8">
	
	<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/demo.css" type="text/css">
	<link rel="stylesheet" href="css/zTreeStyle.css" type="text/css">
	<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
	
	<script src="artDialog/artDialog.js" type="text/javascript"></script>
	<script src="js/ajax.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/purchase.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.ztree.core-3.5.js"></script>
  <script type="text/javascript" src="js/jquery.ztree.excheck-3.5.min.js"></script>
	
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>
	 
<TITLE> 英通一百 -- 课程购买</TITLE>
 
 <SCRIPT type="text/javascript">
        
       var purchase_now = false;
	   var purchase_id = "<?php echo $_REQUEST["id"]?>";
       var price=0;
	   var json_purchase;
	   var array_page=new Array();
	   var _cookie_email;
	  
	 /*Get a Full CourseName by a treeNode*/
	function GetFullName(zTreeSelectNode)
	{
	    if(zTreeSelectNode.id==1)
		{   
		  return "所有的英语课程";
		}
		
	    var node = zTreeSelectNode;
	    var pid = zTreeSelectNode.pId;
            var CourseNameArr = new Array(zTreeSelectNode.ori_name);
            while(pid!=1)
            {
                node = node.getParentNode();
                pid = node.pId;
                if(node!="undefine")
                    CourseNameArr.push(node.ori_name);
                else
                	pid = 1;
            }

            CourseNameArr.reverse();
            var CourseName  = CourseNameArr[0];
            for(var i=1;i<CourseNameArr.length;i++)
            	CourseName = CourseName + "-" +CourseNameArr[i];
            return CourseName;
	}

	function GetValue() {
		  var obj = eval('(' + course + ')');
	        GetFullName(zNodes[1]);     
	}
	
	 var flag=0;
         function  zTreeBeforeCheck(treeId, treeNode){  
	            
		   if(treeNode.isParent==false){//当前不是父节点
		     if(treeNode.getParentNode().checked){//父节点被选中
			 return  false;
		      }
		      else {
			return true;
		      }
		   }
		   else { //是父节点
		            
		            var treeObj = $.fn.zTree.getZTreeObj("treeDemo");
			    if(treeNode.checked){
				   treeObj.checkNode(treeNode, false, false,false);
				  
				   /*delete self from table*/
				   deleteFromTable(treeNode.price);
				   
				   var nodesChild = treeNode.children;
				   for(var index = 0;index<nodesChild.length;++index)
				   {
				      if(treeNode.id == nodesChild[index].pId && nodesChild[index].checked )//only add first level node.
				          AddTableItem(nodesChild[index].id,GetFullName(nodesChild[index]),nodesChild[index].price); //Add First level child nodes from table.
				   } 
				   
				   treeObj.checkNode(treeNode.getParentNode(),false,false,true); //loop uncheck it's parent node.
				   return false;
			    }
             	
			    
		       }
		}
		 
		
		function zTreeOnCheck(event, treeId, treeNode) {	 
		  
		  if(!treeNode.isParent) //当前不是父节点
		  {
		     
		    if(treeNode.checked){ 
                AddTableItem(treeNode.id,GetFullName(treeNode),treeNode.price);				
		    }
			
            else if(!treeNode.checked)
		    {
			    deleteFromTable(treeNode.id,treeNode.price);
            }			     
          }  
		  else //parent nodes.
 		  {
            /*Add To Table*/
			
		     AddTableItem(treeNode.id,GetFullName(treeNode),treeNode.price);
             
		     /*delete all children nodes.*/
		     var nodesChild = treeNode.children;
		     for(var index = 0;index<nodesChild.length;++index)
		     {
			   deleteFromTable( nodesChild[index].id,treeNode.price);
		     }
		  }
		}
  
 		var setting = {	
			data: {
			  simpleData: {
			        enable: true
				}
			},

            check: {
            autoCheckTrigger: true,
            enable: true,
            chkStyle: "checkbox",//修改了这里
            chkboxType: { "Y": "s", "N": "s" }
            },

			view:{
			     fontCss : { }
			},
      
			callback: {
		         onCheck: zTreeOnCheck,
				 beforeCheck:zTreeBeforeCheck
	        }

		};

		function deleteFromTable(id,CoursePrice)
		{
		    for(var index in array_page){
			if(array_page[index].id==id){
			  price = price-CoursePrice;
			  array_page.splice(index,1);
			  updateTable();
			  return true;
			}
		     }
		     return false;
		     
		}
		
		function AddTableItem(id,name,CoursePrice)
		{
		    
		    for(var index in array_page){
			   if(array_page[index].id==id){
				return;	
			    }
			}
			
		    var currenttime="";
		    var buytime="";	
		    var b_find=0;
		    for(var index in json_purchase){
			 
			if(json_purchase[index].id==id){ 
				currenttime=json_purchase[index].time.substring(0,10);
				buytime=(parseInt(json_purchase[index].time.substring(0,4))+1).toString()+json_purchase[index].time.substring(4,10);					
				b_find=1;
				break;
			}
		    }
		    if(b_find==0){//没找到							var myDate = new Date();//获取当前日期
			currenttime="不可用";
			var myDate = new Date();
			buytime=(parseInt(myDate.getFullYear())+1).toString()+"-"+(parseInt(myDate.getMonth())+1).toString()+"-"+myDate.getDate();							
		    }
		    var array_obj=new Object();
		    array_obj.id=id;
		    array_obj.name=name;
		    array_obj.price= CoursePrice;
		    array_obj.currenttime=currenttime;
		    array_obj.buytime=buytime;
		    array_page.push(array_obj);
		    price = price+CoursePrice;
		    updateTable();
		}
		
		function purcharse()
		{
		    /*check is login*/
			if(purchase_now)
			{
			    art.dialog({
               lock:true,
			   icon:"warning",
	           width: 400,
               height: 100,
               content: '操作太过频繁,正在提交购买请求,请稍后重试!',
               });
			   return true;
			}
			
			
		 
			var email = getCookie("email");
			_cookie_email = email;
			if(email == undefined)
			{
			    art.dialog({
                 lock:true,
	             width: 400,
                 height: 100,
                 content: '尊敬的用户,您尚未登陆,<a href=login.php?op=1 target=_top><font color=red>点此登陆</font></a>',
                });
				return true;
			}
		
			if(array_page.length == 0)
			{
			   art.dialog({
               lock:true,
	           width: 400,
               height: 100,
               content: '请在左侧选择你要购买的课程',
               });
			   return true;
			}		
            var treeObj = $.fn.zTree.getZTreeObj("treeDemo");
			var nodes = treeObj.getCheckedNodes(true);
			var json_str="";
			for(var index in array_page){
					json_str = json_str+"{\"id\":"+array_page[index].id+"}";
				  if(index!=array_page.length-1)
				     json_str = json_str+",";		
			}
			
	
			json_str = "["+json_str+"]";
			var post_data = "type=1&email="+email+"&course="+json_str;
 
			purchase_now = true;
			send_course_purcharse_request("Order_fun.php",post_data);	
            
	 	}
		
		 
        
        var course = "<?php print_course(); ?>";	
        var zNodes =  eval('(' + course + ')');

       $(document).ready(function(){
            
            var zNodes_price =  eval('(' + course + ')');
	    for(var i=0;i<zNodes.length;i++)
	    {
		   if(i!=0)
	         zNodes_price[i].name = zNodes[i].name+"  ["+zNodes[i].price+"元]"; //show name
	       else
		     zNodes_price[i].name = "所有英语课程"+"  ["+zNodes[i].price+"元]"; //show name
		   zNodes_price[i].ori_name = zNodes[i].name;  //save original name. 
	    }
	    $.fn.zTree.init($("#treeDemo"), setting, zNodes_price);
	    var treeObj = $.fn.zTree.getZTreeObj("treeDemo");
            treeObj.expandAll(true);	
            if(purchase_id)
            {
		 var treeObj = $.fn.zTree.getZTreeObj("treeDemo");
		 var node = treeObj.getNodeByParam("id",purchase_id, null);
		 treeObj.checkNode(node, true, true,true);
	    }	
	});

	function load()
        {  
		
		var bCheck = "<?php echo $bCheck; ?>";
		 
		if(bCheck == 1)
		{
			var email = "<?php echo $email ?>";
			var name  = "<?php echo $name ?>";
			var loginnum  = "<?php echo $_REQUEST["loginnum"];?>";
			/*reset cookie.*/
			SetCookie("email",email);
	        SetCookie("UserName",name);
			SetCookie("loginnum",loginnum);
		}
                var email = getCookie("email");
		if(email == undefined)
		{
			document.getElementById("login_user").innerHTML = '未登陆';
			art.dialog({
                         lock:true,
	                 width: 400,
                         height: 100,
                         content: '尊敬的用户,您尚未登陆,<a href=login.php?op=1 target=_top><font color=red>点此登陆</font></a>',
                        });
		        return;
		}
		else {
			document.getElementById("login_user").innerHTML = '欢迎您，'+getCookie("UserName");
			updateTable();
			json_purchase=JSON.parse("<?php  $param=$_COOKIE["email"];echo get_purchase_info($param);?>");
		} 
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
		   window.location.href="http://www.doword.cn/ET100/login?op=2";
	 }
	 
	 function OnPurchase(ret)
	 {
	    if(ret=="-1")
		     alert("提交失败,建议您重试本操作。");
		else
		    window.location.href="http://www.doword.cn/ET100/Order?email="+_cookie_email+"&order="+ret;
 
	 }
		
		/*页面相关*/
		var pageCount;
		var currentPage=1;
	    function setFirstPage(){
			currentPage=1;
			updateTable();
		}
		function  setEnd(){
			currentPage=pageCount;
			updateTable();
		}
		
		function PrePage(){
			currentPage--;
			if(currentPage<=1)
			currentPage=1;
			updateTable();
		}
		
		function NextPage(){
			currentPage++;
			if(currentPage>=pageCount)
			currentPage=pageCount;
			updateTable();
		
		}
		function GotoPage(){
			var Obj=document.getElementById("page");
			var i_result=parseInt(Obj.value);
			if(i_result>0&&i_result<=pageCount){
			currentPage=i_result;
			updateTable();
			}
			else {
			alert("页码无效！");
			}
		}
		function updateTable(){//更新table
			var total_price = 0;
			for(var index in array_page){
			  total_price = total_price+array_page[index].price;
			}
			
			var text = "您选择了"+ array_page.length.toString()+"门课程,共"+total_price.toString()+"元。";
			document.getElementById("show_price").innerText  = text;
		     var i_result=array_page.length%5;
			  if(i_result==0)
				pageCount=parseInt(array_page.length/5);
			 else 
				pageCount=parseInt(array_page.length/5+1);
				
			var bodyObj=document.getElementById("table1");
		   var rowCount = bodyObj.rows.length;   
            for(var i=1;i<rowCount;i++){
				bodyObj.deleteRow(1);
			}
			rowCount=1;
			
            var start=5*(currentPage-1);
			if(5*currentPage>=array_page.length){
				var end=array_page.length;
			}
		    else {
				var end=5*currentPage;
			}
			  var Obj=document.getElementById("label_tip");
			  Obj.innerHTML="第"+currentPage.toString()+"页共"+pageCount.toString()+"页";
	         
			   for(var i=start;i<end;i++){
					  var newRow = bodyObj.insertRow(rowCount++); 
						newRow.insertCell(0).innerHTML=array_page[i].name;
						newRow.insertCell(1).innerHTML=array_page[i].price;
						newRow.insertCell(2).innerHTML=array_page[i].currenttime;
						newRow.insertCell(3).innerHTML=array_page[i].buytime;
			   }
			   var length=end-start;
			   if(length<5){
					for(var i=length;i<5;i++){
						var newRow = bodyObj.insertRow(rowCount++); 
						newRow.insertCell(0).innerHTML="&nbsp";
						newRow.insertCell(1).innerHTML="&nbsp";
						newRow.insertCell(2).innerHTML="&nbsp";
						newRow.insertCell(3).innerHTML="&nbsp";
					}
			   }
		}
		
		function show_record()
		{
		   var email  = getCookie("email");
		    
		   var url= "http://www.doword.cn/ET100/login";
		   if(email)
		      url = "http://www.doword.cn/ET100/personal?email="+email;
		   window.open(url);
		}
		//-->
</SCRIPT>

</HEAD>

<BODY onload="load()">

<div style="padding:0;margin:0;height:670px;width:800px;margin:auto;border:1px solid #ccc;border-top:none;overflow:hidden;">
	<span class="main_user">
	      <a  id= "login_user" style="float:right;cursor:pointer;color:red;margin-right:10px;" onclick="on_login_user()" ></a>
	</span>	
    <div class="div_et_title">
			  
		<img src="image/top.jpg" />
	</div>
 
        <div class="reg_form">
	
 	<div style="float:left;margin-top: 5px;width=200px;margin-left:5px">
		<ul id="treeDemo" class="ztree"></ul>
        </div>
	
	  <div class="purchase_text">
	      <B>&nbsp;&nbsp;购买说明</B></br> </font>
	      &nbsp;&nbsp;1.从左边的树形课程表中选择或取消您需要购买的课程。</br>  
	       &nbsp;&nbsp;2.课程名后方括号内是该课程1年使用期的定价。</br> 
		   &nbsp;&nbsp;3.如果购买的课程中包含子课程，那么所有子课程也自动被购买。</br> 
		   &nbsp;&nbsp;4.如果选择购买了一个目前可用的课程，那么该课程的可用期将延长一年。</br>  
		   &nbsp;&nbsp;5.在提交前，请仔细检查下面的购买清单。</br></br>  
		  
		 
		  <span style="margin-left:220px;height:30px;">
		       <font size="14"> <B><U> 购物清单 </U></B>   </font>
		  </span>
		  
		  <div class="table">
	      <table id="table1"  cellspacing="0" cellpadding="0">
				    <tr>
					<th width="48%"> 课程名</th>
					<th width="12%"> 定价(元/年)</th>
					<th width="20%"> 当前可用截止时间</th>
					<th width="20%"> 买后可用截止时间</th>
				   </tr>
		  </table>
		  
		  </div>
		  <div style="margin-top:-1px">
		  	<table id="table2"  cellspacing="0" cellpadding="0" frame=void>
				    <tr>
					<td><label  id="label_tip">第1页/共0页</label></td>
					<td><a href="javascript:setFirstPage()" id="label_first">首页</a></td>
					<td><a href="javascript:PrePage()" id="label_pre">上一页</a></td>
					<td><a href="javascript:NextPage()" id="label_next">下一页</a></td>
					<td><a href="javascript:setEnd()" id="label_end">尾页</a></td>
					<td> 第<input type="text" id="page" size="4" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">页 <input type="button" value="跳转" OnClick="javascript:GotoPage()"></td>
					</tr>
			</table>
			</div>
			
			<div style="clear:both;	margin-top:-5px">
			    
				<div>
				   <font size=14 color=#FF0000><label id="show_price" style="margin-left:100px;" >您选择了0门课程，共 0.00 元。</label></font>
				</div>
			    
				<div style="float:right;margin-top:20px;width:280px">
				   	   <input  type="image"  src="image/gmn_1.png" value="提交" onclick="purcharse()"/>
				    &nbsp;&nbsp;<input  type="image"  src="image/record.png" value="记录" onclick="show_record()"/>
			    </div>
				
            </div>
			

			</div>

	</div>
	
	 <div style = " margin-top:5px; background-color:#EDEDED;float:left;height: 24px;line-height:24px;width: 800px;text-align: center;font-size: 12px;">
            京ICP备 13026785号 | 电话：010-62191221	
	</div>
		
</div>	 


 
 
</BODY>
</HTML>
