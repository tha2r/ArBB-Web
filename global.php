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
require('./includes/functions.php');
require('./includes/class_db.php');
require('./includes/class_templates.php');

$TP = new templates;
$DB = new dbclass;
$dbconnect = $DB->connect('localhost','arbb','veyUC53JwJm');
if(!$dbconnect)
{
 Die('');
}
$dbselect  = $DB->selectdb('arbb',$dbconnect);
if(!$dbselect)
{
 Die('');
}
$tmps='index,page,redirection';
$usedtemplates=($usedtemplates)?$usedtemplates.','.$tmps:$tmps;
$TP->templatesused($usedtemplates);
$menublocks='';
$linksblocks='';

?>