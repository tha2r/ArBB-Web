<br>
<form id="addcomment" name="send_friend" action="messages.php?action=do_reply" method="post">
<table dir=rtl class="table_border" cellpadding="6" cellspacing="0" border="0" width="100%" align="center" style="border-top-width:0px">
<tr class="tcat"><td colspan="2">رد على رسالة</td></tr>
<tr>
<td class="td2" width="25%">الى</td>
<td class="td1" width="70%"><input type="text" name="to_email" value="$m[email]" size="50"></td>
</tr>
<tr>
<td class="td2" width="25%" colspan="2" align="center">الرسالة</td>
</tr><tr>
<td class="td1" colspan="2" align="center"><textarea name="message" id="notes" value="" cols="50" rows=5></textarea></td>
</tr>
<tr>
<td class="td2" colspan="2" align=center><input type=submit value="إرسال الرسالة">&nbsp;--&nbsp;<input type=reset value="مسح الحقول"></td>
</tr>
</table>
</form>
<br>