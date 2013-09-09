
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
header("Content-Type: text/html;charset=utf-8"); 
require_once("PurchaseRecord.php");
session_start();
 $email=$_REQUEST['email'];
 if(!$email){	
   $url = "http://www.doword.cn/invalidate";
   echo "<script language='javascript' type='text/javascript'>";
   echo "window.location.href='$url'";
   echo "</script>";
}
 
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
<script src="js/ajax.js"  type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />

<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>

<title>英通一百 -- 购买记录</title>

 

<script type="text/javascript">
 
var array_page=new Array();
var  purchase_record = "<?php echo print_purchase_record($email); ?>";
var  json_purchase_record =  eval('(' + purchase_record + ')');
var pageCount=1;
var currentPage=1;

function AddTableItem(name,CoursePrice,OrderNum,BuyTime,EndTime)
{  
	var array_obj=new Object();
	 
	array_obj.name=name;
	array_obj.price= CoursePrice;
	array_obj.order = OrderNum;
	array_obj.buytime=BuyTime.substr(0,10);
	array_obj.endtime=EndTime.substr(0,10);
	array_page.push(array_obj);
	
	updateTable();
}
		
		
		
 function updateTable(){//更新table
	
	 
	var i_result=array_page.length%10;
	if(i_result==0)
		pageCount=parseInt(array_page.length/10);
	else 
		pageCount=parseInt(array_page.length/10+1);
	
	var bodyObj=document.getElementById("table1");
	var rowCount = bodyObj.rows.length;   
    for(var i=1;i<rowCount;i++){
		bodyObj.deleteRow(1);
	}
	rowCount=1;
	
	var start=10*(currentPage-1);
	if(10*currentPage>=array_page.length){
		var end=array_page.length;
	}
	else {
		var end=10*currentPage;
	}
	 
    var Obj=document.getElementById("label_tip");
	Obj.innerHTML="第"+currentPage.toString()+"页共"+pageCount.toString()+"页";
	         
  
	
	for(var i=start;i<end;i++){
		var newRow = bodyObj.insertRow(rowCount++); 
		newRow.insertCell(0).innerHTML=array_page[i].name;
		newRow.insertCell(1).innerHTML=array_page[i].price;
		newRow.insertCell(2).innerHTML=array_page[i].order;
		newRow.insertCell(3).innerHTML=array_page[i].buytime;
		newRow.insertCell(4).innerHTML=array_page[i].endtime;
	}
	var length=end-start;
	if(length<10){
		for(var i=length;i<10;i++){
		var newRow = bodyObj.insertRow(rowCount++); 
		newRow.insertCell(0).innerHTML="&nbsp";
		newRow.insertCell(1).innerHTML="&nbsp";
		newRow.insertCell(2).innerHTML="&nbsp";
		newRow.insertCell(3).innerHTML="&nbsp";
		newRow.insertCell(4).innerHTML="&nbsp";
	  }
	}
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
	 
 window.onload = function (){
       
       for(var i=0;i<json_purchase_record.length;i++)
	       AddTableItem(json_purchase_record[i].name,json_purchase_record[i].price,json_purchase_record[i].order,json_purchase_record[i].buytime,json_purchase_record[i].endtime);
       updateTable();
	 
   }
		
</script>

</head>
<body>
<div style="padding:0;margin:0;height:670px;width:800px;margin:auto;border:1px solid #ccc;border-top:none;overflow:hidden;">
	<link href="css.css" rel="stylesheet" type="text/css" />

<div class="title">
		<img src="image/top.jpg" />
	</div>
	

      
  <div class="tip">
        <div class="reg_title">
			  课程购买记录
        </div>
		 <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
		
		  <div class="table_person">
	      <table id="table1"  cellspacing="0" cellpadding="0">
				    <tr>
					<th width="48%"> 课程名</th>
					<th width="8%"> 单价</th>
					<th width="16%"> 订单号</th>
					<th width="14%"> 当前可用截止时间</th>
					<th width="14%"> 买后可用截止时间</th>
				   </tr>
		  </table>	  
		  </div>
		  
		  <div style="margin-top:-1px;font-size:12px;line-height:200%;">
		  	<table id="table2"  cellspacing="0" cellpadding="0" frame=void>
				    <tr>
					<td><label  id="label_tip">第1页/共0页</label></td>
					<td><a href="javascript:setFirstPage()" id="label_first">首页</a></td>
					<td><a href="javascript:PrePage()" id="label_pre">上一页</a></td>
					<td><a href="javascript:NextPage()" id="label_next">下一页</a></td>
					<td><a href="javascript:setEnd()" id="label_end">尾页</a></td>
					<td> 第<input type="text" id="page" size="4" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">页 &nbsp;&nbsp;<input type="button" value="跳转" OnClick="javascript:GotoPage()"></td>
					</tr>
			</table>
		</div>
	    
  
  
  </div>

 
</div>
</body>
</html>
