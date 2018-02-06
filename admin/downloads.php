<?php
$usedtemplates = 'downloads_add,downloads_coms,downloads_mod,downloads_edit,downloads_del'.
                 ',downloads_cat_bit,downloads_cat,downloads_cat_edit,downloads_cat_delete'.
                 ',downloads_cat_add';


$phrasearray=array('admincp');

require('global.php');

if($_GET['action']=='add')
{
$query = $DB->query('select * from cats');
while($row = $DB->fetch_array($query))
{

$poptions.="<option value=\"$row[id]\">$row[title]</option>";
}
$TP->WebTemp('downloads_add');

}
elseif($_GET['action']=='do_add')
{
  $array=array('cid','title','img','notes','url');

  $ins=array('date' => time(), 'views'=>'0','downloads'=>'0');
  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->insert($ins,'downloads');

   $id=$DB->insert_id();
$ext = get_extension($_FILES['img']['name']);
  if(in_array($ext,$allowedext))
  {
  move_uploaded_file($_FILES['img']['tmp_name'],'../uploads/downloads_download_'.$id.'.'.$ext);

     $ins2['img']='/uploads/downloads_download_'.$id.'.'.$ext;

  $DB->update($ins2,'downloads','id=\''.$id.'\'');
  }
  elseif(strlen($_POST['image'] > 1))
  {
     $ins2['img']=$_POST['image'];

       $DB->update($ins2,'downloads','id=\''.$id.'\'');
  }
  else
  {
     $queryy=$DB->query('select * from cats where id=\''.intval($_GET['cid']).'\'');

     $cat=$DB->fetch_array($queryy);

     $ins2['img']=$cat['img'];

     $DB->update($ins2,'downloads','id=\''.$id.'\'');
  }
  //$count=$DB->num_rows($DB->query('select id from downloads where cid=\''.$ins['cid'].'\''));
    $DB->query('update cats set count=count+1 where id='.$ins['cid'].'');
  redirect('Post added Successfully',"downloads.php?sid=$sid");
}
elseif($_GET['action']=='mod')
{
$TP->WebTemp('downloads_mod');

}
elseif($_GET['action']=='do_mod')
{
$query=$DB->query('select * from downloads where id=\''.intval($_POST['id']).'\'');
while($p=$DB->fetch_array($query))
{
foreach($p as $key => $val)
{
 $p[$key]=htmlspecialchars($val);
}
$quer = $DB->query('select * from cats');
while($row = $DB->fetch_array($quer))
{

$sel=($row['id']==$p['cid'])?'selected':'';
$poptions.="<option value=\"$row[id]\" $sel>$row[title]</option>";
}
$TP->WebTemp('downloads_'.$_POST['do']);
}
}
elseif($_GET['action']=='do_mod_edit')
{
$query=$DB->query('select * from downloads where id=\''.intval($_GET['id']).'\'');
while($p=$DB->fetch_array($query))
{
foreach($p as $key => $val)
{
 $p[$key]=htmlspecialchars($val);
}
$quer = $DB->query('select * from cats');
while($row = $DB->fetch_array($quer))
{

$sel=($row['id']==$p['cid'])?'selected':'';
$poptions.="<option value=\"$row[id]\" $sel>$row[title]</option>";
}
$TP->WebTemp('downloads_edit');
}
}
elseif($_GET['action']=='do_edit')
{
  $array=array('cid','title','img','notes','url');

  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->update($ins,'downloads','id=\''.intval($_GET['id']).'\'');

  redirect('post edited successfully','downloads.php?sid='.$sid);
}
elseif($_GET['action']=='do_del')
{
  $DB->query('delete from downloads where id=\''.intval($_GET['id']).'\'');
 $DB->query('delete from dcomments where cid=\''.intval($_GET['id']).'\'');
  redirect('post deleted successfully','downloads.php?sid='.$sid);
}
elseif($_GET['action']=='cats')
{
if(empty($_GET['do']))
{
$quer = $DB->query('select * from cats');
while($c = $DB->fetch_array($quer))
{
$cats .= $TP->GetTemp('downloads_cat_bit');
}
$TP->WebTemp('downloads_cat');
}
elseif($_GET['do']=='add')
{
   $TP->webtemp('downloads_cat_add');
}
else
{
$query=$DB->query('select * from cats where id=\''.intval($_GET['id']).'\'');
while($c=$DB->fetch_array($query))
{
   $TP->webtemp('downloads_cat_'.$_GET['do']);
   }
}
}
elseif($_GET['action']=='do_cats')
{
if($_GET['do']=='add')
{
  $array=array('title','notes');

  foreach($array as $key => $val)
  {
     $ins[$val]=$_POST[$val];
  }
$ext = get_extension($_FILES['img']['name']);
  $DB->insert($ins,'cats');

  $id=$DB->insert_id();
$ext = get_extension($_FILES['img']['name']);
  if(in_array($ext,$allowedext))
  {
  move_uploaded_file($_FILES['img']['tmp_name'],'../uploads/downloads_cat_'.$id.'.'.$ext);
  $array=array('img');

     $ins['img']='/uploads/downloads_cat_'.$id.'.'.$ext;
   }
  $DB->update($ins,'cats','id=\''.$id.'\'');
    redirect('Cat inserted successfully','downloads.php?action=cats&sid='.$sid);

}
elseif($_GET['do']=='edit')
{
$query=$DB->query('select * from cats where id=\''.intval($_GET['id']).'\'');
while($c=$DB->fetch_array($query))
{
  $array=array('title','img','notes');

  foreach($array as $key => $val)
  {

     $ins[$val]=$_POST[$val];
  }

  $DB->update($ins,'cats','id=\''.intval($_GET['id']).'\'');
    redirect('Cat Updated successfully','downloads.php?action=cats&sid='.$sid);
}
}
elseif($_GET['do']=='del')
{
        $comma='';

$query=$DB->query('select * from downloads where cid=\''.intval($_GET['id']).'\'');
while($c=$DB->fetch_array($query))
{
$ids=$comma.$c['id'];
$comma=',';
}
  $DB->query('delete from cats where id=\''.intval($_GET['id']).'\'');
  $DB->query('delete from downloads where id IN($ids)');
  $DB->query('delete from dcomments where cid IN($ids)');
    redirect('Cat deleted successfully','downloads.php?action=cats&sid='.$sid);
}
}

$titleetc='المشاركات - ';

$TP->print_page();
?>