<?php
error_reporting(0);

$usedtemplates='news_main,news_bit,news_view';
require ('global.php');
$li['news']='id="current"';
if(empty($_GET['action']))
{
     $newslist='';

     $news_query=$DB->query('select * from news');
     $num=$DB->num_rows($news_query);

     $page=(intval($_GET['page']))?$_GET['page']:1;
     $perpage=20;
     $pages=ceil($num/$perpage);
     $start=($page*$perpage)-$perpage;

     $query=$DB->query('select * from news where 1=1 order by id desc limit '.$start.','.$perpage.'');

            while($n=$DB->fetch_array($query))
            {
            $n['date']=mydate($n['date'],'last');
                  $newslist.=$TP->GetTemp("news_bit");
            }

          $pages_list='';

          if($pages>1)
          {
             $ii=1;

           while($ii <= $pages)
           {
            if($ii != $page)
            {
             $pages_list.='<a href="newspage-'.$ii.'.html" class="page">'.$ii.'</a>'."\n";
            }
            else
            {
             $pages_list.='|'.$ii.'|'."\n";
            }
            $ii++;
           }
          }


     $TP->WebTemp("news_main");

     $titleetc='News';
}
elseif($_GET['action']=='view')
{

$id=intval($_GET['id']);

   $news_query=$DB->query('select * from news where id=\''.$id.'\'');

   while($n = $DB->fetch_array($news_query))
   {
       $n['date']=mydate($n['date'],'last');
       $n['news']=bbcode($n['news']);

       $DB->query("update news set views=views+1 where id='$id'");

       $TP->WebTemp('news_view');

       $titleetc=$n['title'].' (Viewing News)';
   }
}
$TP->print_page();
?>