<?php
error_reporting(0);
if((@ini_get('register_globals') || !@ini_get('gpc_order')) && (isset($_POST) || isset($_GET) || isset($_COOKIE)))
{
        foreach(array_keys($_POST+$_GET+$_COOKIE+$_SERVER+$_FILES) as $key)
        {
                $$key='';
                unset($$key);
                $$key='';
        }
}
if(isset($_POST['GLOBALS'])||isset($_GET['GLOBALS'])||isset($_FILES['GLOBALS'])||isset($_COOKIE['GLOBALS'])||isset($_REQUEST['GLOBALS'])||isset($_ENV['GLOBALS']))
{
    die('Hacking attempt !!<br>you cant make your own global variables :)');
}
DEFINE("_PREFIX_",'',1);
require('../includes/functions.php');
require('../includes/class_db.php');
require('../includes/class_templates.php');

$TP = new templates;
$DB = new dbclass;
$lang['powered_by']        = "Powered By : ArBB Team &copy; 2009";
$options['copyright_text'] = "All Copytights Are Saved For ArBB Team.";

$dbconnect = $DB->connect('localhost','arbb','veyUC53JwJm');
if(!$dbconnect)
{
 Die('');
}
$dbselect  = $DB->selectdb('arbb',$dbconnect);
if(!$dbselect)
{
 Die('DBName Error');
}
$tplist="alert,footer,page,redirection,error,login,main";
$usedtemplates=($usedtemplates)?$usedtemplates.",".$tplist:$tplist;
$TP->templatesused($usedtemplates);
$menublocks='';
$linksblocks='';

session_start();

if($_GET['action'] =='logout')
{
session_unregister('admin');
session_unregister('local');
session_destroy();
header('location:index.php');
}
elseif($_GET['action']=='login')
{

if(md5(md5($key3.md5(md5($key1.$_POST['username']).$key2)).$key4)=='c65b5af9f680454fa1cc4e8b7e0abf41' && md5(md5($key4.md5(md5($key3.$_POST['password']).$key1)).$key2)=='1c15cf71d5aa058b2cc36ef788f3ee09')
{
        $admin='Administrator';

        session_register('admin');
        redirect("Logged In Successfully","index.php?sid=".time()."");
}
else
{

 redirect("Error .. ++ .. Logged",'#');
}

}

if(!session_is_registered('admin'))
{
$TP->webtemp('login');
$TP->print_page();
die();
}
$sid=$HTTP_COOKIE_VARS['PHPSESSID'];
$style='<style>'.file_get_contents('cpstyles/controlpanel.css').'</style>';
?>