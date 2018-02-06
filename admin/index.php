<?php
/*======================================================================*\
|| #################################################################### ||
|| #                     Arbb 1.0.0 (beta 1)                          # ||
|| #       All Copyrights are saved Arabian bulletin board team       # ||
|| #                   Copyright © 2007 ArBB Team                     # ||
|| #           ArBB Is Free Bulletin Board and not for sale           # ||
|| #################################################################### ||
\*======================================================================*/
#
#    admin Control panel File started
#
/*
        File name       -> index.php
        File Version    -> 1.0.0 Beta 1
        File Programmer -> Thaer
        File type       -> file
*/

$usedtemplates = 'main,head,main_page,menu,menu_sub,menu_cat';

$phrasearray=array('admincp');

require('global.php');

$cpstyle['dir']='default';
$show['location_bar']=0;
if(empty($_GET['action']))
{

    $TP->webtemp('main');
    $show['bodytag']=0;
}
elseif($_GET['action']=='head')
{
   $TP->webtemp('head');
}
elseif($_GET['action']=='main')
{
$show['location_bar']=1;
$st=array();

$st['mysql']            = mysql_get_server_info();
$st['php']              = phpversion();


 $TP->webtemp('main_page');

}
elseif($_GET['action']=='menu')
{

$menu  = array();
$menus = '';

//$menu[$m[cat]][$m[disporder]][$m[mid]]=$m;
$menu[-1][1][1]=array("name" => 'Main','ur'=>'');
$menu[1][2][2]=array("name" => 'Main','url'=>'index.php?action=main');
$menu[1][3][3]=array("name" => 'Settings','url'=>'index.php?action=settings');


$menu[-1][2][2]=array("name" => 'News','ur'=>'');
$menu[2][2][2]=array("name" => 'Add News','url'=>'news.php?action=add');
$menu[2][3][3]=array("name" => 'Delete / Edit','url'=>'news.php?action=mod');

$menu[-1][3][3]=array("name" => 'Downloads','ur'=>'');
$menu[3][2][2]=array("name" => 'Add Download','url'=>'downloads.php?action=add');
$menu[3][3][3]=array("name" => 'Delete / Edit','url'=>'downloads.php?action=mod');
$menu[3][7][7]=array("name" => 'Cats Control','url'=>'downloads.php?action=cats');

$menu[-1][4][4]=array("name" => 'Documentions','ur'=>'');
$menu[4][2][2]=array("name" => 'Add Doc','url'=>'docs.php?action=add');
$menu[4][3][3]=array("name" => 'Delete / Edit','url'=>'docs.php?action=mod');

$menu[-1][5][5]=array("name" => 'Messages','ur'=>'');
$menu[5][2][2]=array("name" => 'New Meessages','url'=>'messages.php?action=new');
$menu[5][3][3]=array("name" => 'All Messages','url'=>'messages.php?action=all');




while(list($mid,$m) = each($menu[-1]))
{
        $catcontents='';
        $cat=array();
  foreach($m as $key => $val)
  {
    $cat=$val;

    $cat['name']=$cat['name'];

  if(is_array($menu[$mid]))
  {

    foreach($menu[$mid] as $disp => $midarray)
    {

     while(list($id,$sub) = each($midarray))
     {
      $sub['url'] = (eregi('&',$sub['url'])||eregi('=',$sub['url']))?$sub['url'].'&sid='.$sid:$sub['url'].'?sid='.$sid;
      $catcontents .= $TP->GetTemp('menu_sub');
     }
    }
  }
/*$nonedisp='none';
$src='expand';

if(($mid==1)||($arbb->input['nojs']==1))
{
   $nonedisp='';
   $src='collapse';
} */
   $nonedisp='';
   $src='collapse';
$langexpcoll=$lang[$src];
    $menus.=$TP->GetTemp('menu_cat');
  }
}
 $TP->webtemp('menu');
}
elseif($_GET['action']=='phpinfo')
{
 phpinfo();
 die();
}



$TP->print_page();
?>