<?php
$usedtemplates='services,about,contact';
require ('global.php');
switch($_GET['page'])
{
case "services":
$li['services']='id="current"';

$TP->webtemp('services');

$titleetc='Services';
break;
case "about":
$li['about']='id="current"';

$TP->webtemp('about');

$titleetc='About US';
break;
case "contact":
$li['contact']='id="current"';
if(empty($_GET['do']))
{
$TP->webtemp('contact');
}
elseif($_GET['do']=='send')
{
   $DB->query("insert into messages values ('','".$_POST['name']."','".$_POST['email']."','".$_POST['message']."',1)");
     redirect('Your Message has been successfully.<br>We will reply as soon as possible.','index.html');
}
$titleetc='Contact US';
break;
case "rss":

Echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<rss version=\"2.0\">
<channel>
        <title>ArBB :: Arabian Bulletin Board ::</title>
        <description>Free PHP And MySql Forum Software</description>
        <link>http://www.ar-bb.com/</link>
        <pubDate>".date("D, d M Y h:m:s",time())."</pubDate>
        <ttl>20</ttl>

        <image>
                <title>ArBB :: Arabian Bulletin Board ::</title>
                <url>/forums/soqor.jpg</url>
                <link>http://www.ar-bb.com/</link>
        </image>
";

$qu=$DB->query("select * from news limit 0,20");
while($c = $DB->fetch_array($qu))
{
$date=date("d/m/Y h:m",$c['date']);
Echo "
        <item>
                <title>".$c['title']."</title>
                <link>http://www.ar-bb.com/news-".$c['id']."/index.html</link>
                <description><![CDATA[".$c['news']."]]></description>
                <pubDate>".$date."</pubDate>
                <guid>http://www.ar-bb.com/news-".$c['id']."/index.html</guid>
        </item>";

}
$qu=$DB->query("select * from downloads limit 0,20");
while($c = $DB->fetch_array($qu))
{
$date=date("d/m/Y h:m",$c['date']);
Echo "
        <item>
                <title>".$c['title']."</title>
                <link>http://www.ar-bb.com/download-".$c['id']."/index.html</link>
                <description><![CDATA[".$c['notes']."]]></description>
                <pubDate>".$date."</pubDate>
                <guid>http://www.ar-bb.com/download-".$c['id']."/index.html</guid>
        </item>";

}


?>
</channel>
</rss>
<?
die();
break;
}

$TP->print_page();
?>