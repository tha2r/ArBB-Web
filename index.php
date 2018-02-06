<?php
$usedtemplates='index_submenu_news,index_news,index_download';
require ('global.php');
$lastver="1.0.0";
$lastverurl='news-1.html';
$li['index']='id="current"';
$news_query=$DB->query('select * from news where 1 order by id desc limit 1');
while($n = $DB->fetch_array($news_query))
{
$n['date']=mydate($n['date'],'last');
$n['news']=bbcode($n['cutted']);
      $index_news=$TP->GetTemp('index_news');
}
      $index_downloads='';

$down_query=$DB->query('select * from downloads where 1 order by id desc limit 4');
while($d = $DB->fetch_array($down_query))
{
        $d['date']=mydate($d['date'],'last');
      $index_downloads.=$TP->GetTemp('index_download');
}
  $latestnews='';
$sub_menu_news_query=$DB->query('select * from news where 1 order by id desc limit 5');
while($s = $DB->fetch_array($sub_menu_news_query))
{
$s['date']=mydate($s['date'],'last');
$latestnews.=$TP->GetTemp('index_submenu_news');
}
$TP->print_page('index');
?>