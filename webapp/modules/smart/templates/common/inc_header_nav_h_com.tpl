({* {{{ navHomeCom *})<div id="navHomeCom" class="topNav" data-theme="e">
<ul class="ui-grid-c">
<li id="navRecentBbsList" class="ui-block-a"><a href="({t_url m=pc a=page_h_com_comment_list})" class="({if $INC_HEADER_page_name == 'h_com_comment_list'}) ui-btn-active({/if})" data-role="button" data-corners="false" data-mini="true">掲示板新着</a></li>
<li id="navSearchBbsList" class="ui-block-b"><a href="({t_url m=pc a =page_h_com_topic_find_all})" class="({if $INC_HEADER_page_name == 'h_com_topic_find_all'}) ui-btn-active({/if})" data-role="button" data-corners="false" data-mini="true">掲示板検索</a></li>
<li id="navfhCommunity" class="ui-block-c"><a href="({t_url m=pc a=page_fh_com_list})" class="({if $INC_HEADER_page_name == 'fh_com_list'}) ui-btn-active({/if})" data-role="button" data-corners="false" data-mini="true">参加({$WORD_COMMUNITY_HALF})</a></li>
<li id="navSearchCommunity" class="ui-block-d"><a href="({t_url m=pc a=page_h_com_find_all})" class="({if $INC_HEADER_page_name == 'h_com_find_all'}) ui-btn-active({/if})" data-role="button" data-corners="false" data-mini="true">({$WORD_COMMUNITY_HALF})検索</a></li>
</ul>
</div>({* navHomeCom }}} *})
