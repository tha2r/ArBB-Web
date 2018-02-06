<?php
$usedtemplates = 'docs_add,docs_mod,docs_edit,docs_del';


$phrasearray=array('admincp');

require('global.php');
     $ins=array();
$_GET['action']=($_GET['action'])?$_GET['action']:"mod";
if($_GET['action']=='add')
{
$query = $DB->query('select * from docs where cid=\'-1\'');
while($row = $DB->fetch_array($query))
{
$poptions.="<option value=\"$row[id]\" class=\"td1\">$row[title]</option>";
}

$TP->WebTemp('docs_add');

}
elseif($_GET['action']=='do_add')
{
  $array=array('title','cid','doc');

  $ins=array('date' => time());
  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->insert($ins,'docs');
   $id=$DB->insert_id();
  redirect('Post added Successfully',"docs.php?sid=$sid");
}
elseif($_GET['action']=='mod')
{
$TP->WebTemp('docs_mod');

}
elseif($_GET['action']=='do_mod')
{
$query=$DB->query('select * from docs where id=\''.intval($_POST['id']).'\'');
while($p=$DB->fetch_array($query))
{
foreach($p as $key => $val)
{
 $p[$key]=htmlspecialchars($val);
}
$query = $DB->query('select * from docs where cid=\'-1\'');
while($row = $DB->fetch_array($query))
{
$sell=($row['id']==$p['cid'])?' selected class="td2"':' class="td1"';
$poptions.="<option value=\"$row[id]\"$sell>$row[title]</option>";
}

$TP->WebTemp('docs_'.$_POST['do']);
}
}
elseif($_GET['action']=='do_edit')
{
  $array=array('cid','title','doc');

  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->update($ins,'docs','id=\''.intval($_GET['id']).'\'');

  redirect('post edited successfully','docs.php?sid='.$sid);
}
elseif($_GET['action']=='do_del')
{
  $DB->query('delete from docs where id=\''.intval($_GET['id']).'\'');
  redirect('post deleted successfully','docs.php?sid='.$sid);
}



$titleetc='Documentions Control - ';

$TP->print_page();
?>