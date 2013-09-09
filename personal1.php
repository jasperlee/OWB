
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
header("Content-Type: text/html;charset=utf-8"); 
require_once("CourseAssist.php");
session_start();
$email=$_REQUEST['email'];
if(!$email){	
$url = "http://121.199.44.5/register/demo/reg.php";
echo "<script language='javascript' type='text/javascript'>";
echo "window.location.href='$url'";
echo "</script>";
}
//else $json_str=print_purchase_course($email);
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<script src="ajamysql_select_db("WordsLibrary") or die("10001");x.js"  type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<title>英通一百 -- 个人中心</title>

<style type="text/css">
html,body {padding:0;margin:0;height:98%;}
#sub {width:800px;margin:auto;height:98%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>

<script type="text/javascript">

        var json;
		var pageCount;
		var currentPage;
		function getQueryString(name) {    
		var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");    
		var r = window.location.search.substr(1).match(reg);    
		if (r != null) 
		return unescape(r[2]); 
		return null;    
		}
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
		   var bodyObj=document.getElementById("table1");
		   var rowCount = bodyObj.rows.length;  
			var cellCount = bodyObj.rows[0].cells.length;  
            for(var i=1;i<rowCount;i++){
				bodyObj.deleteRow(1);
			}
			rowCount=1;
			
            var start=10*(currentPage-1);
			if(10*currentPage>=json.length){
				var end=json.length;
			}
		    else {
				var end=10*currentPage;
			}
			  var Obj=document.getElementById("label_tip");
			  Obj.innerHTML="第"+currentPage.toString()+"页共"+pageCount.toString()+"页";
	         
			   for(var i=start;i<end;i++){
					  var newRow = bodyObj.insertRow(rowCount++); 
					for(var j=0;j<cellCount;j++){
					   if(j==0){
						newRow.insertCell(j).innerHTML=json[i].coursename;
						}
						else {
						newRow.insertCell(j).innerHTML=json[i].time;
						}
					}
			   }
		
		}
		

	  function Init() 
      { 
	    try{
	   json=JSON.parse("<?php echo print_purchase_course($email)?>");
	   if(json.length>0){
	   var i_result=json.length%10;
	   if(i_result==0)
	   pageCount=parseInt(json.length/10);
	   else 
	   pageCount=parseInt(json.length/10+1);
	   currentPage=1;
	   updateTable();
	   }
	   }
	   
	   catch(e){
			alert(e);
	   }
      }	
	  
</script>

</head>
<body onLoad="Init()">
<div class="main">
	<link href="css.css" rel="stylesheet" type="text/css" />

<div class="title">
		<img src="image/top.jpg" />
	</div>
	

      
<div class="personal">
	<div class="left">
	</div>
	<div class="right">
		<div class="reg_title">
			已购买课程
		</div>
			<form method="post" name="form1">
			<table id="table1"  width="100%" border="1" align="center" cellpadding="2" cellspacing="2">
			   <div class="input_form">
				    <tr>
					<td width="50%"> &nbsp;课&nbsp;程&nbsp;名</td>
					<td width="50%"> &nbsp;到&nbsp;期&nbsp;时&nbsp;间</td>
					</tr>
				</div>
			</table>
			<table id="table2"  width="100%" border="1" align="center" cellpadding="2" cellspacing="2">
			   <div class="input_form">
				    <tr>
					<td><a  id="label_tip"></a></td>
					<td><a href="javascript:setFirstPage()" id="label_first">首页</a></td>
					<td><a href="javascript:PrePage()" id="label_pre">上一页</a></td>
					<td><a href="javascript:NextPage()" id="label_next">下一页</a></td>
					<td><a href="javascript:setEnd()" id="label_end">尾页</a></td>
					<td> 第<input type="text" id="page" size="4" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">页 <input type="button" value="跳转" OnClick="javascript:GotoPage()"></td>
					</tr>
				</div>
			</table>
			</form>
	</div>
</div>

 
</div>
</body>
</html>
