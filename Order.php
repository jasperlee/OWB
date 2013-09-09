<?php
    /*check*/
	 require_once("OrderAssist.php");
     $email = $_REQUEST["email"];
	 $OrderNum   = $_REQUEST["order"];
	 $price = 0;
	 $bValid = IsValidOrderNum($email,$OrderNum,$price);
	 if(!$bValid)
	 {
	      echo "<script language='javascript' type='text/javascript'>";
          echo "window.location.href='invalidate.php'";
          echo "</script>"; 
	 }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<script src="artDialog/artDialog.js" type="text/javascript"></script>
<script src="js/ajax.js" type="text/javascript"></script>
<link href="css/sub_style.css" rel="stylesheet" type="text/css" />
<link id="artDialog-skin" href="artDialog/skins/twitter.css" rel="stylesheet" />
<title>英通一百 -- 购买支付</title>

<style type="text/css">
html,body {padding:0;margin:0;height:100%;}
#sub {width:800px;margin:auto;height:100%;border:1px solid #ccc;border-top:none;background:#C0FE3E;overflow:hidden;}
</style>
<script type="text/javascript">
   var pay_way =1;//支付宝
       window.onload = function (){ 
   }
   
   function pay()
   {
       /*测试案列 -- 发送请求买一个订单*/
       /* var post_data = "type=2&email="+"<?php echo $email ?>"+"&order="+"<?php echo $OrderNum ?>";
      
		purchase_now = true;
		send_pay_request("Order_fun.php",post_data);*/
		
      var url;
      if(pay_way==1)
          url ="alipay/alipayapi?WIDout_trade_no="+<?php echo $OrderNum ?> +"&WIDtotal_fee="+ <?php echo $price ?>;
	  else 
	      url ="PostPay?email="+"<?php echo $email ?>"+"&order="+<?php echo $OrderNum ?> + "&price="+<?php echo $price;?> + "&send=1"; 
	  window.open(url);		
		
   }

   function OnPay(ret)
   {

        if(ret==1)
        {
        	   art.dialog({
               lock:true,
			   icon:"warning",
               content: '购买成功!',
               });
			   return true;
        }
        else
        {
        	  art.dialog({
               lock:true,
			   icon:"warning",
               content: ret,
               });
			   return true;
        }
   }
   
   function alipay()
   {
      
   }
   
   function pay_mouse_out()
   {
      if(pay_way == 1)
	  {
	    document.getElementById("alipay").src="image/alipay_2.png";
		document.getElementById("post").src="image/post_1.png";
	  }
	  else if(pay_way == 2)
	  {
	    document.getElementById("alipay").src="image/alipay_1.png";
		document.getElementById("post").src="image/post_2.png";
	  }
   }
   
   function ali_pay()
   {
      pay_way = 1;
      document.getElementById("post").src="image/post_1.png";
	  document.getElementById("pay_way_label").innerHTML ="(当前支付方式:支付宝)";
   }
   
   function post_pay()
   {
      
      pay_way = 2; 
	  document.getElementById("alipay").src="image/alipay_1.png";
	  document.getElementById("pay_way_label").innerHTML ="(当前支付方式:邮局汇款)";
   }
   
     

</script>
  
</head>
      
<body>
    <div class="main">
	 
	 <div class="title">
		<img src="image/top.jpg" />
	 </div>
	
	
     <div class="tip">
              <div class="reg_title">
			     购买支付
              </div>
	      <HR style="border:1px dotted #ccc" width="100%">
	       </br> 
	        您的订单号:<?php echo $OrderNum;?> <font color="#FF0000"> (可支付的方式:支付宝和邮局汇款) </font> <br/>  
		    价格:<?php echo $price;?> <br/><br/> 
			<input type="image" src="image/buy_1.png" value="提交" onclick="pay()" onmouseover="this.src='image/buy_2.png'" onmouseout="this.src='image/buy_1.png'"/>  
			<label id="pay_way_label"><font color="#FF0000"> (当前支付方式:支付宝) </font>	</label>
			<br/><br/> 
			请选择支付方式:
			<br/><br/> 
			<input type="image"  id="alipay" src="image/alipay_2.png"  onclick="ali_pay()" onmouseover="this.src='image/alipay_2.png'" onmouseout="pay_mouse_out()"/> 
			<br/><br/> 
			<input type="image"  id="post" src="image/post_1.png" onclick="post_pay()"  onmouseover="this.src='image/post_2.png'" onmouseout="pay_mouse_out()" /> <font color="#FF0000"> (如果您没有网银,建议您选择邮局汇款) </font>
	  </div>
	  
    </div>
</body>
</html>
</html>