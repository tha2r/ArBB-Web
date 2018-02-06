<?php
$usedtemplates = 'news_add,news_mod,news_edit,news_del';


$phrasearray=array('admincp');

require('global.php');
     $ins=array();
$_GET['action']=($_GET['action'])?$_GET['action']:"mod";
if($_GET['action']=='add')
{
$TP->WebTemp('news_add');

}
elseif($_GET['action']=='do_add')
{
  $array=array('title','cutted','news');

  $ins=array('date' => time(), 'views'=>'0');
  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->insert($ins,'news');
   $id=$DB->insert_id();
  redirect('Post added Successfully',"news.php?sid=$sid");
}
elseif($_GET['action']=='mod')
{
$TP->WebTemp('news_mod');

}
elseif($_GET['action']=='do_mod')
{
$query=$DB->query('select * from news where id=\''.intval($_POST['id']).'\'');
while($p=$DB->fetch_array($query))
{
foreach($p as $key => $val)
{
 $p[$key]=htmlspecialchars($val);
}
$TP->WebTemp('news_'.$_POST['do']);
}
}
elseif($_GET['action']=='do_edit')
{
  $array=array('title','cutted','news');

  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->update($ins,'news','id=\''.intval($_GET['id']).'\'');

  redirect('post edited successfully','news.php?sid='.$sid);
}
elseif($_GET['action']=='do_del')
{
  $DB->query('delete from news where id=\''.intval($_GET['id']).'\'');
  redirect('post deleted successfully','news.php?sid='.$sid);
}



$titleetc='News Control - ';

$TP->print_page();
?>