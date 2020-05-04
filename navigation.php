<?php
$mydir = '.';
$pages = scandir($mydir);

echo '<div class="menu">';

foreach($pages as $page){
        if(strpos($page, '.php')){
                $link = $mydir.'/'.$page;
                $safeName = str_replace('.php', '', $page);
                echo '<a href="'.$link.'">'.$safeName.'</a> &nbsp; &nbsp;';
        }
}

echo'</div>';
?>

