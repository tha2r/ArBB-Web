<?php
$usedtemplates='download_main,download_catbit,download_view,download_section_main,download_section_bit';
require ('global.php');

$li['download']='id="current"';

if(empty($_GET['action']))
{
 $query=$DB->query('select * from cats');

while($c = $DB->fetch_array($query))
 {

 if($row=='a')
 {
  $row='b';
 }
 else
 {
  $row='a';
 }
  $cats.=$TP->GetTemp('download_catbit');

 }

 $TP->WebTemp('download_main');
$titleetc="Downloads";
}
elseif($_GET['action']=='section')
{
   $query=$DB->query('select * from cats where id='."'".intval($_GET[id])."'");

while($c = $DB->fetch_array($query))
 {
  $downloads='';
  $num=$DB->num_rows($DB->query("select * from downloads where cid='$c[id]'"));

     $page=(intval($_GET['page']))?$_GET['page']:1;
     $perpage=10;
     $pages=ceil($num/$perpage);
     $start=($page*$perpage)-$perpage;


  $d_q=$DB->query("select * from downloads where cid='$c[id]' order by id desc limit $start,$perpage");
  while($d=$DB->fetch_array($d_q))
  {
    $d['date']=mydate($d['date'],'last');
    $d['notes']=substr($d['notes'],0,150);
  $downloads.=$TP->GetTemp('download_section_bit');

  }

          $pages_list='';

          if($pages>1)
          {
             $ii=1;

           while($ii <= $pages)
           {
            if($ii != $page)
            {
             $pages_list.='<a href="p'.$ii.'_section-'.$c['id'].'.html" class="page">'.$ii.'</a>'."\n";
            }
            else
            {
             $pages_list.='|'.$ii.'|'."\n";
            }
            $ii++;
           }
          }

 $TP->WebTemp('download_section_main');
 $titleetc=" $c[title] :: Downloads";
 }



}
elseif($_GET['action']=='view')
{
$query=$DB->query("select * from downloads where id='".intval($_GET[id])."'");
while($d=$DB->fetch_array($query))
{
$d['date']=mydate($d['date'],'last');

       $DB->query("update downloads set views=views+1 where id='".intval($_GET[id])."'");
 $TP->WebTemp('download_view');
 $titleetc=$d['title'].' (Viewing File)';
}

}
elseif($_GET['action']=='download')
{
$query=$DB->query("select * from downloads where id='".intval($_GET[id])."'");
while($d=$DB->fetch_array($query))
{
 $DB->query("update downloads set downloads=downloads+1 where id='".intval($_GET[id])."'");
redirect('Now Downloading '.$d['title'].' ..',$d['url']);
}

}


$TP->print_page();
?>