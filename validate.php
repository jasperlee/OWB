<?php

     /*
	 *    ��֤�û���/�������
	 *    ��Ӧ��type��Ӧ��ͬ�Ĺ��� 1:��֤�û����������Ƿ��Ӧ
	 *    ����ֵ    1 �Ϸ� -1 ���Ϸ�
	 */
	 require_once ('function.php'); 
	 
	 header("Content-type: text/html;charset=GBK");
     header("Cache-Control: no-cache, must-revalidate");
	 
	 $type  = $_REQUEST["type"];
     $email = $_REQUEST["email"];
	 $passcode = $_REQUEST["passcode"];
     
	$link = mysql_connect("localhost","root","ep1000") or die("-1"); 
         mysql_select_db("et_web") or die("-1");
        mysql_query("SET NAMES 'utf8'");
   
		 
	 if($type == 1)
	 {
	    if(!$email || !$passcode)
	       die("-1");  
        $sql = "select  * from active_user where Email = '$email'";
        $result = mysql_query($sql);
        if(!$result) 
      	  die("-1");
        $num_rows = mysql_num_rows($result);
        if($num_rows == 0) //�޸�����¼
           die("-1");
        $row=mysql_fetch_array($result);
        /*�Աȼ��ܺ������md5ֵ*/
        if($passcode == md5($row["password"]))
            die("1");   
	 }
	 
     die("-1");	 
?>
