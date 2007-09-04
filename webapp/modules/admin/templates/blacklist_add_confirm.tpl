({$inc_header|smarty:nodefaults})
({ext_include file="inc_subnavi_adminSNSConfig.tpl"})
({assign var="page_name" value="ブラックリスト設定"})
({ext_include file="inc_tree_adminSNSConfig.tpl"})
</div>

({*ここまで:navi*})

({if $msg})<p class="actionMsg">({$msg})</p>({/if})
<h2>ブラックリスト追加確認</h2>
<div class="contents">
以下のデータをブラックリストに追加します。よろしいですか？<br>
ブラックリストに追加された個体識別番号を持つユーザは、ログイン・新規登録が制限されます。
<form action="./" method="post">
<input type="hidden" name="m" value="({$module_name})" />
<input type="hidden" name="a" value="do_({$hash_tbl->hash('insert_c_blacklist','do')})" />
<input type="hidden" name="sessid" value="({$PHPSESSID})" />
<input name="easy_access_id" type="hidden" class="basic" value="({$easy_access_id})"/>
<input name="info" type="hidden" class="basic" value="({$info})"/>

<table class="basicType2">
<tbody>
<tr>
<th>個体識別番号</th>
<td>({$easy_access_id})</td>
</tr>
<tr>
<th>該当するメンバー</th>
<td><a href="({t_url _absolute=1 m=pc a=page_f_home})&amp;target_c_member_id=({$member.c_member_id})" target="_blank">({$member.nickname})</a></td>
</tr>
<tr>
<th>備考</th>
<td width="250">({$info|nl2br})</td>
</tr>
<tr>
<th>&nbsp;</th>
<td><p class="textBtn"><input type="submit" class="submit" value=" 追　加 " /></p></td>
</tr>
</tbody>
</table>
</form>

({$inc_footer|smarty:nodefaults})
