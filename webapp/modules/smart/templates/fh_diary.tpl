<div class="page ({$INC_HEADER_page_name})" data-role="page" id="({$INC_HEADER_page_name})({$target_diary.c_diary_id})">
<script language="JavaScript">
<!--
var prevDiaryId = null;
var nextDiaryId = null;

// Swipe
$('#({$INC_HEADER_page_name})({$target_diary.c_diary_id})').live('pageinit',function(event){
({if $c_diary_id_prev || $c_diary_id_next})
({if $c_diary_id_prev})	// 前の日記
	prevDiaryId = '({$c_diary_id_prev})';
	$("#({$INC_HEADER_page_name})({$target_diary.c_diary_id})").bind("swiperight", function(){
		var params = setDiaryIdparams(prevDiaryId);
		changePage('({t_url m=pc a=page_fh_diary _html=false _absolute=true})', params, true);
	});
({/if})
({if $c_diary_id_next})	// 次の日記
	nextDiaryId = '({$c_diary_id_next})';
	$("#({$INC_HEADER_page_name})({$target_diary.c_diary_id})").bind("swipeleft", function(){
		var params = setDiaryIdparams(nextDiaryId);
		changePage('({t_url m=pc a=page_fh_diary _html=false _absolute=true})', params, false);
	});
({/if})
({/if})
});

({if $comment_count})
$('#diarycommentForm').ready(function(){
	jump_to('diaryComment({$comment_count})','diaryCommentList');
});
({elseif $requests.body})
$('#diarycommentForm').ready(function(){
	jump_to('comment_box','comment_box');
});
({/if})

//-->
</script>

({if $smarty.const.USE_RESPONSE_COMMENT}) 
<script type="text/javascript" src="./modules/smart/comment.js"></script>
({/if})
({ext_include file="common/inc_header.tpl"})
<div class="menu-content" data-role="content">({* {{{ content *})
({ext_include file="common/inc_msg.tpl"})

({* {{{ diaryDetailBox *})
<section class="diaryDetailBox" id="diary({$target_diary.c_diary_id})">
<div class="authorBar" id="diary({$target_diary.c_diary_id})Author">
<div class="photo48"><a href="({t_url m=pc a=page_f_home})&amp;target_c_member_id=({$target_member.c_member_id})"><img src="({t_img_url filename=$target_member.image_filename w=48 h=48 noimg=no_image trim=square})" class="memberPhoto" alt="({$WORD_DIARY})作成者プロフィール画像"></a></div>
<div class="itemData">
<div class="title">
<h2>({$target_diary.subject})</h2>
<span class="footer-icon">({t_smart_icon_url public_flag=$target_diary.public_flag})</span>
</div>
</div>
</div>
<div class="authorData">
<span class="author diaryAuthorName"><a href="({t_url m=pc a=page_f_home})&amp;target_c_member_id=({$target_member.c_member_id})" id="diaryAuthor">({$target_member.nickname})</a>({if $type == "f"})さん({/if})</span>
</div>
<time datetime="({$target_diary.r_datetime})" id="diary({$target_diary.c_diary_id})Datetime" class="datetime">({$target_diary.r_datetime|date_format:"%Y年%m月%d日%H:%M"})</time>

<article class="detailBody">
<p class="itemBody" id="diary({$target_diary.c_diary_id})body">({$target_diary.body|t_url2a|nl2br|t_decoration})</p>
({if $target_diary.isShorten})<div class="readMore">...</div><div class="readMore"><a title="続きを読む" href="javascript:void(0);" onclick="readMore('.detailBody'); return false;">続きを読む</a></div>({/if})
<ul class="gallery ui-grid-b" id="diary({$target_diary.c_diary_id})gallery">
({if $target_diary.image_filename_1 || $target_diary.image_filename_2 || $target_diary.image_filename_3})
({if $target_diary.image_filename_1})<li class="ui-block-a"><a href="({t_img_url filename=$target_diary.image_filename_1})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$target_diary.image_filename_1 w=76 h=76})" alt="写真1"></a></li>({/if})
({if $target_diary.image_filename_2})<li class="ui-block-b"><a href="({t_img_url filename=$target_diary.image_filename_2})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$target_diary.image_filename_2 w=76 h=76})" alt="写真2"></a></li>({/if})
({if $target_diary.image_filename_3})<li class="ui-block-c"><a href="({t_img_url filename=$target_diary.image_filename_3})" data-transition="pop" data-ajax="false"><img src="({t_img_url filename=$target_diary.image_filename_3 w=76 h=76})" alt="写真3"></a></li>({/if})
({/if})
</ul>

<div id="diaryCategory" data-inline="true"><small>({if $category_list})(
({foreach from=$category_list item=category})
<span><a href="({t_url m=pc a=page_fh_diary_list})&amp;target_c_member_id=({$target_member.c_member_id})&amp;category_id=({$category.c_diary_category_id})">({$category.category_name})</a></span>
({/foreach}))
({/if})</small></div>
<div class="operation" data-inline="true">
<p class="commentWriteButton"><a title="返信" data-icon="smart-write" data-iconshadow="false" data-shadow="false" data-corners="true" data-inline="true" href="javascript:void(0);" data-role="button" data-iconpos="notext" onclick="jump_to('diarycommentForm', '');$('#comment_box').focus();return false;">返信</a></p>
</div>
</article>

({if $type == "h"})
<section class="operation">
<a href="({t_url m=pc a=page_h_diary_edit})&amp;target_c_diary_id=({$target_diary.c_diary_id})" data-role="button" data-inline="false" data-mini="true" data-ajax="false">編集</a>
</section>
({/if})
</section>({*  diaryDetailBox }}} *})

({if $target_diary_comment_list})
({* {{{ commentList *})<section class="commentListBox" id="diaryCommentList">
({* {{{ Pager *})({if $total_page_num > 1 && $pager.page_prev})
<div class="pagerRelative" id="diaryComment({$target_diary.c_diary_id})NextPager"><span class="next"><a href="javascript:void(0);" onclick="submitPagerPage('({t_url m=pc a=page_fh_diary_ajax})&amp;target_c_diary_id=({$target_diary.c_diary_id})', 'desc', '#({$INC_HEADER_page_name})({$target_diary.c_diary_id}) li.commentList', 'diaryComment({$target_diary.c_diary_id})NextPager', '({$total_page_num})', true); return false;" data-role="button" data-icon="arrow-r" data-iconpos="right" data-inline="false" data-mini="false" data-ajax="true">コメントをもっと読む</a></span></div>
({/if})({* Pager }}} *})
<ul id="diary({$target_diary.c_diary_id})CommentList" class="pictureList" data-role="listview" data-inset="false"> 
({foreach from=$target_diary_comment_list item=item})
({ext_include file="inc_fh_diary_comment.tpl"})
({/foreach})
</ul>
</section>({* commentList }}} *})
({/if})

({if !$smarty.const.OPENPNE_USE_DIARY_COMMENT or $is_comment_input})
({if $is_writable_comment})
({* {{{ formTable *})<section class="formTable" id="diarycommentForm">
<div class="operation">
({t_form_block _enctype=file m=pc a=page_fh_diary_comment_confirm _attr='data-ajax="false"'})
<input type="hidden" name="target_c_diary_id" value="({$target_diary.c_diary_id})">
<div data-role="fieldcontain" class="ui-hide-label">
<label for="body">コメント</label>
<textarea id="comment_box" name="body" rows="({$_rows|default:'1'})" cols="({$_cols|default:'40'})" placeholder="コメント">({$requests.body})</textarea>
</div>
({**OpenPNE2 スマートフォン対応：ここから**})
<div data-role="fieldcontain">
<label for="upfile_1">写真1</label><input type="file" class="input_file" name="upfile_1" size="40"><br>
<label for="upfile_2">写真2</label><input type="file" class="input_file" name="upfile_2" size="40"><br>
<label for="upfile_3">写真3</label><input type="file" class="input_file" name="upfile_3" size="40"><br>
</div>
({**OpenPNE2 スマートフォン対応：ここまで**})
<div data-role="fieldcontain">
<input type="submit" class="input_submit" value="確認画面">
</div>
({/t_form_block})
</div>
<div class="operation">
({t_mail_post mailto=$mail_address _type=button})
<ul>
<li>({$SNS_NAME})に登録したメールアドレスから投稿してください。<br></li>
<li>写真も添付できます。<br></li>
</ul>
</div>
</section>({* formTable }}} *})
({else})
({* {{{ simpleBox *})
<section class="simpleBox" id="diaryNoavailableComment">
<h3>コメントを書く</h3>
<p>コメントが1000番に達したので、この({$WORD_DIARY})にはコメントできません。</p>
</section>({* simpleBox }}} *})
({/if})
({/if})

</div>({* {{{ content *})
({ext_include file="common/inc_footer.tpl"})
</div>({* page }}} *})
