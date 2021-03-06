<div id="LayoutC">
<div id="Center">

({if $type == "h"})
({* {{{ infoButtonBox *})
<div class="dparts infoButtonBox"><div class="parts">
<div class="partsHeading"><h3>レビューを書く</h3></div>
<div class="block">
({t_form_block _method=get m=pc a=page_h_review_add})
<ul class="moreInfo button">
<li><input type="submit" class="input_submit" value="レビューを書く" /></li>
</ul>
({/t_form_block})
<ul class="moreInfo">
<li><a href="({t_url m=pc a=page_h_review_search})">全体のレビュー一覧を見る</a></li>
<li><a href="({t_url m=pc a=page_h_review_clip_list})">クリップを見る</a></li>
</ul>
</div>
</div></div>
({* }}} *})
({/if})

({if $c_review_list})

({* {{{ reviewList *})
<div class="dparts reviewList"><div class="parts">
<div class="partsHeading"><h3>({$c_member.nickname})さんのレビュー一覧</h3></div>

({capture name=pager})({strip})
<div class="pagerRelative">
({if $is_prev})<p class="prev"><a href="({t_url m=pc a=page_fh_review_list_member})&amp;target_c_member_id=({$c_member.c_member_id})&amp;page=({$page-1})">前を表示</a></p>({/if})
<p class="number">({$start_num})件～({$end_num})件を表示</p>
({if $is_next})<p class="next"><a href="({t_url m=pc a=page_fh_review_list_member})&amp;target_c_member_id=({$c_member.c_member_id})&amp;page=({$page+1})">次を表示</a></p>({/if})
</div>
({/strip})({/capture})
({$smarty.capture.pager|smarty:nodefaults})

({foreach from=$c_review_list item=review})
<dl>
<dt>
<a href="({$review.url})" target="_blank"><img src="({if $review.image_medium})({$review.image_medium})({else})({t_img_url_skin filename=no_image w=120 h=120})({/if})" alt="" /></a>
<span><a href="({$review.url})" target="_blank">詳細を見る</a></span>
</dt>
<dd>
<table><tr class="title">
<th>タイトル</th>
<td>({$review.title})</td>
</tr><tr>
<th>説明</th>
<td>
({if $review.release_date})({$review.release_date})<br />({/if})
({if $review.manufacturer})({$review.manufacturer})<br />({/if})
({if $review.author})({$review.author})({/if})
</td>
</tr><tr>
<th>レビュー</th>
<td>
({$review.body|nl2br})
<p class="operation">
<a href="({t_url m=pc a=page_h_review_list_product})&amp;c_review_id=({$review.c_review_id})">全てのレビューを見る(({$review.write_num}))</a>
({if $type == "h"}) | <a href="({t_url m=pc a=page_h_review_add_write})&amp;category_id=({$review.c_review_category_id})&amp;asin=({$review.asin})">編集</a>({/if})
</p>
</td>
</tr><tr>
<th>作成日時</th>
<td>({$review.r_datetime|date_format:"%Y年%m月%d日 %H:%M"})</td>
</tr><tr>
<th>満足度</th>
<td><img src="({t_img_url_skin filename=satisfaction_level_`$review.satisfaction_level`})" alt="" /></td>
</tr><tr>
<th>カテゴリ</th>
<td>({$review.category_disp})</td>
</tr>
</table>
</dd>
</dl>
({/foreach})

({$smarty.capture.pager|smarty:nodefaults})

</div></div>
({* }}} *})

({else})

({* {{{ simpleBox *})
<div class="dparts simpleBox"><div class="parts">
<div class="partsHeading"><h3>({$c_member.nickname})さんのレビュー一覧</h3></div>
<div class="block">
<p>まだレビューがありません。</p>
</div>
</div></div>
({* }}} *})

({/if})

</div><!-- Center -->
</div><!-- LayoutC -->
