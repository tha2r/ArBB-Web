<br>
<form id="addcomment" name="send_friend" enctype="multipart/form-data" action="downloads.php?action=do_cats&do=add" method="post">
<table dir=rtl class="table_border" cellpadding="6" cellspacing="0" border="0" width="100%" align="center" style="border-top-width:0px">
<tr class="tcat"><td colspan="2">اضافة القسم</td></tr>
<tr>
<td class="td2" width="25%">إسم القسم</td>
<td class="td1" width="70%"><input type="text" name="title" value="$c[title]" size="50"></td>
</tr><tr>
<td class="td2" width="25%">ملاحظات</td>
<td class="td1" width="70%"><input type="text" name="notes" value="$c[notes]" size="50"></td>
</tr>
<tr>
<td class="td2" width="25%">صورة القسم</td>
<td class="td1" width="70%"><input type="file" name="img" value="$c[img]" size="50"></td>
</tr>
<tr>
<td class="td2" colspan="2" align=center><input type=submit value="إضافة القسم">&nbsp;--&nbsp;<input type=reset value="مسح الحقول"></td>
</tr>
</table>
</form>
<br>