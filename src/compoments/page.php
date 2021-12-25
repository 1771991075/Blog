<?php
    $redis = new Redis();
    $redis -> connect('127.0.0.1', 6379);
   
    $pageNum = $listlen / $contentNumOnePage;
    $contentNumOnePage = 10;

    $listlen = $redis -> llen('bloglist');

    if($listlen % $contentNumOnePage != 0){
        $pageNum = $pageNum + 1;
    }else if(($listlen % $contentNumOnePage == 0)){
        $pageNum = $pageNum;
    }else $pageNum = 1;
















?>