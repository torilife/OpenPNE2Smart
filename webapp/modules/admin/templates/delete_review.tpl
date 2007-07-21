({$inc_header|smarty:nodefaults})
({ext_include file="inc_subnavi_adminImageKakikomi.tpl"})
({assign var="page_name" value="レビュー削除"})
({ext_include file="inc_tree_adminImageKakikomi.tpl"})
</div>

({*ここまで:navi*})

<h2>レビュー削除</h2>
<div class="contents">

({if $msg})
<p class="actionMsg">({$msg})</p>
({/if})

このレビューを削除します。削除後に復元させることはできないので注意してください。

<form action="./" method="post">
<input type="hidden" name="sessid" value="({$PHPSESSID})" />
<input type="hidden" name="m" value="({$module_name})" />
<input type="hidden" name="a" value="do_({$hash_tbl->hash('delete_kakikomi_c_review')})" />
<input type="hidden" name="target_c_review_comment_id" value="({$review.c_review_comment_id})" />
<span class="textBtnS"><input type="submit" value="削除" /></span>
</form>

<table class="basicType2">
<tbody>
({****})
<tr>
<th>ID</th>
<td class="type1">
<a href="({t_url _absolute=1 m=pc a=page_h_review_list_product})&c_review_id=({$review.c_review_id})" target="_blank">({$review.c_review_comment_id})</a>
</td>
</form>
</tr>
({****})
<tr>
<th>タイトル</th>
<td>
<a href="({$review.c_review.url})" target="_blank">({$review.c_review.title})</a>
</td>
</tr>
({****})
<tr>
<th>説明</th>
<td>
({$review.c_review.release_date})<br />
({$review.c_review.manufacturer})<br />
({$review.c_review.artist})({$review.c_review.author})
</td>
</tr>
({****})
<tr>
<th>レビュアー</th>
<td>
<a href="({t_url _absolute=1 m=pc a=page_f_home})&amp;target_c_member_id=({$review.c_member_id})" target="_blank">({$review.c_member.nickname})</a>
</td>
</tr>
({****})
<tr>
<th>作成日</th>
<td>
({$review.r_datetime})
</td>
</tr>
({****})
<tr>
<th>本文</th>
<td width="500">
({$review.body|nl2br})
</td>
</tr>
({****})
</tbody>
</table>

({$inc_footer|smarty:nodefaults})
