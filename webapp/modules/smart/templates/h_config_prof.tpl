<script language="JavaScript">
<!--
var is_search_result = ({$c_member.is_search_result});

$('#h_config_prof').live('pageinit',function(event){
	$("select#is_search_result").prop("selectedIndex", is_search_result);
	$("select#is_search_result").slider("refresh");
});
//-->
</script>
<div class="page" data-role="page" id="({$INC_HEADER_page_name})">
({ext_include file="common/inc_header.tpl"})
<div class="content" data-role="content">({* {{{ content *})
({ext_include file="common/inc_msg.tpl"})

({if $SSL_SELECT_URL})<a href="({$SSL_SELECT_URL})" data-role="button" data-mini="true" data-ajax="false">({if $HTTPS})標準(http)({else})SSL(https)({/if})はこちら</a>({/if})

({* {{{ formTable *})<section class="formTable" id="configProfForm" data-role="collapsible" data-collapsed="false" data-content-theme="c">
<h3>プロフィール変更</h3>
({t_form_block m=pc a=do_h_config_prof _attr='data-ajax="false"'})
<div data-role="fieldcontain">
<fieldset data-role="controlgroup">
<legend><span class="required">検索設定</span></legend>
<select name="is_search_result" id="is_search_result" data-role="slider">
	<option value="0"({if !$c_member.is_search_result})checked="checked" ({/if})>公開しない</option>
	<option value="1"({if $c_member.is_search_result})checked="checked" ({/if})>公開</option>
</select>
</fieldset>
</div>
({capture name="nick"})
<div data-role="fieldcontain">
<label for="nickname" class="required">({$WORD_NICKNAME})</label>
<input type="text" class="input_text" name="nickname" id="nickname" value="({$c_member.nickname})">
</div>
({/capture})
({capture name="birth"})
<div data-role="fieldcontain">
<label for="birth_year" class="required">生まれた年</label>
<input type="text" class="input_text" name="birth_year" id="birth_year" value="({$c_member.birth_year})" maxlength="4" autocapitalize="off">
<select name="public_flag_birth_year">
({html_options options=$public_flags selected=$c_member.public_flag_birth_year})
</select>
</div>
<div data-role="fieldcontain">
<fieldset data-role="controlgroup" data-type="horizontal">
<legend><span class="required">誕生日</span></legend>
<label for="birth_month">月</label>
<select name="birth_month" id="birth_month" data-mini="false">
<option value="0">月</option>
({foreach from=$month item=item})
<option value="({$item})"({if $c_member.birth_month==$item}) selected="selected"({/if})>({$item})</option>
({/foreach})
</select>
<label for="birth_day">日</label>
<select name="birth_day" id="birth_day" data-mini="false">
<option>日</option>
({foreach from=$day item=item})
<option value="({$item})"({if $c_member.birth_day==$item}) selected="selected"({/if})>({$item})</option>
({/foreach})
</select> 
</fieldset>
<select name="public_flag_birth_month_day">
({html_options options=$public_flags selected=$c_member.public_flag_birth_month_day})
</select>
</div>
({/capture})

({foreach from=$profile_list item=profile})
({strip})
({if !$_cnt_nick && $profile.sort_order >= $smarty.const.SORT_ORDER_NICK
  && !$_cnt_birth && $profile.sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_nick"})
({counter assign="_cnt_birth"})
({if $smarty.const.SORT_ORDER_NICK > $smarty.const.SORT_ORDER_BIRTH})
({$smarty.capture.birth|smarty:nodefaults})
({$smarty.capture.nick|smarty:nodefaults})
({else})
({$smarty.capture.nick|smarty:nodefaults})
({$smarty.capture.birth|smarty:nodefaults})
({/if})
({/if})
({if !$_cnt_nick && $profile.sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})
({if !$_cnt_birth && $profile.sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})
({/strip})
({if $profile.disp_config})
<div data-role="fieldcontain">
({if $profile.form_type != 'radio' && $profile.form_type != 'checkbox'})<label for="profile[({$profile.name})]"({if $profile.is_required}) class="required"({/if})>({$profile.caption})</label>({/if})
({strip})
({if $profile.form_type == 'text'})
	<input type="text" class="input_text" name="profile[({$profile.name})]" id="profile_({$profile.name})" value="({$c_member.profile[$profile.name].value})">
({elseif $profile.form_type == 'textlong'})
	<textarea name="profile[({$profile.name})]" id="profile_({$profile.name})" class="input_text_long">({$c_member.profile[$profile.name].value})</textarea>
({elseif $profile.form_type == 'textarea'})
	<textarea name="profile[({$profile.name})]"id="profile_({$profile.name})" >({$c_member.profile[$profile.name].value})</textarea>
({elseif $profile.form_type == 'select'})
	<select name="profile[({$profile.name})]"id="profile_({$profile.name})" >
	<option>選択してください</option>
	({foreach from=$profile.options item=item})
		<option value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value == $item.value}) selected="selected"({/if})>({$item.value|default:"--"})</option>
	({/foreach})
	</select>
({elseif $profile.form_type == 'radio'})
	<fieldset data-role="controlgroup">
		<legend><span class="required">({$profile.caption})</span></legend>
		({foreach item=item from=$profile.options})
			<input type="radio" class="input_radio" name="profile[({$profile.name})]" id="profile-({$profile.name})-({$item.c_profile_option_id})" value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value == $item.value}) checked="checked"({/if})>
			<label for="profile-({$profile.name})-({$item.c_profile_option_id})">({$item.value|default:""})</label>
		({/foreach})
	</fieldset>
({elseif $profile.form_type == 'checkbox'})
	<fieldset data-role="controlgroup">
		<legend><span class="required">({$profile.caption})</span></legend>
		({foreach item=item from=$profile.options name=check})
			<input type="checkbox" class="input_checkbox" name="profile[({$profile.name})][]" id="profile-({$profile.name})-({$item.c_profile_option_id})" value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value && in_array($item.value|smarty:nodefaults, $c_member.profile[$profile.name].value)}) checked="checked"({/if})><label for="profile-({$profile.name})-({$item.c_profile_option_id})">({$item.value|default:"--"})</label>
		({/foreach})
	</fieldset>
({/if})
({/strip})
({strip})
({if $profile.info})<p class="caution">({$profile.info})</p>({/if})
({if $profile.public_flag_edit})
({if $c_member.profile[$profile.name].public_flag})
({assign var=pflag value=$c_member.profile[$profile.name].public_flag})
({else})
({assign var=pflag value=$profile.public_flag_default})
({/if})
<select name="public_flag[({$profile.name})]">
({foreach from=$public_flags key=key item=item})
<option value="({$key})"({if $pflag==$key}) selected="selected"({/if})>({$item})</option>
({/foreach})
</select>
({/if})
({/strip})
</div>
({/if})
({/foreach})
({strip})({if !$_cnt_nick && !$_cnt_birth})
({if $smarty.const.SORT_ORDER_NICK > $smarty.const.SORT_ORDER_BIRTH})
({$smarty.capture.birth|smarty:nodefaults})
({$smarty.capture.nick|smarty:nodefaults})
({else})
({$smarty.capture.nick|smarty:nodefaults})
({$smarty.capture.birth|smarty:nodefaults})
({/if})
({else})
({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})
({/if})({/strip})
<div data-role="fieldcontain">
<input type="submit" class="input_submit" value="確認画面">
</div>
({/t_form_block})
</section>({* formTable }}} *})

</div>({* {{{ content *})
({ext_include file="common/inc_footer.tpl"})
</div>({* page }}} *})
