<?php
function correctPageIndex($index, $tag) {
    if($index < 1) {
        $index = 1;
    }
    
    $indexCount = getIndexCount($tag);
    if($index > $indexCount) {
        $index = $indexCount;
    }

    return $index;
}

function correctSearchIndex($index, $count) {
    if($index < 1) {
        $index = 1;
    }
    
    $indexCount = ceil($count / $GLOBALS["pageCount"]);
    if($index > $indexCount) {
        $index = $indexCount;
    }

    return $index;
}

function getIndexCount($tag) {
    $blogCount = $GLOBALS["redis"]->llen($tag);
    $indexCount = ceil($blogCount / $GLOBALS["pageCount"]);
    return $indexCount;
}