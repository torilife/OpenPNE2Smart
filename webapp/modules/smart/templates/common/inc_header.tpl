({* {{{ Navi *})({ext_include file="common/inc_header_nav.tpl"})({* Navi }}} *})
({* {{{ header *})<div id="mainHeader" data-role="header">
<span id="headerLeft">
({* {{{ SideNavi *})({strip})<a title="Navi" data-icon="grid" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="javascript:void(0);" data-role="button" data-iconpos="notext" onclick="leftNavToggle();">Navi</a>({/strip})({* SideNavi }}} *})
</span>
<span id="headerRight">
({* {{{ Community Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="({$WORD_COMMUNITY})" data-icon="smart-bbs" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="({t_url m=pc a=page_fh_com_list})" data-role="button" data-iconpos="notext" data-ajax="false">({$WORD_COMMUNITY})</a>({/strip})({/if})({* Community Button }}} *})
({* {{{ Diary Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="({$WORD_DIARY})" data-icon="smart-diary" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="({t_url m=pc a=page_fh_diary_list})" data-role="button" data-iconpos="notext" data-ajax="false">({$WORD_DIARY})</a>({/strip})({/if})({* Diary Button }}} *})
({* {{{ Visitor Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="あしあと" data-icon="smart-visitor" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="({t_url m=pc a=page_h_ashiato})" data-role="button" data-iconpos="notext" data-ajax="false">あしあと</a>({/strip})({/if})({* Visitor Button }}} *})
({* {{{ Message Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="メッセージ" data-icon="smart-message" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="({t_url m=pc a=page_h_message_box})" data-role="button" data-iconpos="notext" data-ajax="false">メッセージ</a>({/strip})({/if})({* Message Button }}} *})
({* {{{ Profile Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="プロフィール" data-icon="smart-profile" data-wrapperels="span" data-iconshadow="false" data-shadow="true" data-corners="true" href="({t_url m=pc a=page_h_prof})" data-role="button" data-iconpos="notext" data-ajax="false">プロフィール</a>({/strip})({/if})({* Profile Button }}} *})
({* {{{ Home Button *})({if $_headline_link != $smarty.const.OPENPNE_URL})({strip})<a class="ui-btn-right smartIcon" title="Home" data-icon="smart-home" data-direction="reverse" data-wrapperels="span" data-iconshadow="false" data-shadow="false" data-corners="true" href="({t_url m=pc})" data-role="button" data-iconpos="notext" data-ajax="false">({$smarty.const.SNS_NAME})</a>({/strip})({/if})({* Home Button }}} *})
</span>
</div>({* header }}} *})
