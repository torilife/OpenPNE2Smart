({$inc_ktai_header|smarty:nodefaults})
<table width="100%"><tr><td align="center" bgcolor="#({$ktai_color_config.bg_01})">
<font color="#({$ktai_color_config.font_01})"><a name="top">
({$SNS_NAME})新規登録</a></font><br>
</td></tr></table>

※かならず利用規約に同意してから登録をおこなってください。<br>
■<a href="({t_url m=ktai a=page_o_sns_kiyaku})">利用規約</a><br>
■<a href="({t_url m=ktai a=page_o_sns_privacy})">ﾌﾟﾗｲﾊﾞｼｰﾎﾟﾘｼｰ</a><br>

<hr color="#({$ktai_color_config.border_01})">
<center>
({t_form m=ktai a=page_o_regist_input ses=$ses})
({if $aff_id})
<input type="hidden" name="aff_id" value="({$aff_id})">
({/if})
<input type="submit" value="登録ﾌｫｰﾑへ"><br>
</form>
</center>
<br>
%%i38%%<a href="({t_url m=ktai a=page_o_login})">すでに登録済みの方はこちら</a>

({$inc_ktai_footer|smarty:nodefaults})
