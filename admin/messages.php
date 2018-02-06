<?php
$usedtemplates = 'messages_new,messages_bit,messages_view,messages_reply';

$phrasearray=array('admincp');

require('global.php');


if($_GET['action']=="new")
{
$perpage=20;
$settingselect='';
$page=(intval($_GET['page']))?intval($_GET['page']):1;
$start=($page*$perpage)-$perpage;
$settingselect='';
$query=$DB->query("select * from messages where new='1' order by id desc limit $start,$perpage");
while($m = $DB->fetch_array($query))
{
        if($m['new']==1)
        {
                $td=1;
        }
        else
        {
                $td=2;
        }
$messages .= $TP->GetTemp('messages_bit');

}
$TP->WebTemp('messages_new');
}
elseif($_GET['action']=="all")
{
$perpage=20;
$settingselect='';
$page=(intval($_GET['page']))?intval($_GET['page']):1;
$start=($page*$perpage)-$perpage;
$query=$DB->query("select * from messages where 1=1 order by id desc limit $start,$perpage");
while($m = $DB->fetch_array($query))
{
foreach($m as $key => $val)
{
 $m[$key]=nl2br(htmlspecialchars($val));
}
        if($m['new']==1)
        {
                $td=1;
                $m['name']=$m['name'].' - (غير مقروءة)';
        }
        else
        {
                $td=2;

        }
$messages .= $TP->GetTemp('messages_bit');

}
$TP->WebTemp('messages_new');
}
elseif($_GET['action']=="read")
{

$id=intval($_GET['id']);
$query=$DB->query("select * from messages where id='$id'");
while($m = $DB->fetch_array($query))
{
foreach($m as $key => $val)
{
 $m[$key]=nl2br(htmlspecialchars($val));
}
$DB->query("update messages set new=0 where id='$id'");
$TP->WebTemp('messages_view');
}

}
elseif($_GET['action']=="delete")
{

$id=intval($_GET['id']);
$query=$DB->query("select * from messages where id='$id'");
while($m = $DB->fetch_array($query))
{
foreach($m as $key => $val)
{
 $m[$key]=nl2br(htmlspecialchars($val));
}
  $TP->webTemp("alert");
//error_message("هل أنت متأكد أنك تريد حذف الرسالة");
$alertmessage="هل أنت متأكد أنك تريد حذف الرسالة";
$alertmessage.="<br><a href='messages.php?action=do_delete&sid=$sid&id=$id'>إذا كنت متأكدا من انك تريد حذف الرسالة اضغط هنا</a>";

$TP->webTemp("alert");
}

}
elseif($_GET['action']=="do_delete")
{

$id=intval($_GET['id']);
$query=$DB->query("select * from messages where id='$id'");
while($m = $DB->fetch_array($query))
{
$DB->query("delete from messages where id='$id'");

redirect("تم حذف الرسالة المطلوبة","messages.php?action=all&sid=$sid","تم الحذف");
}

}
elseif($_GET['action']=="reply")
{

$id=intval($_GET['id']);
$query=$DB->query("select * from messages where id='$id'");
while($m = $DB->fetch_array($query))
{
foreach($m as $key => $val)
{
 $m[$key]=nl2br(htmlspecialchars($val));
}
  $TP->webTemp("messages_reply");
}

}
elseif($_GET['action']=="do_reply")
{

         $from="security@soqor.net";
         $message="مرحبا $m[name],
هذه الرسالة هي رد على رسالتك التي ارسلتها لادارة موقع صقور الهكرز
---------------------------------
".$_POST['messages']."
---------------------------------
مع تحيات ادارة صقور الهكرز
Http://www.soqor.net";

         sendmail($_POST['email'], "رد على رسالتك إلى ادارة صقور الهكرز", $message, $from, "HACKERS PAL");
         redirect("تم ارسال الرسالة بنجاح .. شكرا لك..","messages.php?action=all&sid=$sid","تم ارسال الرسالة");

}

$titleetc='الرسائل - ';

$TP->print_page();
?>