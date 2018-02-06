<html dir="ltr" lang="eng">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
$style
        <title>$titleetc ArBB</title>
        <script type="text/javascript">
        function set_title()
        {
         parent.document.title = (document.title != '' ? document.title : 'Arbb Admin Control Panel');
        }
        </script>
        
</head>
<if condition="$show[bodytag]">
<body onload="set_title();">
</if>
<if condition="$show[location_bar]">
<!-- user info and location -->
<table class="table_border" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
<tr>
	<td width="100%" class="td1">
				<a href="index.php?action=main&sid=$sid">ArBB Control Panel</a> $nav[location]
	</td>	
</tr>
</table>
</if>
$options[webcontent]
</body>
</html>