<?php      
  function intvalMerge($arr){
    $to=count($arr);
    $total=$to;
    $crr=[];
    while($total>=1){
      if(empty($crr)) $crr[]=array_shift($arr);
      if(count($crr)>=1&&count($arr)>=1){
        $sh=array_shift($arr);
        foreach ($crr as $k=>$c) {
            $m=isMergeInterval($c,$sh,0);
            if(!is_array($m[0])){
              $crr[$k]=$m;
              break;
            }else if($k==count($crr)-1){
                $crr[]=$c==$m[0]?$m[1]:$m[0];
            }
        }
      }
      $total=count($arr);
    };
    if(count($crr)!=$to&&count($crr)>1){
      $crr=meg($crr);
    }
    return $crr;
  }
  function isMergeInterval($b,$e,$c=1){
    if($b[0]>$e[0]){
        $temp=$e;
        $e=$b;
        $b=$temp;
    }
    if($e[0]<=$b[1]){
        if($e[1]<=$b[1]) $w=0;
        else $w=1;
    }else $w=2;
    if($c){
        switch ($w){
            case 0:$data=$e;break;
            case 1:$data=[$e[0],$b[1]];break;
            case 2:$data=[];
        }
    }else{
        switch ($w){
            case 0:$data=$b;break;
            case 1:$data=[$b[0],$e[1]];break;
            case 2:$data=[$b,$e];break;
        }
    }
    return $data;
  }

?>