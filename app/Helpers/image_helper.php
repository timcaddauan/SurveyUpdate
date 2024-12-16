<?php

function src($fileName, $type="full")
{
    $path = './uploads/images/manipulated';

    if($type != 'full')
        $path .= $type .'/';
    return $path . $fileName;
}


?>