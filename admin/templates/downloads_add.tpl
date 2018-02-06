<br>
<form id="addcomment" name="send_friend" enctype="multipart/form-data" action="downloads.php?action=do_add" method="post">
<table dir=rtl class="table_border" cellpadding="6" cellspacing="0" border="0" width="100%" align="center" style="border-top-width:0px">
<tr class="tcat"><td colspan="2">إضافة برنامج</td></tr>
<tr>
<td class="td2" width="25%">عنوان البرنامج</td>
<td class="td1" width="70%"><input type="text" name="title" value="" size="50"></td>
</tr>
<tr>
<td class="td2" width="25%">القسم</td>
<td class="td1" width="70%"><select name="cid">$poptions</select></td>
</tr>
<tr>
<td class="td2" width="25%">صورة البرنامج</td>
<td class="td1" width="70%"><input type="file" name="img" value="" size="50"></td>
</tr><tr>
<td class="td2" width="25%">أو ضع مسار الصورة</td>
<td class="td1" width="70%"><input type="text" name="image" value="" size="50"><br> أو اتركه فارغ ليتم اخذ صورة القسم</td>
</tr>
<tr>
<td class="td2" width="25%">وصلة التحميل</td>

<td class="td1"><input type="text" name="url" value="" size="50"></td>
</tr>
<tr>
<td class="td2" width="25%" colspan="2" align="center">وصف البرنامج</td>
</tr>
<tr>
<td class="td1" colspan="2" align="center"><textarea name="notes" id="notes" cols="50" rows=5>$p[notes]</textarea></td>
</tr>
<tr>
<td class="td2" colspan="2" align=center><input type=submit value="ارسال البرنامج">&nbsp;--&nbsp;<input type=reset value="مسح الحقول"></td>
</tr>
</table>
</form>
<br>