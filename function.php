<?php

    /*
	*   一些共同的调用函数
	*   比如发送邮件，链接跳转等。
	*/
 
     
     /*跳转到某个url*/
     function location_url($url)
     {
        echo "<script language='javascript' type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
     }
	 
 
	function random_string($length, $max=FALSE)
    {
       if(is_int($max) && $max > $length)
       {
          $length = mt_rand($length, $max);
       }
       $output = '';
       for($i=0; $i<$length; $i++)
       {
          $which = mt_rand(0,2);
          if($which === 0)
            $output .= mt_rand(0,9);
          elseif ($which === 1)
           $output .= chr(mt_rand(65,90));
          else
           $output .= chr(mt_rand(97,122));
       }
        return $output;
    }

 



?>
