<?php

$subject = 'OODJ';
if ($handle = opendir('/FYP/'.$subject)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
            echo $thelist = '<li><a href='.$subject.'/'.$file.'>'.$file.'</a></li>';
        }
    }
    closedir($handle);
}
?>

