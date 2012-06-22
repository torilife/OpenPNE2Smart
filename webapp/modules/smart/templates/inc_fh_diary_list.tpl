<li id="diary({$item.c_diary_id})" class="diaryList">
<a class="ui-link-inherit diaryListItem" href="({t_url m=pc a=page_fh_diary})&amp;target_c_diary_id=({$item.c_diary_id})" id="diary({$item.c_diary_id})">
<h3 id="diary({$item.c_diary_id})Title">({$item.subject})</h3>
<span class="ui-li-count">({$item.num_comment})</span>
<p>({if $item.public_flag == "public"})
（全員に公開）
({elseif $item.public_flag == "friend"})
（({$WORD_MY_FRIEND})まで公開）
({elseif $item.public_flag == "private"})
（公開しない）
({/if})</p>
<p class="ui-li-aside" id="diaryDatetime({$item.c_diary_id})">({$item.r_datetime|date_format:"%m月%d日<br>%H:%M"})</p>
<p>({$item.body|t_decoration:1|t_truncate:34:"":3})</p>
({if $item.image_filename_1||$item.image_filename_2||$item.image_filename_3})<p><figure>
({if $item.image_filename_1})<img src="({t_img_url filename=$item.image_filename_1 w=36 h=36})" alt="" />({/if})
({if $item.image_filename_2})<img src="({t_img_url filename=$item.image_filename_2 w=36 h=36})" alt="" />({/if})
({if $item.image_filename_3})<img src="({t_img_url filename=$item.image_filename_3 w=36 h=36})" alt="" />({/if})
</figure></p>({/if})
</a></li>

