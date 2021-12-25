<?php
function correctPageIndex($index, $tag) {
    if($index < 1) {
        $index = 1;
    }
    
    $blogCount = $GLOBALS["redis"]->llen($tag);
    $indexCount = ceil($blogCount / $GLOBALS["pageCount"]);

    if($index > $indexCount) {
        $index = $indexCount;
    }

    return $index;
}