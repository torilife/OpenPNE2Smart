<li id="diaryComment({$item.number})" class="commentList diaryComment">
<p class="authorBar">
<div class="memberPhoto48"><a href="({t_url m=pc a=page_f_home})&amp;target_c_member_id=({$item.c_member_id})"><img class="ui-li-thumb" src="({t_img_url filename=$item.image_filename w=48 h=48 noimg=no_image})" alt=""></a></div>
<div class="memberData">
<div class="nameBody">
<span class="number">({$item.number})</span>:({if $item.nickname})<a id="comment-({$item.number})-member" title="({$item.nickname})" href="({t_url m=pc a=page_f_home})&amp;target_c_member_id=({$item.c_member_id})">({$item.nickname})</a>({/if})
<span class="body"> ({$item.body|nl2br|t_url2cmd:'diary':$item.c_member_id|t_cmd:'diary'})</span>
</div>
({if $item.image_filename_1||$item.image_filename_2||$item.image_filename_3})<div class="ui-grid-b photo">
({if $item.image_filename_1})<span class="ui-block-a"><a href="({t_img_url filename=$item.image_filename_1})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$item.image_filename_1 w=76 h=76})" alt="" /></a></span>({/if})
({if $item.image_filename_2})<span class="ui-block-b"><a href="({t_img_url filename=$item.image_filename_2})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$item.image_filename_2 w=76 h=76})" alt="" /></a></span>({/if})
({if $item.image_filename_3})<span class="ui-block-c"><a href="({t_img_url filename=$item.image_filename_3})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$item.image_filename_3 w=76 h=76})" alt="" /></a></span>({/if})
</div>({/if})
({if $item.isShorten})<div class="readMore">...</div><div class="readMore"><a title="続きを読む" href="javascript:void(0);" onclick="readMore('#diaryComment({$item.number}) .memberData'); return false;">続きを読む</a></div>({/if})
<time datetime="({$target_diary.r_datetime})" id="diaryComment({$item.number})Datetime" class="datetime">({$target_diary.r_datetime|date_format:"%Y年%m月%d日%H:%M"})</time>
({if $item.image_filename_1||$item.image_filename_2||$item.image_filename_3})<a title="写真" data-icon="smart-camera" class="" data-iconshadow="false" data-shadow="false" data-corners="true" data-inline="true" href="javascript:void(0);" data-role="button" data-iconpos="notext"  onclick="readMore('#diaryComment({$item.number}) .memberData'); return false;">写真</a>({/if})
({if $smarty.const.USE_RESPONSE_COMMENT && $is_writable_comment})({if !$smarty.const.OPENPNE_USE_DIARY_COMMENT || $is_comment_input})<a title="返信" data-icon="smart-write" class="" data-iconshadow="false" data-shadow="false" data-corners="true" data-inline="true" href="javascript:void(0);" data-role="button" data-iconpos="notext"  onclick="jump_to('diarycommentForm', 'diarycommentForm');response_comment_format($('#comment-({$item.number})-member').attr('title'), '({$item.number})', 'comment_box');$('#comment_box').focus();return false;">返信</a>({/if})({/if})
({if $type == "h" || ($type == 'f' && $item.c_member_id == $member.c_member_id)})<a title="削除" data-icon="delete" class="" data-iconshadow="false" data-shadow="false" data-corners="true" data-inline="true" href="({t_url m=pc a=page_fh_delete_comment})&amp;target_c_diary_id=({$target_diary.c_diary_id})&amp;target_c_diary_comment_id=({$item.c_diary_comment_id})" data-role="button" data-iconpos="notext">削除</a>({/if})
</div></p>
</li>
