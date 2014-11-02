<?php

 function chinesesubstr($str,$len)
  { 
    $i = 0;
    $flag = 0;
    while($flag < $len)
    {
      if(ord(substr($str,$i,1))>0xa0)
      {
        $tmp .= substr($str,$i,3);
        $i += 3;
        $flag += 2;
      }
      else
      {
        $tmp .= substr($str,$i,1);
        $i ++;
        $flag ++;
      }
    }
    if($i < strlen($str))
      $tmp .= '...';
    return $tmp; 
  }


?>