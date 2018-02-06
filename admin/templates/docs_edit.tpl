<br>
<form id="addcomment" name="send_friend" action="docs.php?action=do_edit&id=$p[id]" method="post">
<table class="table_border" cellpadding="6" cellspacing="0" border="0" width="100%" align="center" style="border-top-width:0px">
<tr class="tcat"><td colspan="2">Edit docs $n[title]</td></tr>
<tr>
<td class="td2" width="25%">Title</td>
<td class="td1" width="70%"><input type="text" name="title" value="$p[title]" size="50"></td>
</tr>
<tr>
<td class="td2" width="25%" colspan="2" align="center">Full doc</td>
</tr>
<tr>
<td class="td1" colspan="2" align="center"><textarea name="doc" id="notes" value="" cols="50" rows=5>$p[doc]</textarea></td>
</tr>
<tr>
<td class="td2" colspan="2" align=center><input type=submit value="Send it">&nbsp;--&nbsp;<input type=reset value="Reset"></td>
</tr>
</table>
</form>
<br>