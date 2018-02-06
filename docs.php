<?php
$usedtemplates='docs_main,docs_main_bit,docs_view_main,docs_view_bit';
require ('global.php');
$titleetc='Documentions';
$li['docs']='id="current"';

if(empty($_GET['id']))
{
  $query=$DB->query('select * from docs where cid=\'-1\'');
    $docs='';
  while($doc = $DB->fetch_array($query))
  {

 if($row=='a')
 {
  $row='b';
 }
 else
 {
  $row='a';
 }
     $doc['count']=$DB->num_rows($DB->query("select * from docs where cid='$doc[id]'"));
     $docs.=$TP->GetTemp('docs_main_bit');

  }
  $TP->WebTemp('docs_main');
}
else
{
  $query=$DB->query('select * from docs where id=\''.$_GET['id'].'\'');
    $docs='';
  while($d = $DB->fetch_array($query))
  {

   $qu=$DB->query('select * from docs where cid=\''.$d['id'].'\'');
     while($doc = $DB->fetch_array($qu))
     {
      $lis=$lis.'<li><a href="#'.$doc[id].'">'.$doc[title].'</a>';
           $doc['date']=mydate($doc['date'],'last');
       $docs.=$TP->GetTemp('docs_view_bit');
     }

   $TP->WebTemp('docs_view_main');
   $titleetc.=' :: '.$d['title'];
  }

}
$TP->print_page();
?>